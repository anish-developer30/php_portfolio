<?php
include './admin/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PORTFOLIO</title>

    <!-- link css file  -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.css">

    <!-- favicon icon  -->
    <link rel="shortcut icon" href="./images/logo.jpg" type="image/x-icon">
    <!-- link js file  -->
    <script src="./js/main.js" defer></script>
</head>

<body>

    <?php

    $select_setting = "SELECT * FROM setting ";
    $query_setting = mysqli_query($conn, $select_setting);
    $data = mysqli_fetch_assoc($query_setting);

    ?>


    <header class="header">

        <a href="" class="logo">
            <?php echo $data['name'] ?><span>.</span>
        </a>
        <div class="navbar">
            <a href="index.php">home</a>
            <a href="about.php">about</a>
            <a href="resume.php">resume</a>
            <a href="project.php">projects</a>
            <a href="contact.php" class="contact">contact us</a>
        </div>

        <div id="menu" class="fas fa-bars"></div>


    </header>