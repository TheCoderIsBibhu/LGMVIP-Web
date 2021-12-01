<?php
include "include/connection.php";
if(isset($_POST['submit'])){
    $branch=$_POST['branch'];
    $sql = "SELECT class  FROM branch WHERE class ='{$branch}'";

    $res = mysqli_query($con, $sql) or die("Query failed");

    if (mysqli_num_rows($res) > 0) {
        echo "<p style='color:red;text-align:center;margin:10px 0;'> branch Already Exist </p>";
    } else {
        $sql1 = "INSERT INTO branch(class) VALUES('{$branch}')";
        $res1 = mysqli_query($con, $sql1) or die("query failed");
        if ($res1) {
            echo "<script> alert('Successfully registred')</script>";
            header("location:branch.php");
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
                <a href="branch.php" class="btn mybtn11">Go back</a>
                <form  method="POST" action="<?php $_SERVER['PHP_SELF']?>">
                    <h1>Add Branch</h1>
                    <div class="formgroup">
                        <label> Branch Name</label>
                        <input type="text" name="branch" placeholder="Branch name"><br>
                    </div>
                   
                    <input type="submit" name="submit" class="mybtnf" value="ADD">
                </form>
            </div>
        </div>"
    </section>

</body>

</html>