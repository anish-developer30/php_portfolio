<?php

use function PHPSTORM_META\elementType;

include './header.php';
include './admin/conn.php';
include './admin/conn.php';

$message = '';
if (isset($_POST['contact'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);


    $select_contact = "SELECT * FROM `contact` WHERE email='$email'";
    $select_contact_run = mysqli_query($conn, $select_contact);
    if (mysqli_num_rows($select_contact_run) > 0) {
        echo "<script>alert('Email already exist')</script>";
    } else {
        $insert_con = "INSERT INTO `contact`(`name`, `email`, `phone`, `country`, `city`, `message`) VALUES ('$name','$email','$phone','$country','$city','$message')";
        if (mysqli_query($conn, $insert_con)) {
            echo "<script>alert('Form submitted successfully')</script>";
        } else {
            echo "<script>alert('Form Not submitted successfully')</script>";
        }
    }
}




?>


<section class="contact">
    <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29492.52894185821!2d72.96212534602198!3d22.482933395676596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e4ca2dc3a25dd%3A0x33acfa3f23c1291a!2sNapad%20Vanto%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1732849459753!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="contact_form">
            <h3 class="head">contact us</h3>

            <input type="text" placeholder="enter your name" name="name" required>
            <input type="email" placeholder="enter your email" name="email" required>
            <input type="number" placeholder="enter your phone " name="phone" required>
            <div class="flex">
                <input type="text" placeholder="enter your country" name="country" required>
                <input type="text" placeholder="enter your city" name="city" required>
            </div>
            <textarea name="message" placeholder="message" required></textarea>

            <input type="submit" value="submit" class="submit_btn" name='contact'>
        </form>

    </div>




</section>

<?php
include './footer.php';
?>