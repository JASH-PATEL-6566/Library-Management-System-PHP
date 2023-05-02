<!DOCTYPE html>
<?php
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
    <title>Edit Book</title>
</head>
<?php
include "../includes/admin_nav.inc.php";
include "../includes/config.inc.php";

if (isset($_GET["bookname"])) {
    $get_name = $_GET["bookname"];

    $sql_fetch = "select * from `books` where BookName='$get_name'";
    $result_fetch = mysqli_query($conn, $sql_fetch);
    if ($result_fetch) {
        while ($row = mysqli_fetch_assoc($result_fetch)) {
            $name_book = $row["BookName"];
            $category = $row["CatName"];
            $author = $row["AuthName"];
            $isbn = $row["ISBNNumber"];
            $price = $row["BookPrice"];
            $img = $row["BookImage"];
        }
    }
}

if (isset($_POST["submit"])) {
    $new_book = $_POST["bookname"];
    $new_category = $_POST["category"];
    $new_author = $_POST["author"];
    $new_price = $_POST["price"];
    $sql = "update `books` set BookName='$new_book',CatName='$new_category',AuthName='$new_author',BookPrice='$new_price' where BookName='$get_name'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>window.location.href = 'admin_manage_books.php';</script>";
        exit;
    } else {
        $message = "Something went wrong please try again.";
        echo "<script>alert('Something went wrong, Please try again.')</script>";
        echo "<script>window.location.href = 'admin_edit_book.php?bookname=$get_name';</script>";
        exit;
    }
}
?>

<body>
    <div class="container h-100 w-100 m-4">
        <h4 class="p-5 text-uppercase">Edit Book</h4>
        <form class="px-5" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="bookName" class="form-label">Book Name</label>
                    <input required name="bookname" value="<?php echo $name_book ?>" id="bookName" type="text" class="form-control" placeholder="Book Name" aria-label="Book Name">
                </div>
                <div class="col">
                    <label class="form-label" for="autoSizingSelect">Category</label>
                    <select required name="category" value="<?php echo $category ?>" class="form-select" id="autoSizingSelect">
                        <?php
                        $sql = "select * from `categories`";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $name = $row["name"];
                                $id = $row["id"];
                                if ($name == $category) {
                                    echo '<option value="' . $name . '" selected>' . $name . '</option>';
                                } else {
                                    echo '<option value="' . $name . '">' . $name . '</option>';
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label class="form-label" for="author">Author</label>
                    <select required name="author" class="form-select" id="author">
                        <option>Choose Author</option>
                        <?php
                        $sql = "select * from `authors`";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $name = $row["name"];
                                $id = $row["id"];
                                if ($name == $author) {
                                    echo '<option value="' . $name . '" selected>' . $name . '</option>';
                                } else {
                                    echo '<option value="' . $name . '">' . $name . '</option>';
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label for="isbn" class="form-label">ISBN Number</label>
                    <input required name="isbn" value="<?php echo $isbn ?>" disabled="TRUE" id="isbn" type="text" class="form-control" placeholder="ISBN Number" aria-label="ISBN Number">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="price" class="form-label">Price</label>
                    <input required name="price" value="<?php echo $price ?>" id="price" type="text" class="form-control" placeholder="Price" aria-label="Price">
                </div>
                <div class="col">
                    <img src="bookimg/<?php echo $img; ?>" width="100">
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Edit Book</button>
        </form>
    </div>
</body>

</html>