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
<a href="view.php">Display all the records from the table</a> 
<a href="delete.php">Delete item</a> 
<hr>
<br>
    <h2>Delete Products</h2>
    <form method="get">
        Delete by Book Name: <input type="text" name="search">
        <input type="submit" value="Delete">
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

            $query = "DELETE FROM Books WHERE BookName LIKE '%$searchKeyword%'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<p>" . mysqli_affected_rows($conn) . " record(s) successfully deleted</p>";
            } else {
                echo "<p>Error deleting records: " . mysqli_error($conn) . "</p>";
            }  
        } else {
            $query = "SELECT * FROM Books";
            $result = mysqli_query($conn, $query);
        }


        

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