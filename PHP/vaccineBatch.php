<?php
  session_start();
  include_once 'actions/db.php';
  $id = 0;
  
  $type = isset($_GET['type']) && !empty($_GET['type']) ? $_GET['type'] : '';
  $vaccineID = isset($_GET['vaccineID']) && !empty($_GET['vaccineID']) ? $_GET['vaccineID'] : '';
  $date = isset($_GET['date']) && !empty($_GET['date']) ? $_GET['date'] : '';
  
  if($type){
    $query = "INSERT INTO `tb_vaccinations`(`status`, `appointmentDate`, `vaccineID`) VALUE ('pending', '$date', '$vaccineID');";
    $result = mysqli_query($conn, $query);
    $id = $conn->insert_id;
  }
  $idText = $id > 0 ? "?id=$id" : "";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    
    <title>Vaccines Batch</title>

    
    
  </head>
  <body id="RNVBPage">

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
            <!--go to footer of the webpage (contact us)-->
            <li class="nav-item">
              <a href="#footer" class="nav-link transition" role="button">
                Contact Us
              </a>
            </li>

            <!--log out-->
            <li class="nav-item">
              <a href="index.php" class="nav-link transition" role="button">
                Log Out
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

    <br><br>
    <br><br>

    <form action="actions/reqAppoint.php" method="GET">
    <section class="ftco-section" id="body">
        <div class="container1">
          <div style="overflow-x:auto;">
          <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
              <h2 class="heading-section">Vaccines Batch </h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4 class="text-center mb-4">Request Vaccine Appointment</h4>
              <br><br>
              <div class="table-wrap">
                <table class="table">
                  <thead class="thead-primary">
                    <tr>
                      <th>Batch</th>
                      <th>Expiry Date</th>
                      <th>Available Quantity</th>
                      <th>Request Appointment </th>
                      
                    </tr>
                  </thead>
                  
                  <?php
                    if (isset($_GET['submit'])){
                      $date = $_GET['date'];
                      $_SESSION['date'] = $date;
                      $centre= $_GET['Healthcare'];
                      $sql = "SELECT * FROM tb_batches WHERE centre = '$centre' AND vaccineName = 'Pfizer';";
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
                      <td class="p-3"><?php echo $row["expiryDate"];?></td>
                      <td class="p-3"><?php echo $row["quantityAvailable"];?></td>
                      <td><button type="submit" name="submit" class="btn btn-primary">Request appointment</button></td>
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
                    }
                  ?>
                  
                </table>
              </div>
            </div>
            </div>
          </div>
        </div>
      </section>
      </form>
      <br><br>

      <hr>






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

<script src="../assets/javascript//main.js"></script>


    

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
     
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>