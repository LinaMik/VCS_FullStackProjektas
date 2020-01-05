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

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });

//////////////////////////////////////////////
//Datos pasirinkimas formoje
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems,"yyyy mm dd");
  });

//////////////////////////////////////////////
//uzvedus ant prisijungimo ikonos parodo paaiskinima
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
  });

  /////////////////////////////////////////////
  //Saraso siskleidimas - prisijungimas paspaudus ant nuorodos

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
  });

