<!DOCTYPE html>
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

<body>
    <div class="container h-100 w-100 m-4">
        <h4 class="p-5 text-uppercase">Edit Book</h4>
        <form class="px-5" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="bookName" class="form-label">Book Name</label>
                    <input required name="bookname" id="bookName" type="text" class="form-control" placeholder="Book Name" aria-label="Book Name">
                </div>
                <div class="col">
                    <label class="form-label" for="autoSizingSelect">Category</label>
                    <select required name="category" class="form-select" id="autoSizingSelect">
                        <option selected>Choose Category</option>
                        <?php
                        $sql = "select * from `categories`";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $name = $row["name"];
                                $id = $row["id"];
                                echo '<option value="' . $name . '">' . $name . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label class="form-label" for="autoSizingSelect">Author</label>
                    <select required name="author" class="form-select" id="autoSizingSelect">
                        <option selected>Choose Author</option>
                        <?php
                        $sql = "select * from `authors`";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $name = $row["name"];
                                $id = $row["id"];
                                echo '<option value="' . $name . '">' . $name . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label for="bookName" class="form-label">ISBN Number</label>
                    <input required name="isbn" id="bookName" type="text" class="form-control" placeholder="ISBN Number" aria-label="ISBN Number">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="bookName" class="form-label">Price</label>
                    <input required name="price" id="bookName" type="text" class="form-control" placeholder="Price" aria-label="Price">
                </div>
                <div class="col">
                    <label for="inputGroupFile01" class="form-label">Book Picture</label>
                    <div class="input-group mb-3">
                        <input type="file" name="bookpic" class="form-control" id="inputGroupFile01">
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Edit Book</button>
        </form>
    </div>
</body>

</html>