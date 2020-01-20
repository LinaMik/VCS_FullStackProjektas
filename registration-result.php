<?php 
    include("db_connection.php");
    
    if (isset($_POST["name"]) && !empty($_POST["name"]) && 
        isset($_POST["email"]) && !empty($_POST["email"]) &&
        isset($_POST["phone"]) && !empty($_POST["phone"]) && 
        isset($_POST["service"]) && !empty($_POST["service"]) &&
        isset($_POST["problem"]) && isset($_POST["reg-date"]) &&
        !empty($_POST["reg-date"]) && isset($_POST["reg-time"]) && 
        !empty($_POST["reg-time"])) {

            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            $phone = trim($_POST["phone"]);

            // Tikrinama pasto struktura
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                //Reikia patikrinti ar su tokiu el. pastu egzistoja vartotojas.
                //Jeigu egzistuoja tai būtent tam vartotojui priskirti darbą
                $sql = "SELECT * FROM user where email = '" . $email ."'";
                $result = mysqli_query($conn, $sql);
                $user_id = null;

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $user_id = $row["user_name"];
                }

                $product = trim($_POST["service"]);
                $problem = trim($_POST["problem"]);
                $date = trim($_POST["reg-date"])." ".trim($_POST["reg-time"]);
                
                $sql = "INSERT INTO registrations (user_id, product_id, date, reg_id, reg_date, message, name, phone) 
                            VALUES ('$user_id', '$product', '$date', null, null, '$problem', '$name', '$phone')";

                if (mysqli_query($conn, $sql)){
                    $subject = "Registracija sėkminga";
                    $txt = "Sveiki! \n 
                                Jūsų darbų registracija gauta. Dėl patvirtinimo susisieksime artimiausiu metu! \n";
                    $headers = "From: info@aminta.lt";
                    //Laisko siuntimo funkcija
                    // $headers = "From: " . $email . "\r\n" .
                    //     "CC: lina.mikelionyte@gmail.com";
                    //mail($email, $subject, $txt, $headers);
                        
                    echo "success";
                } else {
                    echo "db_error";
                }

            } else {
                echo "wrong_email";
            }
                
        } else {
            echo "missing_data";
        }

?>