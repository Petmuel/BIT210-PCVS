
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

  <!--list of available vaccines-->
  <div class="py-5 px-3 text-center">
    <!--shadow behind div with rounded corners-->
    <div class="container listvacBatchBg shadow-lg py-3 px-4 rounded-3">
      <h3>List of Available Vaccine Batches</h3>
      <div class="row horizontalOverflow shadow-lg">
        <table>
          <tr class="bg-white border-1">
            <th class="p-3">Select</th>
            <th class="p-3">BatchNo</th>
            <th class="p-3">VaccineName</th>
            <th class="p-3">Pending Appointments</th>
            <th class="p-3">Expiry Date</th>  
            <th class="p-3">Quantity Available</th>   
            <th class="p-3">Quantity Pending</th>
            <th class="p-3">Quantity Administered</th>
          </tr>
          
          <tr class="bg-white border-1" id="tr">
            <td><a href="vaccinationList.php" class="list-group-item list-group-item-action active" aria-current="true">View Vaccination</a></td>
            <td class="p-3">BatchNo01</td>
            <td class="p-3">Pfizer</td>
            <td class="p-3">3</td>
            <td class="p-3">18/10/2021</td>
            <td class="p-3">20</td>
            <td class="p-3">3</td>
            <td class="p-3">0</td>
          </tr>

          <tr class="bg-white border-1">
            <td><a href="vaccinationList.php" class="list-group-item list-group-item-action active" aria-current="true">View Vaccination</a></td>
            <td class="p-3">BatchNo02</td>
            <td class="p-3">Moderna</td>
            <td class="p-3">10</td>
            <td class="p-3">20/10/2021</td>
            <td class="p-3">40</td>
            <td class="p-3">10</td>
            <td class="p-3">0</td>
          </tr>

          <tr class="bg-white border-1">
            <td><a href="vaccinationList.php" class="list-group-item list-group-item-action active" aria-current="true">View Vaccination</a></td>
            <td class="p-3">BatchNo03</td>
            <td class="p-3">Astrazenaca</td>
            <td class="p-3">2</td>
            <td class="p-3">30/10/2021</td>
            <td class="p-3">60</td>
            <td class="p-3">2</td>
            <td class="p-3">0</td>
          </tr>

        </table>
      </div>
    </div>
  </div>


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