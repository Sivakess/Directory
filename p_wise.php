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
    // Get the entered 
    $par = trim($_POST['P']);
echo " Entered Parliament is $par";
    // SQL query to retrieve data for the entered
    $sql = "SELECT dist, const, vpt, bpt, cpc FROM `assembly` WHERE cpc='$par'";
    
    // Execute the query
    $result = mysqli_query($conn, $sql);

    
if ($result) {
   
                        
    echo "<div style='margin: 0 auto; width: 80%;'>"; // Inline CSS for centering
    echo "<h2 style='text-align: center;'>Assembly Information for $par</h2>"; // Centering the heading
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<thead>";
    echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>District</th>";
    echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>Village Panchayat</th>";
    echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'>Block Panchayat</th>";
    echo "<th style='padding: 12px 8px; background-color: #f2f2f2; color: #333; text-align: left;'> Constituency</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
       
        echo "<tr>";
        echo "<td>".$row['dist']."</td>";
        echo "<td style='padding: 10px 8px; border-bottom: 1px solid #ddd;'>".$row['vpt']."</td>";
        echo "<td style='padding: 10px 8px; border-bottom: 1px solid #ddd;'>".$row['bpt']."</td>";
        echo "<td style='padding: 10px 8px; border-bottom: 1px solid #ddd;'>".$row['const']."</td>";
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
