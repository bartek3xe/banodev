<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\ContactType;
use App\Service\MailerService;
use App\Service\RecaptchaService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

#[Route('/', name: 'app_')]
class ContactController extends AbstractController
{
    public function __construct(
        private readonly MailerService $mailerService,
        private readonly RecaptchaService $recaptchaService,
        private readonly TranslatorInterface $translator,
    ) {
    }

    #[Route('contact', name: 'contact')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        $recaptchaResponse = $request->get('g-recaptcha-response');
        if ($form->isSubmitted() && $form->isValid() && $this->recaptchaService->verify($recaptchaResponse)) {
            try {
                $this->mailerService->sendContactUsData($form->getData());
                $this->addFlash('success', $this->translator->trans('contact.success_message'));

                return $this->redirectToRoute('app_contact');
            } catch (ExceptionInterface $e) {
                $this->addFlash('error', $this->translator->trans('contact.mailer_error'));
            }
        } elseif ($form->isSubmitted() && !$this->recaptchaService->verify($recaptchaResponse)) {
            $this->addFlash('error', $this->translator->trans('contact.recaptcha_failed'));
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', $this->translator->trans('contact.submission_problem'));
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
            'recaptcha_site_key' => $this->getParameter('recaptcha_site_key'),
        ]);
    }
}
