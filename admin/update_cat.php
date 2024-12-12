<?php
include './sidebar.php';
include './header.php';
include './conn.php';
$message = '';
if (isset($_POST['update_category'])) {

    $cat_id = $_GET['catId'];
    $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
    if (empty($cat_name)) {
        $message = "<p>enter category name</p>";
    } else {
        $select_cat = "SELECT * FROM `category` WHERE cat_name='$cat_name'";
        $select_cat_run = mysqli_query($conn, $select_cat);
        if (mysqli_num_rows($select_cat_run) > 0) {
            $message = "<p>category name already exist </p>";
        } else {
            $update_cat =  "UPDATE `category` SET `cat_name`='$cat_name',`post`=0 WHERE `cat_id`=$cat_id";
            if (mysqli_query($conn, $update_cat)) {
                header("Location: http://localhost/MYSite/admin/category.php");
            } else {
                $message = "<p>category update faild </p>";
            }
        }
    }
}



?>


<div class="data">

    <div class="add_container">
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" class="add_form" method="POST">
                <h3 class="head">update category</h3>
                <div class="message">
                    <?php
                    echo $message;
                    ?>
                </div>
                <!-- fetch category data  -->
                <?php

                if (isset($_GET['catId'])) {
                    $catId = $_GET['catId'];
                }

                $select_cat = "SELECT * FROM `category` WHERE cat_id=$catId";
                $select_cat_run = mysqli_query($conn, $select_cat);
                if (mysqli_num_rows($select_cat_run) > 0) {
                    while ($data  = mysqli_fetch_assoc($select_cat_run)) {
                ?>
                        <input type="text" name="cat_name" placeholder="enter category name" value="<?php echo $data['cat_name']; ?>">
                <?php
                    }
                } ?>
                <input type="submit" value="update category" name="update_category" class="submit_btn">
            </form>

        </div>
    </div>
</div>