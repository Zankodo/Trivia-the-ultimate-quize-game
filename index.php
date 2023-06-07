<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Trivia - The Ultimate Quiz Game</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body{
        background-color : beige;
    }
    select{
        padding: auto;
    }
  </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Trivia</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" id="signin" href="sign/signin.html">Sign in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ranking/index.php">Leaderboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="signup" href="sign/signup.html">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myacount/my.php">My account</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <main>
    <section class="container my-5" style="height: 400px;background: rgb(194, 194, 146);">
       
        <div class="row mt-5">
            
            
          <div class="col-md-12 text-center my-4">
            <h1>Let's Get Started</h1>
            <h2>Ready to Put Your Knowledge to the Test?</h2>
            <h4>to statr select a categorie and a level <br> and click Get started</h4>
            <div class=" container text-center mt-4 " >
                <div class="d-flex justify-content-center my-5">
            <div class="d-flex justify-content-evenly ">
            <select class="form-select mx5 ms-4" id="categorie" onchange="selectc()" aria-label="Default select example">
                <option value="any">Any Category</option>
                <option value="9">General Knowledge</option><option value="10">Entertainment: Books</option><option value="11">Entertainment: Film</option><option value="12">Entertainment: Music</option><option value="13">Entertainment: Musicals &amp; Theatres</option><option value="14">Entertainment: Television</option><option value="15">Entertainment: Video Games</option><option value="16">Entertainment: Board Games</option><option value="17">Science &amp; Nature</option><option value="18">Science: Computers</option><option value="19">Science: Mathematics</option><option value="20">Mythology</option><option value="21">Sports</option><option value="22">Geography</option><option value="23">History</option><option value="24">Politics</option><option value="25">Art</option><option value="26">Celebrities</option><option value="27">Animals</option><option value="28">Vehicles</option><option value="29">Entertainment: Comics</option><option value="30">Science: Gadgets</option><option value="31">Entertainment: Japanese Anime &amp; Manga</option><option value="32">Entertainment: Cartoon &amp; Animations</option>
              </select>
              <select class="form-select mx-5" id="level" style="width : 315.33px;" onchange="selectl()">
                <option value="easy" selected>Select the level</option>
                <option value="easy">Easy</option>
                <option value="medium">Medieum</option>
                <option value="hard">Hard</option>
              </select></div></div></div>
            <button class="btn btn-dark my-3" onclick="checkScoreCookie()">Get Started</button>
          </div></div></section>
    <section class="container my-5">
      <div class="row">
        <div class="col-md-6">
          <h1>Trivia - The Ultimate Quiz Game</h1>
          <p class="lead">Test Your Knowledge, Challenge Your Friends!</p>
          <p>Welcome to Trivia - the ultimate quiz game where you can put your knowledge to the test and challenge your friends to see who's the smartest. With a wide range of categories and levels, you'll never run out of challenging questions to answer.</p>
        </div>
        <div class="col-md-6">
          <img src="img/Screenshot 2023-05-01 160424.png" class="img-fluid" alt="Trivia Screenshot">
        </div>
      </div>
    </section>
  
    <section class="container my-5">
      <div class="row">
        <div class="col-md-6">
          <h2>Features</h2>
          <ul>
            <li>Choose from a variety of categories, including history, science, literature, and more.</li>
            <li>Select your preferred level of difficulty to match your skill level.</li>
            <li>Track your progress and see how you stack up against other players on the leaderboard.</li>
            <li>Earn badges and rewards for completing challenges and reaching milestones.</li>
            <li>Enjoy a sleek and user-friendly interface that makes playing Trivia a breeze.</li>
          </ul>
        </div>
        <div class="col-md-6">
          <img src="img/Screenshot 2023-05-01 160411.png" class="img-fluid" alt="Trivia Screenshot">
        </div>
      </div>
    </section>

    </main>
    <footer class="  bg-dark text-white mt-5">
    <div class="container">
        <div class="row mt-5">
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
    <script>
      function cokie(){
    if(document.cookie == ''){
        window.location.href = "http://localhost/livescore/sign/signup.html";
    }else{
        window.location.href = "http://localhost/livescore/trivia/index.html"; 
    }
}
function checkScoreCookie() {
  let score = getCookie("score");
  if (score != "") {
    console.log("The score cookie  " + score);
    window.location.href = "http://localhost/livescore/trivia/index.html"; 
  } else {
    console.log("The score cookie does not exist");
    window.location.href = "http://localhost/livescore/sign/signup.html";
  }
}
function getCookie(name) {
  let cookieName = name + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let cookieArray = decodedCookie.split(';');
  for (let i = 0; i < cookieArray.length; i++) {
    let cookie = cookieArray[i];
    while (cookie.charAt(0) == ' ') {
      cookie = cookie.substring(1);
    }
    if (cookie.indexOf(cookieName) == 0) {
      return cookie.substring(cookieName.length, cookie.length);
    }
  }
  return "";
}
let score = getCookie("score");
if(score != ""){
   document.querySelector('#signin').style.display="none";
   document.querySelector('#signup').style.display="none";
}

  console.log("teste");

    </script>
    <script src="trivia/js/script2.js"></script>
    <?php
    if(isset($_COOKIE["score"])) {
      $servername = "localhost";
$username = "root";
$db_password = "";
$dbname = "users";
$score = $_COOKIE["score"];
$id=$_COOKIE["id"];
$conn = new mysqli($servername, $username, $db_password, $dbname);
$sql = "UPDATE acounts
SET score = $score
WHERE user_id = $id;";
$result = $conn->query($sql);


    }
    
    ?>
</body>
</html>
