<?php
include './header.php';
include './sidebar.php';
include './conn.php';
$message = '';
if (isset($_POST['cat_btn'])) {
    $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
    if (empty($cat_name)) {
        $message = "<p>enter category name</p>";
    } else {
        $select_cat = "SELECT * FROM `category` WHERE cat_name='$cat_name'";
        $select_cat_run = mysqli_query($conn, $select_cat);
        if (mysqli_num_rows($select_cat_run) > 0) {
            $message = "<p>category name already exist </p>";
        } else {
            $insert_cat =  "INSERT INTO `category`(`cat_name`, `post`) VALUES ('$cat_name',0)";
            if (mysqli_query($conn, $insert_cat)) {
                // header("Location:{$rootName}/admin/category.php");
                echo "<script> window.location.href='http://localhost/MYSite/admin/category.php'</script>";
            } else {
                $message = "<p>category not inserted </p>";
            }
        }
    }
}




?>


<div class="data">

    <div class="add_container">
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" class="add_form" method="POST">
                <h3 class="head">add category</h3>
                <div class="message">
                    <?php
                    echo $message;
                    ?>
                </div>
                <input type="text" name="cat_name" placeholder="enter category name">
                <input type="submit" value="add category" name="cat_btn" class="submit_btn">
            </form>

        </div>
    </div>
</div>