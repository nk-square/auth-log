# auth-log
Authentication activity log library for Laravel

## Installation
Add the following lines to your composer.json file
```
....
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/nk-square/auth-log.git"
    }
]
.....
```
Run composer
```
composer require nksquare/auth-log
```
Publish config file
```
php artisan vendor:publish --provider="Nksquare\AuthLog\Providers\AuthLogServiceProvider" --tag="authlog-config"
```
Publish migration file
```
php artisan authlog:table
```
Run migration
```
php artisan migrate
```
Every login and logout activity will be stored in the ```auth_logs``` table.

Access the auth log history using the ```AuthLog``` model
```
use Nksquare\AuthLog\AuthLog;

AuthLog::all();
```
If your user table uses a different field other than the email field for authentication you can specify them in the ```config/authlog.php``` file. For instance if username field is used instead of email for logging in.
```
/*
    |--------------------------------------------------------------------------
    | Login using credentials
    |--------------------------------------------------------------------------
    |
    | Specify which field is being used for logging in for each guard.
    | If no value is specified, it will default to email.
    |
    */
    'credentials' => [
        'web' => 'username', //specify your authenticating field here
    ]
```
You can access the user whose activity was logged via the ```authenticable``` attribute. Please note that the attribute is only accessible for successful login/logout activity.
```
$auth = AuthLog::where('status','success')->where('activity','login')->first();
$auth->authenticable;
```
