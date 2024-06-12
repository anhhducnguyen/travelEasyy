# SSO integration

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

SSO is a relatively simple and straightforward solution for single sign on (SSO).

With SSO, logging into a single website will authenticate you for all affiliate sites. The sites don't need to share a toplevel domain.

### How it works?
When using SSO, we can distinguish 3 parties:
* ***Client*** - This is the browser of the visitor
* ***Broker*** - The website which is visited
* ***Server*** - The place that holds the user info and credentials

The broker has an id and a secret. These are known to both the broker and server.

When the client visits the broker, it creates a random token, which is stored in a cookie. The broker will then send the client to the server, passing along the broker's id and token. The server creates a hash using the broker id, broker secret and the token. This hash is used to create a link to the user's session. When the link is created the server redirects the client back to the broker.

The broker can create the same link hash using the token (from the cookie), the broker id and the broker secret. When doing requests, it passes that hash as a session id.

The server will notice that the session id is a link and use the linked session. As such, the broker and client are using the same session. When another broker joins in, it will also use the same session.

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



