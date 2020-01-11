<?php

    $server = "localhost";
    $user = "root";
    $psw = "";
    $db = "servisas";

    $conn = mysqli_connect($server, $user, $psw, $db);


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>