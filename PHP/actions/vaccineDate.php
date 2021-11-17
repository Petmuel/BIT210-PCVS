<?php
session_start();
//check if the admin has clicked the 'Record' button or not
if (isset($_GET['View Batches'])){
    //then include the database connection
    include_once 'db.php';
//get data from the record vaccine batch form
    //get vaccineID from current admin
    $vacID = $_GET['vac'];
    $sql = "SELECT * FROM tb_vaccines WHERE vaccineID = '$vacID';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        //while there is still have a row of vaccine retrieved from database
        while($row = mysqli_fetch_assoc($result)) {
            $vac = $row["vaccineName"];
        }
    }
    $exDate = $_GET['exDate'];
    $quantityAv = $_GET['quantityAv']; 



?>