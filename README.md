

# Buyora - Laravel Ecommerce Website

Buyora is a modern ecommerce web application built using Laravel. It allows users to browse products, add items to cart, and purchase products easily through a simple and user-friendly interface.

## Features

* User registration and login
* Product listing and product details page
* Add to cart functionality
* Admin panel for managing products
* Image upload for products
* Secure authentication system
* Responsive design

## Technologies Used

* Laravel
* PHP
* MySQL
* Blade Template Engine
* HTML
* CSS
* JavaScript
* Bootstrap

## Installation

1. Clone the repository

```
git clone https://github.com/Akshara-Krish/E-Commerce-Website.git
```

2. Navigate to the project folder

```
cd buyora
```

3. Install dependencies

```
composer install
```

4. Create environment file

```
cp .env.example .env
```

5. Generate application key

```
php artisan key:generate
```

6. Configure database in `.env` file

```
DB_DATABASE=laraecom
DB_USERNAME=root
DB_PASSWORD=
```

7. Run migrations

```
php artisan migrate
```

8. Start the development server

```
php artisan serve
```

Now open your browser and visit:

```
http://127.0.0.1:8000
```

## Project Structure

* `app/Models` – Database models
* `app/Http/Controllers` – Application controllers
* `resources/views` – Blade templates
* `routes/web.php` – Web routes
* `database/migrations` – Database tables

## Author

Developed by Akshara

## License

This project is open-source and available for learning and development purposes.
