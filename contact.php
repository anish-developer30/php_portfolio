<?php

include './header.php';
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


// slect setting 
$select_setting = "SELECT * FROM `setting`";
$query_setting = mysqli_query($conn, $select_setting);
$data_setting = mysqli_fetch_assoc($query_setting);


?>


<section class="contact">
    <div class="container">
        <iframe src="<?php echo $data_setting['map']; ?>" width="600" height="450" style="border:0;"
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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