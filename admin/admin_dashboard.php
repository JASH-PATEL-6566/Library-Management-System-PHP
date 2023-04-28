<?php
include "../includes/admin_nav.inc.php";
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
    <title>Dashboard</title>
</head>

<body>
    <div class="container h-100 w-100 m-5 d-flex flex-column justify-content-center w-100">
        <h2>Admin Dashboard</h2>
        <div style="width: 100%;" class="d-flex pt-3 gap-3 flex-wrap px-4">
            <div style="width: 15em;" class="card d-flex flex-column align-items-center p-3">
                <img height="100" width="100" src="https://res.cloudinary.com/dreamlist/image/upload/v1682708369/Library-Management-System/books_k2ywoa.svg" alt="book">
                <h4>0</h4>
                <h5>Listed Books</h5>
            </div>
            <div style="width: 15em;" class="card d-flex flex-column align-items-center p-3">
                <img height="100" width="100" src="https://res.cloudinary.com/dreamlist/image/upload/v1682708368/Library-Management-System/renew_fz91gm.svg" alt="not yet return">
                <h4>0</h4>
                <h5>Books not return yet</h5>
            </div>
            <div style="width: 15em;" class="card d-flex flex-column align-items-center p-3">
                <img height="100" width="100" src="https://res.cloudinary.com/dreamlist/image/upload/v1682708369/Library-Management-System/users_qeixjv.svg" alt="register users">
                <h4>0</h4>
                <h5>Register Users</h5>
            </div>
            <div style="width: 15em;" class="card d-flex flex-column align-items-center p-3">
                <img height="100" width="100" src="https://res.cloudinary.com/dreamlist/image/upload/v1682708368/Library-Management-System/author_ax8ksm.svg" alt="author listed">
                <h4>0</h4>
                <h5>Authors Listed</h5>
            </div>
            <div style="width: 15em;" class="card d-flex flex-column align-items-center p-3">
                <img height="100" width="100" src="https://res.cloudinary.com/dreamlist/image/upload/v1682708368/Library-Management-System/category_hohav2.svg" alt="categories">
                <h4>0</h4>
                <h5>Listed Categories</h5>
            </div>
        </div>
    </div>
</body>

</html>