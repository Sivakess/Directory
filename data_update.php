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
    $dist = $_POST['dist'];
    $const = $_POST['const'];
    $vpt = $_POST['vpt'];
    $bpt = $_POST['bpt'];
    $cpc = $_POST['cpc'];

    // SQL query to update data in the 'assembly' table
    $sql = "UPDATE assembly SET dist='$dist', const='$const', vpt='$vpt', bpt='$bpt', cpc='$cpc' WHERE d_id='$d_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
