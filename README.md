# learning.detik.com

This project is a Content Management System (CMS) designed for managing the content of learning.detik.com. The system includes the following key features:

# Features
### 1.User Authentication
- Login (for both Admin and User roles)
      - Admin (Can create, read, update, and delete content)
      - User (Only see list topic training)
- User Registration
### 2.Training Topic Management
- List of Training Topics
- Filtering Topics by Division:
    - Marketing
   - IT
   - Human Capital
   - Product
   - Editorial (Redaksi)

## Prerequisites

Pastikan Anda telah menginstal perangkat lunak berikut sebelum melanjutkan:

- PHP (versi yang disarankan: 8.x)
- Composer
- MySQL
- Node.js dan npm
- Laravel Installer (Opsional, bisa diinstal melalui Composer)
- Tailwind CSS
- XAMPP

## Tech Stack

- Laravel 10.x
- PHP 8.1+
- MySQL
- Tailwind CSS
- XAMPP

## Instalasi

### 1. Clone the repository:

Clone repositori di bawah ini:

```bash
git clone https://github.com/Hilda003/learning_detik.git
cd learning_detik
```

### 2. Install PHP dependencies
```bash
composer install
```
### 3. Install and compile frontend dependencies:
```bash
git clone https://github.com/Hilda003/learning_detik.git
cd learning_detik
```

### 3. Copy the `.env.example` file to `.env`

```bash
cp .env.example .env
```

### 3. Generate application key:

```bash
php artisan key:generate
```

## Database Integration
### 1. Create a new MySQL database for the project.
### 2. Update the .env file with your database credentials:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 3. Run database migrations:
```bash
php artisan migrate
```

### 4. (Optional) Seed the database with sample data:
```bash
php artisan db:seed
```

## Run Locally

### 1. Start your XAMPP server (Apache and MySQL).
### 2. Navigate to the project directory in your terminal.
#### 3. Start the Laravel development server:


```bash
php artisan serve
```
### 4. In a separate terminal, run the Vite development server for Tailwind CSS:
```bash
npm run dev
```
