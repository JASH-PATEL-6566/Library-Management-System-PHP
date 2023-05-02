<!DOCTYPE html>
<?php
include "./includes/student_nav.inc.php";
include "./includes/config.inc.php";

if (isset($_COOKIE['lms_student'])) {
    $studentId = $_COOKIE['lms_student'];
}

$sql_student = "select * from `students` where studentId='$studentId'";
$result_student = mysqli_query($conn, $sql_student);

if ($result_student) {
    while ($row = mysqli_fetch_assoc($result_student)) {
        $reg_date = $row["reg_date"];
        $status = $row["status"];
        $mobile = $row["mobile"];
        $email = $row["email"];
        $name = $row["name"];
    }
}

$message = "";
$redirect = "";

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $mobile =  $_POST["mobile"];
    $email =  $_POST["email"];

    $sql_update = "update `students` set name='$name',email='$email',mobile='$mobile' where studentId='$studentId'";
    $result_update = mysqli_query($conn, $sql_update);

    if ($result_update) {
        $message = "Data has been updated successfuly.";
        echo "<script>window.location.href = 'student_dashboard.php';</script>";
        exit;
    } else {
        $message = "Something went wrong please try again.";
        echo "<script>window.location.href = 'student_profile.php';</script>";
        exit;
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
    <title>Add Category</title>
    <style>
        span[status="active"] {
            text-transform: capitalize;
            color: green;
        }

        span[status="inactive"] {
            text-transform: capitalize;
            color: red;
        }
    </style>
</head>

<body>
    <div class="container h-100 w-100 mt-3">
        <h4 class="px-2 py-3  text-uppercase">My Profile</h4>
        <div class="row">
            <div class="col">
                <p><span class="fw-semibold">Student ID : </span><?php echo $studentId ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p><span class="fw-semibold">Reg Date : </span><?php echo $reg_date ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p><span class="fw-semibold">Student Status : </span><span status="<?php echo $status ?>"><?php echo $status ?></span></p>
            </div>
        </div>
        <hr>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Enter Full Name</label>
                <input type="text" value="<?php echo $name ?>" name="name" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label fw-bold">Enter Mobile Number</label>
                <input type="text" value="<?php echo $mobile ?>" name="mobile" class="form-control w-50" id="exampleInputEmail2" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail3" class="form-label fw-bold">Enter Email</label>
                <input type="text" value="<?php echo $email ?>" name="email" class="form-control w-50" id="exampleInputEmail3" aria-describedby="emailHelp">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Update Now</button>
        </form>
    </div>
</body>

<script>
    $(function() {
        $('.checkbox').click(function(e) {
            $('.checkbox').not(this).prop('checked', false);
        });
    });

    window.location.replace = <?php echo "\"$redirect\""; ?>;
</script>

</html>