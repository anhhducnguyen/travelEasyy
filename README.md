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



### Demo & Report:  

- Demo
  
    Link website: [Travel Easy](https://still-fortress-15846-1eacd8faf222.herokuapp.com/)

- Report
  
    Link report: [Advanced web design](https://drive.google.com/drive/folders/1xLgb8YMsFQk0uTQHgyjuCHtLDfdMdnjp?usp=drive_link)


## Prerequisites
Before you start, ensure that you have the following prerequisites installed on your system:

- PHP (version 8.2.12 or higher)
- Composer (version 2.7.6, dependency manager for PHP)
- MySQL (or any other supported database system)

## Step-by-Step Installation
#### **Step 1**: Install Composer and PHP
- Ensure PHP and Composer are installed. You can check their versions using the following commands:
  
```bash
php -v
composer -v
```

#### **Step 2**: Once you have installed PHP and Composer, you can download the Travel Easy project:
```bash
git clone https://github.com/anhhducnguyen/travelEasyy
```
#### **Step 3**: Go to the `php.ini` file and remove the `;` sign. before the command line `extension=zip`

#### **Step 4**: Databases and Migrations
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
  
#### **Step 5**: Once the project has been created, start Laravel's local development server using the Laravel Artisan command`serve`
```bash
cd travelEasy
 
php artisan serve
```

#### **Step 6**: Login Credentials for Testing

For testing purposes, you can use the following login credentials

##### Administrator account: 

```php
Email: admin@gmail.com
Password: 1234
```
##### User account: 

```php
Email: user@gmail.com
Password: 123456789
```


