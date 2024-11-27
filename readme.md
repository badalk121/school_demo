# School Demo Project
The School Demo Project is a PHP and MySQL-based web application for managing students and classes. It features CRUD operations for students, including image uploads, and class management. The project is styled with Bootstrap for a modern, responsive design. Students' details, including class names, are dynamically displayed using SQL JOIN queries. The application includes secure file handling, form validation, and an intuitive user interface. Designed for educational purposes, it demonstrates core concepts of web development, database integration, and server-side programming.


## Features
1. **Home Page**: List all students with their details and options to view, edit, or delete them.
2. **Create Student**: Add a new student with an image upload.
3. **View Student**: View a student's full details.
4. **Edit Student**: Update a student's information and optionally upload a new image.
5. **Delete Student**: Remove a student and their image from the server.
6. **Manage Classes**: Add and list all available classes.

## Prerequisites
1. Install [XAMPP](https://www.apachefriends.org/index.html) on your Windows 10 system.
2. Install a code editor like [Visual Studio Code (VS Code)](https://code.visualstudio.com/).
3. Basic understanding of PHP and MySQL.

## Steps to run the project locally

### 1. Set up the environment
- Start the **Apache** and **MySQL** services from the XAMPP Control Panel.

### 2. Create the database
1. Open `http://localhost/phpmyadmin` in your browser.
2. Create a new database named `school_db`.
3. Execute the following SQL script to create the required tables:
    ```sql
    CREATE TABLE student (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255),
        address TEXT,
        class_id INT,
        image VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE classes (
        class_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ```

### 3. Set up the project files
1. Clone or download this repository.
2. Place the folder `school_demo` inside the `htdocs` directory of your XAMPP installation (`C:\xampp\htdocs\school_demo`).
3. Ensure the folder structure is as follows:
    ```
    school_demo/
    ├── db.php
    ├── index.php
    ├── create.php
    ├── view.php
    ├── edit.php
    ├── delete.php
    ├── classes.php
    ├── uploads/ (make this directory writable)
    ```

### 4. Configure the database connection
1. Open the `db.php` file.
2. Update the following details if they differ in your setup:
    ```php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school_db";
    ```

### 5. Run the project
1. Open your browser and navigate to: `http://localhost/school_demo/`
2. Use the application to manage students and classes.

## Project files
- **db.php**: Database connection file.
- **index.php**: Home page listing all students.
- **create.php**: Form to create a new student.
- **view.php**: View details of a single student.
- **edit.php**: Form to edit a student's information.
- **delete.php**: Deletes a student and their image.
- **classes.php**: Manage class names.

## Notes
1. **Uploads directory**:
   - Ensure the `uploads/` directory exists and has write permissions.
   - All uploaded images will be stored here.

2. **Image Validation**:
   - Only `jpg` and `png` file formats are allowed.

3. **Styling**:
   - The project uses **Bootstrap** for responsiveness and visual appeal.

## Troubleshooting
- **Error: Database connection failed**:
  - Verify your `db.php` credentials.
  - Ensure the `school_db` database exists in phpMyAdmin.
- **Images not uploading**:
  - Check if the `uploads/` folder has write permissions.

