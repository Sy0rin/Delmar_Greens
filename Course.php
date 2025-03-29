<!DOCTYPE php>
<html>
<head>
    <title>Course</title>
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
    <title>Holes</title>
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
    $Name=urldecode($_GET['name']);

    $sql = "SELECT * FROM Course WHERE name LIKE '%$Name%'";

    // Execute the query
    $result = $conn->query($sql);

    // Display search results
    if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Location</th><th>Par</th><th>Private</th><th>Hours</th><th>Website</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["location"]."</td><td>".$row["par"]."</td><td>".$row["private"]."</td><td>".$row["hours"]."</td><td>".$row["website"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

    $sql = "SELECT holeNumber,yardage,holepar FROM Holes WHERE name LIKE '%$Name%'";

    // Execute the query
    $result = $conn->query($sql);

    // Display search results
    if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Hole</th><th>Yardage</th><th>Par</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["holeNumber"]."</td><td>".$row["yardage"]."</td><td>".$row["holepar"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

    // Close the connection
    $conn->close();
?>
    <p><a href="CSearch.html">Back to Search</a></p>
</body>
</html>

