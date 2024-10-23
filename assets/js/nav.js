document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('.nav-list a');
    const languageBtn = document.querySelector('.nav-lang button');
    const languageDropdown = document.querySelector('.flag-dropdown');
    const navigation = document.querySelector('nav.nav');
    const mobileNavBtn = document.querySelector('.mobile-menu-btn');
    const body = document.querySelector('body');
    const overlay = document.querySelector('.navbar-overlay');
    const colorSwitchBtn = document.querySelector('.nav-color-switch');

    document.addEventListener('click', (e) => {
        if (!languageDropdown.contains(e.target) && !languageBtn.contains(e.target)) {
            languageDropdown.classList.remove('active');
        }
    });

    const currentURL = window.location.href;
    navLinks.forEach((link) => {
        if (link.href === currentURL) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });

    languageBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        languageDropdown.classList.toggle('active');
    });

    // mobileNavBtn.addEventListener('click', () => {
    //     navigation.classList.toggle('active');
    //     mobileNavBtn.classList.toggle('active');
    //     overlay.classList.toggle('active');
    //     body.classList.toggle('no-scroll');
    // });

    document.addEventListener('click', (e) => {
        if (!navigation.contains(e.target) && !mobileNavBtn.contains(e.target)) {
            navigation.classList.remove('active');
            mobileNavBtn.classList.remove('active');
            overlay.classList.remove('active');
            body.classList.remove('no-scroll');
        }
    });

    navigation.addEventListener('click', (e) => {
        e.stopPropagation();
    });

    colorSwitchBtn.addEventListener('click', () => {
        const icons = colorSwitchBtn.querySelectorAll('img');

        icons.forEach(icon => {
            icon.classList.toggle('active');
        })

        body.classList.toggle('light');

        if (body.classList.contains('light')) {
            localStorage.setItem('theme', 'light');
        } else {
            localStorage.setItem('theme', 'dark');
        }
    })

    const savedTheme = localStorage.getItem('theme');

    if (savedTheme === 'light') {
        body.classList.add('light');
        colorSwitchBtn.querySelector('.img-light').classList.remove('active');
        colorSwitchBtn.querySelector('.img-dark').classList.add('active');
    } else {
        body.classList.remove('light');
        colorSwitchBtn.querySelector('.img-light').classList.add('active');
        colorSwitchBtn.querySelector('.img-dark').classList.remove('active');
    }
});