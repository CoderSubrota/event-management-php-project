# Event Management System

## Overview
This project is a web-based event management system designed to allow users to register, create events, and manage participants. The system follows a structured development approach, including database management, backend logic, frontend design, and deployment.

---

## **Development Process**

### **Step 1: Database Setup**
I created a MariaDB database to store and manage user, event, and participant information.

#### **Database Queries**
```sql
CREATE DATABASE event-management;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date DATE NOT NULL,
    max_capacity INT NOT NULL,
    created_by INT NOT NULL,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

CREATE TABLE attendees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (event_id) REFERENCES events(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE participants (
     id INT AUTO_INCREMENT PRIMARY KEY,
     full_name VARCHAR(225),
     email VARCHAR(252) UNIQUE NOT NULL,
     event_id INT(28)
);
```

### **Database Connection**
The database is connected to the localhost using the following PHP script:
```php
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "event-management";
$port = 3308;

$connection = mysqli_connect($host, $username, $password, $database, $port);
?>
```
Make sure to modify the port number if it differs on your local server.

---

### **Step 2: Project Structure**
The project is organized into separate directories for clarity:
- **frontend/** - Contains all frontend files
- **backend/** - Contains PHP scripts for handling CRUD operations
- **css/** - Contains stylesheets for better UI/UX

#### **Important Files:**
- `home.php` - Landing page
- `config.php` - Database configuration
- `cdn.html` - Integrates Bootstrap and Google Fonts
- `index.php` - Secures all files
- `navbar.php` & `footer.html` - Shared across all pages
- `style.css` - Custom styles

#### **Core Features:**
- CRUD operations for users and events
- User authentication (Login & Registration)
- Admin panel for participant data management
- Secure session handling
- Responsive UI with Bootstrap

Once completed, the files were pushed to GitHub for version control.

---

### **Step 3: Deployment**
The project was hosted on a free hosting service (https://www.infinityfree.com/). Due to limitations of free hosting, security and uptime may be unstable.

🔗 **Live Website:** [Event Management System](http://event-management-bd.rf.gd/front-end/home.php)

If the website doesn't load properly, you can set up and run the project locally using the database files from GitHub.

---

## **GitHub Repository**
📌 [GitHub Repository](https://github.com/CoderSubrota/event-management)

---

## **Login Credentials**
### **User Login**
- **Email:** davidkrish22@gmail.com
- **Password:** David1234###

### **Admin Login**
- **Email:** subrota12@gmail.com
- **Password:** Subrota7867@%

---

## **How to Set Up Locally?**
1. Clone the repository:
   ```bash
   git clone https://github.com/CoderSubrota/event-management.git
   ```
2. Import the database from the `database` directory in the GitHub repository.
3. Run a local server using XAMPP or WAMP.
4. Update the database connection in `config.php`.
5. Access the project via `localhost/front-end/home.php`.

---

## **Future Enhancements**
- Implementing a payment gateway for event registration
- Adding email notifications for event confirmations
- Enhancing security with prepared statements and hashing
- Deploying on a secure paid hosting platform

This project demonstrates a structured approach to full-stack web development, covering database management, backend development, frontend design, and deployment. 🚀


>>  You can check this code locally if the provided live website link showing some error. You can get my database in GitHub Repository just go to the database directory you will get the database.


# User login information

# Authenticate user login information

Email: davidkrish22@gmail.com
Password : David1234### 

# Admin login information:

Email: subrota12@gmail.com
Password: Subrota7867@%

---------------------------------
---------------------------------

# <<<< Kindly check this code using localhost live website is not working >>>>

---------------------------------
---------------------------------