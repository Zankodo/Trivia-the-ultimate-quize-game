
<?php 
$servername = "localhost";
$username = "root";
$db_password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $db_password, $dbname);
$sql = "SELECT * FROM acounts ORDER BY score DESC";
    $result = mysqli_query($conn,$sql);
    
?> 
<!DOCTYPE html> 
<html> 
	<head> 
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<title> Trivia </title><style>
         body{
        background-color : beige;
    }
      table{
        background-color : white;
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
            <a class="nav-link" href="#">Leaderboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../myacount/my.php">My Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../sign/signup.html">Sign Up</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
	<div class="container mt-5">
	<h1 class="mb-3 text-center">Player Rankings</h1>
	<table class="table table-striped"> 
			  <th scope="col"> Rank </th> 
			  <th scope="col"> First Name </th> 
			  <th scope="col"> Last Email </th> 
			  <th scope="col"> Email </th> 
			  <th scope="col"> Score </th> 
		</tr> 
		
		<?php $i=1;
        while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?> 
		<tr> <td><?php echo $i ?></td> 
		<td><?php echo $rows['first_name']; ?></td> 
		<td><?php echo $rows['last_name']; ?></td> 
		<td><?php echo $rows['email']; ?></td> 
        <td><?php echo $rows['score']; ?></td> 
		</tr> 
       
	<?php 
         $i=$i+1;       } 
          ?> 

	</table> 
            </div></div>
	</body> 
	</html>