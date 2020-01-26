## Laravel Wefact
[![Latest Stable Version](https://poser.pugx.org/Invato/laravel-wefact/v/stable?format=flat-square)](https://packagist.org/packages/Invato/laravel-wefact)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/Invato/laravel-wefact/master.svg?style=flat-square)](https://travis-ci.org/Invato/laravel-wefact)
[![Total Downloads](https://img.shields.io/packagist/dt/Invato/laravel-wefact.svg?style=flat-square)](https://packagist.org/packages/Invato/laravel-wefact)

Wefact is an easy-to-use billing and automation solution for hosting companies
### Table of contents
- [Installation](#installation)
- [Usage](#usage)
- [Tests](#tests)
### Installation
Install this package with composer:
```
composer require Invato/laravel-wefact
```
Copy the config files for the Wefact-plugin
```
php artisan vendor:publish --provider="Invato\Wefact\ServiceProvider" --tag="config"
```
Add the Wefact credentials to your `.env` file
```
HOSTFACT_DEFAULT_URL=
HOSTFACT_DEFAULT_KEY=
```
### Usage
#### Authentication [debtors]
It's possible to use a custom `wefact` authentication driver to login debtors in your application, by default the UserProfile will be cached for 60 minutes
```php
// config/auth.php
'providers' => [
    'wefact' => [
        'driver' => 'wefact'
    ],
]

// Auth::attempt
if(Auth::attempt(['username' => $username, 'password' => $password]))
{
    dd(Auth::user(), Auth::id());
}
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
    $debtors = Wefact::panel('ppe')->debtors()->all([
        'Sort' => 'DebtorCode',
        'limit' => 20
    ]);

    //
}
```
#### Multiple Panels [dependency injection]
```php
// Route
Route::get('/wefact/{hostFact}/debtors', ['as' => 'wefact/debtors', 'uses' => 'DebtorsController@getIndex']);

Route::bind('hostFact', function ($value, $route) {
    app('Wefact')->panel($value);

    return app('Wefact');
});

// DebtorsController
public function getIndex(Wefact $hostFact)
{
    $debtors = $hostFact->debtors()->all([
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
#### Domains
```php
Wefact::domains()->add(array $params)
Wefact::domains()->autoRenew(array $params)
Wefact::domains()->changeNameServer(array $params)
Wefact::domains()->check(array $params)
Wefact::domains()->delete(array $params)
Wefact::domains()->edit(array $params)
Wefact::domains()->editDnsZone(array $params)
Wefact::domains()->editWhois(array $params)
Wefact::domains()->getDnsZone(array $params)
Wefact::domains()->getToken(array $params)
Wefact::domains()->list(array $params)
Wefact::domains()->listDnsTemplates(array $params)
Wefact::domains()->lock(array $params)
Wefact::domains()->register(array $params)
Wefact::domains()->show(array $params)
Wefact::domains()->syncWhois(array $params)
Wefact::domains()->terminate(array $params)
Wefact::domains()->transfer(array $params)
Wefact::domains()->unlock(array $params)
```
#### Groups
```php
Wefact::groups()->add(array $params)
Wefact::groups()->delete(array $params)
Wefact::groups()->edit(array $params)
Wefact::groups()->list(array $params)
Wefact::groups()->show(array $params)
```
#### Handles
```php
Wefact::handles()->add(array $params)
Wefact::handles()->delete(array $params)
Wefact::handles()->edit(array $params)
Wefact::handles()->list(array $params)
Wefact::handles()->listDomain(array $params)
Wefact::handles()->show(array $params)
```
#### Hosting
```php
Wefact::hosting()->add(array $params)
Wefact::hosting()->create(array $params)
Wefact::hosting()->delete(array $params)
Wefact::hosting()->edit(array $params)
Wefact::hosting()->getDomainList(array $params)
Wefact::hosting()->list(array $params)
Wefact::hosting()->removeFromServer(array $params)
Wefact::hosting()->sendAccountInfoByEmail(array $params)
Wefact::hosting()->show(array $params)
Wefact::hosting()->suspend(array $params)
Wefact::hosting()->terminate(array $params)
Wefact::hosting()->unsuspend(array $params)
Wefact::hosting()->upDownGrade(array $params)
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
#### Orders
```php
Wefact::orders()->add(array $params)
Wefact::orders()->delete(array $params)
Wefact::orders()->edit(array $params)
Wefact::orders()->list(array $params)
Wefact::orders()->process(array $params)
Wefact::orders()->show(array $params)
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
#### Services
```php
Wefact::services()->add(array $params)
Wefact::services()->edit(array $params)
Wefact::services()->list(array $params)
Wefact::services()->show(array $params)
Wefact::services()->terminate(array $params)
```
#### Ssl
```php
Wefact::ssl()->add(array $params)
Wefact::ssl()->download(array $params)
Wefact::ssl()->edit(array $params)
Wefact::ssl()->getStatus(array $params)
Wefact::ssl()->installed(array $params)
Wefact::ssl()->list(array $params)
Wefact::ssl()->reissue(array $params)
Wefact::ssl()->renew(array $params)
Wefact::ssl()->request(array $params)
Wefact::ssl()->resendApproverMail(array $params)
Wefact::ssl()->revoke(array $params)
Wefact::ssl()->show(array $params)
Wefact::ssl()->terminate(array $params)
Wefact::ssl()->uninstalled(array $params)
```
#### Tickets
```php
Wefact::tickets()->add(array $params)
Wefact::tickets()->addMessage(array $params)
Wefact::tickets()->changeOwner(array $params)
Wefact::tickets()->changeStatus(array $params)
Wefact::tickets()->delete(array $params)
Wefact::tickets()->edit(array $params)
Wefact::tickets()->list(array $params)
Wefact::tickets()->show(array $params)
```
#### Vps
```php
Wefact::vps()->add(array $params)
Wefact::vps()->create(array $params)
Wefact::vps()->downloadAccountData(array $params)
Wefact::vps()->edit(array $params)
Wefact::vps()->list(array $params)
Wefact::vps()->pause(array $params)
Wefact::vps()->restart(array $params)
Wefact::vps()->sendAccountDataByEmail(array $params)
Wefact::vps()->show(array $params)
Wefact::vps()->start(array $params)
Wefact::vps()->suspend(array $params)
Wefact::vps()->terminate(array $params)
Wefact::vps()->unsuspend(array $params)
```
### Tests
```sh
composer test
```
- - - 
