### Project: To-Do List Application

-------------------------------------------------------------------------------------------------------------------------------------

## Author - Ravi Kiran Allipilli

-------------------------------------------------------------------------------------------------------------------------------------

## Overview
This project is a simple To-Do List application built using PHP and Laravel, with styling based on the Duality Studio website. It allows users to create, view, update, mark as complete, and delete to-do items.

-------------------------------------------------------------------------------------------------------------------------------------

## Features
Create: Add new tasks to the to-do list.
View: See a list of all tasks with their status.
Update: Edit existing tasks.
Mark as Complete: Toggle the completion status of tasks.
Delete: Remove tasks from the list.

-------------------------------------------------------------------------------------------------------------------------------------

## Technology Stack
Backend: PHP, Laravel
Frontend: HTML, CSS, JS
Styling: Custom CSS based on Duality Studio design

-------------------------------------------------------------------------------------------------------------------------------------

### Installation
## Prerequisites
PHP >= 8.3
Composer
Laravel >= 8.x
A web server (e.g., Apache or Nginx)
A database (e.g., MySQL)

-------------------------------------------------------------------------------------------------------------------------------------

## Setup
# Clone the Repository
 ```bash
git clone https://github.com/raviallipilli/ds-project
cd your-repo-name

# Install Dependencies
 ```bash
composer install

## Configure Environment
# Copy the .env.example file to .env and update the database and other settings.
 ```bash
cp .env.example .env
Edit the .env file and set your database configuration.

# Generate Application Key
 ```bash
php artisan key:generate

# Run Migrations
 ```bash
php artisan migrate

-------------------------------------------------------------------------------------------------------------------------------------

### Usage
## Start the Development Server
 ```bash
php artisan serve
The application should be available at http://localhost:8000.

## Create a New Item
Navigate to the Create New Item button to add a new task.

## View Items
The main page displays a list of all tasks. Each task shows its details and status.

## Update Items
Click the Edit button next to a task to modify its details.

## Mark Items as Complete
Use the Update Status button in the edit form to toggle the completion status.

## Delete Items
Click the Delete button next to a task to remove it from the list.

## Header & Footer
For code reusuabilty header and footers are added but none of the anchor tags work as they are just for visibility

## CSS Styling
The application uses custom CSS to match the styling of Duality Studio. The styles are defined in public/css/app.css.

-------------------------------------------------------------------------------------------------------------------------------------

## Code Overview
# Controller: ItemController.php
Handles incoming requests for managing tasks. It includes methods to list tasks, show the creation and editing forms, store new tasks, update existing tasks, and delete tasks.

# Model: Item.php
Represents the tasks table in the database.

# Migration: create_items_table.php
Defines the structure of the tasks table with columns for the task details and timestamps.

# Tests: ItemControllerTest.php
Contains feature tests to ensure the functionality of CRUD operations and search.

# CSS: app.css
Contains custom CSS used to build this application. It also includes some styles inspired by Duality Studio, but it is not an exact copy of their CSS.

# JS: app.js
This JavaScript file is exclusively used for the search filter functionality.

-------------------------------------------------------------------------------------------------------------------------------------

## Running Tests
To run the tests, use:

 ```bash
php artisan test

# Tests cover all CRUD functionalities:

Index: Verifies that tasks are listed and displayed.
Create: Checks that tasks can be created and stored.
Update: Validates that tasks can be updated.
Delete: Confirms that tasks can be deleted.
Additional tests: Includes simple behaviourial tests

-------------------------------------------------------------------------------------------------------------------------------------

### Login & Register using laravel breeze

## Installation Steps
---bash
composer require laravel/breeze --dev

php artisan breeze:install
 1. Select React
 2. Pick Innertia ssr
 3. Choose either PEST or PhpUnit fror testing

php artisan migrate
npm install
npm run dev

Login: Login pluggedin using React with Innertia
Register: Login pluggedin using React with Innertia
Dashboard: Simple dashboard front end view

-------------------------------------------------------------------------------------------------------------------------------------

## Documentation
The project is fully documented with comments and instructions where necessary. 
For detailed information on specific features and codebase, refer to the codebase and comments within the files.

-----------------------------------------------------------END TASK------------------------------------------------------------------
