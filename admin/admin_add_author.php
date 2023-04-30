<!DOCTYPE html>
<?php
include "../includes/admin_nav.inc.php";
include "../includes/config.inc.php";

$message = "";

if (isset($_POST["submit"]) && (isset($_POST["name"]))) {
    $name = $_POST["name"];
    date_default_timezone_set('Asia/Kolkata');
    $current_date_time = date('d/m/Y h:i A');

    $sql_check = "select * from `authors` where name='$name'";
    $authorsList = mysqli_query($conn, $sql_check);

    if ($authorsList) {
        $row = mysqli_fetch_array($authorsList);
        if (is_array($row)) {
            $message = "This author is already present.";
            echo "<script>alert(\"$message\")</script>";
            echo "<script>window.location.href = 'admin_add_author.php';</script>";
            exit;
        } else {
            $sql = "insert into `authors` (name,creation_date,updation_date) values('$name','$current_date_time','$current_date_time')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>window.location.href = 'admin_manage_authors.php';</script>";
                exit;
            } else {
                $message = "Something went wrong please try again.";
                echo "<script>alert(\"$message\")</script>";
                echo "<script>window.location.href = 'admin_add_author.php';</script>";
                exit;
            }
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
    <title>Add Author</title>
</head>

<body>
    <div class="container h-100 w-100 m-5">
        <h4 class="p-5 text-uppercase">Add Author</h4>
        <form class="px-5" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Author Name</label>
                <input require type="text" name="name" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Add Author</button>
        </form>
    </div>
</body>

</html>