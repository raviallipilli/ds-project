To-Do List Application

Overview
This project is a simple To-Do List application built using PHP and Laravel, with styling based on the Duality Studio website. It allows users to create, view, update, mark as complete, and delete to-do items.

Features
Create: Add new tasks to the to-do list.
View: See a list of all tasks with their status.
Update: Edit existing tasks.
Mark as Complete: Toggle the completion status of tasks.
Delete: Remove tasks from the list.

Technology Stack
Backend: PHP, Laravel
Frontend: HTML, CSS
Styling: Custom CSS based on Duality Studio design

Installation
Prerequisites
PHP >= 8.3
Composer
Laravel >= 8.x
A web server (e.g., Apache or Nginx)
A database (e.g., MySQL)

Setup
Clone the Repository

bash
git clone https://github.com/raviallipilli/ds-project
cd your-repo-name
Install Dependencies

bash
composer install
Configure Environment

Copy the .env.example file to .env and update the database and other settings.

bash
cp .env.example .env
Edit the .env file and set your database configuration.

Generate Application Key

bash
php artisan key:generate
Run Migrations

bash
php artisan migrate
Start the Development Server

bash
php artisan serve
The application should be available at http://localhost:8000.

Usage
Create a New Item
Navigate to the Create New Item button to add a new task.

View Items
The main page displays a list of all tasks. Each task shows its details and status.

Update Items
Click the Edit button next to a task to modify its details.

Mark Items as Complete
Use the Update Status button in the edit form to toggle the completion status.

Delete Items
Click the Delete button next to a task to remove it from the list.

CSS Styling
The application uses custom CSS to match the styling of Duality Studio. The styles are defined in public/css/app.css.
