<?php
if(!isset($_COOKIE["score"])){
    header("Location: http://localhost/livescore/sign/signin.html");
    exit();
}

$servername = "localhost";
$username = "root";
$db_password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_COOKIE["email"];
$sql = "SELECT * FROM acounts WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $name = $row['first_name'];
    $last_name= $row['last_name'];
    $score = $row['score'];
} else {
    die("Error retrieving user information.");
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: beige;
        }
        .container {
            max-width: 800px;
            margin: auto;
            text-align: center;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
        }
        h1 {
            margin-top: 0;
        }
        .btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
      <a class="navbar-brand" href="../index.php">Trivia</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../sign/signin.html">Sign in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../ranking/index.php">Leaderboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../sign/signup.html">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../myacount/my.php">My account</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
    <div class="container mt-5">
        <div class="card">
            <h1>My Account</h1>
            <p>Welcome back, <?php echo $name." ".$last_name; ?>!</p>
            <p>Your email address is <?php echo $email; ?>.</p>
            <p>Your current score is <?php echo $score; ?>.</p>
            <a href="?logout=true" class="btn btn-danger">Log Out</a>
        </div>
    </div>
    <footer class=" fixed-bottom bg-dark text-white mt-5">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <h5>About Us</h5>
                <p>.</p>
            </div>
            <div class="col-md-6">
                <h5>Contact Us</h5>
                <ul>
                    <li>Email: info@example.com</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <hr class="bg-white">
                <p>&copy; 2023 My Account. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
</body>

</html>
<?php 
if (isset($_GET['logout'])) {
    unset($_COOKIE['email']);
    setcookie('email', '', time() - 3600, '/');
    unset($_COOKIE['score']);
    setcookie("score", "", time() - 3600,'/');
    unset($_COOKIE['password']);
    setcookie("password", "", time() - 3600,'/');
    unset($_COOKIE['id']);
    setcookie("id", "", time() - 3600,'/');
    header("Location: http://localhost/livescore/index.php ");
    exit();
}
?>
