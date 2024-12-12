<?php
include './sidebar.php';
include './header.php';
include './conn.php';
?>


<div class="data">
    <!-- tables  -->
    <div class="flex">
        <h2 class="tableTitle">education data</h2>
        <a href="add_education.php" class="add_btn">add education</a>
    </div>
    <div class="table">
        <table class="tableData">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>class</th>
                    <th>year</th>
                    <th>institute</th>
                    <th>description</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <!-- fetch project data  -->
                <?php
                $limit = 5;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $offset = ($page - 1) * $limit;
                $select_edu = "SELECT * FROM `education` ORDER BY edu_id DESC  LIMIT {$offset},{$limit} ";
                $select_edu_run = mysqli_query($conn, $select_edu);
                if (mysqli_num_rows($select_edu_run) > 0) {
                    $sno = $offset + 1;
                    while ($data = mysqli_fetch_assoc($select_edu_run)) {
                ?>

                        <tr>
                            <td><?php echo $sno ?></td>

                            <td><?php echo $data['class']; ?></td>
                            <td><?php echo $data['year']; ?></td>
                            <td><?php echo $data['institute']; ?></td>
                            <td><?php echo $data['description']; ?></td>

                            <td>
                                <div class="btns">
                                    <a href="update_education.php?eduId=<?php echo $data['edu_id']; ?>" class="edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete.php?eduId=<?php echo $data['edu_id']; ?>" class="delete">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                <?php
                        $sno++;
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
        $select = "SELECT * FROM `education`";
        $select_run = mysqli_query($conn, $select);
        $total_records = mysqli_num_rows($select_run);
        $total_num =   ceil($total_records / $limit);

        echo '<ul class="pagination">';
        if ($page > 1) {
            echo "<li>
                    <a href='education.php?page=" . ($page - 1) . "'>Prev</a>
                </li>";
        }
        for ($i = 1; $i <= $total_num; $i++) {
            if ($i == $page) {
                $active = "active";
            } else {
                $active = "";
            }
            echo "<li>
                    <a href='education.php?page=$i' class=$active >$i</a>
                </li>";
        }
        if ($total_num > $page) {
            echo "<li>
                    <a href='education.php?page=" . ($page + 1) . "'>Next</a>
                </li>";
        }
        echo '</ul>';
        ?>
    </div>

</div>