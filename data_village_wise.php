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
    // Get the entered district
    $village = $_POST['village'];
echo " entered village is $village";
    // SQL query to retrieve data for the entered district
    $sql = "SELECT dist, const,  bpt, cpc FROM `assembly` WHERE vpt='$village'";
    
    // Execute the query
    $result = mysqli_query($conn, $sql);

    
if ($result) {
    echo "<div style='margin: 0 auto; width: 80%;'>"; // Inline CSS for centering
    echo "<h2 style='text-align: center;'>Assembly Information for $village</h2>"; // Centering the heading
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>District</th>";
    echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>Constituency</th>";
    echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>Block Panchayat</th>";
    echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>Parliament Constituency</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='padding: 10px 8px; border-bottom: 1px solid #ddd;'>".$row['dist']."</td>";
        echo "<td style='padding: 10px 8px; border-bottom: 1px solid #ddd;'>".$row['const']."</td>";    
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
