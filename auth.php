

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
</head>
<body>
<?php
     include 'config.php';
        session_start();
        $username = $_POST['Username'];
        $psword = $_POST['psword'];

        $username = stripcslashes($username);
        $psword = stripcslashes($psword);
        $username = mysqli_real_escape_string($conn, $username);
        $psword = mysqli_real_escape_string($conn, $psword);

        $query = "SELECT * FROM users WHERE Username = '$username' and psword = '$psword' ";
        $cons = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($cons, MYSQLI_ASSOC);
        $count = mysqli_num_rows($cons);

        if($count == 1){
          session_start();

            $_SESSION['Username'] = $username;
            header("location:home.php");
            echo "<a href='home.php'>Go back to Home</a>";
        }
        else{
            echo "<h1> Login failed. Invalid username or password.</h1>";
            echo "<a href='index.php'>Go back to Login Page</a>";
        }

    ?>

