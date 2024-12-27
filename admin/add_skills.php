<?php
include './header.php';
include './sidebar.php';
include './conn.php';
$message = '';
if (isset($_POST['sk_btn'])) {
    $sk_name = mysqli_real_escape_string($conn, $_POST['sk_name']);
    if (empty($sk_name)) {
        $message = "<p>enter skill name</p>";
    } else {
        $select_cat = "SELECT * FROM `skills` WHERE sk_name='$sk_name'";
        $select_cat_run = mysqli_query($conn, $select_cat);
        if (mysqli_num_rows($select_cat_run) > 0) {
            $message = "<p>skill name already exist </p>";
        } else {
            $insert_cat =  "INSERT INTO `skills`(`sk_name`) VALUES ('$sk_name')";
            if (mysqli_query($conn, $insert_cat)) {
                // header("Location:$rootName}/admin/skills.php");
                echo "<script> window.location.href='http://localhost/MYSite/admin/skills.php'</script>";
            } else {
                $message = "<p>skills not inserted </p>";
            }
        }
    }
}




?>


<div class="data">

    <div class="add_container">
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" class="add_form" method="POST">
                <h3 class="head">add skills</h3>
                <div class="message">
                    <?php
                    echo $message;
                    ?>
                </div>
                <input type="text" name="sk_name" placeholder="enter skill name">
                <input type="submit" value="add skill" name="sk_btn" class="submit_btn">
            </form>

        </div>
    </div>
</div>