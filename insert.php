<?php
ob_start();
session_start();

$host = 'localhost';
$user = 'kimdohee';
$pswd = 'U?P?nM2Pcn?';
$dbname = 'kimdohee_MyDatabase';

$conn = mysqli_connect($host, $user, $pswd, $dbname);

if (empty($conn)) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>BookStore</title>
</head>
<body>
<img id="logo" src="indigo.png" alt="Display Logo">
<h1>Books</h1>
<a href="insert.php">Add new item</a> |
<a href="view.php">Display all the records from the table</a> |
<a href="delete.php">Delete item</a> 
<hr>
<br>
<form method="post">
    <label for="name">Book name:</label>
    <input type="text" id="name" name="name"><br>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author"><br>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price"><br>

    <input type="submit" value="submit" name="submit">
</form>

<?php

if (isset($_POST['submit'])) {
    $name = $_REQUEST['name'];
    $author = $_REQUEST['author'];
    $price = $_REQUEST['price'];

    if (empty($name) || empty($author) || $price <= 0) {
        echo "Please fill the textboxes again";
    } else {
        $query = "INSERT INTO Books (BookName, Author, Price) VALUES ('$name', '$author', $price)";

        if ($conn->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>

</body>
</html>
