<?php

$dbcon = mysqli_connect("HOST", "USER", "PASSWORD", "DATABASE");
$dbselect = $dbcon->select_db('DATABASE');

 
if (!$dbcon) {
    echo "Error: Failed to connect to the MySQL database." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
 
echo "Success: Success when connecting to the MySQL database." . PHP_EOL;
 
mysqli_close($dbcon);
?> 
