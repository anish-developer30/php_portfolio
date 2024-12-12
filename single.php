<?php
include './header.php';
include './admin/conn.php';
if (isset($_GET['pId'])) {
    $pId  = $_GET['pId'];
}

?>
<section class="single">
    <?php
    $select_pro = "SELECT * FROM `project`
    -- join table project and category
    LEFT JOIN category ON project.category=category.cat_id
    -- join table project and user
    LEFT JOIN users ON project.author=users.user_id WHERE pro_id=$pId";
    $select_pro_run = mysqli_query($conn, $select_pro);
    if (mysqli_num_rows($select_pro_run) > 0) {
        while ($data = mysqli_fetch_assoc($select_pro_run)) {
    ?>
            <div class="container">
                <div class="content">
                    <div class="flex">
                        <h2 class="title"><?php echo $data['title'] ?></h2>
                        <div class="option">
                            <p> <span class="fas fa-calendar-alt"></span> <?php echo $data['date'] ?> </p>
                            <p> <span class="fas fa-user"></span> <?php echo $data['name'] ?></p>
                            <a target="_blank" href="<?php echo $data['download'] ?>" title="Download"><span class="fas fa-download"></span> download</a>
                            <a target="_blank" href="<?php echo $data['live'] ?>" title="Live"> <span class="fas fa-eye"></span> live </a>
                        </div>
                    </div>
                    <p class="desc">
                        <?php echo $data['description'] ?>
                    </p>
                    <div class="skills">
                        <h2>Technologys :</h2>
                        <p class="skill"><?php echo $data['tech'] ?></p>
                    </div>

                </div>
                <div class="img">
                    <img src="./admin/upload/<?php echo $data['pro_img'] ?>" alt="">
                </div>
            </div>
    <?php
        }
    } ?>


</section>

<?php
include './footer.php';
?>