<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.html">Ineffable Bank</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Cus_List.php">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="transactions.php">Transactions</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
// Connecting database
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbparas";

// creating connection 
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection not successful 
if(!$conn){
    die("Failed to connect, contact Bank for furthur assistance");
}
?>