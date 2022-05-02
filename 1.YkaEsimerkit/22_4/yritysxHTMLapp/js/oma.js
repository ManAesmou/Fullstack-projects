//  file:   js/oma.js
//  desc:   Käyttöliittymän ja PHP-backendin yhdistävä koodi. Sovellus tallentaa kirjautumistiedot session-tietoina
//          palvelimelle ja käyttäjän tietoja selaimen localStorage-muuttujille


let userid=0; //aluksi userid on nolla -> globaali, eli voidaan käyttää kaikissa functioissa jne
let user='';  //Tämän avulla käyttäjän nimi tulostetaan
let polku='http://localhost/TA42T21K/yritysxHTMLapp/php/'; //HTTP-osoite backend-kansioon
$(document).ready(function(){
    onkoKirjautunut();  //tutkitaan, onko käyttäjä kirjaunut

    //kun klikataan Kirjautumislomakkeen Submit-painiketta
    $("#loginForm").submit(function(){
        kirjaudu(); //kutsutaan funktiota kirjaudu
        return false; //estää sivun latautumisen
    })

    //kun klikataan Kirjaudu ulos -linkkiä
    $("#logout").click(function(){
        //kirjaudutaan ulos
        kirjauduUlos();
    })
})

//hävitetään localStoragesta käyttäjän tiedot
function kirjauduUlos(){
    localStorage.removeItem("userid");
    localStorage.removeItem("kayttaja");
    $("#user").html('<p class="alert alert-info">Olet kirjautunut ulos!</p>');
    setTimeout(function(){
        alkutila();
    },2000);
}

//lähettää lomakkeen id-kentät email ja pwd login.php:lle
function kirjaudu(){
    let email=$("#email").val();
    let salasana=$("#pwd").val();
    $.post(polku+'login.php',{
        email: email,
        pwd: salasana
    },function(data){
        let tulos=JSON.parse(data,function(key, value){
            return value;
        })
        if(tulos.Status=='OK'){
                //kirjautuminen onnistui. Muokataan valikkonäkymä, näytetään käyttäjä ja talletetaan localStorageen
                //käyttäjän tiedot jatkokäyttöä varten
                localStorage.setItem("userid",tulos.UserID);
                localStorage.setItem("kayttaja",tulos.Kayttaja);
                $("#user").html('<p>Käyttäjä: '+tulos.Kayttaja+'</p>');
                $("#users").show();
                $("#logout").show();
                $("#login").hide();
                $("#lgnVirhe").html('<p class="alert alert-success">Kirjautuminen onnistui!</p>');
                setTimeout(function(){
                    $("#lgnVirhe").html('');
                    location.reload(); //lataa sivun uudestaan -> valikot päivittyy yms
                },2000);
                
        }else{
                //kirjautumisessa virhe
                $("#lgnVirhe").html('<p class="alert alert-danger">'+tulos.Viesti+'</p>');
                setTimeout(function(){
                    $("#lgnVirhe").html('');
                },2000);  
        }
        $("#email").val('');
        $("#pwd").val('');
    })
}

//jos käyttäjä on kirjautunut (tarkistetaan session.php -scriptin avulla backendista),
//valikot yms kirjautuneelle, muuten alkutilanäkymä
function onkoKirjautunut(){
    userid = localStorage.getItem('userid'); //otetaan mahdollisesti talletettu userid
    $.get(polku+'session.php?userid='+userid,function(data){
        let tulos=JSON.parse(data,function(key, value){
            return value;
        })
        if(tulos.Status=='OK'){
            //kirjautuneen käyttäjän näkymä
            $("#user").html('<p>Käyttäjä: '+tulos.Kayttaja+'</p>');
            $("#users").show();
            $("#logout").show();
            $("#login").hide();
        }else{
            alkutila(); //funktio määrittää sovelluksen alkunäkymän
        };
    })
    
}

//määrittää sovelluksen tilan ennen kirjautumista/uloskirjautumisen jälkeen
function alkutila(){
    let teksti='<p class="alert alert-info">Sovelluksen käyttäminen vaatii kirjautumisen</p>';
    $("#users").hide();
    $("#logout").hide();
    $("#user").html('');
    $("#login").show();
}