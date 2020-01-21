<a href="index.php#" class="brand-logo"><img class="logo" src="images/logo.png" alt=""></a>
<div class="container">
    <h4>PASIRINKITE LENTELĘ:</h4>
    <?php
    //Sukriamas Select puslapyje pagal visas DB egzistuojančias lenteles
    $sql = "SELECT table_name FROM information_schema.tables
        WHERE table_schema = 'servisas'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        echo '<select id="admin-table-select">';
        echo '<option></option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row["table_name"] . '">' . $row["table_name"] . '</option>';
        }

        echo "</select>";
    }
    ?>

    <div class="admin-btn hide-form" id="admin-btn">
        <button class="btn blue-grey darken-1" id="admin-btn-add">Pridėti įrašą</button>
        <button class="btn blue-grey darken-1" id="admin-btn-delete">Ištrinti įrašą</button>
        <button class="btn blue-grey darken-1" id="admin-btn-update">Koreguoti įrašą</button>
        <button class="btn blue-grey darken-1" id="admin-btn-list">Peržiūrėti įrašus</button>
    </div>

    <!-- Forma iraso pridejimui -->
    <div id="admin-add-div" class="">
    </div>

    <!-- Forma irasu parodymui -->
    <div id="admin-list-div" class="">
    </div>

</div>