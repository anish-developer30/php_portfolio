<?php
session_start();
date_default_timezone_set('Asia/kolkata');


if (!isset($_SESSION['username'])) {
    header("Location: http://localhost/MYSite/admin");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- link css files  -->
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="../css/all.css">
    <!-- link favocone icon  -->
    <link rel="shortcut icon" href="./img/logo.jpg" type="image/x-icon">
    <!-- link js files  -->
    <script src="./js/main.js" defer></script>
</head>

<body>


    <!-- header  -->
    <section class="header">
        <div id="menu" class="fas fa-bars"></div>
        <div class="dateTime">
            <div class="date"><?php echo date('j/n/Y'); ?></div>
            <div class="date"><?php echo date('g:i a'); ?></div>
            <div class="date"> <?php echo $_SESSION['username'] ?></div>

            <div class="icons">
                <?php echo $_SESSION['username'][0]  ?>
            </div>
        </div>

    </section>

</body>

</html>