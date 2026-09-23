<?php

use Chak\EuVatValidation\Vat;

// AT

it('validates correct Austrian VAT numbers', function () {
   $country = 'AT';
   expect(Vat::isValid('ATU12345678', $country))->toBeTrue(); // Valid VAT number with prefix
   expect(Vat::isValid('ATU98765432', $country))->toBeTrue(); // Valid VAT number with prefix
   expect(Vat::isValid('atu98765432', $country))->toBeTrue(); // Valid VAT number with lowercase prefix
});

it('rejects incorrect Austrian VAT numbers', function () {
   $country = 'AT';
   expect(Vat::isValid('AT1234567', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('AT123456789', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('abcdefghij', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('ATU1234567A', $country))->toBeFalse(); // Invalid format
});

// BE
it('validates correct Belgian VAT numbers', function () {
   $country = 'BE';
   expect(Vat::isValid('BE0123456789', $country))->toBeTrue(); // Valid VAT number with prefix
   expect(Vat::isValid('BE1876543210', $country))->toBeTrue(); // Valid VAT number with prefix
});

it('rejects incorrect Belgian VAT numbers', function () {
   $country = 'BE';
   expect(Vat::isValid('BE12345678', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('BE12345678901', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('abcdefghij', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('BE123456789', $country))->toBeFalse(); // Invalid format
});

// BG
it('validates correct Bulgarian VAT numbers', function () {
   $country = 'BG';
   expect(Vat::isValid('BG123456789', $country))->toBeTrue(); // Valid 9-digit VAT number with prefix
   // expect(Vat::isValid('123456789', $country))->toBeTrue();   // Valid 9-digit VAT number without prefix
   expect(Vat::isValid('BG1234567890', $country))->toBeTrue(); // Valid 10-digit VAT number with prefix
   // expect(Vat::isValid('1234567890', $country))->toBeTrue();  // Valid 10-digit VAT number without prefix
});

it('rejects incorrect Bulgarian VAT numbers', function () {
   $country = 'BG';
   expect(Vat::isValid('BG12345678', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('BG12345678901', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('abcdefghij', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('BG12345678A', $country))->toBeFalse(); // Invalid format
});

// CY
it('validates correct Cypriot VAT numbers', function () {
   $country = 'CY';
   expect(Vat::isValid('CY12345678X', $country))->toBeTrue(); // Valid VAT number with prefix
   // expect(Vat::isValid('12345678X', $country))->toBeTrue();   // Valid VAT number without prefix
   expect(Vat::isValid('CY87654321Y', $country))->toBeTrue(); // Valid VAT number with prefix
   // expect(Vat::isValid('87654321Y', $country))->toBeTrue();   // Valid VAT number without prefix
});

it('rejects incorrect Cypriot VAT numbers', function () {
   $country = 'CY';
   expect(Vat::isValid('CY1234567X', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('CY123456789X', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('abcdefghij', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('CY12345678', $country))->toBeFalse(); // Invalid format
});

// CZ
it('validates correct Czech VAT numbers', function () {
   $country = 'CZ';
   expect(Vat::isValid('CZ12345678', $country))->toBeTrue(); // Valid 8-digit VAT number with prefix
   // expect(Vat::isValid('12345678', $country))->toBeTrue();   // Valid 8-digit VAT number without prefix
   expect(Vat::isValid('CZ123456789', $country))->toBeTrue(); // Valid 9-digit VAT number with prefix
   // expect(Vat::isValid('123456789', $country))->toBeTrue();  // Valid 9-digit VAT number without prefix
   expect(Vat::isValid('CZ1234567890', $country))->toBeTrue(); // Valid 10-digit VAT number with prefix
   // expect(Vat::isValid('1234567890', $country))->toBeTrue(); // Valid 10-digit VAT number without prefix
});

it('rejects incorrect Czech VAT numbers', function () {
   $country = 'CZ';
   expect(Vat::isValid('CZ1234567', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('CZ12345678901', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('abcdefghij', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('CZ1234567A', $country))->toBeFalse(); // Invalid format
});

// DE
it('validates correct German VAT numbers', function () {
   $country = 'DE';
   expect(Vat::isValid('DE123456789', $country))->toBeTrue();
   expect(Vat::isValid('DE987654321', $country))->toBeTrue();
});

it('rejects incorrect German VAT numbers', function () {
   $country = 'DE';
   expect(Vat::isValid('DE12345678', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('DE1234567890', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('DEABCDEFGHI', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('DE12345678A', $country))->toBeFalse(); // Invalid format
});

// DK
it('validates correct Danish VAT numbers', function () {
   $country = 'DK';
   expect(Vat::isValid('DK12345678', $country))->toBeTrue();
   expect(Vat::isValid('DK87654321', $country))->toBeTrue();
});

it('rejects incorrect Danish VAT numbers', function () {
   $country = 'DK';
   expect(Vat::isValid('DK1234567', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('DK123456789', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('DKABCDEFGH', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('DK1234567A', $country))->toBeFalse(); // Invalid format
});

// EE
it('validates correct Estonian VAT numbers', function () {
   $country = 'EE';
   expect(Vat::isValid('EE123456789', $country))->toBeTrue();
   expect(Vat::isValid('EE987654321', $country))->toBeTrue();
});

it('rejects incorrect Estonian VAT numbers', function () {
   $country = 'EE';
   expect(Vat::isValid('EE12345678', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('EE1234567890', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('EEABCDEFGHI', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('EE12345678A', $country))->toBeFalse(); // Invalid format
});

// EL
it('validates correct Greek VAT numbers', function () {
   $country = 'EL';
   expect(Vat::isValid('EL997969920', $country))->toBeTrue();
   expect(Vat::isValid('EL801533418', $country))->toBeTrue();
});

it('rejects incorrect Greek VAT numbers', function () {
   $country = 'EL';
   expect(Vat::isValid('EL12345678', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('EL1234567890', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('ELABCDEFGHI', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('EL12345678A', $country))->toBeFalse(); // Invalid format
});

// ES
it('validates correct Spanish VAT numbers', function () {
   $country = 'ES';
   expect(Vat::isValid('ES12345678X', $country))->toBeTrue(); // Individual
   expect(Vat::isValid('ESB38008116', $country))->toBeTrue();
   expect(Vat::isValid('ESE24043820', $country))->toBeTrue();
   expect(Vat::isValid('ESN0364536C', $country))->toBeTrue(); // From real customer
});

it('rejects incorrect Spanish VAT numbers', function () {
   $country = 'ES';
   expect(Vat::isValid('ES12345678', $country))->toBeFalse(); // Missing initial letter
   expect(Vat::isValid('ESX1234567', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('ESX123456789', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('ESXABCDEFGH', $country))->toBeFalse(); // Invalid format
});

// FI
it('validates correct Finnish VAT numbers', function () {
   $country = 'FI';
   expect(Vat::isValid('FI12345678', $country))->toBeTrue();
   expect(Vat::isValid('FI87654321', $country))->toBeTrue();
});

it('rejects incorrect Finnish VAT numbers', function () {
   $country = 'FI';
   expect(Vat::isValid('FI1234567', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('FI123456789', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('FIABCDEFGH', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('FI1234567A', $country))->toBeFalse(); // Invalid format
});

// FR
it('validates correct French VAT numbers', function () {
   $country = 'FR';
   expect(Vat::isValid('FRXX123456789', $country))->toBeTrue();
   expect(Vat::isValid('FRYY987654321', $country))->toBeTrue();
   expect(Vat::isValid('FR 68841767312', $country))->toBeTrue();
   expect(Vat::isValid('FR68841767312', $country))->toBeTrue();
});

it('rejects incorrect French VAT numbers', function () {
   $country = 'FR';
   expect(Vat::isValid('FR123456789', $country))->toBeFalse(); // Missing initial letters
   expect(Vat::isValid('FRXX12345678', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('FRXX1234567890', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('FRXXABCDEFGH', $country))->toBeFalse(); // Invalid format
});

// GB
it('validates correct British VAT numbers', function () {
   $country = 'GB';
   expect(Vat::isValid('GB123456789', $country))->toBeTrue();
   expect(Vat::isValid('GB987654321', $country))->toBeTrue();
});

it('rejects incorrect British VAT numbers', function () {
   $country = 'GB';
   expect(Vat::isValid('GB12345678', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('GB1234567890', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('GBABCDEFGHI', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('GB12345678A', $country))->toBeFalse(); // Invalid format
});

// HR
it('validates correct Croatian VAT numbers', function () {
   $country = 'HR';
   expect(Vat::isValid('HR12345678901', $country))->toBeTrue();
   expect(Vat::isValid('HR10987654321', $country))->toBeTrue();
});

it('rejects incorrect Croatian VAT numbers', function () {
   $country = 'HR';
   expect(Vat::isValid('HR1234567890', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('HR123456789012', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('HRABCDEFGHIJK', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('HR1234567890A', $country))->toBeFalse(); // Invalid format
});

// HU
it('validates correct Hungarian VAT numbers', function () {
   $country = 'HU';
   expect(Vat::isValid('HU12345678', $country))->toBeTrue();
   expect(Vat::isValid('HU87654321', $country))->toBeTrue();
});

it('rejects incorrect Hungarian VAT numbers', function () {
   $country = 'HU';
   expect(Vat::isValid('HU1234567', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('HU123456789', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('HUABCDEFGH', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('HU1234567A', $country))->toBeFalse(); // Invalid format
});

// IE
it('validates correct Irish VAT numbers', function () {
   $country = 'IE';
   expect(Vat::isValid('IE1X23456A', $country))->toBeTrue();
   expect(Vat::isValid('IE9Y87654B', $country))->toBeTrue();
});

it('rejects incorrect Irish VAT numbers', function () {
   $country = 'IE';
   expect(Vat::isValid('IE123456', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('IE123456789', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('IER234567A', $country))->toBeFalse(); // Invalid format
   expect(Vat::isValid('IEABCDEFGH', $country))->toBeFalse(); // Not numeric
});

// LT
it('validates correct Lithuanian VAT numbers', function () {
   $country = 'LT';
   expect(Vat::isValid('LT100010944', $country))->toBeTrue();
   expect(Vat::isValid('LT100001152411', $country))->toBeTrue();
});

it('rejects incorrect Lithuanian VAT numbers', function () {
   $country = 'LT';
   expect(Vat::isValid('LT12345678', $country))->toBeFalse(); // Too short (8chars)
   expect(Vat::isValid('LT1234567890', $country))->toBeFalse(); // Too long (10chars)
   expect(Vat::isValid('LT12345678901', $country))->toBeFalse(); // Too short (11chars)
   expect(Vat::isValid('LT1234567890222', $country))->toBeFalse(); // Too long (13chars)
   expect(Vat::isValid('LTABCDEFGHI', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('LT12345678A', $country))->toBeFalse(); // Invalid format
});

// LU
it('validates correct Luxembourgish VAT numbers', function () {
   $country = 'LU';
   expect(Vat::isValid('LU12345678', $country))->toBeTrue();
   expect(Vat::isValid('LU87654321', $country))->toBeTrue();
});

it('rejects incorrect Luxembourgish VAT numbers', function () {
   $country = 'LU';
   expect(Vat::isValid('LU1234567', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('LU123456789', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('LUABCDEFGH', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('LU1234567A', $country))->toBeFalse(); // Invalid format
});

// LV
it('validates correct Latvian VAT numbers', function () {
   $country = 'LV';
   expect(Vat::isValid('LV40003378078', $country))->toBeTrue();
   expect(Vat::isValid('LV40203235899', $country))->toBeTrue();
   expect(Vat::isValid('LV01018512345', $country))->toBeTrue(); // natural person
});

it('rejects incorrect Latvian VAT numbers', function () {
   $country = 'LV';
   expect(Vat::isValid('LV1234567890', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('LV123456789012', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('LVABCDEFGHIJK', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('LV1234567890A', $country))->toBeFalse(); // Invalid format
});

// MT
it('validates correct Maltese VAT numbers', function () {
   $country = 'MT';
   expect(Vat::isValid('MT12345678', $country))->toBeTrue();
   expect(Vat::isValid('MT87654321', $country))->toBeTrue();
   expect(Vat::isValid('MT23456789', $country))->toBeTrue();
   expect(Vat::isValid('MT98765432', $country))->toBeTrue();
});

it('rejects incorrect Maltese VAT numbers', function () {
   $country = 'MT';
   expect(Vat::isValid('MT1234567', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('MT123456789', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('MTabcdefgh', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('MT12a45678', $country))->toBeFalse(); // Invalid character
});

// NL
it('validates correct Dutch VAT numbers', function () {
   $country = 'NL';
   expect(Vat::isValid('NL123456789B01', $country))->toBeTrue();
   expect(Vat::isValid('NL987654321B02', $country))->toBeTrue();
   expect(Vat::isValid('NL234567891B03', $country))->toBeTrue();
   expect(Vat::isValid('NL876543219B04', $country))->toBeTrue();
});

it('rejects incorrect Dutch VAT numbers', function () {
   $country = 'NL';
   expect(Vat::isValid('NL12345678B01', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('NL12345678901', $country))->toBeFalse(); // Missing B
   expect(Vat::isValid('NL123456789B0', $country))->toBeFalse(); // Too short at the end
   expect(Vat::isValid('NL123456789C01', $country))->toBeFalse(); // Invalid character
});

// PL

it('validates correct Polish VAT numbers', function () {
   $country = 'PL';
   expect(Vat::isValid('PL1234567890', $country))->toBeTrue();
   expect(Vat::isValid('PL0987654321', $country))->toBeTrue();
   expect(Vat::isValid('PL2345678901', $country))->toBeTrue();
   expect(Vat::isValid('PL9876543210', $country))->toBeTrue();
});

it('rejects incorrect Polish VAT numbers', function () {
   $country = 'PL';
   expect(Vat::isValid('PL123456789', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('PL12345678901', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('PLabcdefghij', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('PL12a4567890', $country))->toBeFalse(); // Invalid character
});

// PT

it('validates correct Portuguese VAT numbers', function () {
   $country = 'PT';
   expect(Vat::isValid('PT123456789', $country))->toBeTrue();
   expect(Vat::isValid('PT987654321', $country))->toBeTrue();
   expect(Vat::isValid('PT234567890', $country))->toBeTrue();
   expect(Vat::isValid('PT876543210', $country))->toBeTrue();
});

it('rejects incorrect Portuguese VAT numbers', function () {
   $country = 'PT';
   expect(Vat::isValid('PT12345678', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('PT1234567890', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('PTabcdefgh9', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('PT12a456789', $country))->toBeFalse(); // Invalid character
});

// RO
it('validates correct Romanian VAT numbers', function () {
   $country = 'RO';
   expect(Vat::isValid('RO14399840', $country))->toBeTrue(); // real company
   expect(Vat::isValid('RO1590082', $country))->toBeTrue(); // real company, 7 digits
   expect(Vat::isValid('RO18547290', $country))->toBeTrue();
   expect(Vat::isValid('RO19', $country))->toBeTrue(); // min 2 digits
   expect(Vat::isValid('RO1234567897', $country))->toBeTrue(); // max 10 digits
});

it('rejects incorrect Romanian VAT numbers', function () {
   $country = 'RO';
   expect(Vat::isValid('RO1', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('RO12345678901', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('ROabcdefgh9', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('RO12a456789', $country))->toBeFalse(); // Invalid character
   expect(Vat::isValid('RO14399841', $country))->toBeFalse(); // Invalid check digit
   expect(Vat::isValid('RO12345678', $country))->toBeFalse(); // Invalid check digit
});

// SE
it('validates correct Swedish VAT numbers', function () {
   $country = 'SE';
   expect(Vat::isValid('SE123456789012', $country))->toBeTrue();
   expect(Vat::isValid('SE987654321098', $country))->toBeTrue();
   expect(Vat::isValid('SE234567890123', $country))->toBeTrue();
   expect(Vat::isValid('SE876543210987', $country))->toBeTrue();
});

it('rejects incorrect Swedish VAT numbers', function () {
   $country = 'SE';
   expect(Vat::isValid('SE12345678901', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('SE1234567890123', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('SEabcdefghij12', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('SE12a456789012', $country))->toBeFalse(); // Invalid character
});

// SI
it('validates correct Slovenian VAT numbers', function () {
   $country = 'SI';
   expect(Vat::isValid('SI12345678', $country))->toBeTrue();
   expect(Vat::isValid('SI87654321', $country))->toBeTrue();
   expect(Vat::isValid('SI23456789', $country))->toBeTrue();
   expect(Vat::isValid('SI98765432', $country))->toBeTrue();
});

it('rejects incorrect Slovenian VAT numbers', function () {
   $country = 'SI';
   expect(Vat::isValid('SI1234567', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('SI123456789', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('SIabcdefgh', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('SI12a45678', $country))->toBeFalse(); // Invalid character
});

// SK
it('validates correct Slovakian VAT numbers', function () {
   $country = 'SK';
   expect(Vat::isValid('SK1234567890', $country))->toBeTrue();
   expect(Vat::isValid('SK0987654321', $country))->toBeTrue();
   expect(Vat::isValid('SK2345678901', $country))->toBeTrue();
   expect(Vat::isValid('SK9876543210', $country))->toBeTrue();
});

it('rejects incorrect Slovakian VAT numbers', function () {
   $country = 'SK';
   expect(Vat::isValid('SK123456789', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('SK12345678901', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('SKabcdefghij', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('SK12a4567890', $country))->toBeFalse(); // Invalid character
});

// SM
it('validates correct San Marino VAT numbers', function () {
   $country = 'SM';
   expect(Vat::isValid('SM12345', $country))->toBeTrue();
   expect(Vat::isValid('SM54321', $country))->toBeTrue();
   expect(Vat::isValid('SM67890', $country))->toBeTrue();
   expect(Vat::isValid('SM09876', $country))->toBeTrue();
});

it('rejects incorrect San Marino VAT numbers', function () {
   $country = 'SM';
   expect(Vat::isValid('SM1234', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('SM123456', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('SMabcd', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('SM12a45', $country))->toBeFalse(); // Invalid character
});

// IT

it('validates correct Italian VAT numbers', function () {
   $country = 'IT';
   expect(Vat::isValid('IT00851670943', $country))->toBeTrue();
   expect(Vat::isValid('00851670943', $country))->toBeTrue();
   expect(Vat::isValid('IT00998230940', $country))->toBeTrue();
   expect(Vat::isValid('it00998230940', $country))->toBeTrue();
   expect(Vat::isValid('00998230940', $country))->toBeTrue();

});

it('rejects incorrect Italian VAT numbers', function () {
   $country = 'IT';
   expect(Vat::isValid('1234567890', $country))->toBeFalse(); // Too short
   expect(Vat::isValid('123456789012', $country))->toBeFalse(); // Too long
   expect(Vat::isValid('abcdefghijk', $country))->toBeFalse(); // Not numeric
   expect(Vat::isValid('12345678900', $country))->toBeFalse(); // Invalid check digit
});

// Extras

it('infers the country from the VAT prefix', function () {
   expect(Vat::isValid('IT00851670943'))->toBeTrue();
   expect(Vat::isValid('DE123456789'))->toBeTrue();
   expect(Vat::isValid('00851670943'))->toBeFalse(); // no prefix, no country
   expect(Vat::isValid(''))->toBeFalse();
});

it('accepts GR as an alias for EL', function () {
   expect(Vat::isValid('EL997969920', 'GR'))->toBeTrue();
});

it('rejects unsupported countries', function () {
   expect(Vat::isValid('US123456789', 'US'))->toBeFalse();
   expect(Vat::supports('us'))->toBeFalse();
   expect(Vat::supports('it'))->toBeTrue();
});

it('rejects Irish numbers with trailing junk', function () {
   expect(Vat::isValid('IE1234567AXYZ', 'IE'))->toBeFalse();
   expect(Vat::isValid('IE1234567WA', 'IE'))->toBeTrue();
});
