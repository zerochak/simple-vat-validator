<?php

use Chak\EuVatValidation\EuVatValidationServiceProvider;
use Chak\EuVatValidation\Rules\VatNumber;
use Illuminate\Support\Facades\Validator;

beforeEach(fn () => $this->app->register(EuVatValidationServiceProvider::class));

it('passes a valid VAT number', function () {
   expect(Validator::make(['vat' => 'IT00851670943'], ['vat' => new VatNumber('IT')])->passes())->toBeTrue();
});

it('fails with a translated message', function () {
   $validator = Validator::make(['vat' => 'IT12345678900'], ['vat' => new VatNumber('IT')]);

   expect($validator->errors()->first('vat'))->toBe('The vat is not a valid VAT number.');

   app()->setLocale('it');
   expect(Validator::make(['vat' => 'x'], ['vat' => new VatNumber('IT')])->errors()->first('vat'))
      ->toBe('Formato Partita IVA non valido');
});

it('fails non-string values', function () {
   expect(Validator::make(['vat' => ['IT00851670943']], ['vat' => new VatNumber()])->fails())->toBeTrue();
});
