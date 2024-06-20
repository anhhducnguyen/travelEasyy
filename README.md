# Overview

## Topic: **Build a website to introduce tours and book tours online**
### Allow users
- Search and view tour information
- Book tours online with relevant requirements (such as number of guests, travel time
tour, contact person, price...)
- Receive and view the resulting installation tour
  
### Administrator permission
- Update travel list and related information (list of locations, homes)
restaurants, hotels... suitable for tours)
- User management
- Manage and process online orders

## Member
1. **Nguyen Duc Anh**:
- Login (Authentication, SSO)
- Register (Confirm account by email)
- Forgot password (Recover password by email)
- Account information
- Change password
- Home page
- Decentralize admin and user rights
- Listings
- Search Tour
  
2. **Vu Minh Phong**
* Admin:
  * Dashboard
  * Tour
  * User
  * Bookings
  * Hotels
  * Tour Guide
  * Vehicle
* User:
  * Home Page
  * Tour Detail
  * Blog
  * Checkout details
* Search Blog
* Send email confirm bookings tour
* Send payment confirmation email with invoice
* Restful API
* Deploy Web

## Web:  
Link Web: [Travel Easy](https://still-fortress-15846-1eacd8faf222.herokuapp.com/)

### Administrator account: 
- Email: admin@gmail.com
- Password: 1234

### User account (You can register to create a new one): 
- Email: user@gmail.com
- Password: 123456789


## Report: 
Link report: [Thiet ke web nang cao](https://drive.google.com/drive/folders/1xLgb8YMsFQk0uTQHgyjuCHtLDfdMdnjp?usp=drive_link)


# Framework: Laravel
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

`Laravel` is a powerful and popular PHP framework, chosen by many developers for web projects, including complex websites like travel websites. Here are some key reasons why Laravel is the ideal choice for building a `Travel Easy` website:

- Clear MVC structure: Laravel uses the MVC (Model-View-Controller) model, which provides a clear separation between processing logic and user interface, making the source code easy to understand and maintain.

- Rich ecosystem: Laravel offers a rich ecosystem with many supporting packages and tools, such as Laravel Passport for API authentication, Laravel Cashier for payments, and Laravel Socialite for social login. These tools help develop complex features with ease.

- Eloquent ORM: Laravel's ORM system, Eloquent, makes working with databases easy and efficient. You can interact with data tables using PHP model classes, minimizing manual SQL code and increasing security.

- Built-in security features: Laravel integrates many built-in security features such as protection against CSRF (Cross-Site Request Forgery) attacks, protecting user data with encryption and easy access control. easy.

- Scalability and high performance: Laravel has good scalability and supports optimal performance, helping your website to handle a large number of users at the same time without problems.

- Large community and rich documentation: Laravel has a large and active community, along with rich documentation and many learning resources, making it easy to find support and solve development problems project.

- Ability to integrate with third-party services: Laravel supports easy integration with third-party services such as payment services, email, and external APIs, helping you create a complete system and flexible.

- Convenient development tools: Laravel provides many convenient tools for developers such as Laravel Artisan (powerful CLI to perform common tasks), Laravel Mix (CSS and JavaScript compilation tool), and Laravel Tinker (REPL for PHP).
  
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
- Import data to database
```bash
php artisan db:seed
```




