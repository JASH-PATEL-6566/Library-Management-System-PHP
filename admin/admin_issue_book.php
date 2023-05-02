<!DOCTYPE html>
<?php
include "../includes/admin_nav.inc.php";
include "../includes/config.inc.php";

if (isset($_COOKIE['admin'])) {
    $admin = $_COOKIE['admin'];
} else {
    $message = "You need to login first";
    echo "<script>alert(\"$message\")</script>";
    echo "<script>window.location.href = '../adminLogin.php';</script>";
}

$message = "";
$redirect = "";

if (isset($_POST["submit"])) {
    $studentId = $_POST["studentId"];
    $isbn =  $_POST["isbn"];
    $return = "Not Return Yet";
    $fine = 0;
    date_default_timezone_set('Asia/Kolkata');
    $current_date_time = date('d/m/Y h:i A');

    $sql = "insert into `issuedbook` (studentId,isbn,issuedDate,returnDate,fine) values('$studentId','$isbn','$current_date_time','$return','$fine')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql_issue = "update `books` set isIssued='1' where ISBNNumber='$isbn'";
        $result_issue = mysqli_query($conn, $sql_issue);
        if ($result_issue) {
            echo "<script>window.location.href = 'admin_manage_issue_books.php';</script>";
            exit;
        } else {
            $message = "Something went wrong please try again.";
            echo "<script>alert('" . $message . "')</script>";
            echo "<script>window.location.href = 'admin_issue_book.php';</script>";
            exit;
        }
    } else {
        $message = "Something went wrong please try again.";
        echo "<script>alert('" . $message . "')</script>";
        echo "<script>window.location.href = 'admin_issue_book.php';</script>";
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
    <title>Issue a new book</title>
</head>

<script>
    function getstudent() {
        jQuery.ajax({
            url: "get_student.php",
            data: 'studentid=' + $("#studentid").val(),
            type: "POST",
            success: function(data) {
                $("#get_student_name").html(data);
            },
            error: function() {}
        });
    }

    //function for book details
    function getbook() {
        jQuery.ajax({
            url: "get_book.php",
            data: 'bookid=' + $("#bookid").val(),
            type: "POST",
            success: function(data) {
                $("#get_book_name").html(data);
            },
            error: function() {}
        });
    }
</script>

<body>
    <div class="container h-100 w-100 m-5">
        <h4 class="p-5 text-uppercase">Issue a new book</h4>
        <form class="px-5" method="post">
            <div class="mb-3">
                <label for="studentid" class="form-label fw-bold">Student Id</label>
                <input require type="text" name="studentId" onBlur="getstudent()" class="form-control w-50" id="studentid" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <span id="get_student_name" style="font-size:16px;"></span>
            </div>
            <div class="mb-3">
                <label for="bookid" class="form-label fw-bold">ISBN Number</label>
                <input require type="text" name="isbn" onBlur="getbook()" class="form-control w-50" id="bookid" aria-describedby="emailHelp">
            </div>
            <div class="form-group" id="get_book_name">

            </div>
            <button name="submit" id="submit" type="submit" class="btn btn-primary">Issue Book</button>
        </form>
    </div>
</body>

</html>