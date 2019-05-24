# Laraver validator for various spanish stuff: NIF, NIE, CIF, NSS, IBAN, Postal Code 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-validation-rules.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-validation-rules)
[![Code coverage](https://scrutinizer-ci.com/g/spatie/laravel-validation-rules/badges/coverage.png)](https://scrutinizer-ci.com/g/spatie/laravel-validation-rules)
[![Build Status](https://img.shields.io/travis/spatie/laravel-validation-rules/master.svg?style=flat-square)](https://travis-ci.org/spatie/laravel-validation-rules)
[![StyleCI](https://github.styleci.io/repos/152587206/shield?branch=master)](https://github.styleci.io/repos/152587206)
[![Quality Score](https://img.shields.io/scrutinizer/g/spatie/laravel-validation-rules.svg?style=flat-square)](https://scrutinizer-ci.com/g/spatie/laravel-validation-rules)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/laravel-validation-rules.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-validation-rules)

This package is a set of diferent validation rules for spanish national id numbers like:

- **NIF**: _"Número de Identificación Fiscal"_ (tax number for individuals).
- **NIE**: _"Número de Idenfiticación para Extranjeros"_ (identity number for foreigners).
- **CIF**: _"Código de Identificación Fiscal"_ (tax number for companies).
- **NSS**: _"Número de la Seguridad Social"_ (national security number).

Also the package include validators for:

- **IBAN**: International Bank Account Number.
- **Postal codes**: Spanish postal codes.


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


### `NIF`

Determine if the user is authorized to perform an ability on an instance of the given model. The id of the model is the field under validation 

Consider the following policy:

```php
class ModelPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Model $model): bool
    {
        return $model->user->id === $user->id;
    }
}
```

This validation rule will pass if the id of the logged in user matches the `user_id` on `TestModel` who's it is in the `model_id` key of the request.

```php
// in a `FormRequest`

public function rules()
{
    return [
        'model_id' => [new Authorized('edit', TestModel::class)],
    ];
}
```

### `CountryCode`

Determine if the field under validation is a valid ISO3166 country code.

```php
// in a `FormRequest`

public function rules()
{
    return [
        'country' => ['required', new Country()],
    ];
}
```

If you want to validate a nullable country code field, you can call the `nullable()` method on the `CountryCode` rule. This way `null` and `0` are also passing values:

```php
// in a `FormRequest`

public function rules()
{
    return [
        'country' => [(new Country())->nullable()],
    ];
}
```

### `Enum`

This rule will validate if the value under validation is part of the given enum class. We assume that the enum class has a static `toArray` method that returns all valid values. If you're looking for a good enum class, take a look at [myclabs/php-enum](https://github.com/myclabs/php-enum);

Consider the following enum class:

```php
class UserRole extends MyCLabs\Enum\Enum
{
    const ADMIN = 'admin';
    const REVIEWER = 'reviewer';
}
```

The `Enum` rule can be used like this:

```php
// in a `FormRequest`

public function rules()
{
    return [
        'role' => [new Enum(UserRole::class)],
    ];
}
```

The request will only be valid if `role` contains `ADMIN` or `REVIEWER`.

### `ModelsExist`

Determine if all of the values in the input array exist as attributes for the given model class. 

By default the rule assumes that you want to validate using `id` attribute. In the example below the validation will pass if all `model_ids` exist for the `Model`.


```php
// in a `FormRequest`

public function rules()
{
    return [
        'model_ids' => ['array', new ModelsExist(Model::class)],
    ];
}
```


You can also pass an attribute name as the second argument. In the example below the validation will pass if there are users for each email given in the `user_emails` of the request.

```php
// in a `FormRequest`

public function rules()
{
    return [
        'user_emails' => ['array', new ModelsExist(User::class, 'emails')],
    ];
}
```

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
