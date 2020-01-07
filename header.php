<header>
    <div class="header-top container">
        <div class="header-top-child">
            <a href="tel:+37069999999"><i class="medium material-icons">call</i></a>
            <h3>+370 699 99999</h3>
        </div>

        <div class="header-top-child connection" id="connection">

            <a class="connect-icon" data-position="bottom" data-tooltip="Prisijungti" href=""><i class="small material-icons">person</i></a>
            <a class="connect-word" href="#">Prisijungti</a>
        </div>

    </div>

    <div class="header-body">

        <div class="blue-grey darken-1">
            <nav class="container navigation">
                <div class="nav-wrapper blue-grey darken-1">

                    <a href="index.php#" class="brand-logo right"><img class="logo" src="images/logo.png" alt=""></a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <!-- <ul id="nav-mobile" class="left hide-on-med-and-down"> -->
                    <ul class="left hide-on-med-and-down">
                        <li><a href="index.php#services">Paslaugos</a> </li>
                        <li><a href="index.php#contacts">Kontaktai</a></li>
                        <li><a href="index.php#about">Apie</a></li>
                        <li><a href="index.php#registration">Registracija</a></li>
                    </ul>

                    <div id="connection-form">
                        <form action="#">
                            <input type="text" name="vardas" placeholder="Vartotojo vardas arba el. paštas" required>
                            <input type="text" name="psw" placeholder="Slaptažodis" required>
                            <button class="btn blue-grey darken-1">Prisijungti</button>
                        </form>
                        <a href="connect.php">Naujas vartotojas</a>
                    </div>
                </div>
            </nav>

            <ul class="sidenav" id="mobile-demo">
                <li><a href="#services">Paslaugos</a></li>
                <li><a href="#contacts">Kontaktai</a></li>
                <li><a href="#about">Apie</a></li>
                <li><a href="#registration">Registracija</a></li>
            </ul>
        </div>


        <img class="header-img" src="images/header_photo.jpg" alt="">

        <div class="header-body container">
            <div class="header-bottom">
                <?php echo generate_header_bottom([["ac_unit", "PADANGŲ KEITIMAS"], ["build", "VARIKLIO DARBAI"], ["call", "PAGALBA KELYJE"], ["format_paint", "KĖBULO DAŽYMAS"]]) ?>
            </div>
        </div>
    </div>

</header>