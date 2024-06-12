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
1. SQL injection vulnerabilities.
 - SQL Injection occurs when a web application allows users to input data into SQL queries in an unsafe manner, leading to the possibility of executing malicious SQL commands.

2. Cross-Site Scripting (XSS)
 - XSS occurs when an application allows users to enter data that may contain malicious JavaScript code, which is then displayed back to other users without checking or encryption.

3. Cross-Site Request Forgery (CSRF)
 - CSRF is when a user is unaware they are sending a malicious request to a web application they have authenticated, resulting in unwanted actions being taken.

4. Insecure Direct Object References (IDOR)
 - IDOR occurs when an application allows direct access to objects based on user input without checking permissions, resulting in the exposure of other users' information or data.

5. Broken Authentication and Session Management
 - This issue occurs when authentication and session management mechanisms are not configured or implemented properly, leading to the risk of attacks from password guessing, session theft, or account hijacking. clause.

6. Security Misconfiguration
 - Security Misconfiguration occurs when the system or application is not properly configured for security, leading to security vulnerabilities.

7. Sensitive Data Exposure
 - Sensitive data exposure occurs when information such as passwords, credit card information or personal data is not properly protected.

8. Using Components with Known Vulnerabilities
 - Using libraries, modules or software with known security vulnerabilities that have not been patched.

9. Insufficient Logging and Monitoring
 - Failure to fully record or monitor system activity, leading to failure to promptly detect unusual behavior or attacks.

10. File Upload Vulnerabilities
 - Vulnerabilities related to uploading files without proper inspection, which can lead to malicious code execution or information disclosure.

11. Application error 500 (Not Found).
 - Error 500 occurs when the server encounters an unknown problem and cannot process the request.

12. Key Exposure or Rubbish Character.
 - Revealing sensitive information such as API keys, encryption keys or unwanted characters appearing in data

## How to limit these risks
1. SQL Injection
- Sử dụng Eloquent ORM hoặc Query Builder: Laravel cung cấp ORM Eloquent và Query Builder để xây dựng các truy vấn an toàn
```php
// Sử dụng Eloquent ORM  
$users = User::where('email', $email)->get();
```

```php
// Sử dụng Query Builder
$users = DB::table('users')->where('email', $email)->get();
```
- Sử dụng các phương thức với các giá trị được ràng buộc: Tránh viết các truy vấn SQL thô mà không có biện pháp bảo vệ.
```php
// Sử dụng phương thức binding
DB::select('select * from users where email = ?', [$email]); 
```

2. Cross-Site Scripting (XSS)
- Sử dụng Blade template engine: Laravel's Blade tự động escape các biến.
```php
// Trong Blade template
<h1>{{ $user->name }}</h1>
```
- Escape các output: Sử dụng hàm e() để escape các output trong các phần không sử dụng Blade.
```php
// Escape output
echo e($user->name);
```

3. Cross-Site Request Forgery (CSRF)
    - Sử dụng CSRF token: Laravel tự động bảo vệ chống lại CSRF bằng cách sử dụng token         
    - Kiểm tra CSRF token trong các request quan trọng: Laravel tự động xử lý điều này thông qua middleware CSRF.

4. Insecure Direct Object References (IDOR)
    - Sử dụng middleware và policies: Laravel cung cấp middleware và policies để kiểm soát quyền truy cập vào các tài nguyên.
```php
// Ví dụ middleware  
public function handle($request, Closure $next)     
{
    if ($request->user()->id !== $request->route('id')) {
        return redirect('home');
    }
    return $next($request);      
}
```
- Kiểm tra quyền sở hữu trước khi truy cập: Đảm bảo rằng người dùng có quyền truy cập vào đối tượng.
```php
// Kiểm tra quyền sở hữu
if ($request->user()->id !== $post->user_id) {
    abort(403, 'Unauthorized action.');
}
```

5. Broken Authentication and Session Management
    - Sử dụng hệ thống xác thực tích hợp của Laravel: Laravel cung cấp các cơ chế xác thực mạnh mẽ và dễ sử dụng.
```php
//Sử dụng auth middleware   
Route::get('/profile', 'ProfileController@index')->middleware('auth');
```
        
- Sử dụng HTTPS: Đảm bảo rằng ứng dụng chạy trên HTTPS để bảo vệ thông tin đăng nhập và session.
- Đặt timeout hợp lý cho session: Cấu hình session timeout để giảm nguy cơ session bị đánh cắp.
- Trong file `config/session.php`
```php
'lifetime' => 120, // 120 phút
'secure' => true, // Chỉ truyền session qua HTTPS
```

6. Security Misconfiguration
    - Kiểm tra và cấu hình đúng các file .env: Đảm bảo rằng các thông tin nhạy cảm không bị lộ.
        > APP_DEBUG=false
    - Đảm bảo rằng APP_DEBUG=false trong môi trường production: Để tránh lộ thông tin lỗi chi tiết.
    - Cấu hình đúng các quyền truy cập file và thư mục: Đảm bảo rằng các file và thư mục như storage và bootstrap/cache có quyền truy cập phù hợp.

7. Sensitive Data Exposure
    - Sử dụng cơ chế mã hóa của Laravel: Laravel cung cấp các phương thức để mã hóa dữ liệu.
        > use Illuminate\Support\Facades\Crypt;

        > $encrypted = Crypt::encryptString('hello world');

        > $decrypted = Crypt::decryptString($encrypted);

    - Không lưu trữ thông tin nhạy cảm dưới dạng plain text: Sử dụng các hàm hash để lưu trữ mật khẩu.
        > use Illuminate\Support\Facades\Hash;
        
        > $hashed = Hash::make('password');

    - Sử dụng HTTPS: Để bảo vệ dữ liệu trong quá trình truyền tải.
  
8. Using Components with Known Vulnerabilities
    - Thường xuyên cập nhật các thư viện và dependencies: Sử dụng composer update để cập nhật các thư viện.
        > composer update
    - Sử dụng các công cụ kiểm tra lỗ hổng: Như Snyk hoặc OWASP Dependency-Check để kiểm tra các thư viện có lỗ hổng bảo mật.

9. Insufficient Logging and Monitoring
    - Sử dụng hệ thống logging của Laravel: Laravel cung cấp các phương thức để ghi lại các hoạt động quan trọng và lỗi.
        > use Illuminate\Support\Facades\Log;

        > Log::info('User login', ['id' => $user->id]);
    - Thiết lập giám sát ứng dụng: Sử dụng các công cụ như Sentry hoặc New Relic để giám sát và nhận thông báo về các sự cố.

10. File Upload Vulnerabilities
    - Kiểm tra và xác thực loại file trước khi tải lên: Chỉ cho phép các loại file hợp lệ.
        > $request->validate([
        
        > 'file' => 'required|mimes:jpg,png,pdf|max:2048',
        
        > ]);
    - Sử dụng thư viện của Laravel để lưu trữ file an toàn: Sử dụng Storage facade để lưu trữ file.
        > $path = $request->file('avatar')->store('avatars');
    - Đặt giới hạn kích thước file và sử dụng tên file ngẫu nhiên: Để tránh các vấn đề bảo mật liên quan đến đường dẫn file.
        > $path = $request->file('avatar')->storeAs(
    
        > 'avatars', $request->user()->id . '_' . time() . '.' . $request->file('avatar')->extension()

        > ); 

11. Lỗi ứng dụng 500 (Internal Server Error)
    - Nguy cơ: Lỗi 500 xảy ra khi máy chủ gặp phải sự cố không xác định và không thể xử lý yêu cầu.
    - Kiểm tra mã nguồn: Đảm bảo mã nguồn không có lỗi cú pháp hoặc logic.
    - Logging: Ghi lại các lỗi xảy ra để phân tích và sửa chữa.
        > use Illuminate\Support\Facades\Log;

        > Log::error('Something went wrong', ['exception' => $e]);
    - Hiển thị thông báo lỗi thân thiện cho người dùng: Để tránh lộ thông tin chi tiết về lỗi cho kẻ tấn công.
        > return response()->view('errors.500', [], 500);

12. Khóa bị lộ (Key Exposure) hay là Rác thông tin (Rubbish Character)
    - Nguy cơ: Lộ thông tin nhạy cảm như API keys, khóa mã hóa hoặc xuất hiện các ký tự không mong muốn trong dữ liệu.
    - Không lưu trữ khóa trực tiếp trong mã nguồn: Sử dụng file .env để lưu trữ các thông tin nhạy cảm.
        > API_KEY=your_api_key_here
    - Kiểm tra và làm sạch dữ liệu nhập vào: Đảm bảo rằng dữ liệu đầu vào không chứa các ký tự không mong muốn.
        > $cleaned_input = filter_var($input, FILTER_SANITIZE_STRING);
    - Sử dụng các công cụ kiểm tra mã nguồn: Để phát hiện và loại bỏ các khóa hoặc thông tin nhạy cảm trước khi đưa mã lên repository.



