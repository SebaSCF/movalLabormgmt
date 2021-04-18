<?php
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="css/style.css" media="all" rel="stylesheet" type="text/css"/>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
      body{
        background-image: radial-gradient( circle 993px at 0.5% 50.5%,  rgba(137,171,245,0.37) 0%, rgba(245,247,252,1) 100.2% );
        font-family: 'Rubik', sans-serif;
      }
      </style>
</head>
<body>
<script type="text/javascript">

  function checkForm(form)
  {
    if(form.FirstName.value == "") {
      alert("Error: Username cannot be blank!");
      form.FirstName.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.FirstName.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.FirstName.focus();
      return false;
    }

    if(form.psword.value != "" && form.psword.value == form.psword2.value) {
      if(form.psword.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.psword.focus();
        return false;
      }
      if(form.psword.value == form.FirstName.value) {
        alert("Error: Password must be different from Username!");
        form.psword.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.psword.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.psword.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.psword.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.psword.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.psword.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.psword.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.psword.focus();
      return false;
    }
    return true;
  }

</script>

<section class="Register">
            <div class="container">
                    <div class="Registration text-center w-100">
                    <h1 class="titleOne pt-3 pb-3">Sign Up Portal</h1>

                    <form action="signup.php" name="Signup" method="POST" onsubmit="return checkForm(this)">

                        <br />
                            <input type="text" class="form-control" id="formGroupExampleInput" name="FirstName" placeholder="Name" />
                            <br />
                            <input type="text"  class="form-control" id="formGroupExampleInput" name="LastName" placeholder="Last Name" />
                            <br />
                            <input type="text" class="form-control" id="formGroupExampleInput" name="Username"  placeholder="Username" />
                            <br />
                            <input type="password" class="form-control" id="formGroupExampleInput2" name="psword" placeholder="Password" />
                            <br />
                            <input type="email"  class="form-control" id="formGroupExampleInput" name="email"  placeholder="Email Address" />
                            <br />

                            <div class="registerMsg">
<?php
if(isset($_POST['Submit_Reg'])){
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $username = $_POST['Username'];
    $psword = $_POST['psword'];
    $email = $_POST['email'];


    $Insdata = "INSERT INTO users(FirstName, LastName, Username, psword, email) VALUES('$FirstName', '$LastName', '$username', '$psword','$email')";
    $execte = mysqli_query($conn, $Insdata);

echo $FirstName . " was successfully registered in the system. ";

}
?>
</div>
</br>
                        <button type="submit" name="Submit_Reg" value="Sign Up" class="btn btn-primary bg-dark w-100">Register</button>
                    </form>
                  </div>
            </div>
        </section>
        <br />
        <div class="text-center">
          <a href="index.php" class="text-decoration-none" >Go back to Login</a>
        </div>

</body>
</html>