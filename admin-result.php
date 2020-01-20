<?php
include("db_connection.php");

if (
    isset($_POST["table-name"]) && !empty($_POST["table-name"]) &&
    isset($_POST["table-action"]) && !empty($_POST["table-action"])
) {
    if ($_POST["table-action"] === "add") {

        $table_name = trim($_POST["table-name"]);
        $sql = "SELECT column_name FROM information_schema.columns
        WHERE table_schema = 'servisas' and table_name = '$table_name'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $columns = [];
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($columns, $row["column_name"]);
            }

            $column_id = "";
            $column_value = "";
            for ($i = 0; $i < count($columns); $i++) {
                if (empty($_POST["$columns[$i]"])) {
                    echo "missing_data";
                    return;
                }
                $column_id .= "," . $columns[$i];
                $column_value .= ",'" . $_POST["$columns[$i]"] . "'";
            }

            $column_id = substr($column_id, 1);
            $column_value = substr($column_value, 1);

            $sql = "INSERT INTO $table_name ($column_id) VALUES ($column_value)";
            
            if (mysqli_query($conn, $sql)) {
                echo "success";
            } else {
                echo mysqli_error($conn);
            }
        } else {
            echo "db_error";
        }
        // $sql = "INSERT INTO user (user_name, name, surname, email, phone, password) 
        //                     VALUES ('$user_name', '$name', '$surname', '$email', '$phone', '$psw')";

        // if (mysqli_query($conn, $sql)) {

        //     echo "success";
        // } else {
        //     echo "db_error";
        // }
    }
} else {
    echo "missing_data";
}
