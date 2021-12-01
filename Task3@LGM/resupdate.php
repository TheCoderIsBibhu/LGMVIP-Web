<?php
include "include/connection.php";
if (isset($_POST['sub'])) {
    $reg = $_POST['name'];
    $bnc = $_POST['brn'];
    $os = $_POST['os'];
    $co = $_POST['co'];
    $dbms = $_POST['dbms'];
    $java = $_POST['java'];
    $ds = $_POST['ds'];
    $ai = $_POST['ai'];
    $id1 = $_POST['id'];
     $sql1 = "UPDATE result SET res_reg='{$reg}',res_branch='{$bnc}',os={$os},co={$co},java={$java},dbms=$dbms,ds=$ds,ai=$ai WHERE res_id={$id1}";
    $res1 = mysqli_query($con, $sql1) or die("query failed");
    if ($res1) {
        echo "<script> alert('Successfully registred')</script>";
        header("location:result.php");
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
                    <?php
                    include "include/connection.php";
                    $id = $_GET['sid'];
                    $sup = "SELECT * FROM result left join branch on res_branch=branch.id WHERE res_id ={$id}";

                    $rup = mysqli_query($con, $sup) or die("Query failed");

                    if ($rp = mysqli_num_rows($rup) > 0) {
                        while ($rap = mysqli_fetch_assoc($rup)) {
                    ?>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <div class="formgroup">
                                <label>Regd.Number</label>
                                <input type="text" name="name" value="<?php echo $rap['res_reg'] ?>" placeholder="Enter Registration Number"><br>
                            </div>
                            <div class="formgroup">
                                <label>Branch</label>
                                <select name="brn">
                                    <option value="<?php echo $rap['res_branch'] ?>"><?php echo $rap['class'] ?></option>
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
                                <input type="text" name="os" value="<?php echo $rap['os'] ?>"><br>
                            </div>
                            <div class="formgroup">
                                <label>Computer Organization</label>
                                <input type="text" name="co" value="<?php echo $rap['co'] ?>"><br>
                            </div>
                            <div class="formgroup">
                                <label>DBMS</label>
                                <input type="text" value="<?php echo $rap['dbms'] ?>" name="dbms"><br>
                            </div>
                            <div class="formgroup">
                                <label>JAVA</label>
                                <input type="text" value="<?php echo $rap['java'] ?>" name="java"><br>
                            </div>
                            <div class="formgroup">
                                <label>Data science</label>
                                <input type="text" value="<?php echo $rap['ds'] ?>" name="ds"><br>
                            </div>
                            <div class="formgroup">
                                <label>AI</label>
                                <input type="text" value="<?php echo $rap['ai'] ?>" name="ai"><br>
                            </div>

                            <input type="submit" name="sub" class="mybtnf" value="UPDATE">
                    <?php }
                    } ?>
                </form>
            </div>
        </div>"
    </section>

</body>

</html>