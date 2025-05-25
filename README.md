# Supplime – Online Supermarket Website

Supplime is a Laravel-based online supermarket web application that simulates the experience of browsing and purchasing grocery products. The project focuses on building a clean and maintainable backend structure using MVC, with an emphasis on Laravel's core features and best practices.

---

## Features

- Browse products by category
- Add and remove items from the cart
- Product detail view
- User authentication (in progress)
- Checkout simulation (in progress)

---

## Tech Stack

- Framework: Laravel
- Language: PHP
- Database: MySQL
- Architecture: MVC
- Template Engine: Blade

---

## Project Status

This project is currently under development. Some features are still being implemented and improved.

---

## Setup Instructions

```bash
git clone https://github.com/Hagar-Elbakry/Supplime.git
cd Supplime
composer install
cp .env.example .env
php artisan key:generate
# Configure your .env with DB credentials
php artisan migrate
php artisan db:seed
php artisan serve
```
