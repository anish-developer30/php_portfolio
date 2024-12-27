<?php
include './header.php';
include './sidebar.php';
include './conn.php';

if ($_SESSION['role'] == 0) {
    echo "<script> window.location.href='http://localhost/MYSite/admin/dashboard.php'</script>";
}

$message = '';
if (isset($_POST['setting'])) {
    // values 
    $set_id = mysqli_real_escape_string($conn, $_POST['set_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $prof = mysqli_real_escape_string($conn, $_POST['prof']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $map = mysqli_real_escape_string($conn, $_POST['map']);
    $footer = mysqli_real_escape_string($conn, $_POST['footer']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $tmp_name = '';
    if (empty($_FILES['new_img']['name'])) {
        $img_name = $_POST['old_img'];
    } else {
        $img_name = $_FILES['new_img']['name'];
        $tmp_name = $_FILES['new_img']['tmp_name'];
    }

    $update_setting = "UPDATE `setting` SET `name`='$name',`professional`='$prof',`phone`=$phone,`email`='$email',`city`='$city',`map`='$map',`about_img`='$img_name',`footer`='$footer',`description`='$desc' WHERE  `set_id`='$set_id'";
    if (mysqli_query($conn, $update_setting)) {
        move_uploaded_file($tmp_name, 'upload/' . $img_name);
    } else {
        $message = "Error";
    }
}

?>



<div class="data">
    <div class="add_container">
        <div class="form page_setting">

            <form method="POST" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>" class="add_form">
                <h3 class="head">page settings</h3>
                <?php
                $select_setting = "SELECT * FROM  setting";
                $select_setting_query = mysqli_query($conn, $select_setting);
                if (mysqli_num_rows($select_setting_query) > 0) {

                    while ($data = mysqli_fetch_assoc($select_setting_query)) {

                ?>
                        <div class="two">
                            <input type="hidden" name="set_id" value="<?php echo $data['set_id'] ?>">
                            <input type="text" name="name" placeholder="display name" value="<?php echo $data['name'] ?>">
                            <input type="text" name="prof" placeholder="display professional" value="<?php echo $data['professional'] ?>">
                        </div>
                        <div class="two">
                            <input type="number" name="phone" placeholder="display phone" value="<?php echo $data['phone'] ?>">
                            <input type="email" name="email" placeholder="display email" value="<?php echo $data['email'] ?>">
                        </div>
                        <div class="two">
                            <input type="text" name="city" placeholder="display city name" value="<?php echo $data['city'] ?>">
                            <div class="two">
                                <input type="file" name="new_img">
                                <input type="hidden" name="old_img" value="<?php echo $data['about_img'] ?>">
                                <img src="./upload/<?php echo $data['about_img'] ?>" class="show_img">
                            </div>
                        </div>
                        <div class="two">
                            <input type="text" name="map" placeholder="display map" value="<?php echo $data['map'] ?>">
                            <input type="text" name="footer" placeholder="enter footer " value="<?php echo $data['footer'] ?>">
                        </div>
                        <textarea placeholder="description" name="desc"><?php echo $data['description'] ?></textarea>
                        <input type="submit" value="update" class="submit_btn" name="setting">

                <?php
                    }
                }
                ?>

            </form>

        </div>
    </div>
</div>