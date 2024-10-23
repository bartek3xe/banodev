<?php

declare(strict_types=1);

namespace App\Enum;

enum LanguageEnum: string
{
    public const string DEFAULT_LOCALE_VALUE = self::POLISH->value;

    case POLISH = 'pl';
    case ENGLISH = 'en';

    public static function getNativeName(LanguageEnum $enum): string
    {
        return match ($enum) {
            self::POLISH => 'Polski',
            self::ENGLISH => 'English',
        };
    }

    public static function getFlagCode(LanguageEnum $enum): string
    {
        return match ($enum) {
            self::POLISH => 'pl',
            self::ENGLISH => 'gb',
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
