//Nimetään muuttuja ja syötetään sille arvo.
var nimi = "Ismo";
var kaupunki = "Tampere";
var ika = "30";
//Lähetetään muuttuja virtuaaliseen hälytysruutuun.
alert(nimi);
alert(kaupunki);
alert(ika);

// var = (variable eli muuttuja), johon annetaan syöte kirjoittamalla sen eteen muuttujalle nimi, esim. var henkiö = "Ismo". Nyt muuttujan nimeksi on annettu nyt "henkilö", joka on arvoltaan Ismo.
// Muuttujassa ei saa käyttää avainsanoja, pitää alkaa kirjaimella tai alaviivalla, ei välilyöntejä.
// Huomio myös, että Nimi ja nimi ovar eri muuttujia.



//* Yleistä tietoa ohjelmoinnista

//! Tämä merkitään punaisella ja on hyvä ilmoittamaan virheistä, yms.
//? Tämä merkitään sinisellä ja on hyvä ilmoittamaan kysymyksiä, tapahtumia, yms.
//TODO: Tämä kirjoitetaan oransilla ja osoittaa tekemättömiä tehtäviä, yms.
//// Tämä yliviivaa tekstin ja voidaan käyttää tehdyn tehtävän yliviivauksessa.


//Ulkoiset scriptit (script.js-tiedostot) ovat hyviä silloin, kun halutaan käyttää samaa koodia muissa lähteissä.
// Scriptin sijoittaminen HTML bodyn loppuosaan nopeuttaa prosessointia.    
//Ulkoiset scriptit ovat hyviä silloin, kun halutaan käyttää samaa koodia muissa lähteissä.
//Scriptin sijoittaminen HTML bodyn loppuosaan nopeuttaa prosessointia. 

//Javascripti lisää verkkosivulle toiminnallisuutta. JavaScript on dynaamisesti tyypitetty, tulkattava oliopohjainen komentosarjakieli, jonka syntaksi perustuu löyhästi C-ohjelmointikieleen. JSON = JavaScript Object Notation perustuu JavaScriptin tietorakenteisiin, mutta sitä käytetään muissakin ohjelmointikielissä. Esimerkiksi web-sovelluksissa JSON on yleinen tiedonsiirtomuoto.

//Yleisiä termejä käytössä:

//API (Application Program Interface) = sovellusohjelman käyttöliittymä.
//array = ryhmä, joukko
//argument = perustelu, peruste, väite
//alert = hälytys
//assignment = toimeksianto, tehtävä
//assingment statement = toimeksiantolausunto
//attribute = tiedon ominaisuus
//authentication = todennus, todentaminen
//block = lohko
//bundler = niputtaja
//case sensitive = kirjainkoolla huomioitavaa
//class = luokka, ryhmä, tyyli, kategoria
//container = säiliö, kontti
//conditional = ehdollinen
//constant = vakio
//constructor = rakentaja
//compiled = koottu
//comma = pilkku
//data types = tietotyypit
//dot = piste
//declare = julistaa, perustaa
//echo = kaiku, toistaa
//extend = laajentaa, ulottuu
//function = toiminto, tehtävä, toiminta (verbi: toimia)
//feature = esillä oleva ominaisuus
//framework = puitteet, runko, rakenteet, rakenne
//hoisting = nosto
//inheritance = perintö
//initialize = alustaa, antaa alkuarvot
//index = hakemisto, luettelo
//item = esine, kappale, nimike
//interpreted = tulkittu
//integer = kokonaisluku
//involves = mukana
//log = loki, lokikirja
//main clause = päälause
//markup = merkintä
//Null = tyhjä, nolla
//objective = tavoite
//object = esine, kohde, päämäärä
//parameter = kriteeri, parametri
//paragraph = kappale
//parentheses = suluissa
//phrase = lauseke
//prompt = muistutus, antaa vihje
//property = omaisuus eli omaisuuden ominaisuus, joka määrittää arvon.
//prerequisites = edellytykset
//query = kysely, tiedustella
//scope = laajuus, ala, piiri, rajat
//semicolon = puolipiste
//sentence = lause, virke
//statement = lausunto, ilmaisu, julkilausuma
//simultaneously = samanaikaisesti
//syntax = lauseoppi
//string = merkkijono
//script = kirjoitus, käsikirjoitus tai kirjaimisto
//scope = ala, piiri, laajuus
//subordinate clause = sivulause
//tag = merkki, lappu, tägi
//template = sapluuna eli malli
//toggle = vaihtaa
//typescript = konekirjoitus
//variable = muuttuja, muuttuva tekijä





/*

AJAX on lyhenne sanoista Asynchronous JavaScript and XML. Se on joukko toisiinsa liittyviä teknologioita, kuten JavaScript, DOM, XML, HTML/XHTML, CSS, XMLHttpRequest jne.
AJAXin avulla voit lähettää ja vastaanottaa tietoja asynkronisesti lataamatta verkkosivua uudelleen.

Synkroninen (klassinen verkkosovellusmalli)
Synkroninen pyyntö estää asiakkaan, kunnes toiminto on valmis, eli selain ei vastaa. Tässä tapauksessa selaimen javascript-moottori on estetty.

Asynkroninen (AJAX-verkkosovellusmalli)
Asynkroninen pyyntö ei estä asiakasta, eli selain pystyy reagoimaan. Tällöin käyttäjä voi suorittaa myös muita toimintoja. Tässä tapauksessa selaimen javascript-moottoria ei ole estetty.

Mikä on REST

REST tarkoittaa Representational State Transfer (Edustusvaltion siirto).
Arkkitehtuurityyli verkkosovellusten suunnitteluun.
Luottaa tilattomaan asiakas-palvelin-protokollaan, melkein aina HTTP:hen.
Käsittelee palvelinobjekteja resursseina, jotka voidaan luoda tai tuhota.
Voidaan käyttää käytännössä millä tahansa ohjelmointikielellä.

Järjestelmäohjelma on tietokonejärjestelmän sisäistä toimintaa ohjaava tietokoneohjelma tai ohjelmisto kuten käyttöjärjestelmä.

Sovellusohjelmia (käytännössä kaikki ne ohjelmat, joita loppukäyttäjä käyttää) on tietokoneohjelma, joka on suunniteltu jonkin tietyn tehtävän helpottamiseen tai ongelman ratkaisemiseen.

Parametri tai argumentti tarkoittaa tietotekniikassa ohjelmalle tai komentojonotiedostolle käynnistyksen yhteydessä välitettäviä tietoja, sekä ohjelmoinnissa funktiolle tai käskylle välitettäviä tietoja.

Tiukemmin määriteltynä aliohjelmaa kutsuttaessa tietoja kutsutaan argumenteiksi ja aliohjelman sisällä tietoja kutsutaan parametreiksi. Argumenttien/parametrien lukumäärälle on olemassa termi ariteetti.

attribute = tiedon ominaisuus; Tieto, joka määrittää kentän tai tunnisteen ominaisuudet tietokannassa tai merkkijonon näytössä. Asian tai olion ominaisuus tai määre.

Metodi tarkoittaa menetelmää, tapaa suorittaa määrämuotoisesti askel askeleelta edistyvä toimintoketju, jossa saavutetaan tavoiteltu tehtävä tai päämäärä. Sana metodi on johdettu kreikan kielen sanasta methodos, joka tarkoittaa sananmukaisesti ”kuljettava tie”. Etenkin tietoteoriassa keinoja tiedon hankkimiseen ja tutkimusmenetelmiä on nimitetty metodeiksi.

Ominaisuus viittaa filosofiassa, logiikassa ja matematiikassa entiteetin, olion tai substanssin jonkin piirteen abstraktioon. Esimerkiksi punaisella oliolla on ”punaisuuden” ominaisuus.

Olio on olio-ohjelmoinnissa ohjelmiston perusyksikkö, joka sisältää joukon loogisesti yhteenkuuluvaa tietoa (attribuutteja) ja toiminnallisuutta (jäsenfunktioita eli metodeja).

Oliot voivat kommunikoida keskenään lähettämällä viestejä tai kutsumalla toisen olioiden metodeja. Viestin vastaanottaminen suorittaa määritellyn toiminnon vastaanottavassa oliossa. Oliota käytetään ohjelmistosuunnittelussa esittämään jonkin abstraktin tai reaalimaailman käsitteen ilmentymää ohjelmistossa. Oliokielillä laaditut ohjelmat koostuvat tavallisesti lukuisista olioista, joiden yhteistyön tuloksena on ratkaisu ohjelmointiongelmaan.

Oliolla on määritelmä, josta käytetään nimeä luokka. Luokka määrittelee jonkun tietyn oliojoukon yhteiset piirteet. Olio luodaan laatimalla luokan ilmentymä eli instanssi, esimerkiksi varaamalla olion vaatima muisti. Esimerkiksi henkilörekisteriohjelmassa voidaan määritellä luokka Henkilö, joka määrittelee millaista tietoa henkilöistä halutaan esittää ja millä tavalla näitä tietoja voidaan käsitellä. Ohjelman ajon aikana luokasta Henkilö luodaan olioita esittämään yksittäisiä henkilöitä.

Oliokielissä oliot toteutetaan ajonaikaisina tietorakenteina, jotka sisältävät jäsenmuuttujat olion tiedon tallentamiseen. Olioiden toiminnallisuus määritellään useimmiten luokkien jäsenfunktioissa, jolloin kaikki saman luokan oliot sisältävät täsmälleen saman toiminnallisuuden tiedon käsittelyyn. Oliokieli osaa selvittää olion määrittelevän luokan, eli tyypin, ja siten käyttää oikeita jäsenfunktioita eri olioiden yhteydessä. Oikean jäsenfunktion löytämiseen on kaksi keinoa. Joko kääntäjä voi tehdä sen käännöksen yhteydessä, jolloin puhutaan staattisesta sidonnasta, tai se tapahtuu ajonaikana, jolloin kyseessä on dynaaminen sidonta.[2]

Proseduuri on määritelmä sarjasta toimintoja, tehtäviä tai operaatioita, jotka tulee suorittaa aina samalla tavalla, jotta samoissa olosuhteissa saavutettaisiin aina sama lopputulos (kuten hätätilanteiden selvittämiseksi laadituissa proseduureissa). Toisin sanoen proseduuri tarkoittaa esimerkiksi päätösten, laskelmien tai prosessien sellaista suoritusjärjestystä, minkä mukaisesti tehtyinä ne aina tuottavat siinä kuvatun mukaisen tuloksen, tuotteen tai vaikutuksen. Yleensä proseduurin tarkoituksena on saada aikaan muutos vallitsevaan tilanteeseen.

Protokolla eli yhteyskäytäntö on käytäntö tai standardi, joka määrittelee tai mahdollistaa laitteiden tai ohjelmien väliset yhteydet ja tiedonsiirron. Toinen osapuoli lähettää viestin toiselle, tämä reagoi siihen ja mahdollisesti vastaa toisella viestillä protokollan mukaisesti. Abstraktimmin tämä voidaan nähdä tietokoneissa olevan tilakoneen tilan vaihtoina toisen koneen viestien perusteella.

Protokollat voivat olla suunniteltu itsenäisesti käytettäväksi tai kerroksittain kapseloimalla. Esimerkiksi käyttäytymisen Internet-tietoverkossa määrittelee TCP/IP-protokollaperhe.

Termiä kättely käytetään yksinkertaisesta protokollasta, jossa toinen tietokone ehdottaa jotain ja lopputuloksena tietokoneet sopivat yhteisen lopputuloksen.


*/