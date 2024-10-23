<?php

declare(strict_types=1);

namespace App\Enum;

enum LanguageEnum: string
{
    public const string DEFAULT_LOCALE_VALUE = self::POLISH->value;

    case POLISH = 'pl';
    case ENGLISH = 'en';
    case GERMAN = 'de';
    case UKRAINIAN = 'uk';

    public static function getNativeName(LanguageEnum $enum): string
    {
        return match ($enum) {
            self::POLISH => 'Polski',
            self::ENGLISH => 'English',
            self::GERMAN => 'Deutsch',
            self::UKRAINIAN => 'Українська',
        };
    }

    public static function getFlagCode(LanguageEnum $enum): string
    {
        return match ($enum) {
            self::POLISH => 'pl',
            self::ENGLISH => 'gb',
            self::GERMAN => 'de',
            self::UKRAINIAN => 'ua',
        };
    }

    public static function getNativeNames(): array
    {
        $names = [];
        foreach (self::cases() as $enum) {
            $names[$enum->value] = self::getNativeName($enum);
        }

        return $names;
    }
}
