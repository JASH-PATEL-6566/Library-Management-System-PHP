<!DOCTYPE html>
<?php
include "../includes/admin_nav.inc.php";
include "../includes/config.inc.php";

if (isset($_COOKIE['admin'])) {
    $username = $_COOKIE['admin'];
} else {
    $message = "You need to login first";
    echo "<script>alert(\"$message\")</script>";
    echo "<script>window.location.href = '../adminLogin.php';</script>";
}

if (isset($_POST["submit"])) {
    $new = $_POST["new"];
    $current = $_POST["current"];
    $confirm_new = $_POST["confirm_new"];

    if (!($new == $confirm_new)) {
        $message = "New password and Confirm Password are not same.";
        echo "<script>alert(\"$message\")</script>";
        echo "<script>window.location.href = './admin_change_password.php';</script>";
        exit;
    }

    $sql = "select * from `admin` where username='$username' and password='$current'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $sql_update = "update `admin` set password='$new' where username='$username'";
        $result_update = mysqli_query($conn, $sql_update);
        if ($result_update) {
            $message = "Password has been change successfuly.";
            echo "<script>alert(\"$message\")</script>";
            echo "<script>window.location.href = './admin_dashboard.php';</script>";
            exit;
        } else {
            $message = "Something went wrong please try again.";
            echo "<script>alert(\"$message\")</script>";
            echo "<script>window.location.href = './admin_change_password.php';</script>";
            exit;
        }
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Change Password</title>
</head>

<body>
    <div class="container h-100 w-100 m-5">
        <h4 class="p-5 text-uppercase">Change Admin Password</h4>
        <form class="px-5" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Current Password</label>
                <input require type="password" name="current" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label fw-bold">Enter New Password</label>
                <input require type="password" name="new" class="form-control w-50" id="exampleInputEmail2" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail3" class="form-label fw-bold">Confirm Password</label>
                <input require type="password" name="confirm_new" class="form-control w-50" id="exampleInputEmail3" aria-describedby="emailHelp">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Change</button>
        </form>
    </div>
</body>

</html>