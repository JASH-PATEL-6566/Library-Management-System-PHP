<!DOCTYPE html>
<?php
include "../includes/admin_nav.inc.php";
include "../includes/config.inc.php";
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
    <title>Manage categories</title>

    <style>
        td[type="active"] {
            color: green;
        }

        td[type="inactive"] {
            color: red;
        }
    </style>

</head>

<body>
    <div class="container my-3 gap-2" style="display: flex; flex-direction: column; align-items: center;">
        <h5 class="text-uppercase" style="align-self: flex-start;">manage Categories</h5>
        <table id="example" class="display" cellspacing="0" style="height:10em;font-size: .9em;width:55em;">
            <thead>
                <tr>
                    <th></th>
                    <th>#</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Creation Date</th>
                    <th>Updation Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $sql = "select * from `categories`";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    $name = $row["name"];
                    $status = $row["status"];
                    $create = $row["creation_date"];
                    $update = $row["updation_date"];
                    echo '<tr>
                        <td></td>
                        <td class="fw-bold">' . $id . '</td>
                        <td>' . $name . '</td>
                        <td type="' . $status . '" class="text-uppercase">' . $status . '</td>
                        <td>' . $create . '</td>
                        <td>' . $update . '</td>
                        <td>
                        <form method="post">
                        <a href="admin_edit_category.php?catname=' . $name . '"><button type="button" class="btn btn-primary">Edit</button></a>
                        <a href="admin_delete_category.php?catname=' . $name . '"><button type="button" class="btn btn-danger">Delete</button></a>
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