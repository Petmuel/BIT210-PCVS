<?php
    session_start();
    //check if the admin has clicked the 'Record' button or not
    if (isset($_GET['submit'])){
        //then include the database connection
        include_once 'db.php';
        //get data from the record vaccine batch form
        //get vaccineID from current admin
        $vacID = $_GET['vac'];
        $sql = "SELECT * FROM tb_vaccines WHERE vaccineID = '$vacID';";
        $result = mysqli_query($conn, $sql);
        //retreive vaccine
        $row = mysqli_fetch_assoc($result);
                $vac = $row["vaccineName"];
        
        $batchNo = $_GET['batchNo'];
        $exDate = $_GET['exDate'];
        $quantityAv = $_GET['quantityAv']; 

        //get staffID from current admin
        $uName = $_SESSION['user_name'];
        $sql = "SELECT * FROM tb_admins WHERE username = '$uName';";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
        $centre = $row["centre"];

        //insert data input into vaccine batch table
        $sqlQuery = "INSERT INTO `tb_batches` (`expiryDate`, `quantityAvailable`, `centre`, 
        `vaccineName`,`batchNo`,`quantityAdministered`,`numberOfPendingAppointments`) 
        VALUES('$exDate', '$quantityAv', '$centre', '$vac','$batchNo',0,0)";

        // Execute the query
        if ($conn->query($sqlQuery) == TRUE ) {
            $_SESSION['centre'] = $centre;  
            //redirect back to same page with a message that shows admin has successfully recorded the vaccine batch
            header('Location: ../recordNewVaccineBatch.php?message=You have successfully recorded a new vaccine batch');
        }
        else {
            echo '<script>alert("Record failed, please try again");window.location = "../recordNewVaccineBatch.php";</script>';
        }                               
        
        exit();
    }
    
    else{
        header("Location:recordNewVaccineBatch.php");
        exit();
    }