<?php
include "./includes/student_nav.inc.php";
include "./includes/config.inc.php";


if (isset($_COOKIE['lms_student'])) {
    $studentId = $_COOKIE['lms_student'];
} else {
    $message = "You need to login first";
    echo "<script>alert(\"$message\")</script>";
    echo "<script>window.location.href = '../index.php';</script>";
}

// number of listed book
$sql_book = "select * from `books`";
$result_book = mysqli_query($conn, $sql_book);
if ($result_book) {
    $num_book = mysqli_num_rows($result_book);
}

// number of not return book
$sql_book_not = "select * from `issuedbook` where returnDate='Not Return Yet' and studentId='$studentId'";
$result_book_not = mysqli_query($conn, $sql_book_not);
if ($result_book_not) {
    $num_book_not = mysqli_num_rows($result_book_not);
}

// register user
$sql_student = "select * from `issuedbook` where studentId='$studentId'";
$result_student = mysqli_query($conn, $sql_student);
if ($result_student) {
    $num_student = mysqli_num_rows($result_student);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Student Dashboard</title>
</head>

<body>
    <div class="container h-100 w-100 m-5 d-flex flex-column justify-content-center w-100">
        <h2>Student Dashboard</h2>
        <div style="width: 100%;" class="d-flex pt-3 gap-3 flex-wrap px-4">
            <div style="width: 15em;" class="card d-flex flex-column align-items-center p-3">
                <img height="100" width="100" src="https://res.cloudinary.com/dreamlist/image/upload/v1682708369/Library-Management-System/books_k2ywoa.svg" alt="book">
                <h4><?php echo $num_book ?></h4>
                <h5>Listed Books</h5>
            </div>
            <div style="width: 15em;" class="card d-flex flex-column align-items-center p-3">
                <img height="100" width="100" src="https://res.cloudinary.com/dreamlist/image/upload/v1682708368/Library-Management-System/renew_fz91gm.svg" alt="not yet return">
                <h4><?php echo $num_book_not ?></h4>
                <h5>Books not return yet</h5>
            </div>
            <div style="width: 15em;" class="card d-flex flex-column align-items-center p-3">
                <img height="100" width="100" src="https://res.cloudinary.com/dreamlist/image/upload/v1682998642/Library-Management-System/book2_uki4b9.svg" alt="Issued Book">
                <h4><?php echo $num_student ?></h4>
                <h5>Issued Book</h5>
            </div>
        </div>
    </div>
</body>

</html>