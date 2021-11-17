<?php
    include_once 'actions/db.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <!-- Stylesheet CSS -->
  <link rel="stylesheet" href="../style.css">

  <title>Administrator SignUp</title>

  <style>
    body {
      background-image: url('img/top-bg.png');
      background-color: aliceblue;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
    } 
  </style>
</head>

<body>
  <!--
      Navigation bar
      navbar-expand-sm is to see all the nav-items before the nav bar collapses
      fixed-top: to make nav bar staying on top of the page when scrolling up or down
    -->
  <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
    <!--to contain contents in the container in the nav bar-->
    <div class="container">
      <!--Put title and image of the website-->
      <a href="#" class="navbar-brand mb-0 h1">
        <img src="../img/vaccinationIcon.png" width="45" height="auto" alt="PCVSIcon">
        PCVS
      </a>

      <!--
          To toggle the navigation bar
          data-toggle: class that will be applying toggle to 
          data-target: target will be that ID created in div tag below
          add accessible tags: aria-controls, expanded, label
        -->
      <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler">
        <!--Add icon for the toggle button-->
        <span class="navbar-toggler-icon"></span>

      </button>
      <!--to ensure that this tag to have responsive design to make nav bar function properly-->
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="signUp.php" class="nav-link">
              Sign Up As Patient
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php" class="nav-link">
              Login
            </a>
          </li>
        </ul>
      </div>

      <!--Create search bar-->
      <!--
            form-control: create some of the stylings for the input
          
          <form action="#" class="d-flex">
            <input type="text" class="form-control me-2" name="search">
            <button type="submit" class="btn btn-outline-success">
              Search
            </button>
          </form>
        -->
    </div>
  </nav>

  <br><br><br>

  <form method="POST" class="form py-5"  action="actions/signupcheck_admin.php">   
    <div class="container">
      <h1>Adminstrator's Sign Up</h1>
      <hr>
      <p>Select a Healthcare Centre</p>    
      <select name="centre" required>
        <?php
          $sql = "Select * from tb_healthcarecentres;";
          $result = mysqli_query($conn, $sql);
          
          //if there are rows retrieved from database
          if(mysqli_num_rows($result)>0){
            //while there is still have a row of healthcare centres retrieved from database
            while($row = mysqli_fetch_assoc($result)){
        ?>

        <!--display healthcare centres which are retrieved from database-->
        <option><?php echo $row["centreName"];?></option>      
        <?php
              } //end of while loop
          }  
        ?>
      </select>
      <div class="form-group mt-3">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter username" required>
      </div>

      <div class="form-group mt-3">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>

      <div class="form-group mt-3">
        <label for="name">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
      </div>

      <div class="form-group mt-3">
        <label for="full name">Full Name</label>
        <input type="text" name="fullname" class="form-control" placeholder="Enter fullname" required>
      </div>

      <div class="form-group mt-3">
        <label for="full name">StaffID</label>
        <input type="text" name="staffID" class="form-control" placeholder="Enter staffID" required>
      </div>

      <button type="submit" class="btn btn-danger mt-4" name="submit">Sign up</button>
    </div>  
  </form>




  <!-- ======= Footer ======= -->
  <footer id="footer" class="section-bg">
  <div class="footer-top">
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-6">

          <div class="footer-info">
            <img src="../img/vaccinationIcon.png" width="45" height="auto" alt="PCVSIcon">
            <h3>PCVS</h3>
            <p>There are many Covid-19 test centres that have been set up to manage Covid-19 testing. Private Covid
              Vaccination System will help allowing the health ministry to keep
              track of vaccinations that have been administered by healthcare administrators in different healthcare
              centres.
            </p>
          </div>


        </div>

        <div class="col-sm-6">


          <h4>Contact Us</h4>
          <p>
            <strong>Address : </strong>No. 15, Jalan Sri Semantan 1, Off, Jalan Semantan<br>
            Bukit Damansara, 50490<br>
            Kuala Lumpur<br>
            <strong>Phone : </strong>012-123-4567<br>
            <strong>Email : </strong>PCVS@gmail.com<br>
          </p>


        </div>

      </div>

    </div>

  </div>

  </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>CTIS</strong>. All Rights Reserved
    </div>
  </div>
  </footer><!-- End  Footer -->

<!-- Javascript -->

  <script src="assets/javascript//main.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
  crossorigin="anonymous"></script>

  <!--javascript-->
  <script src="assets/javascript/main.js"></script>
</body>

</html>