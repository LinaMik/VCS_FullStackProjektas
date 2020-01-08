<?php include("functions.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="lt">

<?php include("head.php") ?>

<body>

    <?php include("header.php"); ?>

    <section id="about">
        <div class="container about-sec">

            <div class="about-sec-child from-left image-wrapper">
                <div class="about-img"></div>
            </div>

            <div class="about-sec-child from-right">
                <h4>APIE MUS</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora sapiente voluptatum sit ipsa nostrum incidunt fugit inventore velit, vel accusamus alias vero, facere facilis tempore unde illum, quaerat dicta doloribus.</p>
            </div>
        </div>
    </section>

    <section id="why-us" class="blue-grey darken-1">
        <div class="container">
            <h4>KODĖL VERTA RINKTIS MUS</h4>
        </div>

        <div class="container statistics">
            <?php echo generate_stat_div($stat_indicators); ?>
        </div>

    </section>

    <section id="registration">
        <div class="registration-form container">
            <div class="registration-form-child">
                <h4>REGISTRACIJA</h4>
                <form name="reg-form" action="registration-result.php" method="post">
                    <input type="text" name="name" placeholder="Vardas..." required>
                    <input type="email" name="email" id="email" placeholder="El.paštas...">
                    <input type="text" name="phone" placeholder="Telefonas...">

                    <label for="select-service">Pasirinkite paslaugą: </label>
                    <select required name="service" id="select-service">
                        <?php echo generate_select_list($paslaugu_sarasas) ?>
                    </select>

                    <label for="problem-desc" id="problem-desc-lbl">Aprašykite poreikį: </label>
                    <textarea name="problem" id="problem-desc" cols="30" rows="20"></textarea>

                    <label for="reg-date-id">Pasirinkite datą: </label>
                    <input type="text" name="reg-date" class="datepicker">

                    <label for="reg-time-id">Pasirinkite pageidaujamą laiką: </label>
                    <select name="reg-time" id="reg-time-id">
                        <?php echo generate_select_list($valandu_sarasas) ?>
                    </select>
                    <br>
                    <button id="btn-submit" class="btn blue-grey darken-1" onclick="return registracijosValidacija()">Registruotis</button>
                </form>
            </div>
            <div class="registration-form-child registration-img">
            </div>
        </div>
    </section>

    <section id="services" class="blue-grey darken-1">
        <div>
            <h4>Teikiame įvairias paslaugas</h4>
        </div>
        <div class="row">
            <?php echo generate_services_list() ?>
        </div>

    </section>

    <section id="contacts">
        <div class="contact-info container">
            <div class="contact-info-child contacts-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2307.2636288922763!2d25.252962415658104!3d54.6697879802776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd947ae6929451%3A0x56209ab098c82573!2sAMINTA!5e0!3m2!1slt!2slt!4v1577918033842!5m2!1slt!2slt" allowfullscreen=""></iframe>
            </div>

            <div class="contact-info-child contacts-address">
                <h4>KONTAKTAI</h4>
                <h6>UAB Aminta autoservisas</h6>
                <p>Įmonės kodas: 300001236 <br>
                    Adresas: Naugarduko g. 97, Vilnius, LT-03202 <br>
                    Telefonas: +370 699 99999 <br>
                    El. paštas: info@aminta.lt <br>
                </p>
            </div>
        </div>
    </section>

    <?php include("footer.php")?>

    <!-- Framework iš čia https://materializecss.com/getting-started.html -->
    <!-- Rašyti virš savo js failo, kad mano js failas būtų vėliau ir perrašytų ką reikia -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- anime.js biblioteka -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>

    <script src="scripts/script.js"></script>
</body>

</html>