<?php
    include_once 'actions/db.php';
    session_start();
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

  <title>View Vaccine Batch Information</title>
</head>

<body id="VVBIPage">
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
       <!--Current admin's centre is shown after logging in-->
       <text>
        <?php
          $uName = $_SESSION['user_name'];
          $sql = "SELECT * FROM tb_admins WHERE username = '$uName';";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $centre = $row['centre'];
          echo "Healthcare Centre: ".$centre;
              
        ?>         
      </text>
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
          <!--scroll down to list of available vaccine (transition)-->
          <li class="nav-item">
            <a href="recordNewVaccineBatch.php" class="nav-link" role="button">
              Record New Vaccine Batch
            </a>
          </li>

          <li class="nav-item">
            <a href="#footer" class="nav-link transition" role="button">
              Contact Us
            </a>
          </li>

          <!--log out-->
          <li class="nav-item">
            <a href="index.php" class="nav-link" role="button">
              Log Out
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container vvbiBg mt-5">
    <div class="row">
      <div class="col-md-6 text-light fw-light fs-6">
        <div class="d-flex justify-content-center">
          <div class="introTitle text-center">
            <h1 class="text-warning">View All Vaccine Batches</h1>
            <div class="text-dark">
                <h4>You can able to view details of every vaccine batches that you have recorded</h4>
                <p>Other than that, you can able to check its vaccinations just by clicking the "View Vaccinations" button next to it. </p>
                <p>From there, there will be vaccination appointments requested by patients which are pending for you to confirm/reject. </p>
                <p>If the vaccination has been administered, you can confirm it as well</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <!--.img-fluid: make image responsive (max-width: 100%, height: auto)-->
        <img src="../img/patient3.png" alt="patientClipArt" class="img-fluid">
      </div>
    </div>
  </div>

  <!--View vaccine batch information-->
  <form action="actions/viewVaccination.php" method="GET">
      <!--list of available vaccines-->
      <div class="py-5 px-3 text-center">
          <!--shadow behind div with rounded corners-->
          <div class="container listvacBatchBg shadow-lg py-3 px-4 rounded-3">
          <h3>List of Available Vaccine Batches</h3>
          <p>Select a Vaccine Batch To View Its Vaccination</p>
              <div class="row horizontalOverflow">
                  <table>
                      <tr class="bg-white border-1">
                          <th class="p-3">BatchNo</th>
                          <th class="p-3">VaccineName</th>
                          <th class="p-3">Expiry Date</th> 
                          <th class="p-3">Quantity Available</th>   
                          <th class="p-3">Quantity Administered</th>
                          <th class="p-3">Pending Appointments</th>
                      </tr>
                      <?php
                          $sql = "SELECT * FROM tb_batches WHERE centre = '$centre';";
                          $result = mysqli_query($conn, $sql);
                          
                          //if there are rows retrieved from database
                          if(mysqli_num_rows($result)>0){     
                              //while there is still have a row of batches retrieved from database
                              while($row = mysqli_fetch_assoc($result)){
                      ?>
                      <!--display list of batches which are retrieved from database-->
                      <tr class="bg-white border-1">
                          <!--display message stated that there are no vaccine batch in the list-->
                          <p id="message"></p>
                          <!--to store batchNo in value of input radio type-->
                          <td class="px-3">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="bNo" value="<?php echo $row["batchNo"];?>" required>
                                  <label class="form-check-label" for="bNo">
                                      <!--display batchNo-->
                                      <?php echo $row["batchNo"];?>
                                  </label>
                              </div>
                          </td>   
                          
                          <td class="p-3"><?php echo $row["vaccineName"];?></td>
                          <td class="p-3"><?php echo $row["expiryDate"];?></td>
                          <td class="p-3"><?php echo $row["quantityAvailable"];?></td>
                          <td class="p-3"><?php echo $row["quantityAdministered"];?></td>
                          <td class="p-3"><?php echo $row["numberOfPendingAppointments"];?></td>
                      </tr>
                      <?php
                              } //end of while loop
                          } 
                          //if there's no vaccine batches recorded by current admin
                          else{
                      ?>
                      
                      <th colspan="6" class="bg-white border-1 py-5">
                          There are no recorded vaccine batches, please record a new one
                      </th>

                      <?php
                          }
                      ?>
                  </table>
              </div>
              <br>
              <button type="submit" name="submit" class="btn btn-primary">View Vaccination</button>
          </div>
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



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>

  <!--javascript-->
  <script src="../assets/javascript/main.js"></script>

  <script>
    //show healthcare centre name after admin logs in
    document.getElementById('callCentreName').innerHTML = "Healthcare Centre: " + currentAdmin.healthcareCentre.centreName;
  </script>
</body>

</html>