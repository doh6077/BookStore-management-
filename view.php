<!DOCTYPE html>
<!--
Name: Dohee Kim
Date: 09. August. 2023
Student Id Number: 991713105
-->

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"> 
    <title>Assignment5</title>
</head>
<body>
<img id="logo" src="indigo.png" alt="Display Logo">
<h1>Books</h1>
<a href="insert.php">Add new item</a> |
<a href="view.php">Display all the records from the table</a> |
<hr>
<br>
    <h2>View Products</h2>
    <form method="get">
        Search by Book Name: <input type="text" name="search">
        <input type="submit" value="Search">
    </form>

    <table id="books">
        <tr>
            <th>#</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Price</th>
        </tr>

        <?php
$host = 'localhost'; 
$user = 'kimdohee'; 
$pswd = 'U?P?nM2Pcn?';
$dbname = 'kimdohee_MyDatabase'; 

$conn = mysqli_connect($host, $user, $pswd, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        
        $searchKeyword = mysqli_real_escape_string($conn, $_GET['search']);

        if (!empty($searchKeyword)) {

            $query = "SELECT * FROM Books WHERE BookName LIKE '%$searchKeyword%'";
        } else {
            $query = "SELECT * FROM Books";
        }


        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>" . $row['BookName'] . "</td>";
                echo "<td>" . $row['Author'] . "</td>";
                echo "<td>$" . $row['Price'] . "</td>";
                echo "</tr>";
                $i++;
            }
        } else {
            echo "<tr><td colspan='4'>";
            if (!empty($searchKeyword)) {
                echo "There is no records about $searchKeyword";
            } else {
                echo "No records found.";
            }
        }


        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
