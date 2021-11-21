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

  <title>Record New Vaccine Batch</title>
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
      <!--Current admin full name is shown after logging in-->
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

  <div class="container rnvbBg mt-5">
    <div class="row">
      <div class="col-md-6 text-light fw-light fs-6">
        <div class="d-flex justify-content-center align-items-center">
          <div class="introTitle justify-content-center align-items-center">
            <!--admin's healthcare centre name is shown -->
            <h1 class="text-warning">Welcome to PCVS!</h1>

            <h4>Record New Vaccine Batch</h4>
            <p>A list of available vaccines is shown below for you to select and record a new vaccine batch.</p>


          </div>
        </div>
      </div>

      <div class="col-md-6">
        <!--.img-fluid: make image responsive (max-width: 100%, height: auto)-->
        <img src="../img/vaccine.png" alt="patientClipArt" class="img-fluid">
      </div>
    </div>
  </div>

  <!--Record new vaccine batch-->
  <form action="actions/recordVc.php" method="GET">
    <div class="pt-5 text-center">
      <!--list of available vaccines-->
      <div class="container decorate border-1 py-3 px-5 shadow-lg listBg">  
        <h3>List of Available Vaccines</h3>
        <h5>Select a Vaccine to Record New Batch</h5>
        <div class="row horizontalOverflow">
          <table class="bg-light">
            <tr class="border-1">
              <th class="p-3">VaccineID</th>
              <th class="p-3">VaccineName</th>
              <th class="p-3">Manufacturer</th>   
            </tr>
            <?php
                $sql = "Select * from tb_vaccines;";
                $result = mysqli_query($conn, $sql);
                
                //if there are rows retrieved from database
                if(mysqli_num_rows($result)>0){     
                    //while there is still have a row of vaccines retrieved from database
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                <!--display list of vaccines which are retrieved from database-->
                <tr class="border-1">
                  <td class="px-3">
                    <div class="form-check">  
                      <!--to store vaccineID in value of input radio type-->
                      <input class="form-check-input" type="radio" name="vac" value="<?php echo $row["vaccineID"];?>" required>
                      <label class="form-check-label" for="vac">   
                          <!--display vaccineID-->
                          <?php echo $row["vaccineID"];?>
                      </label>
                    </div>
                  </td>
                  <td class="p-3"><?php echo $row["vaccineName"];?></td>
                  <td class="p-3"><?php echo $row["manufacturer"];?></td>
                </tr>
            <?php
                    } //end of while loop
                }  
            ?>
          </table>
        </div>
    
            
        <div class="row py-5">
          <h4>Record new vaccine batch</h3>
          <div class="col-lg-4 py-3"> 
            <label for="batchNo">Batch Number</label>
            <input type="text" id="batchNo" name="batchNo">
          </div>
          <div class="col-lg-4 py-3">
            <label for="exDate">Expiry Date</label>
            <input type="date" id="mDate" name="exDate" required>
          </div> 

          <div class="col-lg-4 py-3">
            <label for="quantityAv">Quantity of dose available</label>
            <input type="number" id="quantityAv" name="quantityAv" min="1" max="10000" required>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Record</button>
        <!--display message which stated that admin has successfully recorded new vaccine batch
            declared in recordVc.php-->
        
        <?php
            if(isset($_GET['message'])){ 
                $message = $_GET['message'];
        ?>
        <p class="alert alert-success" id="msg">
            <?php echo $message; ?>
        </P>
        <?php
            }
        ?>
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
  <!--display the message for short period of time by using javascript-->
  <script>
    setTimeout(function(){
        document.getElementById('msg').style.display = 'none';
    }, 2500);

    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() +1;
    var year = date.getUTCFullYear();
    //if day, month or year is less than 10, add 0 to its left side to make it 2 digits
    if (day<10){
        day = '0' + day;
    }
    if (month<10){
        month = '0' + month;
    }
    if (year<10){
        year = '0' + year;
    }
    var minDate = year + "-" + month + "-" + day;
    document.getElementById('mDate').setAttribute("value", minDate);
    document.getElementById('mDate').setAttribute("min", minDate);
    console.log(minDate);
  </script>

  
</body>

</html>