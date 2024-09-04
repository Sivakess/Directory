<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "database1";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $d_id = $_POST['d_id'];

    // SQL query to delete data from the 'assembly' table
    $sql = "DELETE FROM assembly WHERE d_id='$d_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Data deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
