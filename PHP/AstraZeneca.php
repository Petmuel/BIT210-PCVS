<?php
    include_once 'actions/db.php';
    session_start();
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
    
    
    <title>AstraZeneca</title>

    
    
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
            
            <!--request vaccination appointment page-->
            <li class="nav-item">
              <a href="requestVaccinationAppointment.php" class="nav-link transition" role="button">
                Request Vaccination Appointment
              </a>
            </li>
            
            <!--log Out-->
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

    <form action="vaccineBatch.php" method="GET">
    <input type="hidden" name="type" value="AstraZeneca" /> 
    <input type="hidden" name="vaccineID" value="3" />
    <section class="ftco-section" id="body">
        <div class="container1">
          <div style="overflow-x:auto;">
          <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
              <h2 class="heading-section">Vaccination Appointment </h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4 class="text-center mb-4">AstraZeneca Vaccine </h4>
              <br><br>
              <div class="table-wrap">
                <table class="table">
                  <thead class="thead-primary">
                    <tr>
                      <th>Vaccine</th>
                      <th>Healthcare Center</th>
                      <th>Address</th>
                      <th>View Batches of Vaccine</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row" class="scope" ><br>AstraZeneca</th>
                      
                      <td><br><select id="Healthcare" onchange="ChangeHealthList()">
                        <option value="">-- Healthcare Center --</option> 
                        <option value="UK">University Kebangsaan</option> 
                        <option value="IDCC">IDCC Shah alam</option> 
                        <option value="BJ">Bukit Jalil Stadium</option> 
                        
                      </select> </td>
                      
                      <td><br>
                        <select id="HCAddress">
                        <option value="">-- Address --</option>
                      </select> 

                      
                      <script>
                      var Address = {};
                      Address['UK'] = ['43600 UKM, 43600 Bangi, Selangor, Malaysia'];
                      Address['IDCC'] = ['Corporate Tower, Level 5, Jalan Pahat L 15/L, Section 15, 40200 Shah Alam'];
                      Address['BJ'] = ['Jalan Barat, Bukit Jalil, 57000 Kuala Lumpur'];
                      
                      function ChangeHealthList() {
                        var HealthList = document.getElementById("Healthcare");
                        var HCAddressList = document.getElementById("HCAddress");
                        var selAdd = HealthList.options[HealthList.selectedIndex].value;
                        while (HCAddressList.options.length) {
                            HCAddressList.remove(0);
                        }
                        var HealthcareCenter = Address[selAdd];
                        if (HealthcareCenter) {
                          var i;
                          for (i = 0; i < HealthcareCenter.length; i++) {
                            var Healthcare = new Option(HealthcareCenter[i], i);
                            HCAddressList.options.add(Healthcare);
                          }
                        }
                      } 
                      </script>
                      </td>
                    
                </select></td>
                <td><br><input type="date" name="date" /></td>
                      <td><br><button type="submit" value="submit">View Batches</button></td>
                    </tr>
                    
                  </tbody>
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

            <br><br>


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