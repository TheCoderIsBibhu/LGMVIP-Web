<?php
include "include/connection.php";
if (isset($_POST['sub'])) {
    $name = $_POST['name'];
    $reg = $_POST['reg'];
    $mail = $_POST['email'];
    $bnc = $_POST['brn'];
    $sl = "SELECT st_reg  FROM student WHERE st_reg ='{$reg}'";

    $rs = mysqli_query($con, $sl) or die("Query failed");

    if (mysqli_num_rows($rs) > 0) {
        echo "<p style='color:red;text-align:center;margin:10px 0;'> branch Already Exist </p>";
    } else {
        $sql1 = "INSERT INTO student(st_name,st_reg,st_email,st_branch) VALUES('{$name}','{$reg}','{$mail}','{$bnc}')";
        $res1 = mysqli_query($con, $sql1) or die("query failed");
        if ($res1) {
            echo "<script> alert('Successfully registred')</script>";
            header("location:managestudent.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <section id="form1">
        <div class="container">
            <div class="formbox">
                <a href="managestudent.php" class="btn mybtnf">Go back</a>
                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <h1>Add Student</h1>
                    <div class="formgroup">
                        <label> Student Name</label>
                        <input type="text" name="name" placeholder="Enter Full Name"><br>
                    </div>
                    <div class="formgroup">
                        <label> Student Registration No.</label>
                        <input type="text" name="reg" placeholder="Enter Registration Number"><br>
                    </div>
                    <div class="formgroup">
                        <label> Email</label>
                        <input type="email" name="email" placeholder="Enter Email"><br>
                    </div>
                    <div class="formgroup">
                        <label>Branch</label>
                        <select name="brn">
                            <?php
                            // include "include/connection.php";
                            $sql = "SELECT * FROM branch";
                            $res = mysqli_query($con, $sql);
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    echo "<option value='{$row['id']}'>{$row['class']}</option> ";
                                }
                            }
                            ?>
                        </select><br>
                    </div> <br>
                    <input style="border:1px solid black ;background:yellow;font-weight:600;font-size:20px" type="submit" name="sub" class="btn mybtn" value="ADD">
                </form>
            </div>
        </div>"
    </section>
</body>

</html>