# Laravel E-Commerce Project

This Laravel project is an e-commerce platform designed to facilitate online shopping. It includes features such as product browsing, shopping cart management, user authentication, and more.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

Before you begin, ensure you have met the following requirements:

- Composer installed on your local machine
- PHP version 7.3 or higher installed
- MySQL or any other compatible database management system installed
- Node.js and npm installed (for frontend dependencies)

### Installation

To install and run this project locally, follow these steps:

1. Clone the repository to your local machine:

    ```
    git clone https://github.com/wijdane8/LARAVEL_CAPSTONE.git
    ```

2. Navigate to the project directory:

    ```
    cd Ecommerce-Dashboard
    ```

3. Install PHP dependencies using Composer:

    ```
    composer install
    ```

4. Install frontend dependencies using npm:

    ```
    npm install
    ```

5. Create a copy of the `.env.example` file and rename it to `.env`. Update the database configuration parameters in the `.env` file with your database credentials.

6. Generate an application key:

    ```
    php artisan key:generate
    ```

7. Run database migrations and seeders:

    ```
    php artisan migrate --seed
    ```

8. Start the Laravel development server:

    ```
    php artisan serve
    ```

9. Access the application in your web browser at `http://localhost:8000`.

## Features

- Product browsing: Browse products by category, view product details, and add products to the shopping cart.
- Shopping cart management: Add, update, and remove products from the shopping cart.
- User authentication: Register, log in, and log out users.
- Admin dashboard: Manage products, categories, and user orders from an admin dashboard.

## Built With

- Laravel - The PHP framework used for backend development
- MySQL - The relational database management system
- Bootstrap - The CSS framework for styling
- Vue.js - The JavaScript framework for frontend interactivity

## Authors

- wijdane8 (https://github.com/wijdane8) - Initial work

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Hat tip to anyone whose code was used
- Inspiration
- etc.
# License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT) - see the [LICENSE.txt](LICENSE.txt) file for details.
