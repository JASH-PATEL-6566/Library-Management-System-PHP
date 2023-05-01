<!DOCTYPE html>
<?php
include "./includes/start_navbar.inc.php";
include "./includes/config.inc.php";

$message = "";

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirmPassword"];
    date_default_timezone_set('Asia/Kolkata');
    $current_date_time = date('d/m/Y h:i A');
    $status = "active";

    $sql_check = "select * from `students` where name='$name' and email='$email'";
    $userList = mysqli_query($conn, $sql_check);

    if ($userList) {
        $row = mysqli_fetch_assoc($userList);
        if ($row) {
            $message = "User is already present....";
        } else {
            if ($confirm_password != $password) {
                $message = "Password and Confirm password not match....";
            } else {
                $sql = "insert into `students` (name,mobile,email,password,reg_date,status) values('$name','$phone','$email','$password','$current_date_time','$status')";
                $result = mysqli_query($conn, $sql);
                mysqli_error($conn);
                if ($result) {
                    $id_result = mysqli_query($conn, $sql_check);
                    if ($id_result) {
                        while ($row = mysqli_fetch_assoc($id_result)) {
                            $id = $row["id"];
                            $studentId = "SID" . $id;
                            $sql_id = "UPDATE `students` SET studentId = '$studentId' WHERE id='$id';";
                            $addId = mysqli_query($conn, $sql_id);
                            if ($addId) {
                                header("location:index.php");
                            } else {
                                $message = "Something went wrong please try again....";
                            }
                        }
                    } else {
                        $message = "Something went wrong please try again....";
                    }
                } else {
                    $message = "Something went wrong please try again....";
                }
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
    <title>User Signup</title>
</head>

<body>
    <div class="container h-100 w-100 mx-5 my-0">
        <h2 class="p-3">User SignUp Form</h2>
        <form class="px-5" method="post">
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Enter Full Name : </label>
                <input type="text" name="name" class="form-control w-50" id="exampleInputname">
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Mobile Number : </label>
                <input type="text" name="phone" class="form-control w-50" id="exampleInputphone">
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Enter Email : </label>
                <input type="email" name="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Enter Password : </label>
                <input type="password" name="password" class="form-control w-50" id="exampleInputpass" autocomplete="FALSE">
            </div>
            <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Confirm Password : </label>
                <input type="password" name="confirmPassword" class="form-control w-50" id="exampleInputPassword1" autocomplete="FALSE">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">SignUp</button>
        </form>
        <?php
        echo "<p class=\"error text-danger p-3 m-3\">$message</p>";
        ?>
    </div>
</body>

</html>