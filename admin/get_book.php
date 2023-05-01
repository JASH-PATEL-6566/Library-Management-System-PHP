<?php
include("../includes/config.inc.php");

if (!empty($_POST["bookid"])) {
    $bookid = $_POST["bookid"];

    $sql = "select * from `books` where ISBNNumber='$bookid'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

?>
            <table border="1">

                <tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $bookName = $row["BookName"];
                        $author = $row["AuthName"];
                        $isIssued = $row["isIssued"];
                        $img = $row["BookImage"];
                    ?>
                        <th style="padding-left:5%; width: 10%;">
                            <img src="bookimg/<?php echo $img; ?>" width="120"><br />
                            <?php echo $bookName; ?><br />
                            <?php echo $author; ?><br />
                            <?php if ($isIssued == '1') : ?>
                                <p style="color:red;">Book Already issued</p>
                                <?php echo "<script>$('#submit').prop('disabled',true);</script>"; ?>
                            <?php else : ?>
                                <input type="radio" name="bookid" value="<?php echo $id; ?>" required>
                                <?php echo "<script>$('#submit').prop('disabled',false);</script>"; ?>
                            <?php endif; ?>
                        </th>
                    <?php
                    }
                    ?>
                </tr>

            </table>
            </div>
            </div>

        <?php
        } else { ?>
            <p>Record not found. Please try again.</p>
        <?php
            echo "<script>$('#submit').prop('disabled',true);</script>";
        }
    } else { ?>
        <p>Something went wrong,please try again.</p>
<?php
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
}
?>