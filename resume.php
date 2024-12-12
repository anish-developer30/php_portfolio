<?php
include './header.php';
?>


<section class="resume">
    <div class="container">
        <div class="row">
            <!-- Education section start  -->

            <div class="col">
                <header class="title">
                    <h2>EDUCATION</h2>
                </header>
                <div class="content">

                    <?php
                    $select_edu = "SELECT * FROM education ORDER BY edu_id DESC";
                    $query_edu = mysqli_query($conn, $select_edu);
                    if (mysqli_num_rows($query_edu) > 0) {
                        while ($edu = mysqli_fetch_assoc($query_edu)) {
                    ?>
                            <div class="box">
                                <h4><span class="fas fa-calendar-alt"></span> <?php echo $edu['year'] ?></h4>
                                <h3><?php echo $edu['class'] ?></h3>
                                <p><?php echo $edu['description'] ?></p>
                            </div>
                    <?php
                        }
                    } ?>

                </div>
            </div>

            <!-- Experience section start  -->

            <div class="col">
                <header class="title">
                    <h2>EXPERIENCE</h2>
                </header>
                <div class="content">


                    <?php
                    $select_ex = "SELECT * FROM experience ORDER BY ex_id DESC";
                    $query_ex = mysqli_query($conn, $select_ex);
                    if (mysqli_num_rows($query_ex) > 0) {
                        while ($ex = mysqli_fetch_assoc($query_ex)) {
                    ?>
                            <div class="box">
                                <div class="flex">
                                    <h4> <span class="fas fa-calendar-alt"></span> <?php echo $ex['year'] ?></h4>
                                    <p> <span class="fas fa-building"></span> <?php echo $ex['company'] ?></p>
                                </div>
                                <h3><?php echo $ex['role'] ?></h3>
                                <p><?php echo $ex['description'] ?></p>
                            </div>
                    <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include './footer.php';
?>