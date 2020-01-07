
//////////////////////////////////////
////Naujo vartotojo registracija

function formosValidacija() {
  //Slaptažodžio tikrinimas
  let psw1 = document.forms["new-acc"]["psw"].value;
  let psw2 = document.forms["new-acc"]["psw-2"].value;

  if (psw1 !== psw2 || psw1 === "") {
    alert("Nesutampa slaptažodis!");
    return false;
  }

  if (psw1.length < 9) {
    alert("Slaptažodis turi talpinti bent 8 simbolius!");
    return false;
  }

  let containNumber = false;
  for (let i = 0; i < 10; i++) {
    containNumber = psw1.includes("" + i);
    if (containNumber) {
      containNumber = true;
      break;
    }
  }

  if (!containNumber) {
    alert("Slaptažodis turi talpinti bent vieną skaičių!");
    return false;
  }

}