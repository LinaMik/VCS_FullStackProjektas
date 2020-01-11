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
                $sql = "INSERT INTO registrations (name, name, surname, email, phone, password) 
                            VALUES ('$user_name', '$name', '$surname', '$email', '$phone', '$psw')";

                if (mysqli_query($conn, $sql)){
                    $subject = "Registracija sėkminga";
                    $txt = "Sveiki! \n 
                                Sveikiname sėkmingai užsiregistravus Aminta serviso puslapyje. \n 
                                Lauksime atvykstant!";
                    $headers = "From: info@aminta.lt";
                    //Laisko siuntimo funkcija
                    // $headers = "From: " . $email . "\r\n" .
                    //     "CC: lina.mikelionyte@gmail.com";
                    //mail($email, $subject, $txt, $headers);
                        
                    echo "user_insert";
                } else {
                    echo "db_error";
                }

            } else {
                echo "wrong_email";
            }
                
        } else {
            echo "missing_data";
        }

