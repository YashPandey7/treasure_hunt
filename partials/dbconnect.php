<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "elitmus";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn)
{
    die("Failed to connect to database".mysqli_connect_error());
}

?>