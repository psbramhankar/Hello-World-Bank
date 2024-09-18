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
?>

<div id="newform">
<form action="./newaccount.php" method="POST">
<div class="mb-3">
    <label for="exampleInputname" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="exampleInputname" placeholder="Enter your Name here" name="name" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter your email here" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputacnumber" class="form-label">Account Balance</label>
    <input type="number" class="form-control" id="exampleInputacnumber" name="acc" max="9999999999" placeholder="Enter balance you want in account" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">By clicking this you agree to our terms & services.</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $acc = $_POST['acc'];

    $sql = "INSERT IGNORE INTO `data` (`name`, `email`, `acno`) VALUES ('$name', '$email', '$acc');";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account has been created successfully!
          </div>';
          }
          else{
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          </div>';
          }
}
?>

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"></script>
</body>

</html>