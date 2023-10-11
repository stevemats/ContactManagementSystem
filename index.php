<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <link rel="stylesheet" href="stylesheet/style.css">
</head>
<body>
    <h1>Contact List</h1>
    
    <?php
    // connection details
    $servername = "localhost";
    $username = ""; 
    $password = ""; 
    $dbname = "contacts";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetching data from db
    $sql = "SELECT * FROM contacts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile</th>
                    <th>Fax</th>
                    <th>Email</th>
                    <th>Web</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["Id"]."</td>
                    <td>".$row["First"]."</td>
                    <td>".$row["Last"]."</td>
                    <td>".$row["Mobile"]."</td>
                    <td>".$row["Fax"]."</td>
                    <td>".$row["Email"]."</td>
                    <td>".$row["Web"]."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>
</html>