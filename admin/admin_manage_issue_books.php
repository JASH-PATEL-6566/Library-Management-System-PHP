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
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <style>
        table,
        td,
        th {
            border: 1px solid lightgray;
            border-collapse: collapse;
        }
    </style>
    <title>Manage Issued Books</title>
</head>

<body>
    <div class="container my-3 gap-2" style="display: flex; flex-direction: column; align-items: center;">
        <h5 class="text-uppercase" style="align-self: flex-start;">Manage Books</h5>
        <table id="example" class="display" cellspacing="0" style="height:10em;font-size: .9em;width:65em;">
            <thead>
                <tr>
                    <th></th>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Book Name</th>
                    <th>ISBN</th>
                    <th>Issued Date</th>
                    <th>Return Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $sql = "select * from `issuedbook`";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    $studentId = $row["studentId"];
                    $isbn = $row["isbn"];
                    $issuedDate = $row["issuedDate"];
                    $returnDate = $row["returnDate"];
                    $book_name = "";
                    $student_name = "";

                    $sql_student = "select name from `students` where studentId='$studentId'";
                    $result_student = mysqli_query($conn, $sql_student);

                    $sql_book = "select BookName from `books` where ISBNNumber='$isbn'";
                    $result_book = mysqli_query($conn, $sql_book);

                    while ($row = mysqli_fetch_assoc($result_book)) {
                        $book_name = $row["BookName"];
                    }

                    while ($row = mysqli_fetch_assoc($result_student)) {
                        $student_name = $row["name"];
                    }

                    if ($result_student && $result_book) {

                        echo '<tr>
                        <td></td>
                        <td class="fw-bold">' . $id . '</td>
                        <td>' . $student_name . '</td>
                        <td>' . $book_name . '</td>
                        <td>' . $isbn . '</td>
                        <td>' . $issuedDate . '</td>
                        <td>' . $returnDate . '</td>
                        <td>
                        <form method="post">
                        <a href="update_issue_book.php?issueid=' . $id . '"><button type="button" class="btn btn-primary">Edit</button></a>
                        </form>
                        </td>
                    </tr>';
                    }
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</body>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            select: false,
            "columnDefs": [{
                className: "Name",
                "targets": [0],
                "visible": false,
                "searchable": false
            }]
        }); //End of create main table

        $('#example tbody').on('click', 'tr', function() {
            alert(table.row(this).data()[0]);
        });
    });
</script>

</html>