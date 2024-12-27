<?php
include './header.php';
include './sidebar.php';
include './conn.php';
?>
<div class="data">
    <!-- tables  -->
    <div class="flex">
        <h2 class="tableTitle">category data</h2>
        <a href="add_skills.php" class="add_btn">add skills</a>
    </div>
    <div class="table">
        <table class="tableData" border="1" cellspacing="0">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>category name</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <!-- fetch category data  -->
                <?php
                $limit = 5;

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $offset = ($page - 1) * $limit;
                $select_sk = "SELECT * FROM `skills` ORDER BY sk_id DESC  LIMIT {$offset},{$limit} ";
                $select_sk_run = mysqli_query($conn, $select_sk);
                if (mysqli_num_rows($select_sk_run) > 0) {
                    $sno = $offset + 1;
                    while ($data = mysqli_fetch_assoc($select_sk_run)) {
                ?>
                        <tr>
                            <td><?php echo $sno ?></td>
                            <td><?php echo $data['sk_name']; ?></td>
                            <td>
                                <div class="btns">

                                    <a href="delete.php?skId=<?php echo $data['sk_id']; ?>" class="delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                <?php
                        $sno++;
                    }
                } ?>
            </tbody>
        </table>
        <?php
        $select_cat = "SELECT * FROM `skills`";
        $select_cat_run = mysqli_query($conn, $select_cat);
        $total_records = mysqli_num_rows($select_cat_run);
        $total_num =   ceil($total_records / $limit);

        echo '<ul class="pagination">';
        if ($page > 1) {
            echo "<li>
                    <a href='skills.php?page=" . ($page - 1) . "'>Prev</a>
                </li>";
        }
        for ($i = 1; $i <= $total_num; $i++) {
            if ($i == $page) {
                $active = "active";
            } else {
                $active = "";
            }
            echo "<li>
                    <a href='skills.php?page=$i' class=$active >$i</a>
                </li>";
        }
        if ($total_num > $page) {
            echo "<li>
                    <a href='skills.php?page=" . ($page + 1) . "'>Next</a>
                </li>";
        }
        echo '</ul>';
        ?>

    </div>

</div>