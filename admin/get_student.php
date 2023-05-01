<?php
include("../includes/config.inc.php");
if (!empty($_POST["studentid"])) {
    $studentid = strtoupper($_POST["studentid"]);

    // name,status,email,mobile
    $sql = "select * from `students` where studentId='$studentid'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row["name"];
                $status = $row["status"];
                $mobile = $row["mobile"];
                $email = $row["email"];
                if ($status == "inactive") {
                    echo "<span style='color:red'> Student ID Blocked </span>" . "<br />";
                    echo "<b>Student Name-</b>" . $name;
                    echo "<script>$('#submit').prop('disabled',true);</script>";
                } else {
?>


<?php
                    echo $name . "<br />";
                    echo $email . "<br />";
                    echo $mobile;
                    echo "<script>$('#submit').prop('disabled',false);</script>";
                }
            }
        } else {
            echo "<span style='color:red'> Invaid Student Id. Please Enter Valid Student id .</span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        }
    } else {
        echo "<span style='color:red'> Something went wrong please try again.</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
}



?>
