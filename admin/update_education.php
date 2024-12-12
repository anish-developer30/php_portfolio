<?php
include './sidebar.php';
include './header.php';
include './conn.php';

error_reporting(0);

$eduId = $_GET['eduId'];
$message = '';
if (isset($_POST['up_education'])) {
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $institute = mysqli_real_escape_string($conn, $_POST['institute']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $update_edu  = "UPDATE `education` SET `class`='$class',`year`='$year',`institute`='$institute',`description`='$description' WHERE `edu_id`=$eduId";
    if (mysqli_query($conn, $update_edu)) {
        header("Location: http://localhost/MYSite/admin/education.php");
    } else {
        $message = "<p>Error</p>";
    }
}





?>


<div class="data">

    <div class="add_container">
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" class="add_form" method="POST" autocomplete="off">
                <h3 class=" head">update education</h3>
                <div class="message">
                    <?php
                    echo $message;
                    ?>
                </div>

                <?php
                $select_edu = "SELECT * FROM `education` WHERE edu_id=$eduId";
                $select_edu_run = mysqli_query($conn, $select_edu);
                if (mysqli_num_rows($select_edu_run) > 0) {
                    while ($data = mysqli_fetch_assoc($select_edu_run)) {

                ?>
                        <div class="two">
                            <input type="text" placeholder="class" name='class' value="<?php echo $data['class'] ?>">
                            <input type="text" placeholder="year" name="year" value="<?php echo $data['year'] ?>">
                        </div>
                        <input type="text" name="institute" placeholder="institute name" value="<?php echo $data['institute'] ?>">
                        <textarea placeholder="description" name="description"><?php echo $data['description'] ?></textarea>
                        <input type="submit" value="update education" class="submit_btn" name='up_education'>
                <?php
                    }
                }
                ?>

            </form>

        </div>
    </div>
</div>