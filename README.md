# SOShospital

SOShospital is a PHP-based hospital website starter project built around the project overview in the context folder.

## Features

- Public-facing hospital website
- Responsive design for desktop and mobile screens
- Sections for home, about, services, departments, doctors, appointments, health news, and contact
- Simple admin login and dashboard shell
- MySQL schema for initial data structure

## Local setup

1. Start Apache and MySQL in XAMPP.
2. Place this project inside `htdocs` as `SOShospital`.
3. Open `http://localhost/SOShospital` in a browser.
4. Admin login: `admin@soshospital.com` / `admin123`
5. Import the SQL from `database/schema.sql` into MySQL if you want to use the database layer.

## Project structure

- `index.php` – homepage
- `about.php` – about page
- `services.php` – services page
- `departments.php` – departments page
- `doctors.php` – doctor profiles page
- `appointments.php` – booking page
- `news.php` – news page
- `contact.php` – contact page
- `admin/` – admin login and dashboard starter
- `database/schema.sql` – database tables for the project
- `assets/` – CSS and JavaScript files

## Notes

This is a starter project intended to be extended with real database-backed CRUD operations, authentication, and deployment configuration.
