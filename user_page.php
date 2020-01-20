<?php session_start(); ?>
<!DOCTYPE html>
<html lang="lt">

<?php include("head.php"); ?>

<body>
    <section>
        <div class="container">

            <?php
            
            if (isset($_SESSION["first_name"])) {
                if ($_SESSION["role"] === "admin") {
                    echo "<h3>Sveikinu prisijungus, " . $_SESSION["first_name"] . "!</h3><br>";
                    include("admin_page.php");

                } else {
                    
                    echo "<h3>Sveikinu prisijungus, " . $_SESSION["first_name"] . "!</h3><br>";
                    
                    //atlikti darbai
                    $user = $_SESSION["user_name"];
                    $sql = "SELECT works.product_id, works.user_id, works.date, 
                             works.price, products.name FROM works, products 
                             WHERE works.product_id = products.id and user_id = '$user'";

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<h5><span>Jums atlikti darbai:</span></h5> ";
                        echo "<ul>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<li>";
                            echo "<span>Atlikti darbai:</span> " . $row["name"] . "<br>";
                            echo "<span>Darbų atlikimo data:</span> " . $row["date"] . "<br>";
                            echo "<span>Atliktų darbų kaina:</span> " . $row["price"];
                            echo "</li><br>";
                        }
                        echo "</ul>";
                        echo "<hr>";
                    }

                    //busimi darbai
                    $sql = "SELECT registrations.product_id, registrations.user_id, registrations.date, 
                    registrations.reg_date, products.name FROM registrations, products 
                    WHERE registrations.product_id = products.id and user_id = '$user'";

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<h5><span>Jūsų registracijos:</span></h5> ";
                        echo "<ul>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<li>";
                            echo "<span>Registruotas darbas:</span> " . $row["name"] . "<br>";
                            echo "<span>Data:</span> " . $row["date"] . "<br>";
                            echo "<span>Registravimo data:</span> " . $row["reg_date"];
                            echo "</li><br>";
                        }
                        echo "</ul>";
                    }
                }
            }
            ?>

        </div>
    </section>


    <?php include("footer.php") ?>

    <!-- Framework iš čia https://materializecss.com/getting-started.html -->
    <!-- Rašyti virš savo js failo, kad mano js failas būtų vėliau ir perrašytų ką reikia -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="scripts/script.js"></script>
</body>

</html>