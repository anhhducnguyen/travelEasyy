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

- Demo [Travel Easy](https://traveleasy-99cc5a19f6e7.herokuapp.com/)

- Report [Advanced web design](https://docs.google.com/document/d/1tvsQSfRKzBhQTIywt9Z-ATvfhmvxCFdN/edit?usp=sharing&ouid=109210913742492563743&rtpof=true&sd=true)


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

#### **Step 2**: If using `Xampp`, go to the `php.ini` file and remove the `;`. before the command line `extension=zip`

#### **Step 3**: Once you have installed PHP and Composer, you can download the Travel Easy project:

```bash
git clone https://github.com/anhhducnguyen/travelEasyy
```


#### **Step 4**: Reconfigure the `.env` file according to the following information
- If you wish to use MySQL, update your `.env` configuration file's DB_* variables like so:
  
    ```php
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    
- Sign in with Google: A modal will pop up with your apps client id and client secret. Add these values to your `.env` file, see details at [SSO](https://github.com/anhhducnguyen/travelEasyy/wiki/SSO):
  
    ```php
    GOOGLE_CLIENT_ID = 
    GOOGLE_SECRET_ID = 
    GOOGLE_REDIRECT = 
    ```

- Email sending configuration. Add these values ​​to your `.env` file
  
    ```php
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=""
    MAIL_PASSWORD=""
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=""
    MAIL_FROM_NAME="Travel Easy"
    ```


#### **Step 5**: Regenerate autoload files
- Navigate to your project directory where the `composer.json` file is located
- Configure necessary items in `composer.json` here [composer.json]( https://github.com/anhhducnguyen/travelEasyy/blob/main/composer.json)
- Run Command: Execute the following command

    ```bash
    composer dump-autoload
    ```

#### **Step 6**: Databases and Migrations
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


