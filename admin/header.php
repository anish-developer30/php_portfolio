<?php
include './conn.php';
date_default_timezone_set('Asia/kolkata');
session_start();


if (!isset($_SESSION['username'])) {
    header("Location:{$rootName}/admin/");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
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
            <div class="date"><?php echo date('j/M/Y'); ?></div>
            <div class="date"><?php echo date('g:i a'); ?></div>
            <div class="date"> <?php
                                if (isset($_SESSION['username'])) {
                                    echo $_SESSION['username'];
                                } else {
                                    echo "welcome";
                                }
                                ?></div>

            <div class="icons">
                <?php
                if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'][0];
                } else {
                    echo "W";
                }

                ?>
            </div>
        </div>

    </section>






</body>

</html>