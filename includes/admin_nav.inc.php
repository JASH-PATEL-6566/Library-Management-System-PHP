<!DOCTYPE html>
<?php
if (isset($_POST["logout"])) {
    session_start();
    unset($_SESSION["admin_login"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
    header("Location: adminLogin.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Library Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" aria-current="page" href="../admin/admin_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-end text-uppercase" href="../admin/admin_add_category.php">Add Category</a></li>
                            <li><a class="dropdown-item text-end text-uppercase" href="../admin/admin_manage_categories.php">manage categories</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Author
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-end text-uppercase" href="../admin/admin_add_author.php">add author</a></li>
                            <li><a class="dropdown-item text-end text-uppercase" href="../admin/admin_manage_authors.php">manage authors</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Books
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-end text-uppercase" href="../admin/admin_add_book.php">add book</a></li>
                            <li><a class="dropdown-item text-end text-uppercase" href="../admin/admin_manage_books.php">manage books</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Issue Books
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-end text-uppercase" href="../admin/admin_issue_book.php">issue new book</a></li>
                            <li><a class="dropdown-item text-end text-uppercase" href="../admin/admin_manage_issue_books.php">manage issued books</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" aria-current="page" href="../admin/admin_register_student.php">REG student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" aria-current="page" href="../admin/admin_change_password.php">Change Password</a>
                    </li>
                    <form method="post">
                        <li class="nav-item">
                            <button type="button" name="logout" class="btn btn-dark text-danger text-uppercase text-none">logout</button>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>