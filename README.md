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
```
#### Multiple Panels [config]
If you want to work with more Wefact panels, you can define more panels in the `config/wefact.php` file
```php
// config/wefact.php
'panels' => [

    'default' => [
        'url' => env('HOSTFACT_DEFAULT_URL'),
        'key' => env('HOSTFACT_DEFAULT_KEY'),
    ],

    'ppe' => [
        'url' => env('HOSTFACT_PPE_URL'),
        'key' => env('HOSTFACT_PPE_KEY'),
    ],

],
```
#### Multiple Panels [normal usage]
To use another panel than your default one, you can specify it with the panel-method
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
Wefact::attachments()->add(array $params)
Wefact::attachments()->delete(array $params)
Wefact::attachments()->download(array $params)
```
#### CreditInvoices
```php
Wefact::creditinvoices()->add(array $params)
Wefact::creditinvoices()->delete(array $params)
Wefact::creditinvoices()->edit(array $params)
Wefact::creditinvoices()->list(array $params)
Wefact::creditinvoices()->markAsPaid(array $params)
Wefact::creditinvoices()->partPayment(array $params)
Wefact::creditinvoices()->show(array $params)
```
#### Creditors
```php
Wefact::creditors()->add(array $params)
Wefact::creditors()->delete(array $params)
Wefact::creditors()->edit(array $params)
Wefact::creditors()->list(array $params)
Wefact::creditors()->show(array $params)
```
#### Debtors
```php
Wefact::debtors()->add(array $params)
Wefact::debtors()->checkLogin(array $params)
Wefact::debtors()->edit(array $params)
Wefact::debtors()->generatePdf(array $params)
Wefact::debtors()->list(array $params)
Wefact::debtors()->sendEmail(array $params)
Wefact::debtors()->show(array $params)
Wefact::debtors()->updateLoginCredentials(array $params)
```
#### Groups
```php
Wefact::groups()->add(array $params)
Wefact::groups()->delete(array $params)
Wefact::groups()->edit(array $params)
Wefact::groups()->list(array $params)
Wefact::groups()->show(array $params)
```
#### Invoices
```php
Wefact::invoices()->add(array $params)
Wefact::invoices()->block(array $params)
Wefact::invoices()->cancelSchedule(array $params)
Wefact::invoices()->credit(array $params)
Wefact::invoices()->delete(array $params)
Wefact::invoices()->download(array $params)
Wefact::invoices()->edit(array $params)
Wefact::invoices()->list(array $params)
Wefact::invoices()->markAsPaid(array $params)
Wefact::invoices()->markAsUnpaid(array $params)
Wefact::invoices()->partPayment(array $params)
Wefact::invoices()->paymentProcessPause(array $params)
Wefact::invoices()->paymentProcessReactivate(array $params)
Wefact::invoices()->schedule(array $params)
Wefact::invoices()->sendByEmail(array $params)
Wefact::invoices()->sendReminderByEmail(array $params)
Wefact::invoices()->sendSummationByEmail(array $params)
Wefact::invoices()->show(array $params)
Wefact::invoices()->unblock(array $params)
```
#### PriceQuotes
```php
Wefact::pricequotes()->accept(array $params)
Wefact::pricequotes()->add(array $params)
Wefact::pricequotes()->decline(array $params)
Wefact::pricequotes()->delete(array $params)
Wefact::pricequotes()->download(array $params)
Wefact::pricequotes()->edit(array $params)
Wefact::pricequotes()->list(array $params)
Wefact::pricequotes()->sendByEmail(array $params)
Wefact::pricequotes()->show(array $params)
```
#### Products
```php
Wefact::products()->add(array $params)
Wefact::products()->delete(array $params)
Wefact::products()->edit(array $params)
Wefact::products()->list(array $params)
Wefact::products()->show(array $params)
```
### Tests
```sh
composer test
```
- - - 
