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
    //kun klikataan "users" -id:tä eli valikossa kohtaa "Käyttäjät"
    $("#users").click(function(){
        haeUsers(0);  //aluksi sivutusalkuarvo on 0
    })
    //kun klikataan edellinen-sivu painiketta html-sivun id:n "main" sisällä -> klikataan dynaamista luokkaa
    $("#main").on('click','.edSivu',function(){
        let start=$(this).attr('data-start');
        haeUsers(start);
    })
    //kun klikataan seuraava-sivu painiketta html-sivun id:n "main" sisällä -> klikataan dynaamista luokkaa
    $("#main").on('click','.seurSivu',function(){
        let start=$(this).attr('data-start');
        haeUsers(start);
    })
})
function haeUsers(start){
    //pyydetään JSON-dataa haeUsers.php:lta palvelimelta
    $.get(polku+'haeUsers.php?start='+start,function(data){
        let tulos=JSON.parse(data,function(key,value){
            return value;
        })
        //sivutusta varten seuraava, edellinen, sivunumero
        let seuraava=tulos.start; //poimii JSONista start-arvon eli seuraavan sivun aloitus
        let edellinen=parseInt(tulos.montako)*parseInt(tulos.sivu)-2*parseInt(tulos.montako); //edellisen sivun aloituspaikka
        if(edellinen<0) edellinen=0;
        teksti='<h3>Yritys X - Käyttäjälistaus</h3>';
        teksti=teksti+'<ul class="pagination">';
        teksti=teksti+'<li class="page-item"><a class="page-link edSivu" href="#"data-start="'+edellinen+'">Edellinen</a></li>';
        //sivunumerointi
        let sivunumero=0;
        for(i=1;i<=tulos.sivuja;i++){
            teksti=teksti+'<li class="page-item ';
            if(parseInt(tulos.sivu)==i) teksti=teksti+'active';
            teksti=teksti+'">';
            teksti=teksti+'<a class="page-link seurSivu" href="#" data-start="'+sivunumero+'">'+i+'</a></li>';
            sivunumero=sivunumero+parseInt(tulos.montako);
        }
        teksti=teksti+'<li class="page-item"><a class="page-link seurSivu" href="#" data-start="'+seuraava+'">Seuraava</a></li>';
        teksti=teksti+'</ul>';
        teksti=teksti+'<table class="table table-striped"><thead><tr><th>Etunimi</th><th>Sukunimi</th><th>Email</th>';
        teksti=teksti+'<th><Kuva></tr></thead><tbody>';
        //käydään JSON-data läpi ja lisätään teksti-merkkijonoon kaikki tieto taulukon riveinä
        $.each(tulos.users,function(key,user){
            teksti=teksti+'<tr>';
            teksti=teksti+'<td>'+user.Etunimi+'</td>';
            teksti=teksti+'<td>'+user.Sukunimi+'</td>';
            teksti=teksti+'<td>'+user.Email+'</td>';
            if(user.profiilikuva==null) teksti=teksti+'<td></td>';
            else teksti=teksti+'<td><img src="images/profiilikuvat/'+user.profiilikuva+'" class="img-thumbnail" width="50px"></td>'; 
            teksti=teksti+'</tr>';
        })
        teksti=teksti+'</tbody></table>';
        $("#main").html(teksti);
    })
}

function kirjauduUlos(){
    //hävitetään localStoragesta käyttäjän tiedot
    localStorage.removeItem("userid");
    localStorage.removeItem("kayttaja");
    $("#user").html('<p class="alert alert-info">Olet kirjautunut ulos!</p>');
    setTimeout(function(){
        alkutila();
    },2000);
}

function kirjaudu(){
    //lähettää lomakkeen id-kentät email ja pwd login.php:lle
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

function onkoKirjautunut(){
    //jos käyttäjä on kirjautunut (tarkistetaan session.php -scriptin avulla backendista),
    //valikot yms kirjautuneelle, muuten alkutilanäkymä
    userid=localStorage.getItem('userid'); //otetaan mahdollisesti talletettu userid
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

function alkutila(){
    //määrittää sovelluksen tilan ennen kirjautumista/uloskirjautumisen jälkeen
    let teksti='<p class="alert alert-info">Sovelluksen käyttäminen vaatii kirjautumisen</p>';
    $("#users").hide();
    $("#logout").hide();
    $("#user").html('');
    $("#login").show();
}