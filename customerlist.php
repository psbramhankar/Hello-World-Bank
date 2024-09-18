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
echo "<br>";
    $sql = "SELECT * FROM `data`";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $count = 1;
    echo "<table class='table'>
  <thead>
    <tr>
      <th scope='col'>Sr No.</th>
      <th scope='col'>Name</th>
      <th scope='col'>Email</th>
      <th scope='col'>Balance</th>
    </tr>
  </thead>
  <tbody>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr> <th scope='row'>". $count .  "</th> <th scope='col'>". $row['name'] ."</th> <th scope='col'>". $row['email']."</th> <th scope='col'>". $row['acno'];
        $count = $count + 1;
        }
    
    ?>
  </tbody>
</table>
                    <div class="card-body" style='text-align: center;'>
                        <a href="./transfer.php" class="btn btn-primary">Transfer Money</a>
                    </div>
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"></script>
</body>

</html>