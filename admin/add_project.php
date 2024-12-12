<?php
include './sidebar.php';
include './header.php';
include './conn.php';
$message = '';
if (isset($_POST['add_project'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $download = mysqli_real_escape_string($conn, $_POST['download']);
    $live = mysqli_real_escape_string($conn, $_POST['live']);
    $tech = mysqli_real_escape_string($conn, $_POST['tech']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $date = date('d M,Y');
    $author  = $_SESSION['user_id'];



    // image code 
    if (isset($_FILES['pro_img'])) {
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


        $insert_pro = "INSERT INTO `project`(`title`, category, `pro_img`, `download`, `live`, `tech`, `description`, `date`, author) VALUES ('$title',$category,'$imgname','$download','$live','$tech','$desc','$date',$author);";
        $insert_pro  .= "UPDATE category SET post = post+1 WHERE cat_id = $category";

        if (mysqli_multi_query($conn, $insert_pro)) {
            move_uploaded_file($imgtmpname, $arrange_image);
            header("Location: http://localhost/MYSite/admin/project.php");
        } else {
            $message = "<p>project added error</p>";
        }
    }
}



?>


<div class="data">

    <div class="add_container">
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" class="add_form">
                <h3 class="head">add project</h3>
                <div class="message">
                    <?php
                    echo $message;
                    ?>
                </div>
                <input type="text" placeholder="project title" name="title">
                <div class="two">
                    <select name="category">
                        <option hidden>select category</option>
                        <?php
                        $select_cat = "SELECT * FROM `category`";
                        $select_cat_run = mysqli_query($conn, $select_cat) or die("add project category select error");
                        if (mysqli_num_rows($select_cat_run) > 0) {
                            while ($data = mysqli_fetch_assoc($select_cat_run)) {
                        ?>
                                <option value="<?php echo $data['cat_id'] ?>"><?php echo $data['cat_name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <input type="file" name="pro_img">
                </div>
                <div class="two">
                    <input type="text" placeholder="download link" name="download">
                    <input type="text" placeholder="live link" name="live">
                </div>
                <input type="text" placeholder="enter technology name" name="tech">
                <textarea placeholder="description" name="desc"></textarea>
                <input type="submit" value="add project" name="add_project" class="submit_btn">
            </form>

        </div>
    </div>
</div>