<?php
    function generate_header_bottom($masyvas) {
        $list = "";

        for($i = 0; $i < count($masyvas); $i++){
            $list .= '<div class="header-bottom-child blue-grey darken-1">
                        <i class="medium material-icons">'.$masyvas[$i][0].'</i>
                        <h5><span>'.explode(' ',$masyvas[$i][1])[0].'</span><br>'.explode(' ',$masyvas[$i][1])[1].'</h5>
                    </div>' ;
        }

        return $list;
    }

    $pas1 = ["",""];
    $pas2 = ["kasmetine-patikra","Kasmetinė patikra"];
    $pas3 = ["padangu-keitimas","Padangų keitimas"];
    $pas4 = ["tepalu-keitimas","Tepalų keitimas"];
    $pas5 = ["variklio-darbai","Variklio darbai"];
    $pas6 = ["kebulo-darbai","Kėbulo darbai"];
    $pas7 = ["kita","Kita"];
    $paslaugu_sarasas = [$pas1, $pas2, $pas3, $pas4, $pas5, $pas6, $pas7];

    $val0 = ["",""];
    $val1 = ["9","9:00"];
    $val2 = ["10","10:00"];
    $val3 = ["11","11:00"];
    $val4 = ["12","12:00"];
    $val5 = ["13","13:00"];
    $val6 = ["14","14:00"];
    $val7 = ["15","15:00"];
    $val8 = ["16","16:00"];
    $val9 = ["17","17:00"];
    $valandu_sarasas = [$val0, $val1, $val2, $val3, $val4, $val5, $val6, $val7, $val8, $val9];


    function generate_select_list($masyvas) {
        $list = "";
        for($i = 0; $i < count($masyvas); $i++){
            if ($masyvas[$i][0]==""){
                $list .= '<option>'.$masyvas[$i][1].'</option>';
            } else {
                $list .= '<option value="'.$masyvas[$i][0].'">'.$masyvas[$i][1].'</option>' ;
            };
        }

        return $list;

    }


?>

