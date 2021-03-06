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

  <style>
    .bckgrnd{
      background-color: rgb(245, 241, 255);
    }
  </style>

  <title>View Vaccination List</title>

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
      <!--Current admin full name is shown after logging in-->
      <text>
        <?php
          $uName = $_SESSION['user_name'];
          $sql = "SELECT * FROM tb_admins WHERE username = '$uName';";
          $result = mysqli_query($conn, $sql);

          $row = mysqli_fetch_assoc($result);
                echo "Healthcare Centre: ".$row["centre"];
              
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
          <!--go to record new vaccine batch page-->
          <li class="nav-item">
            <a href="recordNewVaccineBatch.php" class="nav-link" role="button">
              Record New Vaccine Batch
            </a>
          </li>

          <!--go to view vaccine batch information page-->
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
  <!--View Vaccinations-->
  <form action="confirm.php" method="GET">
        <!--list of vaccinations-->
        <div class="bckgrnd py-5 px-3 text-center">
            <!--shadow behind div with rounded corners-->
            <div style="background-color: rgb(237, 226, 247);" class="container listBg shadow-lg py-3 px-4 rounded-3">
            <h3>List of Vaccinations</h3>
            <p>Select a Vaccination To Confirm Its Appointment/Record That It Has Been Administered</p>
                <div class="row horizontalOverflow">
                    <table>
                        <tr class="bg-white border-1">
                            <th class="p-3">VaccinationID</th>
                            <th class="p-3">Appointment Date</th>
                            <th class="p-3">Status</th>
                        </tr>
                        <?php
                            $batchNo= $_SESSION['batchNo'];
                            $sql = "SELECT * FROM tb_vaccinations WHERE batchNo = '$batchNo';";
                            $result = mysqli_query($conn, $sql);
                            //if there are rows retrieved from database
                            if(mysqli_num_rows($result)>0){
                                //while there is still have a row of vaccinations retrieved from database
                                while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <!--display list of vaccinations which are retrieved from database-->
                        <tr class="bg-white border-1">
                            <!--display message stated that there are no vaccinations in the list-->
                            <p id="message"></p>
                            <!--to store vaccinationID in value of input radio type-->
                            <td class="px-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="vID" value="<?php echo $row["vaccinationID"];?>" required>
                                    <label class="form-check-label" for="bNo">
                                        <!--display vaccinationID-->
                                        <?php echo $row["vaccinationID"];?>
                                    </label>
                                </div>
                            </td>
                            <td class="p-3"><?php echo $row["appointmentDate"];?></td>
                            <td class="p-3"><?php echo $row["status"];?></td>
                        </tr>
                        <?php
                                } //end of while loop
                            }
                            //if there's no vaccinations
                            else{
                        ?>
                        <th colspan="5" class="bg-white border-1 py-5">
                            There are no vaccinations
                        </th>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                <br>
                <button type="submit" name="confirm" class="btn btn-primary">Confirm/Reject & Record that it's administered</button>
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