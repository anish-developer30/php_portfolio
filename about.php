<?php
include './header.php';

$select_setting = "SELECT * FROM setting ";
$query_setting = mysqli_query($conn, $select_setting);
$data = mysqli_fetch_assoc($query_setting);

?>


<section class="about">
    <div class="row">
        <div class="image">
            <img src="./admin/upload/<?php echo $data['about_img'] ?>">
        </div>
        <div class="content">

            <h1><?php echo $data['name'] ?></h1>
            <p class="title"><?php echo $data['professional'] ?> </p>

            <p class="desc">
                <?php echo $data['description'] ?>
            </p>

            <a href="project.php" class="btn">
                projects
            </a>
        </div>
    </div>
</section>

<?php
include './footer.php';
?>