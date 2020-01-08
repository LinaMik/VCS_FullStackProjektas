
/////////////////////////////////////////////////////
//              MATERIALIZE

document.addEventListener('DOMContentLoaded', function () {
  //Navigacija Materelize
  var elems = document.querySelectorAll('.sidenav');
  var instances = M.Sidenav.init(elems);

  //Datos pasirinkimas formoje
  // Neleidziama pasirinkti atgalines datos registracijai
  let today = new Date();

  var date_pic = document.querySelectorAll('.datepicker');
  var instance2 = M.Datepicker.init(date_pic, { format: "yyyy-mm-dd", autoClose: true, disableWeekends: true, minDate: today });

});

/////////////////////////////////////////////////////////
//         PASLAUGOS REGISTRACIJOS FORMA

// Negalima pasirinkti laiko, kuris praėjo
if (document.forms["reg-form"]) {
  let date = document.forms["reg-form"]["reg-date"];

  date.addEventListener("change", function () {
    let today = new Date();
    let today_date = today.toJSON().slice(0, 10);
    if (date.value === today_date) {
      let timeOptions = document.forms["reg-form"]["reg-time"];
      // console.log(timeOptions.value);
    }

  });
};
// Registracijos FormData. Laukas - aprasymas, atsiranda, tik jei pasirenkama paslauga "Kita"
if (document.getElementById("problem-desc")) {
  let desc = document.getElementById("problem-desc");
  console.log(desc);
  desc.style.display = "none";
  let descLbl = document.getElementById("problem-desc-lbl");
  descLbl.style.display = "none";

  let selectService = document.getElementById("select-service");
  selectService.addEventListener("change", function (e) {
    if (e.target.value === "kita") {
      desc.style.display = "block";
      descLbl.style.display = "block";
    } else {
      desc.style.display = "none";
      descLbl.style.display = "none";
    }
  });
};
///Registracijos validacija

function registracijosValidacija() {
  let phone = document.forms["reg-form"]["phone"].value;
  let email = document.forms["reg-form"]["email"].value;

  if (phone === "" && email === "") {
    alert("Įveskite telefono numerį arba el. paštą!");
    return false;
  }
  return true;
}


/////////////////////////////////////////////////////
//               STATISTIKOS ANIMACIJA

if (document.getElementById("header-body") && document.getElementById("about") && document.getElementById("why-us")) {
  let arPrasisuko = false;

  window.addEventListener("scroll", function (e) {

    //ABOUT sekcijos animacija
    let header_sec = document.getElementById("header-body").offsetTop;
    let about_sec = document.getElementById("about").offsetTop;
    let about_position = about_sec - 0.9 * (about_sec - header_sec);

    let now_pos = this.scrollY;

    if (now_pos >= about_position) {
      document.getElementById("about").classList.add("visible");
    }

    //STATISTIKOS sekcijos animacija
    let stat_position = document.getElementById("why-us").offsetTop - 550;

    if (now_pos >= stat_position && !arPrasisuko) {
      arPrasisuko = true;
      let elem1 = document.getElementById("statistics-animation1");
      let elem2 = document.getElementById("statistics-animation2");
      let elem3 = document.getElementById("statistics-animation3");
      let elem4 = document.getElementById("statistics-animation4");

      let rez1 = 20;
      let rez2 = 520;
      let rez3 = 750;
      let rez4 = 5;

      let max_value = Math.max(rez1, rez2, rez3, rez4);

      //Laikas per kuri turi prasisukti skaitliukas
      let final_time = 2000;

      let interval_time = final_time / max_value;

      //Koeficientai - santykis su didziausia reiksme
      let koef1 = rez1 / max_value;
      let koef2 = rez2 / max_value;
      let koef3 = rez3 / max_value;
      let koef4 = rez4 / max_value;

      //intervalas
      let i = 0;
      let i1 = 0;
      let i2 = 0;
      let i3 = 0;
      let i4 = 0;
      let id = setInterval(intervalas, interval_time);

      function intervalas() {

        i1 += koef1;
        i2 += koef2;
        i3 += koef3;
        i4 += koef4;
        i++;

        if (i === max_value) {
          clearInterval(id);
        }

        if (Math.ceil(i1) <= rez1) { elem1.innerHTML = Math.ceil(i1); }
        if (Math.ceil(i2) <= rez2) { elem2.innerHTML = Math.ceil(i2); }
        if (Math.ceil(i3) <= rez3) { elem3.innerHTML = Math.ceil(i3); }
        if (Math.ceil(i4) <= rez4) { elem4.innerHTML = Math.ceil(i4); }

      };

    }
  });
};

//////////////////////////////////////////
//        VARTOTOJO PRISIJUNGIMAS
///Prisijungimo mygtukas

if (document.getElementById("connection")) {
  let con_btn = document.getElementById("connection")

  con_btn.addEventListener("click", function (e) {
    // e.preventDefault();
    let elem = document.getElementById("connection-form")
    if (elem.classList.contains("con-on")) {
      elem.setAttribute("class", "");
    } else {
      elem.setAttribute("class", "con-on");
    }
  });
}


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
