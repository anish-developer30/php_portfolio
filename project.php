<?php
include './header.php';
$catId = '';
if (isset($_GET['catId'])) {
    $catId = $_GET['catId'];
    $select_pro = "SELECT * FROM `project` LEFT JOIN category on project.category=category.cat_id WHERE category=$catId";
} else {
    $select_pro = "SELECT * FROM `project` LEFT JOIN category on project.category=category.cat_id  ORDER BY pro_id DESC";
}
?>


<section class="project">
    <div class="options">
        <h1 class="heading">my projects</h1>

        <!-- <form class="searchBox" method="GET" action="">
            <input type="text" placeholder="search..." name="text">
            <button class="fas fa-search" type="submit" name="search"></button>
        </form> -->

        <form action="<?php $_SERVER['PHP_SELF'] ?>" class="form" method="GET">
            <select name="catId">
                <option hidden>select category</option>
                <?php
                $select_cat = "SELECT * FROM `category`";
                $select_cat_run = mysqli_query($conn, $select_cat);
                if (mysqli_num_rows($select_cat_run) > 0) {
                    while ($datacat = mysqli_fetch_assoc($select_cat_run)) {

                        if ($datacat['cat_id'] == $catId) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                ?>
                        <option <?php echo $selected; ?> value="<?php echo $datacat['cat_id'] ?>"><?php echo $datacat['cat_name'] ?></option>
                <?php
                    }
                } ?>

            </select>

            <input type="submit" value="filter">
        </form>

    </div>

    <div class="pro_container">
        <?php

        $select_pro_run = mysqli_query($conn, $select_pro);
        if (mysqli_num_rows($select_pro_run) > 0) {
            while ($data = mysqli_fetch_assoc($select_pro_run)) {
        ?>
                <div class="box">
                    <div class="image">
                        <img src="./admin/upload/<?php echo $data['pro_img'] ?>" alt="">
                    </div>
                    <div class="content">
                        <div class="flex">
                            <p class="name"><?php echo $data['title'] ?></p>
                            <p class="category"> <?php echo $data['cat_name'] ?> </p>
                        </div>
                        <p class="desc">
                            <?php echo substr($data['description'], 0, 50) . "..." ?>
                        </p>
                        <div class="btns">
                            <a href="single.php?pId=<?php echo $data['pro_id'] ?>">read more</a>
                            <a href="<?php echo $data['live'] ?>" target="_blank">
                                <i class="fas fa-eye"></i> live
                            </a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<h1 class='notFound'>Project is Empty </h1>";
        }
        ?>

    </div>
    </div>

</section>

<?php
include './footer.php';
?>