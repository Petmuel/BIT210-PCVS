<?php
    session_start();
    //check if the admin has clicked the 'Record' button or not
    if (isset($_GET['submit'])){
        //then include the database connection
        include_once 'db.php';
        //get data from the record vaccine batch form
        //get vaccineID from current admin
        $batchNo = $_GET['bNo'];
        $sql = "SELECT * FROM tb_batches WHERE batchNo = '$batchNo';";
        $result = mysqli_query($conn, $sql);
        //retreive vaccine batch
        $row = mysqli_fetch_assoc($result);
        $vac = $row["vaccineName"];

        $sql = "SELECT * FROM tb_vaccines WHERE vaccineName = '$vac';";
        $result = mysqli_query($conn, $sql);
        //retreive vaccine
        $row = mysqli_fetch_assoc($result);
        $vaccineID = $row["vaccineID"];

        $date =  $_SESSION['date'];

        //insert data input into vaccine batch table
        $sqlQuery = "INSERT INTO `tb_vaccinations`(`status`, `appointmentDate`, `vaccineID`, `batchNo`,`remarks`) 
        VALUES ('pending', '$date', '$vaccineID', '$batchNo','');";
        
        // Execute the query
        if ($conn->query($sqlQuery) == TRUE ) {
            $sql = "SELECT * FROM tb_vaccinations WHERE appointmentDate = '$date' AND vaccineID ='$vaccineID' AND batchNo='$batchNo';";
            $result = mysqli_query($conn, $sql);
            //retreive vaccine
            $row = mysqli_fetch_assoc($result);
            $vaccinationID = $row["vaccinationID"];
            $_SESSION['vaccinationID'] = $vaccinationID;
            //redirect back to patient homepage
            echo '<script>alert("You have successfully requested vaccination appointment");window.location = "../VaccineStatus.php";</script>';
        }
        else {
            echo '<script>alert("Record failed, please try again");</script>';
        }                               
        
        exit();
    }
    
    else{
        header("Location:recordNewVaccineBatch.php");
        exit();
    }