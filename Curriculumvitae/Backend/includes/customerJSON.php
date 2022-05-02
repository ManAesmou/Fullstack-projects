<?php
include "dbManagement.php";
header('Access-Control-Allow-Origin: *');  //mahdollistaa kutsun eri verkko-osoitteista

if ($_GET['id']) {
    $sql = 'SELECT *
            FROM varaukset
            INNER JOIN sukupuolet ON varaukset.sukupuoliID = sukupuolet.sukupuoliID
            WHERE varausID = '.$_GET['id'].'';

    $customerResult  = mysqli_query($conn, $sql);

    if (mysqli_num_rows($customerResult) > 0) {
        //This will change data to JSON format, which allow javascript on client side handle datta:
        echo json_encode(mysqli_fetch_assoc($customerResult));
    } else {
        echo '{"Status":"No data"}';
    }
    mysqli_close($conn);
}


    //TODO KESKEN
if(empty($_POST)) {
    echo '';
} else {
    $bookedID = $conn->real_escape_string($_POST['bookedIDProperty']);  //poistaa ei sallitut merkit
    $description = $conn->real_escape_string($_POST['descriptionProperty']); 
    $dateTime = $conn->real_escape_string($_POST['dateTimeProperty']); 
    
    $sql = '';

}
?>

