<?php
include "dbManagement.php";
header('Access-Control-Allow-Origin: *');  //mahdollistaa kutsun eri verkko-osoitteista


    if (mysqli_num_rows($bookingResult) > 0) {
        while ($row = mysqli_fetch_assoc($bookingResult)) {
            array_push($rows, $row);
        }
        
        //This will change data to JSON format, which allow javascript on client side handle datta:
        echo json_encode($rows);
    } else {
        echo 'No data';
    }
    mysqli_close($conn);

    

?>

