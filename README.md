# Shopfinity – Laravel E-Commerce Platform

**Shopfinity** is a comprehensive e-commerce website built with Laravel, designed to provide users with a smooth and enjoyable online shopping experience, along with a powerful admin dashboard for managing products, categories, and orders efficiently.

---

## 🛍️ Features

### 👤 For Customers
- Browse products by category  
- View detailed product information  
- Add, update, or remove items in the shopping cart  
- User registration, login, and authentication  

### 🛠️ For Admins
- Manage products, categories, orders, and users via a dedicated admin dashboard  

---

## 🧰 Tech Stack

- Backend: Laravel (PHP Framework)  
- Frontend: Bootstrap & Blade templates  
- Database: MySQL  
- Package Management: Composer (PHP), npm (JS/CSS)  

---

## 🚀 Getting Started

### Prerequisites
- PHP 7.3 or higher  
- Composer  
- MySQL  
- Node.js and npm  

### Installation

```bash
# Clone the repo
git clone https://github.com/wijdane8/LARAVEL_E-COMMERCE_WEBSITE.git

# Enter the project directory
cd LARAVEL_E-COMMERCE_WEBSITE

# Install backend dependencies
composer install

# Install frontend dependencies
npm install

# Copy and configure environment variables
cp .env.example .env

# Update database credentials in .env file

# Generate app key
php artisan key:generate

# Run migrations and seed database
php artisan migrate --seed

# Start development server
php artisan serve
