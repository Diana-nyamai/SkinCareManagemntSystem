# Skin Care Management System

This repository contains the source code and documentation for the Skin Care Management System, which is a web-based application developed as a final-year project. The system allows users to sign up, access skincare products for purchase, and book appointments with dermatologists for professional advice and examination. It also provides administrative features for managing products, orders, and user information.

## Live Demo

Checkout the live version of the Executive Matchmaking website [Here]([https://executivematchmaking.netlify.app/](https://skincaremanagement-e6c70e0c65a7.herokuapp.com/))

## Technologies Used
- PHP
- CSS
- MySQL

## Features

1. User Registration and Authentication:

    - Users can sign up with their personal details to create an account.
    - User authentication is implemented to ensure secure access to the system.
    
2. Skincare Product Management:

    - Admin users can upload, edit, and delete skincare products.
    - Users can browse for skincare products based on various criteria.
    - Detailed product information, including descriptions, prices, and images, is provided.

3. Appointment Booking:

    - Users can schedule appointments with dermatologists for professional advice and examination.

4. Order Management:

    - Users can add products to their shopping cart and proceed to checkout for purchase.
    - Admin users can view and update orders, including order status.
  
5. User Management:

    - Admin and dermatologist users have access to a dashboard to view and manage user information.
    - The system tracks the number of registered users and provides relevant statistics.

## Installation
To set up the Skin Care Management System locally, follow these steps:

1. Clone the repository:
`git clone https://github.com/Diana-nyamai/SkinCareManagemntSystem.git`

2. Set up a web server:

    - Install a local web server environment (e.g., XAMPP, WAMP, or MAMP) on your machine.
    - Place the cloned repository into the web server's document root directory.

3. Configure the database:

    - Set up a MySQL database server and create a new database.
    - Import the provided SQL file (database.sql) into the newly created database.

4. Update the configuration file:

    - Open the config.php file in the project directory.
    - Modify the database connection details (hostname, username, password, database) to match your local setup.

5. Start the web server:

    - Start the local web server environment, ensuring it is running PHP and MySQL.

6. Access the application:

    - Open a web browser and visit http://localhost/SkinCareManagementSystem (adjust the URL as per your web server configuration) to access the Skin Care Management System.

## Documentation

The docs directory contains detailed documentation for the Skin Care Management System. It includes the following:

  - User Guide: Provides instructions on how to use the system from a user's perspective.
  - Administrator Guide: Offers guidance on managing the system as an admin user.

## Contributing
Contributions to the Skin Care Management System are welcome! If you encounter any issues or have suggestions for improvements, please feel free to open an issue or submit a pull request. Make sure to follow the project's coding style and guidelines.

## Contact Information

For any inquiries, please contact the project maintainer at [dnyamai.dn@gmail.com]
