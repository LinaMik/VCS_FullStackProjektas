
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
// if (document.forms["reg-form"]) {
//   let date = document.forms["reg-form"]["reg-date"];

//   date.addEventListener("change", function () {
//     let today = new Date();
//     let today_date = today.toJSON().slice(0, 10);
//     if (date.value === today_date) {
//       let timeOptions = document.forms["reg-form"]["reg-time"];
//       // console.log(timeOptions.value);
//     }

//   });
// };
// Registracijos FormData. Laukas - aprasymas, atsiranda, tik jei pasirenkama paslauga "Kita"
if (document.getElementById("problem-desc")) {
  let desc = document.getElementById("problem-desc");

  desc.style.display = "none";
  let descLbl = document.getElementById("problem-desc-lbl");
  descLbl.style.display = "none";

  let selectService = document.getElementById("select-service");
  selectService.addEventListener("change", function (e) {

    if (e.target.value === "7") {
      desc.style.display = "block";
      descLbl.style.display = "block";
    } else {
      desc.style.display = "none";
      descLbl.style.display = "none";
    }
  });
};
///Registracijos validacija

if (document.getElementById("reg-form")) {
  document.getElementById("reg-form").addEventListener("submit", function (event) {
    let email = document.forms["reg-form"]["email"].value;

    if (email === "") {
      alert("Įveskite el. paštą!");
      return false;
    }

    event.preventDefault();

    let data = $(this).serialize();
    $.post("registration-result.php", data, function (result) {

      switch (result) {
        case ("success"):
          alert("Jūsų registracija sėkminga!");
          document.getElementById("reg-form").reset();
          break;

        case ("db_error"):
          alert("Nepavyko pasiekti duomenų bazės! Bandykite vėliau.");
          break;

        case ("wrong_email"):
          alert("Blogas pašto adresas!");
          break;

        case ("missing_data"):
          alert("Trūksta duomenų!");
          break;

        default:
          alert("Kažkas blogai!");
      }

    })
  })
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
if (document.getElementById("new-acc-form")) {
  document.getElementById("new-acc-form").addEventListener("submit", function (event) {

    event.preventDefault();

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

    let data = $(this).serialize();
    $.post("new-account-result.php", data, function (result) {

      switch (result) {
        case ("user_exists"):
          alert("Toks vartotojo vardas ar el.paštas jau egzistuoja!");
          break;

        case ("user_insert"):
          $("#new-acc-form").addClass("hide-form");
          $("#new-acc-created").text("SUKURTAS");
          break;

        case ("db_error"):
          alert("Nepavyko pasiekti duomenų bazės! Bandykite vėliau.");
          break;
        case ("wrong_email"):
          alert("Blogas pašto adresas!");
          break;
        case ("missing_data"):
          alert("Trūksta duomenų!");
          break;

        default:
          alert("Kažkas blogai!");
      }


    })

  })
}

//////////////////////////////////////////////////////////////////
//PRISIJUNGIMAS

if (document.getElementById("connect")) {
  document.getElementById("connect").addEventListener("submit", function (event) {

    event.preventDefault();

    //Slaptažodžio tikrinimas
    let name = document.forms["connect"]["name"].value;
    let psw = document.forms["connect"]["psw"].value;

    if (psw === "" || name === "") {
      alert("Nurodykite ir vartotojo vardą ir slaptažodį!");
      return false;
    }

    let data = $(this).serialize();
    $.post("connection.php", data, function (result) {

      switch (result) {
        case ("connected"):
          window.location.href = "user_page.php";
          break;

        case ("wrong_user"):
          alert("Tokio vartotojo nėra!");
          break;

        case ("missing_data"):
          alert("Įveskite vartotojo vardą ir slaptažodį!");
          break;

        default:
          alert("Kažkas blogai");
      }


    })

  })
}

//////////////////////////////////////////////////////////////////
// API - Naujienos

let url = 'https://newsapi.org/v2/everything?' +
  'country=lt&' +
  'q=auto&' +
  'from=2020-01-09&' +
  'sortBy=popularity&' +
  'apiKey=b7e6cd453576479e954b8d80af83b405';

// let url = "https://newsapi.org/v2/top-headlines?country=lt&category=technology&apiKey=b7e6cd453576479e954b8d80af83b405"

// $.get(url, function(data){
//   console.log(data);
// });

///////////////////////////////////////////////////////////////////
//// ADMIN PUSLAPIS - LENTELIU KOREGAVIMAS

//Kai pasirenkama lentele iš saraso, parodomi mygtukai
//Kaskart kai pasirenkama nauja lentele, tai uzslepiamos visos atidarytos formos
if (document.getElementById("admin-table-select")) {
  let adminBtn = document.getElementById("admin-btn");

  let selectTable = document.getElementById("admin-table-select");
  selectTable.addEventListener("change", function (e) {
    let table = e.target.value;
    if (table === "") {
      if (!adminBtn.classList.contains("hide-form")) {
        $("#admin-btn").addClass("hide-form");
        let forms = document.forms;
        for (let i = 0; i < forms.length; i++) {
          forms[i].setAttribute("class", "hide-form");
        }
      }
    } else {
      if (adminBtn.classList.contains("hide-form")) {
        $("#admin-btn").removeClass("hide-form");
      } else {
        let forms = document.forms;
        for (let i = 0; i < forms.length; i++) {
          forms[i].setAttribute("class", "hide-form");
        }
      }
    }
  });
};

//Kai spaudziamas mygtukas "Prideti", tai sukuriama forma pagal pasirinktos lenteles stulpelius
if (document.getElementById("admin-btn-add")) {
  document.getElementById("admin-btn-add").addEventListener("click", function () {

    let forms = document.forms;
    for (let i = 0; i < forms.length; i++) {
      if (!forms["form-add-row"]) {
        forms[i].setAttribute("class", "hide-form");
      }
    }

    document.getElementById("admin-list-div").setAttribute("class", "hide-form");

    let tableName = document.getElementById("admin-table-select").value;

    let data = { table_name: tableName, table_action: "add", table_type: "columns" };

    $.post("table_data.php", data, function (result) {
      let columns = JSON.parse(result);
      let forma = '<form id="form-add-row" name="form-add-row">';
      for (let i = 0; i < columns.length; i++) {
        forma += '<input type="text" name="' + columns[i] + '" placeholder="' + columns[i] + '">';
      }
      forma += '<button class="btn blue-grey darken-1">Registruoti</button>';
      forma += '</form>';
      document.getElementById("admin-add-div").innerHTML = forma;
    });

  });
};


//iraso pridejimas
//Nuburbuliavimas - Event Delegation
//Prisegamas Event'as formai, kuri dar nebuvo sukurta
if ($("#admin-add-div")) {
  $("#admin-add-div").on("submit", "form", function (event) {
    event.preventDefault();
    let tableName = document.getElementById("admin-table-select").value;

    let data = $(this).serialize();
    data += "&table_action=add&table_type=submit&table_name=" + tableName;
    $.post("table_data.php", data, function (result) {
      switch (result) {
        case ("success"):
          alert("Naujas įrašas pridėtas!");
          document.getElementById("form-add-row").reset();
          break;

        case ("db_error"):
          alert("Nepavyko pasiekti duomenų bazės! Bandykite dar kartą");
          break;

        case ("missing_data"):
          alert("Užpildykite visus laukus!");
          break;

        default:
          alert(result);
      }
    })
  })
}


//Kai spaudziamas mygtukas "Peržiūrėti"
if (document.getElementById("admin-btn-list")) {
  document.getElementById("admin-btn-list").addEventListener("click", function () {
    document.getElementById("admin-list-div").setAttribute("class", " ");
    let forms = document.forms;
    for (let i = 0; i < forms.length; i++) {
        forms[i].setAttribute("class", "hide-form");
    }

    let tableName = document.getElementById("admin-table-select").value;

    let data = { table_name: tableName, table_action: "list"};

    $.post("table_data.php", data, function (result) {
      let data = JSON.parse(result);
      data_list = "<ul>"

      for (key in data) {
        data_list += "<li>";
        for (key2 in data[key]){
          data_list += "<span>" + key2 + " </span> " + data[key][key2] + "; ";
        }
        data_list += "</li><hr>";
      }
      data_list += "</ul>"
      document.getElementById("admin-list-div").innerHTML = data_list;
    });

  });
};