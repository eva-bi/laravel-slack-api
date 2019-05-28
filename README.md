# :rocket: Laravel Slack API :rocket:

Lightweight Laravel 5 wrapper for the Slack Web API, including a facade and config options.

Please note that this implementation is very lightweight meaning you'll need to do some more work than usual, but in return you get a lot more flexibility. This package doesn't provide methods such as `Chat::postMessage(string $message)`, it just provides one method: `SlackApi::execute(string $method, array $parameters)`.

**:thumbsup: Reasons to use this package for the Slack API:**
* Built-in compliance with the Slack API [rate limits](https://api.slack.com/docs/rate-limits)
* Lightweight, flexible
* Modern Laravel integration
* Test coverage 
* Lots of emoji in the documentation (even cats! :cat2:) 

## :earth_americas: Installation
**1)** Require the package with Composer
```bash
composer require eva-bi/laravel-slack-web-api
```
**2)** Open `config/app.php` and add `\Tuanla\Laravel\SlackWebApi\Providers\SlackApiServiceProvider::class` to the `providers[]` array

*For example:*
```php
  // ...
  
  'providers' => [
    // ...
    // A whole bunch of providers
    // ...
    
    \Tuanla\Laravel\SlackWebApi\Providers\SlackApiServiceProvider::class
  ],
  
  // ...
```
**3)** If you want to use the Facade, add `\Tuanla\Laravel\SlackWebApi\Facades\SlackApi::class` to the `aliases[]` array in `config/app.php`

*For example:*
```php
  // ...
  
  'aliases' => [
    // ...
    // A whole bunch of aliases
    // ...
    
    'SlackApi' => \Tuanla\Laravel\SlackWebApi\Facades\SlackApi::class
  ],
  
  // ...
```
**4)** Publish the config file
```bash
php artisan vendor:publish
```
**5)** Open `config/slack.php` and insert your [token](https://api.slack.com/docs/oauth-test-tokens) to make API requests
```php
'token' => 'your-token-here'
```
## :fork_and_knife: Usage

To make Slack API requests, you need to call the `execute` method of the `SlackApi` class and pass the Slack Web API method name and any parameters. For example:
```php
$api->execute('method.name', [
  'parameter_one' => 'some-data',
  'parameter_two' => 'some-other-data'
  // ...
];
```
This will return a plain PHP array containing the response data from Slack.

####**1)** Basic example of usage in a Controller:
```php
use \Tuanla\Laravel\SlackWebApi\SlackApi;
use \Tuanla\Laravel\SlackWebApi\Exceptions\SlackApiException;

// ...

public function postMessage(SlackApi $api)
{
  try {
    $response = $api->execute('users.info', [
      'user' => 'U1234567890'
    ]);
    $name = $response['user']['name'];
    // Do something amazing with data from Slack...
  } catch (SlackApiException $e) {
    return 'Error:' . $e->getMessage();
  }
}

// ...
```
####**2)** Basic usage with the Facade:
```php
use \Tuanla\Laravel\SlackWebApi\Exceptions\SlackApiException;

// ...

public function postMessage()
{
  try {
    $response = SlackApi::execute('users.info', [
      'user' => 'U1234567890'
    ]);
    $name = $response['user']['name'];
    // Do something amazing with data from Slack...
  } catch (SlackApiException $e) {
    return 'Error:' . $e->getMessage();
  }
}

// ...

