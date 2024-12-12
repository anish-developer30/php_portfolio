<?php
include './sidebar.php';
include './header.php';
include './conn.php';
?>
<div class="data">
    <!-- tables  -->
    <div class="flex">
        <h2 class="tableTitle">category data</h2>
        <a href="add_category.php" class="add_btn">add category</a>
    </div>
    <div class="table">
        <table class="tableData">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>category name</th>
                    <th>no.of post</th>
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
                $select_cat = "SELECT * FROM `category` ORDER BY cat_id DESC  LIMIT {$offset},{$limit} ";
                $select_cat_run = mysqli_query($conn, $select_cat);
                if (mysqli_num_rows($select_cat_run) > 0) {
                    $sno = $offset + 1;
                    while ($data = mysqli_fetch_assoc($select_cat_run)) {
                ?>
                        <tr>
                            <td><?php echo $sno ?></td>
                            <td><?php echo $data['cat_name']; ?></td>
                            <td><?php echo $data['post']; ?></td>
                            <td>
                                <div class="btns">
                                    <a href="update_cat.php?catId=<?php echo $data['cat_id']; ?>" class="edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete.php?catId=<?php echo $data['cat_id']; ?>" class="delete">
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
        $select_cat = "SELECT * FROM `category`";
        $select_cat_run = mysqli_query($conn, $select_cat);
        $total_records = mysqli_num_rows($select_cat_run);
        $total_num =   ceil($total_records / $limit);

        echo '<ul class="pagination">';
        if ($page > 1) {
            echo "<li>
                    <a href='category.php?page=" . ($page - 1) . "'>Prev</a>
                </li>";
        }
        for ($i = 1; $i <= $total_num; $i++) {
            if ($i == $page) {
                $active = "active";
            } else {
                $active = "";
            }
            echo "<li>
                    <a href='category.php?page=$i' class=$active >$i</a>
                </li>";
        }
        if ($total_num > $page) {
            echo "<li>
                    <a href='category.php?page=" . ($page + 1) . "'>Next</a>
                </li>";
        }
        echo '</ul>';
        ?>

    </div>

</div>