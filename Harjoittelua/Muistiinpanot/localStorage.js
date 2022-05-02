// Kuinka saadaan tallennettua localstorageen.

//Asetetaan ensin muuttujille arvot:
const inpKey = document.getElementById('inpKey');
//tai
const inpValue = $('#inpValue');
const isOutput = $('#isOutput');

//Tallennetaan napin painalluksella arvot:
btnInsert.onclick = function () {
  const key = inpKey.value;
  const value = inpValue.value;

  if (key && value) {
    localStorage.setItem(key, value);
    location.reload();
  }
}

//Haetaan localstoragesta avain ja arvo. Tulostetaan ne sivustolle.

for (let i = 0; i < localStorage.length; i++) {
  const key = localStorage.key(i);
  const value = localStorage.getItem(key);

  isOutput.innerHTML += '${key}: ${value} <br>';
}