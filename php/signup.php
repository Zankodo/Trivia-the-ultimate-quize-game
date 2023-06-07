<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = ($_POST["first_name"]);
    $last_name = ($_POST["last_name"]);
    $email = ($_POST["email"]);
    $password = ($_POST["password"]);

    
    if(empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        echo "All fields are required";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } else {

        $servername = "localhost";
        $username = "root";
        $db_password = "";
        $dbname = "users";

        $conn = new mysqli($servername, $username, $db_password, $dbname);
        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM acounts WHERE email = '$email'";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            echo "User already exists";
        } else {
            $sql = "INSERT INTO acounts (first_name, last_name, email, passwords) VALUES ('$first_name', '$last_name', '$email', '$password')";

            if($conn->query($sql) === TRUE) {
                header("Location: http://localhost/livescore/sign/signin.html");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }
}


?>
