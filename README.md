# Accounts System

###

## Objective

###

Develop a web application for managing accounts payable and receivable using the Laravel framework. The system must include user authentication, access levels, unit testing, basic security, and simple documentation.

###

## Environment Requirements

###

- **PHP** v8.3
- **Laravel** v11.29.0
- **Composer** v2.7.2
- **MySQL** v8.0.37
- **Node.js** v20.14.0

###

## Installation

###

1. Clone the repository to your machine.
2. Run the following commands in the terminal to install dependencies:

```
composer update
```
If you have multiple versions of Composer installed, you may need to use the `composer2 update` command.
```
npm install
```

## Laravel Setup
1. Create the environment file with the following command:
```
cp .env.example .env
```
2. Generate the application key:
```
php artisan key:generate
```
3. Edit the `.env` file to fill in the necessary database connection information and other environment variables.
4. Set up the database tables with the command:
```
php artisan migrate
```

## Starting Development Environment

1. Start the Laravel server with the command:
```
php artisan serve
```
This command will start Laravel's development server, making the application accessible at `http://localhost:8000` by default.

2. Then, in another terminal, start Vite to compile and watch frontend assets with the command:
```
npm run dev
```
This command will automatically compile CSS and JavaScript files and run Tailwind CSS to apply and update styles in real-time whenever changes are made.

## Running Project Tests

The project is set up to use an in-memory database for unit or functional testing. Follow these steps to run the tests:

1. Migrate to the test database:
```
php artisan migrate --env=testing
```

2. Run the tests:
```
php artisan test
```

## Functional Details

As requested, I used **Laravel Breeze** functions to handle all application requests.

The platform was originally developed in English, but I configured all translations to Portuguese, except for callbacks. I did not include buttons for language or theme switching, as these items were not specified as project requirements.

### Account Viewing Routes
The routes for viewing and detailing accounts are:
- `user-bills` - Displays the user's accounts
- `bill-details` - Shows details of a specific account and edit form

### Account Management Routes
The routes for account management include:
- `store-bill` - Add a new account
- `update-bill` - Update an existing account
- `delete-bill` - Delete an account

### Administrative Access
There is an exclusive route for administrators to view all accounts, called `all-bills`. Access control and permissions were implemented using Policies, allowing only administrators to access this feature.

Although it was not a requirement, I left the possibility for administrators to also manage user accounts.

### Controller Structure
Given the simplicity of the project, I used a single controller, `ContasController`, to manage all account operations. This controller centralizes the processing of all requests, simplifying the application structure.

### Considerations
Although this is a basic project, there are several opportunities for improvement. However, I believe the main requirements of the test were met with this implementation.

## Technologies Used

###

<div align="left">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" height="40" alt="laravel logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" height="40" alt="php logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" height="40" alt="html5 logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" height="40" alt="css3 logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" height="40" alt="javascript logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-original-wordmark.svg" height="40" alt="tailwindcss logo"  />
</div>

###

## License
This project is licensed under the MIT License. See the LICENSE file for more details.
