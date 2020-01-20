<footer class="blue-grey darken-1">
    <div class="row">
        <div class="col s12 m12"><a href="#"><img src="images/arrow.png" alt=""> </a></div>
    </div>
    <div class="row">
        <div class="col s6 m4"><a href="https://www.facebook.com/autoservisasaminta/"><img src="images/facebook.png" alt="">Sekite mus Facebook</a></div>

        <?php
        $sql = "SELECT * FROM parameters where name = 'company_phone'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo '<div class="col s6 m4"><a href="tel:' . $row["value"]. '"><i class="small material-icons">call</i>' . $row["value"] . '</a></div>';
        }

        $sql = "SELECT * FROM parameters where name = 'company_email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo '<div class="col s12 m4"><a href="mailto:' . $row["value"] . '"><i class="small material-icons">email</i>' . $row["value"] . '</a></div>';
        }      
        
        ?>
    </div>

    <?php mysqli_close($conn); ?>

</footer>