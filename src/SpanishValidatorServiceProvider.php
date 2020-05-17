<?php

namespace Orumad\SpanishValidator;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class SpanishValidatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/'),
        ]);

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'spanishValidator');

        // Add validators and messages
        $this->addValidators();
    }

    private function addValidators()
    {
        // Tax Number: NIF or NIE or CIF
        Validator::extend('spanish_tax_number', 'Orumad\\SpanishValidator\\InternalValidator@validateTaxNumber');
        Validator::replacer('spanish_tax_number', function ($message, $attribute, $rule, $parameters) {
            return __('spanishValidator::spanishValidator.tax_number');
        });

        // Personal ID: NIF or NIE
        Validator::extend('spanish_personal_id', 'Orumad\\SpanishValidator\\InternalValidator@validatePersonalId');
        Validator::replacer('spanish_personal_id', function ($message, $attribute, $rule, $parameters) {
            return __('spanishValidator::spanishValidator.personal_id');
        });

        // NIF
        Validator::extend('nif', 'Orumad\\SpanishValidator\\InternalValidator@validateNif');
        Validator::replacer('nif', function ($message, $attribute, $rule, $parameters) {
            return __('spanishValidator::spanishValidator.nif');
        });

        // NIE
        Validator::extend('nie', 'Orumad\\SpanishValidator\\InternalValidator@validateNie');
        Validator::replacer('nie', function ($message, $attribute, $rule, $parameters) {
            return __('spanishValidator::spanishValidator.nie');
        });

        // CIF
        Validator::extend('cif', 'Orumad\\SpanishValidator\\InternalValidator@validateCif');
        Validator::replacer('cif', function ($message, $attribute, $rule, $parameters) {
            return __('spanishValidator::spanishValidator.cif');
        });

        // NSS
        Validator::extend('nss', 'Orumad\\SpanishValidator\\InternalValidator@validateNss');
        Validator::replacer('nss', function ($message, $attribute, $rule, $parameters) {
            return __('spanishValidator::spanishValidator.nss');
        });

        // IBAN
        Validator::extend('iban', 'Orumad\\SpanishValidator\\InternalValidator@validateIban');
        Validator::replacer('iban', function ($message, $attribute, $rule, $parameters) {
            return __('spanishValidator::spanishValidator.iban');
        });

        // Postal Code
        Validator::extend('spanish_postal_code', 'Orumad\\SpanishValidator\\InternalValidator@validatePostalCode');
        Validator::replacer('spanish_postal_code', function ($message, $attribute, $rule, $parameters) {
            return __('spanishValidator::spanishValidator.postal_code');
        });

        // Phone
        Validator::extend('spanish_phone', 'Orumad\\SpanishValidator\\InternalValidator@validatePhone');
        Validator::replacer('spanish_phone', function ($message, $attribute, $rule, $parameters) {
            return __('spanishValidator::spanishValidator.phone');
        });
    }
}
