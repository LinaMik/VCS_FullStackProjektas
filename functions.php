<?php
// Generuojami div elementai hederio apacioje
function generate_header_bottom($masyvas)
{
    $list = "";

    for ($i = 0; $i < count($masyvas); $i++) {
        $list .= '<div class="header-bottom-child blue-grey darken-1">
                        <i class="medium material-icons">' . $masyvas[$i][0] . '</i>
                        <h5><span>' . explode(' ', $masyvas[$i][1])[0] . '</span><br>' . explode(' ', $masyvas[$i][1])[1] . '</h5>
                    </div>';
    }

    return $list;
}

// Select sarasams sugeneruojami masyvai

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
$paslaugu_sarasas = [["", ""]];

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $elem = [$row["id"], $row["name"]];
        array_push($paslaugu_sarasas, $elem);
    }
}

$val0 = ["", ""];
$val1 = ["9", "9:00"];
$val2 = ["10", "10:00"];
$val3 = ["11", "11:00"];
$val4 = ["12", "12:00"];
$val5 = ["13", "13:00"];
$val6 = ["14", "14:00"];
$val7 = ["15", "15:00"];
$val8 = ["16", "16:00"];
$val9 = ["17", "17:00"];
$valandu_sarasas = [$val0, $val1, $val2, $val3, $val4, $val5, $val6, $val7, $val8, $val9];

// Funkcija generuojanti select sarasus
function generate_select_list($masyvas)
{
    $list = "";
    for ($i = 0; $i < count($masyvas); $i++) {
        if ($masyvas[$i][0] == "") {
            $list .= '<option>' . $masyvas[$i][1] . '</option>';
        } else {
            $list .= '<option value="' . $masyvas[$i][0] . '">' . $masyvas[$i][1] . '</option>';
        };
    }

    return $list;
}

// Funkcija generuojanti statistikos div'us
$stat_indicators = ["metų patirties", "patenkintų klientų", "suremontuotų automobilių", "kvalifikuoti mechanikai"];

function generate_stat_div($masyvas)
{
    $list = "";
    for ($i = 0; $i < count($masyvas); $i++) {
        $list .= '<div>
                <h3 id="statistics-animation'.($i+1).'">0</h3>
                <p>' . $masyvas[$i] . '</p>
                </div>';
        
    }

    return $list;
}

//Funkcija generuojanti paslaugu sarasa su nuotraukomis
function generate_services_list($conn)
{
    $sql = "SELECT * FROM services";
    // $result = mysqli_query($_SESSION["connection-id"], $sql);
    $result = mysqli_query($conn, $sql);
    $list = "";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $list .= '<div class="srvc-div col s12 m3">
                      <a href="services.php?id=' . trim($row["id"]) . '"><img class="service-img" src=' . trim($row["image_url"]) . ' alt=""></a>
                      <h6>' . trim($row["title"]) . '</h6>
                      </div>';
        }
    }
    return $list;
}


