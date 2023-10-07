##BookStore Project
The BookStore project is a simple web application for managing a book catalog. It allows you to add, view, and delete book records in a MySQL database.

#Introduction
This project provides a web-based interface to interact with a book catalog. It allows you to:

-Add New Books: You can add new books to the catalog by providing the book name, author, and price.

-View All Records: You can view all the records in the catalog, including book names, authors, and prices.

-Delete Books: You can search for books by name and delete them from the catalog.

#Features
User-friendly web interface.
MySQL database for storing book records.
Add, view, and delete book records.
Basic error handling for database operations.

#Getting Started
To get started with the BookStore project, follow these steps:

Clone the repository to your local machine:

bash
Copy code
git clone https://github.com/your-username/bookstore.git
Set up a local web server environment (e.g., XAMPP, WAMP, MAMP) and import the provided SQL dump (database.sql) into your MySQL database.

Configure the database connection by updating the database credentials in the PHP files:

insert.php
view.php
delete.php
Start your local web server and access the project using a web browser.

#Usage
Access the project using a web browser.

Use the navigation links to add, view, and delete book records.

To add a new book, enter the book name, author, and price in the provided form and click the "submit" button.

To view all records, click on "Display all the records from the table."

To delete a book, enter the book name in the "Delete by Book Name" field and click the "Delete" button.

#Database Structure
The project uses a MySQL database with the following table structure:

sql
Copy code
CREATE TABLE `Books` (
  `BookName` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
Contributing
