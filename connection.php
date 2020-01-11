<?php 
    include("db_connection.php");
    
    if (isset($_POST["name"]) && !empty($_POST["name"])       
        && isset($_POST["psw"]) && !empty($_POST["psw"])) {
            $user_name = $_POST["name"];
            $psw = $_POST["psw"];
             
            $sql = "SELECT * FROM user where (user_name ='" . $user_name . "' or email = '". $user_name . "')
                    and password = '" . $psw . "'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                
                $_SESSION["user_name"] = $user_name;
                $_SESSION["first_name"] = $row["name"];
                $_SESSION["role"] = $row["role"];
                echo "connected";
            } else {
                echo "wrong_user";    
            }

        } else {
            echo "missing_data";
        }
