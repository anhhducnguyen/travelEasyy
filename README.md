
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Framework: Laravel
## Setting:
- **Step 1**: Install Composer and PHP
- **Step 2**: After you have installed PHP and Composer, you can create a new Laravel project via Composer command (create-project):
```bash
composer create-project laravel/laravel example-app
```
- **Step 3**: Once the project has been created, start Laravel's local development server using the Laravel Artisan command`serve`
```bash
cd example-app
 
php artisan serve
```
- **Step 4**: Go to the `php.ini` file and remove the `;` sign. before the command line `extension=zip`

## Databases and Migrations
- If you wish to use MySQL, update your `.env` configuration file's DB_* variables like so:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
- Create the database and run your application's database migrations:
```bash
php artisan migrate
```

# Authentication
`UserController.php`
- Authenticates users based on their email, password, and role (role must be 0).
```php
use Illuminate\Support\Facades\Auth;

    public function storeLogin(Request $req)
    {
       if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'role'=> 0]))
       {
            return redirect()->route('index')->with('success','Logged in successfully');
       } else {
            return redirect()->back()->with('error','Login failed, please log in again!');
       }
    }
```
- Logs out the currently authenticated user.
```php
    public function logout()
    {
        Auth::logout();
        return redirect()->back()->with('success','Logout in successfully');
    }
```














# SSO integration

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
# Security
## Possible risks
- SQL injection vulnerabilities: SQL Injection occurs when a web application allows users to input data into SQL queries in an unsafe manner, leading to the possibility of executing malicious SQL commands.
- Cross-Site Scripting (XSS): XSS occurs when an application allows users to enter data that may contain malicious JavaScript code, which is then displayed back to other users without checking or encryption.
- Cross-Site Request Forgery (CSRF): CSRF is when a user is unaware they are sending a malicious request to a web application they have authenticated, resulting in unwanted actions being taken.
- Insecure Direct Object References (IDOR): IDOR occurs when an application allows direct access to objects based on user input without checking permissions, resulting in the exposure of other users' information or data.
- Broken Authentication and Session Management: This issue occurs when authentication and session management mechanisms are not configured or implemented properly, leading to the risk of attacks from password guessing, session theft, or account hijacking. clause.
- Security Misconfiguration: Security Misconfiguration occurs when the system or application is not properly configured for security, leading to security vulnerabilities.
- Sensitive Data Exposure: Sensitive data exposure occurs when information such as passwords, credit card information or personal data is not properly protected.
- Using Components with Known Vulnerabilities: Using libraries, modules or software with known security vulnerabilities that have not been patched.
- Insufficient Logging and Monitoring: Failure to fully record or monitor system activity, leading to failure to promptly detect unusual behavior or attacks.
- File Upload Vulnerabilities: Vulnerabilities related to uploading files without proper inspection, which can lead to malicious code execution or information disclosure.
- Application error 500 (Not Found): Error 500 occurs when the server encounters an unknown problem and cannot process the request.
- Key Exposure or Rubbish Character: Revealing sensitive information such as API keys, encryption keys or unwanted characters appearing in data

## How to limit these risks
1. SQL Injection
- Use Eloquent ORM or Query Builder: Laravel provides Eloquent ORM and Query Builder to build safe queries
```php
// Use Eloquent ORM
$users = User::where('email', $email)->get();
```

```php
// Use Query Builder
$users = DB::table('users')->where('email', $email)->get();
```
- Use methods with bound values: Avoid writing raw SQL queries without protections.
```php
// Use binding method
DB::select('select * from users where email = ?', [$email]);
```

2. Cross-Site Scripting (XSS)
- Use Blade template engine: Laravel's Blade automatically escapes variables.
```php
// In Blade template
<h1>{{ $user->name }}</h1>
```
- Escape outputs: Use the e() function to escape outputs in sections that do not use Blade.
```php
// Escape output
echo e($user->name);
```

3. Cross-Site Request Forgery (CSRF)
 - Use of CSRF tokens: Laravel automatically protects against CSRF using tokens
 - Check CSRF token in important requests: Laravel automatically handles this through the CSRF middleware.

4. Insecure Direct Object References (IDOR)
 - Use middleware and policies: Laravel provides middleware and policies to control access to resources.
```php
// Middleware example
public function handle($request, Closure $next)
{
 if ($request->user()->id !== $request->route('id')) {
 return redirect('home');
 }
 return $next($request);
}
```
- Check ownership before accessing: Ensure that the user has access to the object.
```php
// Check ownership
if ($request->user()->id !== $post->user_id) {
 abort(403, 'Unauthorized action.');
}
```

5. Broken Authentication and Session Management
 - Use Laravel's built-in authentication system: Laravel provides powerful and easy-to-use authentication mechanisms.
```php
//Use auth middleware
Route::get('/profile', 'ProfileController@index')->middleware('auth');
```

- Use HTTPS: Ensure that the application runs over HTTPS to protect login information and sessions.
- Set reasonable session timeout: Configure session timeout to reduce the risk of session being stolen.
- In the file `config/session.php`
```php
'lifetime' => 120, // 120 minutes
'secure' => true, // Only transmit session over HTTPS
```

6. Security Misconfiguration
- Check and properly configure `.env files`: Ensure that sensitive information is not exposed.
```php
APP_DEBUG=false
```
- Ensure that APP_DEBUG=false in production environments: To avoid revealing detailed error information.
- Correctly configure file and folder permissions: Ensure that files and folders such as `storage` and `bootstrap/cache` have the appropriate permissions.

7. Sensitive Data Exposure
- Use Laravel's encryption mechanism: Laravel provides methods to encrypt data.
```php
use Illuminate\Support\Facades\Crypt;
$encrypted = Crypt::encryptString('hello world');
$decrypted = Crypt::decryptString($encrypted);
```
- Do not store sensitive information in plain text: Use hash functions to store passwords.
```php
use Illuminate\Support\Facades\Hash;
$hashed = Hash::make('password');
```
- Use HTTPS: To protect data during transmission.

8. Using Components with Known Vulnerabilities
 - Regularly update libraries and dependencies: Use composer update to update libraries.
```bash
composer update
```
- Use vulnerability testing tools: Such as `Snyk` or `OWASP Dependency-Check` to check libraries for security vulnerabilities.



