<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/result.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body id="result">
    <div class="container">
        <div class="result-card">
            <div class="overlay">
                <nav>
                    <div class="nav-logo">
                        <img src="./pic/xm.png" alt="">
                    </div>
                </nav>
          <h1>View_Result</h1>
                <form action="get_result.php" method="post">
                    <div class="formbox">
                        <input type="text" name="reg" placeholder="registration number">
                        <input type="submit" style=" margin:30px; text-align:center;" class="viewbtn" value="view" name="sub">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>