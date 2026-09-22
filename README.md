# Crestline Technologies — Company CMS

A modern and dynamic **Company Website & Content Management System** built with **Laravel 12, PHP, MySQL, Blade, Tailwind CSS, and Alpine.js**.

The project includes a responsive public company website and a centralized admin dashboard for managing website content dynamically.

--

### Homepage

<img width="1366" height="768" alt="cms-image-1" src="https://github.com/user-attachments/assets/41ceaba4-d40b-4160-bf41-b2eee8fc61e4" />

<br><br><br>

### About Us

<img width="1366" height="768" alt="cms-image-2" src="https://github.com/user-attachments/assets/0eff94a9-91e6-4b54-90bf-9534d66f9de5" />

<br><br><br>

### Products

<img width="1366" height="768" alt="cms-image-3" src="https://github.com/user-attachments/assets/d403ba40-98dc-4a27-a058-e6fbffdd30cf" />

<br><br><br>

### Dashboard

<img width="1366" height="768" alt="cms-image-4" src="https://github.com/user-attachments/assets/25df683d-2a05-497c-9309-a499bbecafc9" />




---

## 🚀 Project Overview

**Crestline Technologies CMS** is a dynamic company website and CMS developed using Laravel 12.

The system allows administrators to manage website content through an admin dashboard without directly modifying the source code.

The project demonstrates practical Laravel development concepts such as:

* MVC architecture
* Eloquent ORM
* CRUD operations
* Authentication
* Authorization
* Middleware
* Form validation
* File uploads
* Database relationships
* Dynamic content management
* Responsive frontend development

---

## ✨ Features

### 🌐 Public Website

* Responsive homepage
* About Us page
* Services
* Products
* Projects
* Team
* Blog
* Contact Us
* Dynamic navigation
* Dynamic footer
* Contact enquiry form
* Responsive design

### 🔐 Admin Dashboard

#### Company Management

* Company logo
* Company description
* Contact information
* Social media links
* Copyright text
* Website settings

#### Pages Management

* Create pages
* Edit pages
* Delete pages
* Dynamic page slugs
* Dynamic page content

#### Services Management

* Create services
* Edit services
* Delete services
* Service images
* Service icons
* Short descriptions
* Full descriptions
* Display ordering
* Active/inactive status

#### Products Management

* Product code
* Product name
* Product category
* Product price
* Product image
* Short description
* Full description
* Display ordering

#### Projects Management

* Project title
* Client name
* Project category
* Featured image
* Project URL
* Short description
* Full description
* Display ordering

#### Blog Management

* Blog title
* Slug
* Category
* Author
* Featured image
* Published date
* Excerpt
* Content
* Published/draft status

#### Team Management

* Team member name
* Designation
* Profile image
* Biography
* Social media links
* Display ordering
* Status

#### Contact Management

* Contact enquiries
* Visitor name
* Email
* Phone
* Message
* Enquiry status

#### User & Role Management

* Admin users
* User roles
* Permissions
* Authentication
* Authorization

---

## 🛠️ Technologies Used

### Backend

* PHP
* Laravel 12
* MySQL
* Eloquent ORM

### Frontend

* Blade
* Tailwind CSS
* Alpine.js
* JavaScript
* HTML5

### Development Tools

* Composer
* NPM
* Git
* GitHub
* Laravel Artisan
* MySQL
* phpMyAdmin

---

## 📁 Project Structure

```text
company-cms-laravel/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   │
│   ├── Models/
│   └── Providers/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── admin/
│       ├── frontend/
│       └── layouts/
│
├── routes/
│   ├── web.php
│   └── api.php
│
├── storage/
│
├── screenshots/
│   ├── homepage.png
│   ├── about.png
│   ├── services.png
│   ├── products.png
│   ├── projects.png
│   ├── blog.png
│   ├── contact.png
│   ├── admin-login.png
│   ├── admin-dashboard.png
│   ├── admin-services.png
│   ├── admin-products.png
│   ├── admin-projects.png
│   └── admin-blog.png
│
├── .env.example
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── package-lock.json
└── README.md
```

---

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/company-cms-laravel.git
```

### 2. Navigate to the Project

```bash
cd company-cms-laravel
```

### 3. Install PHP Dependencies

```bash
composer install
```

### 4. Install Node Dependencies

```bash
npm install
```

### 5. Create Environment File

Copy `.env.example` and create:

```text
.env
```

### 6. Generate Application Key

```bash
php artisan key:generate
```

### 7. Configure Database

Update the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=company_cms
DB_USERNAME=root
DB_PASSWORD=
```

Create the `company_cms` database using MySQL or phpMyAdmin.

### 8. Run Migrations

```bash
php artisan migrate
```

If seeders are available:

```bash
php artisan db:seed
```

Or:

```bash
php artisan migrate --seed
```

### 9. Create Storage Link

```bash
php artisan storage:link
```

### 10. Build Frontend Assets

For production:

```bash
npm run build
```

For development:

```bash
npm run dev
```

### 11. Start Laravel Server

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

---

## 🗄️ Database

The project uses **MySQL** as the primary database.

Main modules include:

```text
users
roles
permissions
pages
services
service_categories
products
product_categories
projects
project_categories
team_members
blog_posts
blog_categories
contact_messages
media
menus
settings
```

The exact database structure may vary depending on the implementation.

---

## 🔒 Security

The application uses Laravel's built-in security features:

* Authentication
* Authorization
* CSRF protection
* Request validation
* Password hashing
* Middleware
* Route protection
* Mass-assignment protection
* Secure file upload validation

---

## 📱 Responsive Design

The frontend is designed for:

* Desktop
* Laptop
* Tablet
* Mobile

Tailwind CSS is used to create the responsive interface.

---

## 🖼️ Image & Media Uploads

The CMS supports common image formats:

* JPG
* JPEG
* PNG
* GIF
* WEBP

Maximum upload size can be configured according to the application requirements.

Uploaded images are managed through Laravel's storage system.

---

## 🚫 Git & GitHub

The following files and folders should **not** be uploaded to GitHub:

```text
/vendor/
/node_modules/
/.env
```

These are already included in `.gitignore`.

### Recommended `.gitignore`

```gitignore
/vendor/
/node_modules/

.env
.env.backup
.env.production

.phpunit.result.cache
.phpunit.cache/

Homestead.json
Homestead.yaml

auth.json

/.idea/
/.vscode/

.DS_Store
Thumbs.db

/public/hot
/public/storage

/storage/*.key
/storage/framework/
```

### Why `vendor` and `node_modules` are not included

The `vendor` directory can be recreated using:

```bash
composer install
```

The `node_modules` directory can be recreated using:

```bash
npm install
```

Therefore, there is no need to commit these large generated directories to GitHub.

---

