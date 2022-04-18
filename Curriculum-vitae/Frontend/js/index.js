"use strict";

/*
Pelissä etsitään pareja, ja kaikki parit löydettyä peli loppuu =>
    CONST kuvalista, jotka sekoitetaan satunnaiseen järjestykseen;
		Kuvat on piilotettu ja kortista näkyy taustaväri;
		CLICK => kortti auki;
				JOS kuvat ovat samat => jätetään kuva näkyviin;
				MUUTEN piilotetaan kuvat;
			JOS kaikki kortit löydetty => peli päättyy;
		Näytä arvausten lukumäärä ja kulutettu aika;
		LOPPU;
*/

//Pelin ja selaimen päivitys-elementti ja kuvat pelille.
const lataaUudelleenEl = document.getElementById("reload-el");
const pelilautaKuvat = [
  "/2022/FrontEnd/Projektit/lopputehtava/img/kuva-1.jpg",
  "/2022/FrontEnd/Projektit/lopputehtava/img/kuva-2.jpg",
  "/2022/FrontEnd/Projektit/lopputehtava/img/kuva-3.jpg",
  "/2022/FrontEnd/Projektit/lopputehtava/img/kuva-4.jpg",
  "/2022/FrontEnd/Projektit/lopputehtava/img/kuva-5.jpg",
  "/2022/FrontEnd/Projektit/lopputehtava/img/kuva-6.jpg",
  "/2022/FrontEnd/Projektit/lopputehtava/img/kuva-7.jpg",
  "/2022/FrontEnd/Projektit/lopputehtava/img/kuva-8.jpg",
  "/2022/FrontEnd/Projektit/lopputehtava/img/kuva-9.jpg",
  "/2022/FrontEnd/Projektit/lopputehtava/img/kuva-10.jpg"
];

//Paikalliset muuttujat.
let avattuLaatikko = "",
		avattuKuva = "",
		arvaukset = 0,
		loydettyKuva = 0,
		sekunti = 0,
		nykyinenAika = 0;


//Alussa luodaan kuville div-elementit card-luokalla, click toiminto ja sekoitetaan järjestys.
$(document).ready(function() {
		for (let kymmenet = 0; kymmenet < 2 ; kymmenet++) 
		{
			$.each(pelilautaKuvat, function(ykkoset, elementti) {
				$("#table-el").append("<div id=card" + kymmenet + ykkoset + "><img src=" + elementti + " />");
			});
		}
		$("#table-el" + " div").click(avaaKortti);
		sekoitaKuvalista();
});

//Satunnainen numero.
function satunnainenLukuValilta(minNumero, maxNumero) {
		return Math.round(Math.random() * (minNumero - maxNumero) + maxNumero);
}

//Sekoitetaan kuvat satunnaiseen järjestykseen. 
function sekoitaKuvalista() {
	let kaikkiKuvat = $("#table-el").children();
	let yksiListanKuva = $("#table-el" + " div:first-child");
	let uusiKuvaLista = [];

		for (let i = 0; i < kaikkiKuvat.length; i++) 
		{
			uusiKuvaLista[i] = $("#" + yksiListanKuva.attr("id") + " img").attr("src");
			yksiListanKuva = yksiListanKuva.next();
		}

		yksiListanKuva = $("#table-el" + " div:first-child");
			for (let i = 0; i < kaikkiKuvat.length; i++) 
			{
			let satunnainenNumero = satunnainenLukuValilta(0, uusiKuvaLista.length - 1);
				$("#" + yksiListanKuva.attr("id") + " img").attr("src", uusiKuvaLista[satunnainenNumero]);
				uusiKuvaLista.splice(satunnainenNumero, 1);
				yksiListanKuva = yksiListanKuva.next();
			}
}


//Tarkistetaan avattujen kuvien yhteensopivuus ja lisätään arvauksia yhdellä. Parit löydettyä näytetään kulutettu aika ja arvausten lukumäärä.
function avaaKortti() {
	let id = $(this).attr("id");
	let toinenAvattuKuva = "";

	if ($("#" + id + " img").is(":hidden")) {
		$("#table-el" + " div").unbind("click", avaaKortti);
		$("#" + id + " img").slideDown("fast");

		if (avattuKuva == "") {
			avattuLaatikko = id;
			avattuKuva = $("#" + id + " img").attr("src");
			setTimeout(function() {
				$("#table-el" + " div").bind("click", avaaKortti)
			}, 300);
		} else {
				toinenAvattuKuva = $("#" + id + " img").attr("src");
				arvaukset++;

				if (avattuKuva != toinenAvattuKuva) {
					setTimeout(function() {
						$("#" + id + " img").slideUp("fast");
						$("#" + avattuLaatikko + " img").slideUp("fast");
						avattuLaatikko = "";
						avattuKuva = "";
					}, 400);
				} else {
					$("#" + id + " img").parent().css("visibility", "");
					$("#" + avattuLaatikko + " img").parent().css("visibility", "");
					loydettyKuva++;
					avattuLaatikko = "";
					avattuKuva = "";
				}

				setTimeout(function() {
					$("#table-el" + " div").bind("click", avaaKortti)
				}, 400);
				$("#guesses-el").html(0 + arvaukset);
		}
		
		if (loydettyKuva == pelilautaKuvat.length) {
			$("#item-el").hide();
			$("#guesses-el").prepend("<span>Löysit kaikki parit käyttäen </span>");
			$("#seconds-el").prepend(" ja " + sekunti + " sekuntia.")
		}
	}
}

//Ajastimen käynnistys.
$("#table-el").one( "click", function() {
	aloitusAika();
});

//Ajastin.
function aloitusAika() {
	nykyinenAika = setInterval(function () {
			$("#time-el").text(sekunti)
			sekunti++;
	}, 1000)};

	//Ajastimen nollaus.
	function nollaaAjastin(nykyinenAika) {
		clearInterval(nykyinenAika);
	}

//Pelin asettaminen lähtötilanteeseen.
function nollaaPelilauta() {
	sekoitaKuvalista();
	nollaaAjastin(nykyinenAika);
	avattuLaatikko = "";
	avattuKuva = "";
	loydettyKuva = 0;
	arvaukset = 0;
	sekunti = 0;
	nykyinenAika = 0;
	$("#table-el" + " div img").hide();
	$("#table-el" + " div").css("visibility", "visible");
	$("#item-el").show();
	$("#seconds-el").html("");
	$("#guesses-el").html("" + arvaukset);
	$("#time-el").text(sekunti)
	$("#table-el").one( "click", function() {
		aloitusAika();
	});
}

//Tuplaklikkauksella päivitetään välilehti.
lataaUudelleenEl.addEventListener("dblclick", function () {
	location.reload();
})