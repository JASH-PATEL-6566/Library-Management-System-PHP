<?php
include "../includes/admin_nav.inc.php";
include "../includes/config.inc.php";

$get_name = $_GET["bookname"];

$sql = "delete from `books` where BookName = '$get_name'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>window.location.href = './admin_manage_books.php';</script>";
    exit;
} else {
    $message = "Something went wrong please try again.";
    echo "<script>alert(\"$message\")</script>";
    echo "<script>window.location.href = './admin_manage_books.php';</script>";
    exit;
}
?>
<!-- delete category -->