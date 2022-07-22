## Laravel Wefact

Wefact is an easy-to-use billing system. This repository on this repository nickurt/laravel-hostfact
### Table of contents
- [Installation](#installation)
- [Usage](#usage)
- [Tests](#tests)
### Installation
Install this package with composer:
```
composer require bfg/laravel-wefact
```
Copy the config files for the Wefact-plugin
```
php artisan vendor:publish --provider="Bfg\Wefact\ServiceProvider" --tag="config"
```
Add the Wefact credentials to your `.env` file
```
HOSTFACT_DEFAULT_URL=
HOSTFACT_DEFAULT_KEY=
```
### Usage
```php
// DebtorsController
public function getIndex()
{
    $debtors = Wefact::client('key')->debtors()->all([
        'Sort' => 'DebtorCode',
        'limit' => 20
    ]);

    //
}
```
#### Attachments
```php
Wefact::client('key')->attachments()->add(array $params)
Wefact::client('key')->attachments()->delete(array $params)
Wefact::client('key')->attachments()->download(array $params)
```
#### CreditInvoices
```php
Wefact::client('key')->creditinvoices()->add(array $params)
Wefact::client('key')->creditinvoices()->delete(array $params)
Wefact::client('key')->creditinvoices()->edit(array $params)
Wefact::client('key')->creditinvoices()->list(array $params)
Wefact::client('key')->creditinvoices()->markAsPaid(array $params)
Wefact::client('key')->creditinvoices()->partPayment(array $params)
Wefact::client('key')->creditinvoices()->show(array $params)
```
#### Creditors
```php
Wefact::client('key')->creditors()->add(array $params)
Wefact::client('key')->creditors()->delete(array $params)
Wefact::client('key')->creditors()->edit(array $params)
Wefact::client('key')->creditors()->list(array $params)
Wefact::client('key')->creditors()->show(array $params)
```
#### Debtors
```php
Wefact::client('key')->debtors()->add(array $params)
Wefact::client('key')->debtors()->checkLogin(array $params)
Wefact::client('key')->debtors()->edit(array $params)
Wefact::client('key')->debtors()->generatePdf(array $params)
Wefact::client('key')->debtors()->list(array $params)
Wefact::client('key')->debtors()->sendEmail(array $params)
Wefact::client('key')->debtors()->show(array $params)
Wefact::client('key')->debtors()->updateLoginCredentials(array $params)
```
#### Groups
```php
Wefact::client('key')->groups()->add(array $params)
Wefact::client('key')->groups()->delete(array $params)
Wefact::client('key')->groups()->edit(array $params)
Wefact::client('key')->groups()->list(array $params)
Wefact::client('key')->groups()->show(array $params)
```
#### Invoices
```php
Wefact::client('key')->invoices()->add(array $params)
Wefact::client('key')->invoices()->block(array $params)
Wefact::client('key')->invoices()->cancelSchedule(array $params)
Wefact::client('key')->invoices()->credit(array $params)
Wefact::client('key')->invoices()->delete(array $params)
Wefact::client('key')->invoices()->download(array $params)
Wefact::client('key')->invoices()->edit(array $params)
Wefact::client('key')->invoices()->list(array $params)
Wefact::client('key')->invoices()->markAsPaid(array $params)
Wefact::client('key')->invoices()->markAsUnpaid(array $params)
Wefact::client('key')->invoices()->partPayment(array $params)
Wefact::client('key')->invoices()->paymentProcessPause(array $params)
Wefact::client('key')->invoices()->paymentProcessReactivate(array $params)
Wefact::client('key')->invoices()->schedule(array $params)
Wefact::client('key')->invoices()->sendByEmail(array $params)
Wefact::client('key')->invoices()->sendReminderByEmail(array $params)
Wefact::client('key')->invoices()->sendSummationByEmail(array $params)
Wefact::client('key')->invoices()->show(array $params)
Wefact::client('key')->invoices()->unblock(array $params)
```
#### PriceQuotes
```php
Wefact::client('key')->pricequotes()->accept(array $params)
Wefact::client('key')->pricequotes()->add(array $params)
Wefact::client('key')->pricequotes()->decline(array $params)
Wefact::client('key')->pricequotes()->delete(array $params)
Wefact::client('key')->pricequotes()->download(array $params)
Wefact::client('key')->pricequotes()->edit(array $params)
Wefact::client('key')->pricequotes()->list(array $params)
Wefact::client('key')->pricequotes()->sendByEmail(array $params)
Wefact::client('key')->pricequotes()->show(array $params)
```
#### Products
```php
Wefact::client('key')->products()->add(array $params)
Wefact::client('key')->products()->delete(array $params)
Wefact::client('key')->products()->edit(array $params)
Wefact::client('key')->products()->list(array $params)
Wefact::client('key')->products()->show(array $params)
```
### Tests
```sh
composer test
```
- - - 
