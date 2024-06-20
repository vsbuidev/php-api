# Restful API in PHP (CRUD)

## Overview

This project demonstrates a simple CRUD (Create, Read, Update, Delete) API using PHP. The front-end is styled with basic CSS and the API can be tested with Postman or the front-end file (index.html) of the project.

## Features

1. **Create**: Add a new user.
2. **Read**: Fetch all users.
3. **Update**: Modify existing user details.
4. **Delete**: Remove a user.

## Technologies Used

- HTML
- CSS
- JavaScript (Fetch API)
- PHP
- Postman / Browser for API testing

## Setup and Installation

1. **Clone the repository**:

   ```bash
   git clone https://github.com/vsbuidev/php-api.git
   cd php-api/rest-api
   ```

2. **Database Configuration**:

   - Create a MySQL database named `crud_api`.
   - Import the following SQL script to create the `users` table:
     ```sql
     CREATE TABLE `users` (
       `id` int(11) NOT NULL AUTO_INCREMENT,
       `name` varchar(50) NOT NULL,
       `email` varchar(50) NOT NULL,
       PRIMARY KEY (`id`)
     ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
     ```

3. **Update Database Configuration in `db.php`**:

   ```php
   <?php
   class Database {
       private $host = "localhost";
       private $db_name = "crud_api";
       private $username = "root";
       private $password = "";
       public $conn;

       public function getConnection(){
           $this->conn = null;

           try {
               $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
               $this->conn->exec("set names utf8");
           } catch(PDOException $exception) {
               echo "Connection error: " . $exception->getMessage();
           }

           return $this->conn;
       }
   }
   ?>
   ```

## API Endpoints

1. **Create User**:

   - URL: `http://localhost/crud_api/api/create.php`
   - Method: `POST`
   - Request Body:
     ```json
     {
       "name": "User Name",
       "email": "user@example.com"
     }
     ```

2. **Read Users**:

   - URL: `http://localhost/crud_api/api/read.php`
   - Method: `GET`

3. **Update User**:

   - URL: `http://localhost/crud_api/api/update.php`
   - Method: `PUT`
   - Request Body:
     ```json
     {
       "id": 1,
       "name": "Updated Name",
       "email": "updated@example.com"
     }
     ```

4. **Delete User**:
   - URL: `http://localhost/crud_api/api/delete.php`
   - Method: `DELETE`
   - Request Body:
     ```json
     {
       "id": 1
     }
     ```

## Front-end

Open `index.html` in your browser. This file provides a simple interface to test the API.

## CSS Styling

Basic CSS is included to style the front-end form elements and layout.

## Testing with Postman

- Import the provided API endpoints into Postman.
- Test each endpoint by sending appropriate requests (as mentioned above).

## Author

- **Your Name**
- [LinkedIn](https://www.linkedin.com/in/vsbuidev)
- [GitHub](https://github.com/vsbuidev)

## License

This project is just for educational purposes only.
