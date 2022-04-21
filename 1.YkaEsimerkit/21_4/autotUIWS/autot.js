//  file: autot.js
//        Hakee AJAXin get-pyynnöllä autotJSON.php:lta JSON-muotoisen listauksen autoista
$(document).ready(function(){
    haeAutot(); //kutsutaan funktiota haeAutot()
})

function haeAutot(){
    let teksti=''; //tähän merkkijonoon lisätään kukin auto (Huom! Myös HTML:ää)
    $.get('http://localhost/TA42T21K/AutotUIWS/autotJSON.php',function(data){
        let tulos=JSON.parse(data,function(key,value){
            return value;
        })
        $.each(tulos.autot,function(key,auto){
            teksti=teksti+'<tr>';
            teksti=teksti+'<td>'+auto.manufacturer+'</td>';
            teksti=teksti+'<td>'+auto.model+'</td>';
            teksti=teksti+'<td>'+auto.price+'</td>';
            teksti=teksti+'</tr>';
        })
        $("#autot").html(teksti);
    })
}