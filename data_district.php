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
   // $d_id = $_POST['d_id'];

    // SQL query to delete data from the 'assembly' table
    $sql = "SELECT * FROM `assembly` ";
    
    
    if ($res = mysqli_query($conn, $sql)) {
        echo "<div style='margin: 0 auto; width: 80%;'>"; // Centering the table
        echo "<table style='border-collapse: collapse; width: 100%;'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>District ID</th>";
        echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>District</th>";
        echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>Constituency</th>";
        echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>Village Panchayat</th>";
        echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>Block Panchayat</th>";
        echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>Parliament Constituency</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td style='padding: 10px 8px; border-bottom: 1px solid #ddd;'>".$row['d_id']."</td>";
            echo "<td style='padding: 10px 8px; border-bottom: 1px solid #ddd;'>".$row['dist']."</td>";
            echo "<td style='padding: 10px 8px; border-bottom: 1px solid #ddd;'>".$row['const']."</td>";
            echo "<td style='padding: 10px 8px; border-bottom: 1px solid #ddd;'>".$row['vpt']."</td>";
            echo "<td style='padding: 10px 8px; border-bottom: 1px solid #ddd;'>".$row['bpt']."</td>";
            echo "<td style='padding: 10px 8px; border-bottom: 1px solid #ddd;'>".$row['cpc']."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
}

// Close the database connection
$conn->close();
?>
