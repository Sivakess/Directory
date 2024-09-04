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

// Check if the form is submitted and if all required fields are provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['d_id']) && isset($_POST['dist']) && isset($_POST['const']) && isset($_POST['vpt']) && isset($_POST['bpt']) && isset($_POST['cpc'])) {
    // Get form data
    $d_id = $_POST['d_id'];
    $dist = $_POST['dist'];
    $const = $_POST['const'];
    $vpt = $_POST['vpt'];
    $bpt = $_POST['bpt'];
    $cpc = $_POST['cpc'];

    // SQL query to insert data into the 'assembly' table
    $sql = "INSERT INTO assembly (d_id, dist, const, vpt, bpt, cpc) VALUES ('$d_id', '$dist', '$const', '$vpt', '$bpt', '$cpc')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: All form fields are required.";
}

// Close the database connection
$conn->close();
?>
