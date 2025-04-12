<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:
Todo List App
A web-based task management system built with Laravel 10 that allows users to create, read, update, and delete tasks and categories with filtering capabilities.
Features
Task Management (CRUD Operations)

Create: Add new tasks with a title, description, due date, and associated category
Read: View all tasks in a list with options to filter and sort
Update: Edit task details including title, description, status, and category
Delete: Remove tasks permanently

Task Status

Mark tasks as "Pending," "In Progress," or "Completed"
Filter tasks by status to view only the relevant ones

Task Categories

Create color-coded categories to organize tasks (e.g., "Work", "Grocery", "Study")
Assign categories to tasks
Filter tasks by category

Responsive UI

Mobile-friendly interface that works well on all device sizes
Optimized layouts for both desktop and mobile viewing

Technologies Used

Laravel 10: PHP framework for building the application
MySQL: Database for storing task and category information
Bootstrap 5: Frontend framework for responsive design
HTML5/CSS3: For structure and styling

Installation and Setup

Clone the repository:

bashgit clone <repository-url>
cd todo-app

Install PHP dependencies:

bashcomposer install

Copy the environment file:

bashcp .env.example .env

Configure the database in the .env file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_app
DB_USERNAME=root
DB_PASSWORD=

Generate application key:

bashphp artisan key:generate

Run migrations:

bashphp artisan migrate

Compile assets:

bashnpm install
npm run dev

Start the development server:

bashphp artisan serve

Visit http://localhost:8000 in your browser to use the application.

Database Structure
Tasks Table

id: Primary key
title: Task title
description: Task description (optional)
due_date: Due date for the task (optional)
status: Enum ('pending', 'in-progress', 'completed')
category_id: Foreign key to categories table
label_color: Color for task label
created_at: Timestamp
updated_at: Timestamp

Categories Table

id: Primary key
name: Category name
color: Color for the category
created_at: Timestamp
updated_at: Timestamp

Usage
Managing Tasks

View Tasks: The homepage displays all tasks with filtering options
Create Task: Click "Add New Task" button and fill in the form
Edit Task: Click the "Edit" button next to a task to modify its details
Delete Task: Click the "Delete" button next to a task to remove it
View Task Details: Click on a task title to see full details

Managing Categories

View Categories: Access the categories page from the navigation menu
Create Category: Click "Add New Category" and enter name and color
Edit Category: Click the "Edit" button next to a category
Delete Category: Click the "Delete" button next to a category

Filtering and Sorting

Filter by Status: Use the status dropdown to view only tasks with a specific status
Filter by Category: Use the category dropdown to view tasks belonging to a specific category
Sort by Due Date: Click the "Sort by Due Date" option to arrange tasks chronologically

Challenges Faced
During the development of this project, several challenges were encountered:

Color Picker Implementation: Initially, the color picker wasn't working properly in the UI for category creation and update. This was fixed by properly implementing the HTML5 color input and ensuring the color data was correctly stored and retrieved.
Responsive Design: Ensuring the application worked well on all device sizes required careful CSS implementation and testing across different screen sizes.
Filter Functionality: Implementing multiple filters that could work together required a more complex query structure.

Future Improvements
Some potential enhancements for future versions:

User Authentication: Add multi-user support with personal task lists
Task Priorities: Implement priority levels for tasks
Due Date Reminders: Add notifications for upcoming due dates
Drag and Drop Interface: Allow reordering tasks via drag and drop
Task Sharing: Enable sharing tasks between users
Dark Mode: Implement a dark theme option

Conclusion
This Todo List App provides a simple yet effective way to manage tasks and stay organized. The focus on category-based organization and filtering makes it easier to prioritize and focus on specific types of tasks. The responsive design ensures the app is usable on any device, making task management accessible wherever you are.
Demo
Video Demo Link
License
This project is open-sourced software licensed under the MIT license.(https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
