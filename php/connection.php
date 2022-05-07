<?php
$servername = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "harshit";
$dbnamet = "harshit";

// Create connection
$conn = mysqli_connect($servername, $dbuser, $dbpassword, $dbname);
$base = "localhost/harshit/";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";




// Create connection
$connh = mysqli_connect($servername, $dbuser, $dbpassword, $dbnamet);

// Check connection
if (!$connh) {
    die("Connection failed: " . mysqli_connect_error());
}
?>