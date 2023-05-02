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
$get_id = $_GET["issueid"];

date_default_timezone_set('Asia/Kolkata');
$current_date_time = date('d/m/Y h:i A');

//  iss - isbn,date banne,sid
// book - name,img
//  student - name,email,id,mobile
$sql = "select * from `issuedbook` where id='$get_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $studentId = $row["studentId"];
        $isbn = $row["isbn"];
        $issuedDate = $row["issuedDate"];
        $returnDate = $row["returnDate"];
    }

    // student
    $sql_student = "select * from `students` where studentId='$studentId'";
    $result_student = mysqli_query($conn, $sql_student);

    if ($result_student) {
        while ($row = mysqli_fetch_assoc($result_student)) {
            $studentName = $row["name"];
            $mobile = $row["mobile"];
            $email = $row["email"];
        }

        // book
        $sql_book = "select * from `books` where ISBNNumber='$isbn'";
        $result_book = mysqli_query($conn, $sql_book);

        if ($result_book) {
            while ($row = mysqli_fetch_assoc($result_book)) {
                $img = $row["BookImage"];
                $bookName = $row["BookName"];
            }

            $sql_student = "select * from `students` where studentId='$studentId'";
            $result_student = mysqli_query($conn, $sql_student);
        } else {
            $message = "Something went wrong please try again.";
            echo "<script>alert(\"$message\")</script>";
            echo "<script>window.location.href = './admin_manage_issue_books.php';</script>";
            exit;
        }
    } else {
        $message = "Something went wrong please try again.";
        echo "<script>alert(\"$message\")</script>";
        echo "<script>window.location.href = './admin_manage_issue_books.php';</script>";
        exit;
    }
} else {
    $message = "Something went wrong please try again.";
    echo "<script>alert(\"$message\")</script>";
    echo "<script>window.location.href = './admin_manage_issue_books.php';</script>";
    exit;
}

if (isset($_POST["submit"])) {
    $fine = $_POST["fine"];

    $sql_update = "update `issuedbook` set fine='$fine',returnDate='$current_date_time' where id='$get_id'";
    $result_update = mysqli_query($conn, $sql_update);

    if ($result_update) {
        echo "<script>window.location.href = './admin_manage_issue_books.php';</script>";
        exit;
    } else {
        $message = "Something went wrong please try again.";
        echo "<script>alert(\"$message\")</script>";
        echo "<script>window.location.href = './admin_manage_issue_books.php';</script>";
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
    <title>Issued Book Detais</title>
</head>

<body>
    <div class="container h-100 w-100 mx-5">
        <h4 class="p-5 text-uppercase">Issued book details</h4>
        <div class="border px-2 py-3">
            <h5 class="fw-bolder mt-2">Student Details</h5>
            <hr>
            <div class="row">
                <div class="col">
                    <p><span class="fw-semibold">Student ID : </span><?php echo $studentId ?></p>
                </div>
                <div class="col">
                    <p><span class="fw-semibold">Student Name : </span> <?php echo $studentName ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p><span class="fw-semibold">Student Email : </span> <?php echo $email ?></p>
                </div>
                <div class="col">
                    <p><span class="fw-semibold">Student Mobile Number : </span> <?php echo $mobile ?></p>
                </div>
            </div>
            <h5 class="fw-bolder mt-2">Books Details</h5>
            <hr>
            <div class="row">
                <div class="col">
                    <p><span class="fw-semibold">Book Image : </span>
                        <img src="./bookimg/<?php echo $img ?>" alt="<?php $bookName ?> image" width="100">
                    </p>
                </div>
                <div class="col">
                    <p><span class="fw-semibold">Book Name : </span> <?php echo $bookName ?></p>
                    <p><span class="fw-semibold">ISBN : </span> <?php echo $isbn ?></p>
                    <p><span class="fw-semibold">Book Issued Date : </span> <?php echo $issuedDate ?></p>
                    <p><span class="fw-semibold">Book Returned Date : </span> <?php echo $returnDate ?></p>
                </div>
            </div>

            <form method="post" class="px-2">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-semibold">Fine (if any)</label>
                    <input type="text" name="fine" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Return Book</button>
            </form>
        </div>
    </div>
</body>

<script>
    $(function() {
        $('.checkbox').click(function(e) {
            $('.checkbox').not(this).prop('checked', false);
        });
    });
</script>

</html>