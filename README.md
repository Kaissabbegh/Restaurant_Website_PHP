# Restaurant Website

## Description
This repository contains the source code for a restaurant website built using HTML, CSS (Bootstrap), JavaScript, and PHP. The website provides a client interface for users to browse the menu and place orders. It also includes an admin interface for managing products, categories, and orders.

## Technologies Used
- HTML
- CSS (Bootstrap)
- JavaScript
- PHP
- MySQL (Database)

## Setup Instructions
1. Clone the repository to your local machine.
2. Make sure you have a web server installed (such as Apache or Nginx or XAMPP) with PHP and MySQL support.
3. Import the included SQL file (`data_base/mystore.sql`) to create the necessary database and tables.
4. Update the database connection settings in the `config.php` file with your MySQL credentials.
5. Place the cloned repository in the web server's document root directory.
6. Access the website through your web browser by visiting the appropriate URL (e.g., `http://localhost/restaurant-website`).

## Folder Structure
- `index.php`: The main homepage of the restaurant website.
- `css/`: Contains the CSS files for styling the website.
- `js/`: Contains the JavaScript files for client-side functionality.
- `images/`: Contains any images used on the website.
- `config.php`: Configuration file for database connection.
- `database.sql`: SQL file to create the necessary database and tables.

## Features
### Client Interface
- Login/Signup: Users can create a new account or log in using their email and password.

### Admin Interface
- Add/Edit Products: Admin users can add new products to the menu or edit existing ones. This includes specifying the name, description, price, and category for each product.
- Add/Edit Categories: Admin users can create new categories for the menu or edit existing ones. Categories help organize the products on the website.
- Manage Orders: Admin users can view and manage all incoming orders. This includes marking orders as completed or canceled, as well as viewing order details such as customer information and order items.

The admin interface is accessible to authorized admin users only. User authentication and authorization are handled by the website's PHP backend.

## Contributing
If you would like to contribute to this project, please follow these steps:
1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them.
4. Push your changes to your forked repository.
5. Submit a pull request detailing your changes.

## Authors
- [Kais Sabbegh] <[kaissabbegh@gmail.com](mailto:kaissabbegh@gmail.com)>
