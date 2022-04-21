<?php
/**
 *  file:   autotJSON.php
 *  desc:   Palauttaa autolistauksen JSON-muodossa
 */
include('dbConnect.php');
$sql="SELECT * FROM car ORDER BY manufacturer, model, price";
$tulos=$conn->query($sql);
if($tulos->num_rows > 0){
    $json=array(); //taulukkomuuttuja, johon tuloslista lisätään -> tulostetaan pyytävälle ohjelmalle
    while($rivi=$tulos->fetch_assoc()){
        $json['autot'][]=$rivi; //lisää taulukkoon kunkin rivin tiedot
    }
}
$conn->close();
echo json_encode($json);
?>