<?php
$servername = "plantmaster1.cgh9vaqe9jkg.us-east-1.rds.amazonaws.com";
$dbname = "test";
$username = 'plantMaster1';
$password = 'plant##123';

// Create connection
$conn = new mysqli($servername,$username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM plants ORDER BY ID DESC LIMIT 100";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $rows = array();
	
    while($row = $result->fetch_assoc()) {
        array_push($rows, $row);
    }
    echo(json_encode($rows));	
} else {
    echo "null";
}
$conn->close();
?>