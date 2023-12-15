## Laravel Application Installation Guide

## Versions
- [Composer : 2.4.1]
- [PHP: 8.1.6]
- [Laravel: 10.35.0]
- [npm: 10.2.4]

## Installation Steps
Clone Repository:

In the <strong>xampp/htdocs</strong> folder, clone the repository using the following command:

git clone <a href="https://github.com/Bhav32/Peoplefone.git"> https://github.com/Bhav32/Peoplefone.git </a>

Navigate to Project Directory:

cd Peoplefone/RIN2

## Install Dependencies:
<h3> Installing Composer </h3>

Run <b> composer install </b> or <b> composer update </b> to install PHP dependencies:

<h3> Install npm dependencies: </h3>

Run <b>npm install</b>

<h3> Build assets: </h3>

Run <b>npm run build</b>

## Run XAMPP Server:
Start your XAMPP server and open your database management tool to create a database named peoplefone.

## Configure Environment:
Put the .env file in the project directory with the required configuration. You can copy the .env file provided in attachment

## Database Setup:
<h3> Run database migrations and seed the database: </h3>

Run <b>php artisan db:seed</b>

In case you encounter an error, you can try installing the <b>spatie/laravel-permission</b> package (optional) and publish its assets:

composer require spatie/laravel-permission

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

Rerun <b>php artisan db:seed</b> if followed above steps to install permissions package

## Generate Application Key:
Run <b>php artisan key:generate</b>

## Run Laravel Server:
Start the Laravel development server:

<b>php artisan serve</b>

Open the provided link in your browser to access the application.

<b>Login Credentials:</b>

- Admin <br>
  <b>Email:</b> admin@gmail.com <br>
  <b>Password:</b> admin@123 <br>

- Non-Admin <br>
  <b>Email:</b> gautam.tyagi@gmail.com <br>
  <b>Password:</b> gautam@123 <br>

You have now successfully installed and configured the Laravel application.






