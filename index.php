

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="css/style.css" media="all" rel="stylesheet" type="text/css"/>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
      body{
        background-image: radial-gradient( circle 993px at 0.5% 50.5%,  rgba(137,171,245,0.37) 0%, rgba(245,247,252,1) 100.2% );
        font-family: 'Rubik', sans-serif;
      }
      }



    @media (max-width: 320px) {
    .flex-xs-column {
     flex-direction: column !important;
    }
    }
  }
      </style>
</head>
<body>

<script>
        function validate() {
            var name = document.forms["Signin"]["Username"];
            var psword = document.forms["Signin"]["psword"];


            if (name.value == "") {
                window.alert("Please enter your Username.");
                name.focus();
                return false;
            }  if (psword.value == "") {
                window.alert("Please enter a valid password.");
                psword.focus();
                return false;

            }

            return true;

        }
    </script>
 <section class="Login">
            <div class="container">
                <div class=" flex-xs-column flex-sm-column flex-md-column flex-lg-row justify-content-center align-items-center text-center">
                        <div class="sideLogoOne pt-5 pb-5">
                            <div class="text-center">
                            <img width="10%" src="img/Collegiate Vertical Purple.png" alt="Logo"/>
                            </div>
                        </div>

                        <div class="sideLogoTwo bg-light shadow-sm w-100 text-center">
                        <form action="auth.php" name="Signin" method="POST" onsubmit="return validate()" class="g-3">
                            <h1 class="pt-3 pb-3">Welcome!</h1>
                            <p class="pb-2">LOGIN WITH USERNAME</p>
                            <form>
                              <div class="form-group w-100">
                                <input type="text" name="Username" class="form-control" id="formGroupExampleInput" placeholder="Username" />
                              </div>
                                <br />
                              <div class="form-group">
                                <input type="password" name="psword" class="form-control" id="formGroupExampleInput2" placeholder="Password" />
                                </div>
                                <br />

                                <button type="submit" class="btn btn-primary bg-dark w-100  " name="Submit">Log In</button>
                            </form>
                            <br />
                            <hr />

                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>