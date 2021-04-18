<?php
 session_start();
    require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="css/style.css" media="all" rel="stylesheet" type="text/css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <title>Home</title>
    <style>
      .sideMenu{
  flex: 1 !important;
}


.TitleOne{
    font-size: 30px !important;
    margin-left: 10px;
  }

.LogOut{
  font-size: 20px;
  font-weight: 700 !important;
  text-decoration: none;
  color: black !important;
}
.sideDashboard{
  flex: 3 !important;
}

.table td {
    word-wrap: break-word !important;
}
 body{
        background-image: radial-gradient( circle 993px at 0.5% 50.5%,  rgba(137,171,245,0.37) 0%, rgba(245,247,252,1) 100.2% );
        font-family: 'Rubik', sans-serif;
      }


      @media (max-width: 576px) {
    .flex-xs-column {
     flex-direction: column !important;
    }

  }

  .registerMsg{
    padding-left: 20px;
  }


  .form-control{
    -webkit-box-shadow: 0px 0px 0px 0px rgb(0 0 0 / 25%) !important;
    box-shadow: 0px 0px 0px 0px rgb(0 0 0 / 25%) !important;
  }
      </style>
</head>
<body>
<section class="Dashboard">
<div class="container-fluid">
  <div class="d-flex flex-xs-column flex-sm-column flex-md-column flex-lg-row justify-content-center align-items-center text-center">
  <!--Logo Side Menu-->
    <div class="sideMenu bg-light shadow-sm mr-lg-4 p-4">
       <div class="text-center">
         <img width="40%" src="img/Collegiate Vertical Purple.png" alt="Logo" /></>
           <hr />
         <i class="fas mr-1 align-self-center fa-sign-out-alt"></i><a class='LogOut' href='index.php'>Log Out</a>
        </div>
    </div>
     <!--Dashboard-->
    <div class="sideDashboard w-100 text-left">
       <h2 class="p-4 bold bg-light shadow-sm">Records</h2>
      <div class="form-group p-1 bg-light shadow-sm">
         <button class="btn m-2 shadow-sm btn-light" value="Show DIV" onclick="ShowAdd(this)">Add</button>
         <button class="btn m-2 shadow-sm btn-danger" value="Show DIV" onclick="ShowDelete(this)"  >Delete</button>
         <!--Add-->
           <div class="text-left p-4"  style="display:none;" id="Add">
                    <h4 class="bold800">Add:</h4>
                            <hr />
                            <p class="bold">Input the following data to Add Records:</p>
                            <form action="home.php" name="Add" method="POST" class="g-3">
                                <div class="form-group pr-5 pl-5">
                                <input type="text" name="LName" class="form-control" id="formGroupExampleInput2" placeholder="Full Name" />
                                </div>
                                <div class="form-group pr-5 pl-5">
                                <input type="text" name="Job" class="form-control" id="formGroupExampleInput2" placeholder="Job" />
                                </div>
                                <div class="form-group pr-5 pl-5">
                                <input type="text" name="Project" class="form-control" id="formGroupExampleInput2" placeholder="Project" />
                                </div>
<?php
    if(isset($_POST['Add'])){
   $FirstName = $_POST['LName'];
   $LastName = $_POST['LName'];
   $Job = $_POST['Job'];
   $Project = $_POST['Project'];

   $Insdata = "INSERT INTO records(FName, LName, Job, Project) VALUES('$FirstName','$LastName', '$Job', '$Project')";
   $execte = mysqli_query($conn, $Insdata);
}
?>
                                <button type="submit" value="Add" class="btn btn-primary bg-dark w-100" name="Add">Add</button>
                            </form>

            </div>
            <!--Delete-->
<div class="text-left p-4"  style="display:none;" id="Delete">
                    <h4 class="bold800">Delete:</h4>

                            <hr />
                            <p class="bold800">Type Name to Delete Record:</p>
                            <form action="home.php" name="Add" method="POST" class="g-3">
                                <div class="form-group pr-5 pl-5">
                                <input type="text" name="LName" class="form-control" id="formGroupExampleInput2" placeholder="Full Name" />
                                </div>
                              <?php
                               if(isset($_POST['Delete'])){
                                 $Lname = $_POST['LName'];

                                 $delData = "DELETE FROM records WHERE LName= '$Lname'";
                                 $execte = mysqli_query($conn,$delData);
                               }

                              ?>

                              <button type="submit" value="Delete" class="btn btn-danger w-100" name="Delete">Delete</button>
                            </form>
                        </div>
                            <hr />
            <div class="table-responsive bg-light shadow-sm">
              <table class="table text-break table-borderless">

       <?php
          $query ="SELECT * FROM records";
       ?>
                          <thead>
                            <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Job</th>
                              <th scope="col">Project</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            if($result = mysqli_query($conn, $query)){
                              if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                          ?>
                            <tr>
                              <td><?php echo  $row['LName'];?></td>
                              <td><?php echo  $row['Job'];?></td>
                              <td><?php echo  $row['Project'];?></td>
                            </tr>
                            <?php
                                }
                             }
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                        </div>
                    </div>
                </div>
  </div>
</div>
</section>

<div>

</div>

<!-- Toggler -->
<script>
function ShowAdd(ele) {
  var cont = document.getElementById('Add');

        if (cont.style.display == 'block') {
            cont.style.display = 'none';

            document.getElementById(ele.id).value = 'Show DIV';

        }
        else {
            cont.style.display = 'block';
            document.getElementById(ele.id).value = 'Hide DIV';

        }

    }

    function ShowDelete(ele){
      var cont = document.getElementById('Delete');

  if (cont.style.display == 'block') {
      cont.style.display = 'none';

      document.getElementById(ele.id).value = 'Show DIV';

  }
  else {
      cont.style.display = 'block';
      document.getElementById(ele.id).value = 'Hide DIV';

  }
    }
</script>

</body>
</html>