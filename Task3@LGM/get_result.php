<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/result.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Result</title>
</head>

<body id="result1">
  <div class="container">
    <div class="result-card">
      <div class="overlay">
        <nav>
          <div class="nav-logo">
            <img src="pic/book.png" alt="">
          </div>
        </nav>
        <h1>final results academic year 2021-2022 </h1>
        <div class="student-detail">
          <?php
          include "include/connection.php";
          $reg = $_POST['reg'];
          $sqd = "SELECT * FROM student LEFT JOIN branch ON student.st_branch=branch.id WHERE st_reg='{$reg}'";
          $red = mysqli_query($con, $sqd) or die("query failed");
          if (mysqli_num_rows($red) > 0) {
            while ($rowd = mysqli_fetch_assoc($red)) {
          ?>
              <div class="detail">
                <h2>name :</h2>
                <p><?php echo $rowd['st_name'] ?></p>
              </div>
              <div class="detail">
                <h2>registration number :</h2>
                <p><?php echo $rowd['st_reg'] ?></p>
              </div>
              <div class="detail">
                <h2>email :</h2>
                <p style="text-transform: lowercase;"><?php echo $rowd['st_email'] ?></p>
              </div>
              <div class="detail">
                <h2>branch :</h2>
                <p><?php echo $rowd['class'] ?></p>
              </div>
          <?php }
          } ?>
        </div>
        <div class="result-box">
          <h2>score card </h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>OS</tyh>
                <th>CO&A</th>
                <th>DBMS</th>
                <th>java</th>
                <th>data science</th>
                <th>ai</th>
                <th>total</th>
                <th>percentage</th>
                <th>grade</th>
                <th>result</th>
                <!-- <th scope="col">OS</th>
                        <th scope="col">CO</th>
                        <th scope="col">DBMS</th>
                        <th scope="col">java</th>
                        <th scope="col">data science</th>
                        <th scope="col">ai</th>
                        <th scope="col">total</th>
                        <th scope="col">percentage</th>
                        <th scope="col">grade</th>
                        <th scope="col">result</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              // include "include/connection.php";
              $sq = "SELECT res_id,res_reg,os,co,java,dbms,ds,ai,(os+co+java+dbms+ds+ai)as total,((os+co+java+dbms+ds+ai)/(600) *100) as per FROM result WHERE res_reg='{$reg}'";
              $res = mysqli_query($con, $sq) or die("query failed");
              if (mysqli_num_rows($res) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($res)) {
              ?>
                  <tr>
                    <td><?php echo $row['os'] ?></td>
                    <td><?php echo $row['co'] ?></td>
                    <td><?php echo $row['java'] ?></td>
                    <td><?php echo $row['dbms'] ?></td>
                    <td><?php echo $row['ds'] ?></td>
                    <td><?php echo $row['ai'] ?></td>
                    <td><?php echo $row['total'] ?></td>
                    <td><?php echo $row['per'], '%' ?></td>
                    <td style="text-transform: uppercase;"><?php
                                                            $grade = '';
                                                            if ($row['per'] >= 90)
                                                              $grade = 'o';
                                                            if ($row['per'] >= 80 and $row['per'] < 90)
                                                              $grade = 'e';
                                                            if ($row['per'] >= 70 and $row['per'] < 80)
                                                              $grade = 'b+';
                                                            if ($row['per'] >= 60 and $row['per'] < 70)
                                                              $grade = 'b';
                                                            if ($row['per'] >= 50 and $row['per'] < 60)
                                                              $grade = 'c';
                                                            if ($row['per'] >= 35 and $row['per'] < 50)
                                                              $grade = 'd';
                                                            if ($row['per'] < 35)
                                                              $grade = 'f';
                                                            echo $grade;
                                                            ?>
                    </td>
                    <td>
                      <?php
                      $result = '';
                      if ($row['per'] > 35) {
                        $result = 'pass';
                      } else {
                        $result = 'fail';
                      }
                      echo $result;
                      ?></td>
                 <?php }
              } ?> 
                  </tr>
            </tbody>
          </table>
          <div class="cong">
            <h1 class="text-center" style="font-size: 2rem;font-weight:500"><?php if ($grade>35) {
                                                                              echo "Congratulation You are pass";
                                                                            } else {
                                                                              echo "sorry you  are failed";
                                                                            } ?></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>