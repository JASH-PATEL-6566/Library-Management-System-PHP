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
    <title>Register Student</title>
    <style>
        table,
        td,
        th {
            border: 1px solid lightgray;
            border-collapse: collapse;
        }

        td[status="active"] {
            text-transform: uppercase;
            color: green;
        }

        td[status="inactive"] {
            text-transform: uppercase;
            color: red;
        }
    </style>
</head>

<body>
    <div class="container my-3 gap-2" style="display: flex; flex-direction: column; align-items: center;">
        <h5 class="text-uppercase" style="align-self: flex-start;">Register Students</h5>
        <table id="example" class="display" cellspacing="0" style="height:10em;font-size: .9em;width:55em;">
            <thead>
                <tr>
                    <!-- <th ></th> -->
                    <th>#</th>
                    <th>StudentId</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Reg_date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $sql = "select * from `students`";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    $sid = $row["studentId"];
                    $name = $row["name"];
                    $phone = $row["mobile"];
                    $email = $row["email"];
                    $status = $row["status"];
                    $reg_date = $row["reg_date"];
                    $text = "";
                    if ($status == "active") {
                        $text = "inactive";
                    } else {
                        $text = "active";
                    }
                    echo '<tr>
                        <td class="fw-bold">' . $id . '</td>
                        <td>' . $sid . '</td>
                        <td>' . $name . '</td>
                        <td>' . $phone . '</td>
                        <td>' . $email . '</td>
                        <td>' . $reg_date . '</td>
                        <td status="' . $status . '">' . $status . '</td>
                        <td>
                        <form method="post">
                        <a href="' . $text . '_student.php?sid=' . $id . '"><button type="button" class="btn btn-danger text-capitalize">' . $text . '</button></a>
                        <a href="./admin_student_details.php?sid=' . $sid . '"><button type="button" class="btn btn-success">Detail</button></a>
                        </form>
                        </td>
                    </tr>';
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