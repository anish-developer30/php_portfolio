<?php
include './header.php';
include './sidebar.php';
include './conn.php';

if ($_SESSION['role'] == 0) {
    echo "<script> window.location.href='http://localhost/MYSite/admin/dashboard.php'</script>";
}

$message = '';
if (isset($_POST['experience'])) {
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $syear = mysqli_real_escape_string($conn, $_POST['syear']);
    $eyear = mysqli_real_escape_string($conn, $_POST['eyear']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    if (empty($role)) {
        $message = "<p>pleace enter your role</p>";
    } else if (empty($syear) || empty($eyear)) {
        $message = "<p>pleace enter years</p>";
    } else if (empty($company)) {
        $message = "<p>pleace enter company name</p>";
    } else {
        $insert_ex  = "INSERT INTO `experience`(`role`, `syear`,`eyear`, `company`, `description`) VALUES ('$role','$syear','$eyear','$company','$description')";
        if (mysqli_query($conn, $insert_ex)) {
            // header("Location:{$rootName}/admin/experience.php");
            echo "<script> window.location.href='http://localhost/MYSite/admin/experience.php'</script>";
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

                <div class="two">
                    <input type="text" placeholder="start year" name="syear" value="<?php
                                                                                    if (isset($message)) {
                                                                                        echo $syear;
                                                                                    }
                                                                                    ?>">
                    <input type="text" placeholder="end year" name="eyear" value="<?php
                                                                                    if (isset($message)) {
                                                                                        echo $eyear;
                                                                                    }
                                                                                    ?>">
                </div>
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