<?php
include "../includes/admin_nav.inc.php";
include "../includes/config.inc.php";

$sid = $_GET["sid"];

$sql = "update `students` set status='inactive' where id='$sid'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>window.location.href = './admin_register_student.php';</script>";
    exit;
} else {
    $message = "Something went wrong please try again.";
    echo "<script>alert(\"$message\")</script>";
    echo "<script>window.location.href = './admin_register_student.php';</script>";
    exit;
}
?>
<!-- inactive student -->