<?php
include './header.php';
include './sidebar.php';
include './conn.php';



$message = '';

$proId = $_GET['proId'];
if (isset($_POST['update_project'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $old_category = mysqli_real_escape_string($conn, $_POST['old_category']);
    $download = mysqli_real_escape_string($conn, $_POST['download']);
    $live = mysqli_real_escape_string($conn, $_POST['live']);
    $tech = mysqli_real_escape_string($conn, $_POST['tech']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $date = date('d M,Y');
    $author  = $_SESSION['user_id'];


    if (empty($_FILES['pro_img']['name'])) {
        $imgname =  $_POST['old_img'];
    } else {
        $imgname = $_FILES['pro_img']['name'];
        $imgsize = $_FILES['pro_img']['size'];
        $imgtmpname = $_FILES['pro_img']['tmp_name'];
        $extension = end(explode('.', $imgname));
        $valid_extention = array('png', 'jpg', 'jpeg');

        if (in_array($extension, $valid_extention) === false) {
            $message = "<p>select JPG, PNG, JPEG files</p>";
        }
        if ($imgsize > 2097152) {
            $message = "image size must be 2MB";
        }
        $random_img  = time() . '-' . basename($imgname);
        $arrange_image = 'upload/' . $random_img;
        $imgname = $random_img;
    }
    $update_pro = "UPDATE `project` SET `title`='$title',`category`=$category,`pro_img`='$imgname',`download`='$download',`live`='$live',`tech`='$tech',`description`='$desc',`date`='$date',`author`=$author WHERE `pro_id`=$proId;";
    if ($category != $old_category) {
        $update_pro  .= "UPDATE category SET post = post+1 WHERE cat_id = $category;";
        $update_pro  .= "UPDATE category SET post = post-1 WHERE cat_id = $old_category";
    }

    if (mysqli_multi_query($conn, $update_pro)) {
        move_uploaded_file($imgtmpname, $arrange_image);
        // header("Location:{$rootName}/admin/project.php");
        echo "<script> window.location.href='http://localhost/MYSite/admin/project.php'</script>";
    } else {
        $message = "<p>project update error</p>";
    }
}

?>


<div class="data">

    <div class="add_container">
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" class="add_form">
                <h3 class="head">update project</h3>
                <div class="message">
                    <?php
                    echo $message;
                    ?>
                </div>
                <?php
                $select_project = "SELECT * FROM `project`
                -- join table project and category 
                LEFT JOIN category ON project.category=category.cat_id
                -- join table project and user 
                LEFT JOIN users ON project.author=users.user_id  WHERE pro_id=$proId";
                $select_project_run = mysqli_query($conn, $select_project);

                if (mysqli_num_rows($select_project_run) > 0) {
                    while ($pro_data = mysqli_fetch_assoc($select_project_run)) {
                ?>
                        <div class="two">
                            <input type="text" placeholder="project title" name="title" value="<?php echo $pro_data['title'] ?>">
                            <select name="category">
                                <option hidden>select category</option>
                                <?php
                                $select_cat = "SELECT * FROM `category`";
                                $select_cat_run = mysqli_query($conn, $select_cat);
                                if (mysqli_num_rows($select_cat_run) > 0) {
                                    while ($data = mysqli_fetch_assoc($select_cat_run)) {
                                        if ($pro_data['category'] == $data['cat_id']) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }
                                ?>
                                        <option <?php echo $selected ?> value="<?php echo $data['cat_id'] ?>"><?php echo $data['cat_name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <input type="hidden" name="old_category" value="<?php echo $pro_data['category'] ?>">
                        </div>
                        <div class="two">
                            <input type="file" name="pro_img">
                            <input type="hidden" name="old_img" value="<?php echo $pro_data['pro_img']; ?>">
                            <img src="./upload/<?php echo $pro_data['pro_img']; ?>" alt="" width="50px" height="50px">
                        </div>
                        <div class="two">
                            <input type="text" placeholder="download link" name="download" value='<?php echo $pro_data['download']; ?>'>
                            <input type="text" placeholder="live link" name="live" value="<?php echo $pro_data['live']; ?>">
                        </div>
                        <input type="text" placeholder="enter technology name" name="tech" value="<?php echo $pro_data['tech']; ?>">
                        <textarea placeholder="description" name="desc"><?php echo $pro_data['description']; ?></textarea>
                        <input type="submit" value="update project" name="update_project" class="submit_btn">

                <?php
                    }
                }
                ?>

            </form>

        </div>
    </div>
</div>