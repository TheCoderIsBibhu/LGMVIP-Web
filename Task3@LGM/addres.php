<?php
include "include/connection.php";
if(isset($_POST['sub'])){
    $reg=$_POST['name'];
    $bnc=$_POST['brn'];
    $os=$_POST['os'];
   $co=$_POST['co'];
 $dbms=$_POST['dbms'];
    $java=$_POST['java'];
    $ds=$_POST['ds'];
    $ai=$_POST['ai'];
    $sq = "SELECT res_reg  FROM result WHERE res_reg ='{$reg}'";

    $rs = mysqli_query($con, $sq) or die("Query failed");

    if (mysqli_num_rows($rs) > 0) {
        echo "<p style='color:red;text-align:center;margin:10px 0;'> branch Already Exist </p>";
    } else {
        $sql1 = "INSERT INTO result(res_reg, res_branch, os, co, java, dbms, ds, ai) VALUES('$reg','$bnc',$os,$co,$java,$dbms,$ds,$ai)";
        $res1 = mysqli_query($con, $sql1) or die("query failed");
        if ($res1) {
            echo "<script> alert('Successfully registred')</script>";
            header("location:result.php");
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
                <a href="managestudent.php" class="btn mybtn11">Go back</a>
                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <h1>Add Result</h1>
                    <div class="formgroup">
                        <label>Regd.Number</label>
                        <input type="text" name="name" placeholder="Enter Registration Number"><br>
                    </div>
                     <div class="formgroup">
                        <label>Branch</label>
                        <select name="brn">
                            <?php
                            include "include/connection.php";
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
                    <div class="formgroup">
                        <label>Operating system</label>
                        <input type="text" name="os" placeholder=""><br>
                    </div>
                    <div class="formgroup">
                        <label>Computer Organization</label>
                        <input type="text" name="co" ><br>
                    </div>
                      <div class="formgroup">
                        <label>DBMS</label>
                        <input type="text" name="dbms" ><br>
                    </div>
                      <div class="formgroup">
                        <label>JAVA</label>
                        <input type="text" name="java" ><br>
                    </div>
                      <div class="formgroup">
                        <label>Data science</label>
                        <input type="text" name="ds" ><br>
                    </div>
                      <div class="formgroup">
                        <label>AI</label>
                        <input type="text" name="ai" ><br>
                    </div>
                   
                    <input type="submit" name="sub" class="mybtnf" value="ADD">
                </form>
            </div>
        </div>"
    </section>

</body>

</html>