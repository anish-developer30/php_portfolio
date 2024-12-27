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

        <a href="<?php echo $rootName ?>" class="logo">
            <?php echo $data['name'] ?><span>.</span>
        </a>
        <div class="navbar">
            <a href="index.php" id="home">home</a>
            <a href="about.php" id="about">about</a>
            <a href="resume.php" id="resume">resume</a>
            <a href="project.php" id="project">projects</a>
            <a href="contact.php" class="contact" id="contact">contact us</a>
        </div>

        <div id="menu" class="fas fa-bars"></div>


    </header>

    <script>
        let name = window.location.pathname.split('/')[2];
        //  index.php
        if (name == 'index.php') {
            document.querySelector('#home').classList.add('active');
        }
        //  about.php
        if (name == 'about.php') {
            document.querySelector('#about').classList.add('active');
        }
        //  resume.php
        if (name == 'resume.php') {
            document.querySelector('#resume').classList.add('active');
        }
        //  project
        if (name == 'project.php') {
            document.querySelector('#project').classList.add('active');
        }

        //  contact
        if (name == 'contact.php') {
            document.querySelector('#contact').classList.add('active');
        }
    </script>