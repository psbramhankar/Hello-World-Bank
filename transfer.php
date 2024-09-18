<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Ineffable Bank</title>
</head>

<body>

    <?php
include 'navbar.php';

echo "<div class='container'>";

$sql = "SELECT * FROM `data`";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo "<br> <br> <form action='transfer.php' method='POST' style='text-align: center;'>
    <label for='sender'>Choose sender:</label>
    <select id='name' name='sname' required> <option value='' selected disabled hidden>
    Select an Option
</option>";
    while($row = mysqli_fetch_assoc($result)){
      echo"<option value='". $row['name'] ."'>". $row['name'] ."</option>";
    }
    echo "</select>";

    $sql = "SELECT * FROM `data`";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo "<br> <br> <label for='reciever' style='margin-left: 20px;'>Choose reciever:</label>
    <select id='name' name='rname' required> <option value='' selected disabled hidden>
    Select an Option
</option>";
    while($row = mysqli_fetch_assoc($result)){
      echo"<option value='". $row['name'] ."'>". $row['name'] ."</option>";
    }
    echo "</select>";

    echo " <br> <br><input type='number' name='amount'>";

    echo " <br> <br> <input type='submit' name='submit'>
  </form>";
  ?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  // sname and rname are just sender name and reciever name 
    $sname = $_POST['sname'];
    $rname = $_POST['rname'];
    $amount = $_POST['amount'];

    $sqls = "SELECT * FROM `data` WHERE `name` LIKE '$sname'";
    $result = mysqli_query($conn, $sqls);
    $row = mysqli_fetch_array($result);
    $sbalance =  $row['acno'];
    $sbalance = $sbalance - $amount;
    $sqls = "UPDATE `data` SET `acno` = '$sbalance' WHERE `name` LIKE '$sname'"; 
    $result = mysqli_query($conn, $sqls);

    $sqlr = "SELECT * FROM `data` WHERE `name` LIKE '$rname'";
    $result = mysqli_query($conn, $sqlr);
    $row = mysqli_fetch_array($result);
    $rbalance =  $row['acno'];
    $rbalance = $rbalance + $amount;
    $sqlr = "UPDATE `data` SET `acno` = '$rbalance' WHERE `name` LIKE '$rname'"; 
    $result = mysqli_query($conn, $sqlr);

    $sql = "INSERT INTO `transaction` (`sname`, `rname`, `amount`) VALUES ('$sname', '$rname', '$amount');";
    $result = mysqli_query($conn, $sql);

    if($result){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your transaction is successful!
          </div>';

    }


}
?>
</div>
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"></script>
</body>

</html>