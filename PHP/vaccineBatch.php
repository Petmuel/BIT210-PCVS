<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <script>

    //Generate VaccinationID

    
    (function() {
        function IDGenerator() {
        
            this.length = 8;
            this.timestamp = +new Date;
            
            var _getRandomInt = function( min, max ) {
               return Math.floor( Math.random() * ( max - min + 1 ) ) + min;
            }
            
            this.generate = function() {
                var ts = this.timestamp.toString();
                var parts = ts.split( "" ).reverse();
                var id = "";
                
                for( var i = 0; i < this.length; ++i ) {
                   var index = _getRandomInt( 0, parts.length - 1 );
                   id += parts[index];	 
                }
                
                return id;
            }
   
            
        }
        
        
        document.addEventListener( "DOMContentLoaded", function() {
           var btn = document.querySelector( "#generate" ),
               output = document.querySelector( "#output" );
               
           btn.addEventListener( "click", function() {
               var generator = new IDGenerator();
               output.innerHTML = generator.generate();
               
           }, false); 
            
        });
        
        
    })();
   
   



</script>


    
    
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
                      <th>Upcoming Date</th>
                      <th>Request Appointment </th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr>
                      <th scope="row" class="scope" ><br>BatchNo1</th>
                      <td><br>12/04/2022</td>
                      <td><br>1,000,000</td>
                      <td><br><input type="date" name="date" min="2021-10-19" max="2021-12-31"></td>
                      
                    
                      <td><br><button onclick="document.location='VaccineStatus.php'">Appointment</button></td>
                    </tr>


                    <tr>
                      <th scope="row" class="scope" ><br>BatchNo2</th>
                      <td><br>01/02/2022</td>
                      <td><br>500,000</td>
                      <td><br><input type="date" name="date" min="2021-10-19" max="2021-12-31"></td>
                      


                      <td><br><button onclick="document.location='VaccineStatus.php'">Appointment</button></td>
                    </tr>



                    <tr>
                      <th scope="row" class="scope" ><br>BatchNo3</th>
                      <td><br>01/12/2021</td>
                      <td><br>100,000</td>
                      <td><br><input type="date" name="date" min="2021-10-19" max="2021-12-31"></td>
                      

                      <td><br><button onclick="document.location='VaccineStatus.php'">Appointment</button></td>
                    </tr>


                    
                    <tr>
                      <th scope="row" class="scope" ><br>BatchNo4</th>
                      <td><br>10/03/2022</td>
                      <td><br>30,000</td>
                      <td><br><input type="date" name="date" min="2021-10-19" max="2021-12-31"></td>
                      
                      <td><br><button id="generate" onclick="document.location='VaccineStatus.php'">Appointment</button></td>
                    </tr>
                  
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
        </div>
      </section>
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