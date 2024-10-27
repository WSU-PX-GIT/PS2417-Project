# CPD Tracking System

## Overview
This project is a Laravel-based system designed to manage and track Continuing Professional Development (CPD) records for real estate agents. It is divided into three user roles:

- **Agent**: Can create and track CPD records, view when certifications are due for renewal, and upload evidence of completion.
- **Agency**: Has access to multiple agent accounts to monitor their records and compliance status.
- **Admin**: Reserved for CPD Tracking employees, with access to account creation, certification management, and other system-wide configurations.

This README provides instructions on setting up the project on a general Linux web server.

---

## Prerequisites
Ensure the following are installed and properly configured on your server:
- **PHP**: Version 8.x or higher
- **Composer**: For managing PHP dependencies
- **Node.js and npm**: For managing frontend dependencies
- **MySQL**: For the database
- **Git**: For cloning the repository

> **Note**: For AWS Lightsail or similar services, SSH access to the server is required.

---

## Setup Instructions

### 1. Clone the GitHub Repository
- Connect to your server via SSH.
- Navigate to your desired web root directory, typically `/var/www/html` or `/opt/bitnami/apache2/htdocs`.

```bash
cd /path/to/web/root
```

- Clone the repository:

    ```bash
    sudo git clone https://github.com/WSU-PX-GIT/PS2417-Project.git
    ```

- Navigate into the project directory:

    ```bash
    cd PS2417-Project
    ```

### 2. Configure Environment Variables
- Duplicate the `.env.example` file as `.env`:

    ```bash
    cp .env.example .env
    ```

- Open `.env` and configure the necessary environment variables, such as database settings and mail credentials:
  - `DB_CONNECTION`: mysql
  - `DB_HOST`: The host of your MySQL server (e.g., localhost or a specific IP address).
  - `DB_PORT`: Default MySQL port is 3306.
  - `DB_DATABASE`: The database name for the project.
  - `DB_USERNAME`: Your MySQL username.
  - `DB_PASSWORD`: Your MySQL password.

- Generate an application key for your Laravel instance:

    ```bash
    sudo php artisan key:generate
    ```

### 3. Install PHP Dependencies
- Ensure you’re in the project root, then run:

    ```bash
    sudo composer install
    ```

### 4. Install Node.js Dependencies and Compile Assets
- Install Node.js dependencies:

    ```bash
    npm install
    ```

- Build the frontend assets for production:

    ```bash
    npm run build
    ```

### 5. Prepare the Storage Directories
- Laravel requires specific storage directories for caching and sessions. Create these if they don’t exist:

    ```bash
    mkdir -p storage/framework/{cache,sessions,views}
    ```

- Ensure the storage directory is writable by the web server:

    ```bash
    sudo chmod -R 775 storage
    sudo chown -R www-data:www-data storage  # Replace www-data with your web server user
    ```

### 6. Database Setup and Migration
- Create a MySQL database and user (if not already set up). Assign this user the necessary privileges on your database.

    ```sql
    CREATE DATABASE your_database_name;
    CREATE USER 'your_user'@'localhost' IDENTIFIED BY 'your_password';
    GRANT ALL PRIVILEGES ON your_database_name.* TO 'your_user'@'localhost';
    FLUSH PRIVILEGES;
    ```

- Run the migrations to set up the database tables:

    ```bash
    sudo php artisan migrate
    ```

- Seed the database with default data:

    ```bash
    sudo php artisan db:seed
    ```

### 7. Testing User Credentials
The system comes with default user accounts:

- **Agent User**  
  - Email: `agent@agent.com`
  - Password: `password`

- **Agency User**  
  - Email: `agency@agency.com`
  - Password: `password`

- **Admin User**  
  - Email: `admin@admin.com`
  - Password: `password`

### 8. Configure Email for Notifications
To enable email functionality:
- Update `.env` with your email provider credentials. You can use Mailtrap or another SMTP provider.
  - `MAIL_MAILER`: smtp
  - `MAIL_HOST`: smtp.mailtrap.io (or your provider’s host)
  - `MAIL_PORT`: 2525 (or the correct port for your provider)
  - `MAIL_USERNAME`: Your SMTP username
  - `MAIL_PASSWORD`: Your SMTP password
  - `MAIL_FROM_ADDRESS`: no-reply@cpdtracking.com
  - `MAIL_FROM_NAME`: CPD Tracking

- Test email functionality by attempting password reset or registration emails.

### 9. Cache Configuration (Optional)
For better performance in production, cache configuration and routes:

    ```bash
    sudo php artisan config:cache
    sudo php artisan route:cache
    sudo php artisan view:cache
    ```

### 10. Set Up Cron Job (Optional)
To ensure scheduled tasks run automatically (if applicable), add a cron job to execute Laravel’s schedule:run command every minute:

    ```bash
    * * * * * php /path/to/your/project/artisan schedule:run >> /dev/null 2>&1
    ```

> Replace `/path/to/your/project` with the actual path to your Laravel installation.

---

## Project File Structure Overview
- `/app`: Contains core application code, including controllers for each user role (Agent, Agency, Admin).
- `/resources/views`: Contains user interface files for Agent, Agency, and Admin layouts.
- `/database/migrations`: Database migration files that define table structure.
- `/public`: Web root containing compiled frontend assets.

---

## Running the Application Locally
To run the application locally, install Laravel’s dependencies as above and start the development server:

    ```bash
    php artisan serve
    ```

- Access the application locally at `http://localhost:8000`.

---

## Troubleshooting
- **Permissions**: Ensure storage and cache directories are writable by the web server.
- **Environment Variables**: Verify `.env` values for correct database and mail configurations.
- **Logs**: Check Laravel logs in `storage/logs/laravel.log` for error messages.

---

## Support
For any issues with setup or usage, please contact Rami Shamon at 20188072@student.westernsydney.edu.au.
