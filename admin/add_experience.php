<?php
include './sidebar.php';
include './header.php';
include './conn.php';

error_reporting(0);

$message = '';
if (isset($_POST['experience'])) {
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    if (empty($role)) {
        $message = "<p>pleace enter your role</p>";
    } else if (empty($year)) {
        $message = "<p>pleace enter year</p>";
    } else if (empty($company)) {
        $message = "<p>pleace enter company name</p>";
    } else {
        $insert_ex  = "INSERT INTO `experience`(`role`, `year`, `company`, `description`) VALUES ('$role','$year','$company','$description')";
        if (mysqli_query($conn, $insert_ex)) {
            header("Location: http://localhost/MYSite/admin/experience.php");
        } else {
            $message = "<p>Error</p>";
        }
    }
}

?>


<div class="data">

    <div class="add_container">
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="add_form" autocomplete="off">
                <h3 class="head">add experience</h3>
                <div class="message">
                    <?php
                    echo $message;
                    ?>
                </div>
                <input type="text" name="role" placeholder="role" value="<?php
                                                                            if (isset($message)) {
                                                                                echo $role;
                                                                            }
                                                                            ?>">

                <input type="text" placeholder="year" name="year" value="<?php
                                                                            if (isset($message)) {
                                                                                echo $year;
                                                                            }
                                                                            ?>">
                <input type=" text" name="company" placeholder="company name" value="<?php
                                                                                        if (isset($message)) {
                                                                                            echo $company;
                                                                                        }
                                                                                        ?>">
                <textarea placeholder="description" name="description"></textarea>
                <input type="submit" value="add experience" class="submit_btn" name='experience'>
            </form>

        </div>
    </div>
</div>