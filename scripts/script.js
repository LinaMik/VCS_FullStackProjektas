////////////////////////////////////
// Registracijos FormData. Laukas - aprasymas, atsiranda, tik jei pasirenkama paslauga "Kita"
let desc = document.getElementById("problem-desc");
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
})

///////////////////////////////////////////
// Neleidziama pasirinkti atgalines datos registracijai
// let today = new Date();
// let date = today.toJSON().slice(0, 10);
// let time = today.getHours();

// let selectDate = document.getElementById("reg-date-id");

// selectDate.value = date;
// selectDate.setAttribute("min", date);

// selectDate.addEventListener("change", function(e) {
//     if(e.target.value < );
// })

// Negalima atgaliniu laiku pasirinkti

// let timeOptions = document.getElementById("reg-time-id").getElementsByTagName("option");
// let selectedDate = document.getElementById("reg-date-id");

// if (selectedDate === date) {
//     for (i = 0; i < timeOptions.length; i++) {
//         if (parseInt(timeOptions[i].value, 10) < time)
//             timeOptions[i].disabled = true;
//     }
// }


/////////////////////////////////////////////////////
//Navigacija Materelize

document.addEventListener('DOMContentLoaded', function () {
  //Navigacija Materelize
  var elems = document.querySelectorAll('.sidenav');
  var instances = M.Sidenav.init(elems);

  //Datos pasirinkimas formoje
  var date_pic = document.querySelectorAll('.datepicker');
  var instance2 = M.Datepicker.init(date_pic, { format: "yyyy mm dd", autoClose: true });

});


/////////////////////////////////////////////
//Statistikos animacija

let arPrasisuko = false;

window.addEventListener("scroll", function (e) {

  let stat_position = document.getElementById("about").offsetTop;

  let now_pos = this.scrollY
  if (now_pos = stat_position && !arPrasisuko) {
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

let abou_sec = document.getElementById("about").addEventListener("mouseover", function () {
  anime({
    targets: ".about-img",
    // Properties 
    translateX: -100,
    // borderRadius: 50,
    // Property Parameters
    duration: 50,
    easing: 'linear',
    // Animation Parameters
    direction: 'alternate'
  });


  // anime({
  //   targets: ".about-sec-child h4, .about-sec-child p",
  //   // Properties 
  //   translateX: 100,
  //   borderRadius: 50,
  //   // Property Parameters
  //   duration: 500,
  //   easing: 'linear',
  //   // Animation Parameters
  //   direction: 'alternate'
  // });

});

/////////////////////////////////////
///Prisijungimo mygtukas

let con_btn = document.getElementById("connection")

con_btn.addEventListener("click", function(){
  let elem = document.getElementById("connection-form") 
    if (elem.classList.contains("con-on")) {
      elem.setAttribute("class", "");
    } else {
      elem.setAttribute("class", "con-on");
    }
});

