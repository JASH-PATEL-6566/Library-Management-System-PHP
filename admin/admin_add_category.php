<!DOCTYPE html>
<?php
include "../includes/admin_nav.inc.php";

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $status = $_POST["status"];
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
</head>

<body>
    <div class="container h-100 w-100 m-5">
        <h2 class="p-5">Add Category</h2>
        <form class="px-5" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Category Name</label>
                <input type="text" name="name" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mt-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Status</label>
                <div class="mb-3 form-check">
                    <input name="status" value="active" type="checkbox" class="checkbox style-2 pull-right" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Active</label>
                    <br>
                    <input name="status" value="inactive" type="checkbox" class="checkbox style-2 pull-right" id="exampleCheck2">
                    <label class="form-check-label" for="exampleCheck2">Inactive</label>
                </div>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Add Category</button>
        </form>
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