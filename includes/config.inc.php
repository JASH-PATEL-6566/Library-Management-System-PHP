<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "library";

$conn = mysqli_connect($servername, $username, $password, $databasename);

if (!$conn) {
    die("Connection Failed :" . $conn);
}
?>
<!-- coonection -->