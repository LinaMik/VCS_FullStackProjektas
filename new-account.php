<!DOCTYPE html>
<html lang="lt">

<?php include("head.php") ?>

<body>
    <a href="index.php#" class="brand-logo"><img class="logo" src="images/logo.png" alt=""></a>
        <div class="new-account-div container">
            <h4>NAUJAS VARTOTOJAS:</h4>
            <form id="new-acc-form" name="new-acc" action="new-account-result.php">
                <input type="text" name="user-name" placeholder="Vartotojo vardas" maxlength=20 required>
                <input type="text" name="first-name" placeholder="Vardas">
                <input type="text" name="last-name" placeholder="Pavardė">
                <input required type="email" name="email" id="email" placeholder="El.paštas" required>
                <input type="text" name="phone" placeholder="Telefonas">
                <input type="password" name="psw" placeholder="Slaptažodis" required>
                <input type="password" name="psw-2" placeholder="Pakartokite slaptažodį" required>
                <button id="new-acc-submit" class="btn blue-grey darken-1">Registruotis</button>
            </form>
            <p id="new-acc-created"></p>
        </div>


    <?php include("footer.php") ?>

    <!-- Framework iš čia https://materializecss.com/getting-started.html -->
    <!-- Rašyti virš savo js failo, kad mano js failas būtų vėliau ir perrašytų ką reikia -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- anime.js biblioteka -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>

    <script src="scripts/script.js"></script>
</body>

</html>