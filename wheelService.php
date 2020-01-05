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

    <?php include("header.php"); ?>

    <section>
        <div class="container about-sec">
            <div class="about-sec-child">
                <h4>RATŲ REMONTAS</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora sapiente voluptatum sit ipsa nostrum incidunt fugit inventore velit, vel accusamus alias vero, facere facilis tempore unde illum, quaerat dicta doloribus.</p>
            </div>

            <div class="about-sec-child image-wrapper">
                <div class="wheelService-img"></div>
            </div>
        </div>
    </section>


    <?php include("footer.php") ?>

    <!-- Framework iš čia https://materializecss.com/getting-started.html -->
    <!-- Rašyti virš savo js failo, kad mano js failas būtų vėliau ir perrašytų ką reikia -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="scripts/script.js"></script>
</body>

</html>