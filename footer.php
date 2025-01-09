<?php
include './admin/conn.php';
$select_setting = "SELECT * FROM setting ";
$query_setting = mysqli_query($conn, $select_setting);
$data = mysqli_fetch_assoc($query_setting);

?>

<footer class="footer">

    <div class="container">
        <div class="box">
            <h2 class="title">
                about us
            </h2>
            <p class="desc">
                <?php echo substr($data['description'], 0, 93) ?>

            </p>
        </div>

        <div class="box">
            <h2 class="title">
                links
            </h2>
            <a href="index.php">home</a>
            <a href="about.php">about</a>
            <a href="resume.php">resume</a>
            <a href="project.php">project</a>
            <a href="contact.php">contact</a>
        </div>

        <div class="box">
            <h2 class="title">
                social links
            </h2>
            <!-- <a href="">facebook</a>
            <a href="">instagram</a> -->
            <a href="https://www.linkedin.com/in/anishrathod123V" target="_blank">linkedin</a>
            <a href="https://github.com/anish-developer30" target="_blank">github</a>
        </div>

        <div class="box">
            <h2 class="title">
                information
            </h2>
            <h4>+91 <?php echo $data['phone'] ?>
            </h4>
            <h4 class="email"> <?php echo $data['email'] ?>
            </h4>
            <h4> <?php echo $data['city'] ?>
            </h4>

        </div>

    </div>
    <div class="copy">
        <?php
        #$date = date("Y");
        # echo $date 
        ?>
        <p> <sup>&copy;</sup> Copyright 2024 | Create by <span><?php echo $data['footer'] ?></span></p>
    </div>
</footer>


</body>

</html>

<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29492.52894185821!2d72.96212534602198!3d22.482933395676596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e4ca2dc3a25dd%3A0x33acfa3f23c1291a!2sNapad%20Vanto%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1732849459753!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->