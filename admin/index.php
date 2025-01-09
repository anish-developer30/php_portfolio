<!DOCTYPE html>
<html lang="en">

<head>
    <!-- link favocone icon  -->
    <link rel="shortcut icon" href="./img/logo.jpg" type="image/x-icon">
    <title>Login</title>
</head>
<?php
include './conn.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location:{$rootName}/admin/dashboard.php");
}
$message = '';
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    if (empty($email) || empty($password)) {
        $message = '<p> enter login details </p>';
    } else {
        $select  = "SELECT *  FROM users WHERE `email` = '$email' AND `password`='$password'";
        $select_run  = mysqli_query($conn, $select) or die("query failed..");
        if (mysqli_num_rows($select_run) > 0) {
            while ($data = mysqli_fetch_assoc($select_run)) {
                $_SESSION['username'] = $data['name'];
                // setcookie('username', $data['name'], time() + (86400 * 15), "/");
                $_SESSION['user_id'] = $data['user_id'];
                $_SESSION['role'] = $data['role'];
                header("Location:{$rootName}/admin/dashboard.php");
            }
        } else {
            $message = '<p>  invalid login  details</p>';
        }
    }
}
?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.css">
</head>

<body>
    <div class="login_container">
        <div class="login">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="contact_form" autocomplete="off">
                <h3 class="head">admin login</h3>
                <div class="message">
                    <?php
                    echo $message;
                    ?>
                </div>
                <input type="email" class="email" placeholder="email" name="email" autocomplete="off">
                <input type="password" placeholder="password" name="password" autocomplete="off">
                <input type="submit" value="login" name="login" class="submit_btn">
            </form>

        </div>
    </div>
</body>


</html>