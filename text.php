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
$open=fopen('test.txt','r');
while(!feof($open))
{
    $a1=fgets($open);
    $b1=explode(",",$a1);
    $sql="insert into assembly(d_id,dist,const,vpt,bpt,cpc) values ('$b1[0]','$b1[1]','$b1[2]','$b1[3]','$b1[4]','$b1[5]')";
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
fclose($open);