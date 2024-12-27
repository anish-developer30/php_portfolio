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
</head>

<body>



    <!-- sidebar  -->

    <div class="sidebar">

        <div class="logo">
            anish rathod
        </div>

        <ul class="menu">
            <li id="dashboard">
                <a href="dashboard.php">
                    <i class="fas fa-home"></i>
                    <span>dashboard</span>
                </a>
            </li>

            <li id="category">
                <a href="category.php">
                    <i class="fas fa-list"></i>
                    <span>category</span>
                </a>
            </li>
            <li id="project">
                <a href="project.php">
                    <i class="fas fa-project-diagram"></i>
                    <span>projects</span>
                </a>
            </li>
            <li id="skill">
                <a href="skills.php">
                    <i class="fas fa-code"></i>
                    <span>skills</span>
                </a>
            </li>

            <?php

            if ($_SESSION['role'] == 1) {
            ?>
                <li id="users">
                    <a href="users.php">
                        <i class="fas fa-users"></i>
                        <span>users</span>
                    </a>
                </li>
                <li id="contact">
                    <a href="contact.php">
                        <i class="fas fa-phone"></i>
                        <span>contact</span>
                    </a>
                </li>
                <li id="education">
                    <a href="education.php">
                        <i class="fas fa-graduation-cap"></i>
                        <span>education</span>
                    </a>
                </li>
                <li id="experience">
                    <a href="experience.php">
                        <i class="fas fa-signal"></i>
                        <span>experience</span>
                    </a>
                </li>
                <li class="setting" id="setting">
                    <a href="setting.php">
                        <i class="fas fa-cog"></i>
                        <span>setting</span>
                    </a>
                </li>
            <?php
            }
            ?>
            <li class="logout" id="logout">
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>logout</span>
                </a>
            </li>

        </ul>


    </div>

    <!-- active links  -->
    <script>
        let name = window.location.pathname.split('/')[3];
        //  dashboard
        if (name == 'dashboard.php') {
            document.querySelector('#dashboard').classList.add('active');
        }
        //  users
        if (name == 'users.php') {
            document.querySelector('#users').classList.add('active');
        }
        //  add user 
        if (name == 'add_users.php') {
            document.querySelector('#users').classList.add('active');
        }
        // =========================================================>
        //  category
        if (name == 'category.php') {
            document.querySelector('#category').classList.add('active');
        }
        //  add category 
        if (name == 'add_category.php') {
            document.querySelector('#category').classList.add('active');
        }
        // =========================================================>
        //  project
        if (name == 'project.php') {
            document.querySelector('#project').classList.add('active');
        }
        // add project
        if (name == 'add_project.php') {
            document.querySelector('#project').classList.add('active');
        }
        // =========================================================>
        //  skill
        if (name == 'skill.php') {
            document.querySelector('#skill').classList.add('active');
        }
        //  add skill
        if (name == 'add_skills.php') {
            document.querySelector('#skill').classList.add('active');
        }
        // =========================================================>
        //  contact
        if (name == 'contact.php') {
            document.querySelector('#contact').classList.add('active');
        }
        // =========================================================>
        //  education
        if (name == 'education.php') {
            document.querySelector('#education').classList.add('active');
        }
        // add education
        if (name == 'add_education.php') {
            document.querySelector('#education').classList.add('active');
        }
        // =========================================================>
        //  experience
        if (name == 'experience.php') {
            document.querySelector('#experience').classList.add('active');
        }
        //  add experience
        if (name == 'add_experience.php') {
            document.querySelector('#experience').classList.add('active');
        }
        // =========================================================>
        //  setting
        if (name == 'setting.php') {
            document.querySelector('#setting').classList.add('active');
        }
        //  logout
        if (name == 'logout.php') {
            document.querySelector('#logout').classList.add('active');
        }
    </script>


</body>

</html>

</html>