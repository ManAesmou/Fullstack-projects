//  file:   haeLainaus.js

$(document).ready(function(){
    //Kun html-documentti on ladattu kokonaan, suoritetaan tässä oleva Javascript
    haeSatunnainenLainaus();
})

function haeSatunnainenLainaus(){
    //AJAXilla lähetetään taustalla get-pyyntö palvelun osoitteeseen
    $.get('http://localhost/lainausTekstiWS/lainausJSON.php',function(data){
        //poimitaan data:sta JSON-arvot ja sijoitetaan sivulle määriteltyihin id-kohtiin
        let tulos=JSON.parse(data,function(avain, arvo){
            return arvo;
        })
        //sijoitetaan tiedot HTML-sivulle nimettyihin kohtiin
        if(tulos.Status=='OK'){
            $("#lainausteksti").html(tulos.Teksti);
            $("#kuka").html(tulos.Kuka);
        }else alert('Ongelma tiedon hakemisessa');
    })
}