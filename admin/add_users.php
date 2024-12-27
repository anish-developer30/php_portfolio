<?php
include './header.php';
include './sidebar.php';
include './conn.php';

if ($_SESSION['role'] == 0) {
    echo "<script> window.location.href='http://localhost/MYSite/admin/dashboard.php'</script>";
}

$message = '';

if (isset($_POST['add_users'])) {
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $phone  = mysqli_real_escape_string($conn, $_POST['phone']);
    $email  = mysqli_real_escape_string($conn, $_POST['email']);
    $password  = mysqli_real_escape_string($conn, md5($_POST['password']));
    $role  = mysqli_real_escape_string($conn, $_POST['role']);


    if (empty($name)) {
        $message = "<p>name is required</p>";
    } else if (!preg_match("/^[a-zA-Z]*$/", $name)) {
        $message =  "<p> name shoud be a character </p>";
    } else if (empty($phone)) {
        $message = "<p>phone is required</p>";
    } else if (strlen($phone) != 10) {
        $message = "<p>phone number is 10 degit </p>";
    } else if (empty($email)) {
        $message =  "<p>email is required</p>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message =  "<p>enter valid email</p>";
    } else {
        $select_user = "SELECT * FROM users WHERE email='$email'";
        $select_user_run = mysqli_query($conn, $select_user);
        if (mysqli_num_rows($select_user_run) > 0) {
            $message = "<p>email already exits</p>";
        } else {
            $insert_user = "INSERT INTO `users`(`name`, `phone`, `email`, `password`, `role`) VALUES ('$name','$phone','$email','$password','$role')";
            if (mysqli_query($conn, $insert_user)) {
                // header("Location:{$rootName}/admin/users.php");
                echo "<script> window.location.href='http://localhost/MYSite/admin/users.php'</script>";
            } else {
                $message = "<p>user added error </p>";
            }
        }
    }
}





?>


<div class="data">

    <div class="add_container">
        <div class="form">
            <form action="" method="POST" class="add_form">
                <h3 class="head">add users</h3>
                <div class="message">
                    <?php
                    echo $message;
                    ?>
                </div>
                <input type="text" placeholder="name" name="name">
                <input type="number" placeholder="phone" name="phone">
                <input type="text" placeholder="email" name="email">
                <div class=" two">
                    <input type="password" placeholder="password" name="password">
                    <select name="role">
                        <option value="1">admin</option>
                        <option value="0">user</option>
                    </select>
                </div>
                <input type="submit" value="add user" name="add_users" class="submit_btn">
            </form>

        </div>
    </div>
</div>