<?php 
    print_r($_POST);

?>

<?php include("functions.php") ?>
<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Automobilių servisas</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- ikonos -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
</head>

<body>
    <a href="index.php#" class="brand-logo"><img class="logo" src="images/logo.png" alt=""></a>
    <h4>Naujas vartotojas užregistruotas, galite jungtis!</h4>
    <?php include("footer.php") ?>

    <!-- Framework iš čia https://materializecss.com/getting-started.html -->
    <!-- Rašyti virš savo js failo, kad mano js failas būtų vėliau ir perrašytų ką reikia -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- anime.js biblioteka -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>

    <script src="scripts/script-reg.js"></script>
</body>

</html>
