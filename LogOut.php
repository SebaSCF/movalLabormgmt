<?php
     include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Out</title>

</head>
<body>
<?php
session_start();
session_unset();
session_destroy();
header('Location.signin.php');
?>

</body>
</html>