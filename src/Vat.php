<?php

namespace Chak\EuVatValidation;

class Vat
{
    /**
     * VAT number format per country code (input is uppercased with spaces removed).
     */
    public const PATTERNS = [
        'AT' => '/^ATU\d{8}$/',
        'BE' => '/^BE[01]\d{9}$/',
        'BG' => '/^BG\d{9,10}$/',
        'CY' => '/^CY\d{8}[A-Z]$/',
        'CZ' => '/^CZ\d{8,10}$/',
        'DE' => '/^DE\d{9}$/',
        'DK' => '/^DK\d{8}$/',
        'EE' => '/^EE\d{9}$/',
        'EL' => '/^EL\d{9}$/',
        'ES' => '/^ES(\d{8}[A-Z]|[XYZ]\d{7}[A-Z]|[A-HJ-NP-SUVW]\d{7,8}[A-Z]?)$/',
        'FI' => '/^FI\d{8}$/',
        'FR' => '/^FR[A-HJ-NP-Z0-9]{2}\d{9}$/',
        'GB' => '/^GB(\d{9}|\d{12})$/',
        'HR' => '/^HR\d{11}$/',
        'HU' => '/^HU\d{8}$/',
        'IE' => '/^IE(\d{7}[A-W][A-I]?|\d[A-Z+*]\d{5}[A-W])$/',
        'IT' => '/^(IT)?\d{11}$/',
        'LT' => '/^(LT)?(\d{9}|\d{12})$/',
        'LU' => '/^LU\d{8}$/',
        'LV' => '/^LV\d{11}$/',
        'MT' => '/^MT\d{8}$/',
        'NL' => '/^NL\d{9}B\d{2}$/',
        'PL' => '/^(PL\d{10}|\d{3}-\d{3}-\d{2}-\d{2})$/',
        'PT' => '/^PT[125689]\d{8}$/',
        'RO' => '/^RO\d{2,10}$/',
        'SE' => '/^SE\d{12}$/',
        'SI' => '/^SI\d{8}$/',
        'SK' => '/^SK\d{10}$/',
        'SM' => '/^SM\d{5}$/',
    ];

    /**
     * Validate a VAT number. Without a country, it is inferred from the VAT prefix.
     */
    public static function isValid(string $vat, ?string $country = null): bool
    {
        $vat = strtoupper(str_replace(' ', '', $vat));
        $country = strtoupper($country ?? substr($vat, 0, 2));
        $country = $country === 'GR' ? 'EL' : $country; // VIES uses EL for Greece

        if (! isset(self::PATTERNS[$country]) || ! preg_match(self::PATTERNS[$country], $vat)) {
            return false;
        }

        return match ($country) {
            'IT' => self::italianChecksum(substr($vat, -11)),
            'EL' => self::greekChecksum(substr($vat, -9)),
            'RO' => self::romanianChecksum(substr($vat, 2)),
            default => true,
        };
    }

    /**
     * Supported country codes.
     */
    public static function codes(): array
    {
        return array_keys(self::PATTERNS);
    }

    public static function supports(string $country): bool
    {
        return isset(self::PATTERNS[strtoupper($country)]);
    }

    private static function italianChecksum(string $digits): bool
    {
        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $digit = (int) $digits[$i];
            if ($i % 2 === 1) {
                $digit *= 2;
                $digit -= $digit > 9 ? 9 : 0;
            }
            $sum += $digit;
        }

        return (10 - $sum % 10) % 10 === (int) $digits[10];
    }

    private static function greekChecksum(string $digits): bool
    {
        $sum = 0;
        for ($i = 0; $i < 8; $i++) {
            $sum += (int) $digits[$i] * 2 ** (8 - $i);
        }

        return $sum % 11 % 10 === (int) $digits[8];
    }

    private static function romanianChecksum(string $digits): bool
    {
        $body = str_pad(substr($digits, 0, -1), 9, '0', STR_PAD_LEFT);
        $sum = 0;
        foreach ([7, 5, 3, 2, 1, 7, 5, 3, 2] as $i => $weight) {
            $sum += (int) $body[$i] * $weight;
        }

        return $sum * 10 % 11 % 10 === (int) substr($digits, -1);
    }
}
