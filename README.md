# Todo App

## Introduction
This README provides step-by-step instructions for setting up and running the project locally.

## Installation

### Step 1: Clone the repository
Clone the repository to your local machine using the following command:
git clone https://github.com/thaabitv/todo-app.git
This command will create a local copy of the project on your machine.

### Step 2: Install PHP dependencies
Use Composer to install PHP dependencies specified in the composer.json file:
composer install
Composer is a dependency manager for PHP. This command installs all the required PHP packages listed in the composer.json file.

### Step 3: Install JavaScript dependencies
Use npm (Node Package Manager) to install JavaScript dependencies specified in the package.json file:
npm install
npm is a package manager for JavaScript. This command installs all the required JavaScript packages listed in the package.json file.

### Step 4: Create environment file
Copy the .env.example file to create a new .env file:
cp .env.example .env
The .env file contains environment-specific settings for the application. This command creates a new .env file based on the provided example file.

### Step 5: Generate application key
Generate a unique application key for the Laravel application:
php artisan key:generate
The application key is used for encryption and hashing within the Laravel application. This command generates a new key and stores it in the .env file.

### Step 6: Create database
Create an empty SQLite database file named database.sqlite in the database folder. This file will be used as the database for the application.

### Step 7: Run migrations
Run database migrations to create the necessary database tables:
php artisan migrate
Database migrations are used to create and modify database tables. This command executes the migration files located in the database/migrations directory, creating the corresponding tables in the database.

## Usage

### Compile assets
Compile the assets (JavaScript and CSS) for production:
npm run dev
This command compiles the assets for production. It processes and bundles JavaScript and CSS files, preparing them for deployment.

### Start the server
Start the Laravel development server:
php artisan serve
This command starts the Laravel development server, allowing you to access the application locally in your web browser.

