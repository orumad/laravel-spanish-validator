# Laravel validator for spanish stuff: NIF, NIE, CIF, NSS, IBAN, Postal Code, Phone numbers 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/orumad/laravel-spanish-validator.svg?style=flat-square)](https://packagist.org/packages/orumad/laravel-spanish-validator)
[![Code coverage](https://scrutinizer-ci.com/g/orumad/laravel-spanish-validator/badges/coverage.png)](https://scrutinizer-ci.com/g/orumad/laravel-spanish-validator)
[![Build Status](https://travis-ci.org/orumad/laravel-spanish-validator.svg?branch=master)](https://travis-ci.org/orumad/laravel-spanish-validator)
[![StyleCI](https://github.styleci.io/repos/152587206/shield?branch=master)](https://github.styleci.io/repos/152587206)
[![Quality Score](https://img.shields.io/scrutinizer/g/orumad/laravel-spanish-validator.svg?style=flat-square)](https://scrutinizer-ci.com/g/orumad/laravel-spanish-validator)
[![Total Downloads](https://img.shields.io/packagist/dt/orumad/laravel-spanish-validator.svg?style=flat-square)](https://packagist.org/packages/orumad/laravel-spanish-validator)

This package is a set of diferent validation rules for spanish national id numbers like:

- **NIF**: _"Número de Identificación Fiscal"_ (tax number for individuals).
- **NIE**: _"Número de Idenfiticación para Extranjeros"_ (identity number for foreigners).
- **CIF**: _"Código de Identificación Fiscal"_ (tax number for companies).
- **NSS**: _"Número de la Seguridad Social"_ (national security number).

Also the package include validators for:

- **IBAN**: International Bank Account Number.
- **Postal codes**: Spanish postal codes.
- **Phone number**: Spanish phone numbers format.


The package can be installed via composer:

```bash
composer require orumad/laravel-spanish-validator
```

The package will automatically register itself.


## Available rules

- [`nif`](#nif)
- [`nie`](#nie)
- [`cif`](#cif)
- [`spanish_tax_number`](#spanish_tax_number)
- [`nss`](#nss)
- [`iban`](#iban)
- [`spanish_postal_code`](#spanish_postal_code)
- [`spanish_phone`](#spanish_phone)


### `nif`

Determine if the input is a valid _"Número de Identificación Fiscal"_ (tax number for individuals).


### `nie`

Determine if the field under validation is a valid _"Número de Idenfiticación para Extranjeros"_ (identity number for foreigners).


### `cif`

This rule will validate if the input field is a valid _"Código de Identificación Fiscal"_ (tax number for companies).


### `spanish_tax_number`

This rule validates if the input is a valid spanish tax number: NIF or NIE or CIF.


### `nss`

Determine if the field under validation is a valid "Número de la Seguridad Social"_ (national security number).


### `iban`

Test if the input field is a valid IBAN bank account number. _(This uses the package `globalcitizen/php-iban` to check the validity of IBAN)_ 


### `spanish_postal_code`

Will check if the postal code is a valid spanish postal code.


### `spanish_phone`

This tule validates if the input field content is a valid spanish phone number format.



### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email dev@danielmunoz.io instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
