<?php
    include_once 'actions/db.php';
    session_start();
  if(count($_POST)){
    $id = isset($_POST['Healthcare']) ? $_POST['Healthcare'] : '';
    if(isset($_POST['btnConfirm'])){
      $queryUpdate = "UPDATE `tb_vaccinations` SET `status` = 'confirm' WHERE `vaccinationID` = '$id'";
      $result = mysqli_query($conn, $queryUpdate);
    }
    elseif(isset($_POST['btnReject'])){
      $queryUpdate = "UPDATE `tb_vaccinations` SET `status` = 'reject' WHERE `vaccinationID` = '$id'";
      $result = mysqli_query($conn, $queryUpdate);
    }
    elseif(isset($_POST['type']) && $_POST['type'] == 'ajax'){
        die('test');
    }
  }


  //$queryCOUNT = "SELECT COUNT(*) FROM `tb_vaccinations` WHERE `status` = 'pending'";


  $query = "SELECT * FROM `tb_vaccinations` WHERE `status` = 'pending'";
  $result = mysqli_query($conn, $query);
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

    <style>


      

.center {
  text-align: center;
  margin: auto;
  width: 50%;
  padding: 10px;
}


select {
height: 50px;
 width: auto; 
 overflow: auto; 
 border: inset black 0.1em; }


#Confbutton{
height: 50px;
width: auto; 
overflow: auto; 
border: inset black 0.1em;
background-color: rgb(211, 241, 255);
}


#Rejbutton{
height: 50px;
width:75px; 
overflow: auto; 
border: inset black 0.1em;
background-color: rgb(250, 167, 119);
}


#Adminbutton{
align-items: center;
height: 50px;
width: auto; 
overflow: auto; 
border: inset black 0.1em;
background-color: rgb(201, 241, 208);
}

#AdButton{
text-align: center;
}

      
    </style>
  <script type="text/javascript" src="js/jqmin.js"></script>
    <script>
/*
     function showMessageAcc() {
        alert("The status is set to 'confirmed'.");
     }



     function showMessageRej() {
        alert("The status is set to 'rejected'.");
     }

     */


     function showMessageAdmin() {
        alert("The vaccination status is set to ‘administered’ , The quantity changed to '999,999'");
     } 
     /*



     
                      var Address = {};
                      Address['44417633'] = 
                      ['Putra Wati,  BatchNo1 J21079032,  12/04/2022,  Pfizer-BioNTech,  Pfizer, Vaccination Date: 01/12/2021'];
                      Address['24554357'] =
                      ['Alex Travers,  BatchNo2 B21793541,  01/02/2022,  Moderna,  Moderna, Vaccination Date: 28/01/2022'];
                      Address['63731625'] = 
                      ['Kylie Verna,  BatchNo3 N12759915,  01/12/2022,  Johnson & Johnson (J&J),  Johnson&Johnson, Vaccination Date: 15/02/2022'];
                      Address['74757799'] = 
                      ['Lilibet Lorna,  BatchNo4 A83365120,  10/03/2022,  Oxford–AstraZeneca,  AstraZeneca, Vaccination Date: 20/12/2021'];
                      Address['35602718'] = 
                      ['Elwyn Kenny,  BatchNo1 L10088216,  12/04/2022,  Pfizer-BioNTech,  Pfizer, Vaccination Date: 11/11/2021'];
                      
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
                      */
$(document).ready(function(){
  $('#Healthcare').change(function()
    {
        var id = $(this).val();
        $('#HCAddress').val(id);
        /*$.ajax({
          url: 'confirm.php',
          type: 'POST',
          data: {id : id, type: 'ajax'},
          success: function(result){
            alert(result);
          }
        });*/
    });
});

    </script>
    
    
    <title>Confirm Vaccination Appointment & Vaccination Administered</title>

    
    
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
        <!--admin's healthcare centre name is shown -->
        <span id="callCentreName"></span>
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
              <a href="viewVaccineBatchInfo.php" class="nav-link" role="button">
                View Vaccine Batch Information
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

    <br><br>
    <br><br>

    
    <br><br>
    <br><br>

<form action="" method="POST">
    <section class="ftco-section" id="body">
        <div class="container1">
          <div style="overflow-x:auto;">
          <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
              <h2 class="heading-section">Confirm Vaccination Appointment  </h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h5 class="text-center mb-4">Select Vaccine ID to show the full information </h5>
              <br><br>
              <div class="table-wrap">
                <table class="table">
                  <thead class="thead-primary">
                    <tr>
                      
                      <th>Vaccine ID</th>
                      <th>Information</th>
                      <th>Confirm</th>
                      <th>Reject</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr>
                      <td><br>
                      <select id="Healthcare" name="Healthcare">
                      <option value="">-- Vaccine ID -- </option>
                      <?php 
                        while ($row = $result->fetch_assoc())
                        {
                          echo '<option value="'.$row['vaccinationID'].'">'.$row['vaccinationID'].'</option>';
                        }
                      ?>
            </select> </td>
                      
                      <td><br>
                        <select id="HCAddress">
                
                            <option value="">-- Information --</option>
                            <?php
                              $result = mysqli_query($conn, $query);
                              while ($row = $result->fetch_assoc())
                              {
                                echo '<option value="'.$row['vaccinationID'].'">'.$row['status'].' - '.$row['appointmentDate'].' - '.$row['remarks'].'</option>';
                              }
                            ?>
                        </select></td>




                    <td ><br><button type="submit" id="Confbutton" name="btnConfirm" onclick="return confirm('Are you sure to confirm? ')">Confirm</button></td>
                    <td ><br><button type="submit" id="Rejbutton" name="btnReject" onclick="return confirm('Are you sure to reject?')">Reject</button></td> 
                </select></td>
                     
                  </tbody>

                  
                  
                </table>

                <br><br><br>



      <p id="AdButton"><b>Confirm the Vaccination that has been administered:  </b> <br><br>

                    
      <button id="Adminbutton" onclick="showMessageAdmin()">Select to Confirm</button>

    </p>


      <br><br><br>


                
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