<!DOCTYPE html>
<?php
include "./includes/start_navbar.inc.php";
include "./includes/config.inc.php";
// echo $_SESSION["admin_login"];
$store_name = "admin";
$store_pass = "jashpatel6566";
session_start();
$message = "";

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    if ($store_name == $name && $store_pass == $password) {
        $_SESSION["admin_name"] = "admin";
        header("location:./admin/admin_dashboard.php");
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
    <title>Admin Login</title>
</head>

<body>
    <div class="container h-100 w-100 m-5">
        <h2 class="p-5">Admin Login Form</h2>
        <form class="px-5" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Username</label>
                <input type="text" name="name" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control w-50" id="exampleInputPassword1">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>