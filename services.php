
<!DOCTYPE html>
<html lang="lt">

<?php include("head.php"); ?>

<body>

    <?php include("header.php"); ?>

    <section>
        <div class="container about-sec">

            <?php

            if (isset($_GET["id"])) {

                $id = trim($_GET["id"]);

                $sql = "SELECT * FROM services WHERE id = $id";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo '<div class="about-sec-child image-wrapper">';
                    echo '<div  class="' . $row["img_class"] . '"></div>';
                    echo "</div>";
                    echo '<div class="about-sec-child"> ';
                    echo "<h4>" . $row["title"] . "</h4>";
                    echo "<p>" . $row["content"] . "</p>";
                    echo "</div>";
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