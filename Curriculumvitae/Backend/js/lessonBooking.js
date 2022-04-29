"use strict";

//Sivun latauduttua haetaan JSON.
$(document).ready(function(){
  let result = "";
  
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
  }); 
});