<?php

namespace Chak\EuVatValidation;

use Illuminate\Support\ServiceProvider;

class EuVatValidationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'eu-vat-validation');

        if (function_exists('lang_path')) {
            $this->publishes([__DIR__.'/../lang' => lang_path('vendor/eu-vat-validation')], 'eu-vat-validation-lang');
        }
    }
}
