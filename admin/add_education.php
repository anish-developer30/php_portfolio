<?php
include './sidebar.php';
include './header.php';
include './conn.php';

error_reporting(0);

$message = '';
if (isset($_POST['education'])) {
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $institute = mysqli_real_escape_string($conn, $_POST['institute']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    if (empty($class)) {
        $message = "<p>pleace enter class name</p>";
    } else if (empty($year)) {
        $message = "<p>pleace enter year</p>";
    } else if (empty($institute)) {
        $message = "<p>pleace enter institute name</p>";
    } else {
        $insert_edu  = "INSERT INTO `education`(`class`, `year`, `institute`, `description`) VALUES ('$class','$year','$institute','$description')";
        if (mysqli_query($conn, $insert_edu)) {
            header("Location: http://localhost/MYSite/admin/education.php");
        } else {
            $message = "<p>Error</p>";
        }
    }
}





?>


<div class="data">

    <div class="add_container">
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" class="add_form" method="POST" autocomplete="off">
                <h3 class=" head">add education</h3>
                <div class="message">
                    <?php
                    echo $message;
                    ?>
                </div>
                <div class="two">
                    <input type="text" placeholder="class" name='class' value="<?php
                                                                                if (isset($message)) {
                                                                                    echo $class;
                                                                                }
                                                                                ?>">
                    <input type="text" placeholder="year" name="year" value="<?php
                                                                                if (isset($message)) {
                                                                                    echo $year;
                                                                                }
                                                                                ?>">
                </div>
                <input type="text" name="institute" placeholder="institute name" value="<?php
                                                                                        if (isset($message)) {
                                                                                            echo $institute;
                                                                                        }
                                                                                        ?>">
                <textarea placeholder="description" name="description">

                </textarea>
                <input type="submit" value="add education" class="submit_btn" name='education'>
            </form>

        </div>
    </div>
</div>