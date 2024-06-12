# Simple PHP SSO integration for Laravel

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

### Words meanings
* ***SSO*** - Single Sign-On.
* ***Server*** - page which works as SSO server, handles authentications, stores all sessions data.
* ***Broker*** - your page which is used visited by clients/users.
* ***Client/User*** - your every visitor.

### How it works?
Client visits Broker and unique token is generated. When new token is generated we need to attach Client session to his session in Broker so he will be redirected to Server and back to Broker at this moment new session in Server will be created and associated with Client session in Broker's page. When Client visits other Broker same steps will be done except that when Client will be redirected to Server he already use his old session and same session id which associated with Broker#1.

# Installation
1. Configure Laravel 
- Add credentials to config/services.php.

- These providers follow the OAuth 2.0 spec and therefore require a client_id, client_secret and redirect url. We’ll obtain these in the next step! First, add the values to the config file because socialite will be looking for them when we ask it to.
```php
'google' => [
    'client_id'     => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect'      => env('GOOGLE_REDIRECT')
],
```
2. Create the basic authentication scaffold 
```
php artisan make:auth
```
3. Create your app in Google
   - Create a project: https://console.developers.google.com/projectcreate
   - Create credentials: https://console.developers.google.com/apis/credentials

4. A modal will pop up with your apps client id and client secret. Add these values to your `.env` file:
```php
GOOGLE_CLIENT_ID = 
GOOGLE_SECRET_ID = 
GOOGLE_REDIRECT = 
```
5. Update the users table migration 
- Update your create_users_table migration to include these new fields.
- You could alternatively create a new migration for adding theses columns, which would be good for an existing app:
```php
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('google_id') -> nullable();
        });
    }
    public function down(): void
    {

    }
};
```

6. SSO route
```php
//SSO
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');
```



