# Fruitkha — Laravel E-Commerce

A full-stack **E-Commerce web application built with Laravel**, designed to provide a complete online shopping experience with product management, shopping cart functionality, authentication, and an administrative dashboard.

The project demonstrates practical experience in building scalable web applications using **Laravel, PHP, MySQL, Blade, and modern web development practices**.


##  Features

###  Customer Features

* Browse available products
* View product details
* Add products to the shopping cart
* Update product quantities
* Remove products from the cart
* View cart details
* User authentication
* User registration and login
* Responsive shopping experience

###  Admin Features

* Administrative dashboard
* Product management
* Create products
* Edit products
* Delete products
* View product information
* Manage store data
* Administrative access control

###  Authentication & Authorization

The application includes user authentication and authorization to separate customer functionality from administrative functionality.

Different users can access different parts of the application according to their permissions.

##  Technologies

* **PHP**
* **Laravel**
* **MySQL**
* **Blade**
* **HTML5**
* **CSS3**
* **JavaScript**
* **Bootstrap**
* **Git & GitHub**

##  Architecture

The application follows Laravel's **MVC (Model-View-Controller)** architecture.

### Models

Models are responsible for interacting with the database and representing the application's main entities.

### Controllers

Controllers handle incoming requests, process application logic, and communicate with models and views.

### Views

The frontend is built using Laravel Blade templates to create the customer-facing store and administrative interface.

### Database

MySQL is used as the primary database for storing application data and managing relationships between the different entities.

##  Shopping Cart

The shopping cart allows customers to manage the products they intend to purchase.

Customers can:

* Add products to the cart
* Change product quantities
* Remove products
* Review their selected products
* Calculate the cart total

##  Product Management

The administration system provides CRUD functionality for managing the store's products.

Administrators can:

* Add new products
* Update existing products
* Remove products
* View product information

##  Security

The application follows Laravel's built-in security mechanisms and practices, including:

* Authentication
* Authorization
* CSRF protection
* Request validation
* Secure password handling
* Protected administrative routes

##  Database

The application uses **MySQL** for persistent data storage.

The database contains the main entities required to operate the e-commerce platform, including products, users, and shopping cart/order-related data.

##  Installation

### 1. Clone the repository

```bash
git clone YOUR_REPOSITORY_URL
```

### 2. Navigate to the project

```bash
cd fruitkha
```

### 3. Install PHP dependencies

```bash
composer install
```

### 4. Create the environment file

```bash
cp .env.example .env
```

On Windows, you can copy `.env.example` and rename it to `.env`.

### 5. Generate the application key

```bash
php artisan key:generate
```

### 6. Configure the database

Update your `.env` file:

```env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 7. Run migrations

```bash
php artisan migrate
```

If the project contains seeders:

```bash
php artisan db:seed
```

### 8. Create the storage link

```bash
php artisan storage:link
```

### 9. Install frontend dependencies

```bash
npm install
```

### 10. Run the development server

Start Laravel:

```bash
php artisan serve
```

In another terminal, start the frontend development server:

```bash
npm run dev
```

The application will be available at:

```text
http://127.0.0.1:8000
```

##  Screenshots

### Home Page

![Home Page](screenshots/home.png)

### Products

![Products](screenshots/products.png)

### Product Details

![Product Details](screenshots/product-details.png)

### Shopping Cart

![Shopping Cart](screenshots/cart.png)

### Admin Dashboard

![Admin Dashboard](screenshots/admin-dashboard.png)

##  Project Purpose

Fruitkha was developed as a practical Laravel project to strengthen my experience in building real-world e-commerce applications.

The project provided hands-on experience with:

* Laravel MVC architecture
* Database design
* Eloquent ORM
* Authentication and authorization
* CRUD operations
* Shopping cart workflows
* Blade templating
* Form validation
* Backend and frontend integration
* Administrative dashboards

##  Author

**Ahmed Abdelwahed**

Full-Stack Developer specialized in **Laravel, React, and Next.js**.

* GitHub: https://github.com/Ahmed3b1
* LinkedIn: https://linkedin.com/in/ahmed-abdelwahed-181860306

##  License

This project was developed as a practical Laravel and E-Commerce project.
