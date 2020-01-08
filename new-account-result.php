
<?php include("functions.php") ?>
<!DOCTYPE html>
<html lang="lt">

<?php include("head.php") ?>

<body>
    <a href="index.php#" class="brand-logo"><img class="logo" src="images/logo.png" alt=""></a>
    <h4>Naujas vartotojas užregistruotas, galite jungtis!</h4>
    
    <?php 
        if (isset($_POST["user-name"] && isset($_POST["first-name"]) &&
            isset($_POST["last-name"] && isset($_POST["email"]) &&
            isset($_POST["phone"] && isset($_POST["psw"]) {

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
