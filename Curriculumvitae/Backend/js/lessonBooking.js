"use strict";

//Sivun latauduttua haetaan JSON.
$(document).ready(function(){
  let result = '';
  let text = '';

  function getParameter(parameterName){
    let parameters = new URLSearchParams(window.location.search);
    return parameters.get(parameterName);
  }

  if (getParameter("page") == "addBooking") {
    let bookingID = getParameter("id");
    localStorage.setItem('varausID', bookingID);

  //jos käyttäjä on kirjautunut (tarkistetaan session.php -scriptin avulla backendista),
  //valikot yms kirjautuneelle, muuten alkutilanäkymä
  function hasBookingID(){
    bookingID = localStorage.getItem('varausID'); //otetaan mahdollisesti talletettu userid
    $.get('http://localhost/Curriculumvitae/Backend/includes/customerJSON.php?id='+bookingID, function(data){
        let result = JSON.parse(data,function(key, value){
            return value;
        })

        text +='<div class="container mb-3">';
        text +='<h5>Customer details:</h5>';
          text +='<div class="row">';
            text +='<div class="col-md-5">';
              text +='<div class="card">';
                text +='<div class="card-header">Name: ' + result.nimi + '</div>';
                text +='<div class="card-body">Email: ' + result.email + '</div>';
                text +='<div class="card-body">Phone: ' + result.puhelin + '</div>';
                text +='<div class="card-body">Topic: ' + result.oppituntiaihe + '</div>';
              text +='</div>';
            text +='</div>';
          text +='</div>';
        text +='</div>';
        $('#userData').html(text);
    })
  }

  hasBookingID();
  }

  $.get("http://localhost/Curriculumvitae/Backend/includes/JSON.php", function(data, status){
    let lessonBooking = JSON.parse(data);

    for (let i = 0; i < lessonBooking.length; i++){
          result = result + "<tr>";
          result = result + "<td>" + lessonBooking[i].ohjauksenpvm + "</td>";
          result = result + "<td>" + lessonBooking[i].nimi + "</td>";
          result = result + "<td>" + lessonBooking[i].oppituntiaihe + ": <br> -" + lessonBooking[i].kuvaus + "</td>";
          result = result + "<td>" + lessonBooking[i].email + "<br>" + lessonBooking[i].puhelin + "</td>";
          result = result + "</tr>";

      $("#bookedLessons").html(result);
    }
  })

  
    $("#returnReservation").click(function () {
      location.href = '/Curriculumvitae/Backend/index.php?page=reservation';
    })
  

    //TODO KESKEN
   $("#saveLesson").click(function (){
    //lähettää lomakkeen id-kentät customerJSON.php:lle.
    let bookedID = localStorage.getItem('varausID');
    let description = $("#floatingdescription").val();
    let dateTime = $("#dateTime").val();

    console.log(bookedID, description, dateTime);

    $.post('http://localhost/Curriculumvitae/Backend/includes/customerJSON.php', {
        bookedIDProperty : bookedID,
        descriptionProperty : description,
        dateTimeProperty : dateTime
    }, function(data){
        let result = JSON.parse(data, function(key, value){
            return value;
        })
        $("#email").val('');
        $("#pwd").val('');
        localStorage.removeItem('varausID');
    })
   })

});
