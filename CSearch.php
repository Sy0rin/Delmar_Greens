<!DOCTYPE php>
<html>
<head>
    <title>Golf Course Search Results</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Golf Course Search Results</h1>

    <?php
    // Establish database connection (similar to previous example)
    $servername = "localhost";
    $username = "tbailey10";
    $password = "tbailey10";
    $dbname = "golfCoursesDB";

    $conn=@mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve search term from the form
    $searchTerm = $_GET['search'];
    $address = $_GET['address'];

    if ($address){
        $sql = "SELECT * FROM Course WHERE location LIKE '%$searchTerm%'";
    }

    else{
        // SQL query to search for users by name
        $sql = "SELECT * FROM Course WHERE name LIKE '%$searchTerm%'";
    }
    // Execute the query
    $result = $conn->query($sql);

    // Display search results
    if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Location</th><th>Par</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><a href='Course.php?name=".urlencode($row["name"])."'>".$row["name"]."</a></td><td>".$row["location"]."</td><td>".$row["par"]."</td></tr>";
    }
    echo "</table>";
    header("Location: " $row['website']);
} else {
    echo "No results found.";
}

    // Close the connection
    $conn->close();
?>
    <p><a href="CSearch.html">Back to Search</a></p>
</body>
</html>

