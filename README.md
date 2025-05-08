# Project Setup Instructions Using XAMPP

Sir, I am going to set up and run my project using XAMPP as follows:

## 1. Download and Install XAMPP:
- I will download the XAMPP installer from the official website: [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html).
- After downloading, I will install it on my system (usually installed at `C:\xampp`).

## 2. Navigate to the XAMPP Installation Directory (`C:\xampp`)
Important components inside include:
- **apache** – contains Apache server files.
- **htdocs** – this is the web root directory where I will place my project files.
- **mysql** – holds MySQL database files.
- **php** – includes PHP executables and configuration.
- **phpMyAdmin** – a browser-based tool to manage MySQL.
- **control.exe** – launches the XAMPP Control Panel.

## 3. Save My Project Folder into `htdocs`:
- I will open `C:\xampp\htdocs`.
- Paste my project folder here (for example, a folder named `car-management-system`).
- If it is a ZIP file, I will extract it before use.

## 4. Create and Import the Database:
- I will open [http://localhost/phpmyadmin](http://localhost/phpmyadmin) in my browser.
- Create a new database named `car_management_system`.
- Import the SQL file for my project into this database.

## 5. Run the Project in the Browser:
- I will go to [http://localhost/car-management-system](http://localhost/car-management-system).
- If I already have an account created in the system, I will log in and begin testing the functionality.
