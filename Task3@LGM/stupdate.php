<?php
include "include/connection.php";
if (isset($_POST['sub'])) {
    $name=$_POST['name'];
    $reg=$_POST['reg'];
    $mail=$_POST['email'];
    $bnc=$_POST['brn'];
    $id1 = $_POST['id'];
 
     $sql1 = "UPDATE student SET st_name='{$name}',st_reg='{$reg}',st_email='{$mail}',st_branch='{$bnc}' WHERE sid={$id1}";
        $res1 = mysqli_query($con, $sql1) or die("query failed");
        if ($res1) {
            echo "<script> alert('Successfully registred')</script>";
            header("location:managestudent.php");
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

                <a href="managestudent.php" class="btn mybtn11">Go back</a>
                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                                 <h1>update Student</h1><?php
                    // include "include/connection.php";
                        $id = $_GET['sid'];
                     $sup = "SELECT * FROM student LEFT JOIN branch ON student.st_branch=branch.id WHERE student.sid ={$id}";

                    $rup = mysqli_query($con, $sup) or die("Query failed");

                    if ($rp = mysqli_num_rows($rup) > 0) {
                        while ($rap = mysqli_fetch_assoc($rup)) {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="formgroup">
                        <label> Student Name</label>
                        <input type="text" value="<?php echo $rap['st_name'] ?>" name="name"><br>
                    </div>
                    <div class="formgroup">
                        <label> Student Registration No.</label>
                        <input type="text" value="<?php echo $rap['st_reg'] ?>" name="reg" ><br>
                    </div>
                    <div class="formgroup">
                        <label> Email</label>
                        <input type="email" value="<?php echo $rap['st_email'] ?>" name="email" ><br>
                    </div>
                    <div class="formgroup">
                        <label>Branch</label>
                        <select name="brn">
                            <option value="<?php echo $rap['st_branch'] ?>"><?php echo $rap['class'] ?></option>
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
                    </div>
                    <input type="submit" name="sub" class="mybtnf" value="UPDATE">
                    <?php } }?>
                </form>
            </div>
        </div>"
    </section>

</body>

</html>