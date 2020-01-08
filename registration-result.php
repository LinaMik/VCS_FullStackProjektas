<?php include("functions.php") ?>
<!DOCTYPE html>
<html lang="lt">

<?php include("head.php") ?>

<body>
    <a href="index.php#" class="brand-logo"><img class="logo" src="images/logo.png" alt=""></a>

    <?php
    if (
        isset($_POST["name"]) &&
        isset($_POST["email"]) && isset($_POST["phone"]) &&
        (!empty($_POST["email"]) || !empty($_POST["phone"]))
    ) {
        echo "<h4>Jūsų registracija gauta! Susisieksime artimiausiu metu suderinti tikslų laiką!</h4>";

        if (!empty($_POST["email"])) {
            $to = trim($_POST["email"]);
            $subject = "Registracija į servisą ";
            $date = isset($_POST["reg-date"]) ? $_POST["reg-date"] : "";

            $time = isset($_POST["reg-time"]) ? $_POST["reg-time"] : "";
        
            $message = "Sveiki, \n patvirtiname, kad gavome Jūsų registraciją į servisą " . $date . " datai " . $time . " valandai.";
            // $message = "Sveiki, \n patvirtiname, kad gavome Jūsų registraciją į servisą " . $date . " datai ";
            // mail($to, $subject, $message);
            echo "<p>" . $message . "</p>";
            echo "<p>Jums išsiųstas laiškas adresu: " . $to . "</p>";
        }
    }

    ?>

    <?php include("footer.php") ?>

    <!-- Framework iš čia https://materializecss.com/getting-started.html -->
    <!-- Rašyti virš savo js failo, kad mano js failas būtų vėliau ir perrašytų ką reikia -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- anime.js biblioteka -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>

    <script src="scripts/script-reg.js"></script>
</body>

</html>