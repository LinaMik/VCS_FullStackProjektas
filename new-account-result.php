<?php 
    include("db_connection.php");
    
    if (isset($_POST["user-name"]) && !empty($_POST["user-name"]) && isset($_POST["first-name"]) &&
        isset($_POST["last-name"]) && isset($_POST["email"]) && !empty($_POST["email"]) &&
        isset($_POST["phone"]) && isset($_POST["psw"]) && !empty($_POST["psw"])) {
            $user_name = trim($_POST["user-name"]);
            $email = trim($_POST["email"]);
            $sql = "SELECT * FROM user where user_name ='" . $user_name . "' or email = '" . $email . "'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0){
                echo "user_exists";
            } else {
                $psw = $_POST["psw"];
                
                $name = trim($_POST["first-name"]);
                $surname = trim($_POST["last-name"]);
                $phone = trim($_POST["phone"]);

                // Tikrinama pasto struktura
                if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $sql = "INSERT INTO user (user_name, name, surname, email, phone, password) 
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
                
            }

        } else {
            echo "missing_data";
        }
