<?php
include './sidebar.php';
include './header.php';
include './conn.php';
?>

<div class="data">
    <!-- tables  -->
    <div class="flex">
        <h2 class="tableTitle">project data</h2>
        <a href="add_project.php" class="add_btn">add project</a>
    </div>
    <div class="table">
        <table class="tableData">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>image</th>
                    <th>title</th>
                    <th>description</th>
                    <th>tech</th>
                    <th>download</th>
                    <th>live</th>
                    <th>category</th>
                    <th>author</th>
                    <th>date</th>
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
                $select_pro = "SELECT * FROM `project`
                -- join table project and category 
                LEFT JOIN category ON project.category=category.cat_id
                -- join table project and user 
                LEFT JOIN users ON project.author=users.user_id

                 ORDER BY pro_id DESC  LIMIT {$offset},{$limit} ";
                $select_pro_run = mysqli_query($conn, $select_pro);
                if (mysqli_num_rows($select_pro_run) > 0) {
                    $sno = $offset + 1;
                    while ($data = mysqli_fetch_assoc($select_pro_run)) {
                ?>

                        <tr>
                            <td><?php echo $sno ?></td>
                            <td>
                                <img src="./upload/<?php echo $data['pro_img'] ?>" alt="" width="50px" height="50px">
                            </td>
                            <td><?php echo $data['title']; ?></td>
                            <td><?php echo $data['description']; ?></td>
                            <td><?php echo $data['tech']; ?></td>
                            <td><?php echo $data['download']; ?></td>
                            <td><?php echo $data['live']; ?></td>
                            <td><?php echo $data['cat_name']; ?></td>
                            <td><?php echo $data['name']; ?> </td>
                            <td><?php echo $data['date']; ?> </td>
                            <td>
                                <div class="btns">
                                    <a href="update_project.php?proId=<?php echo $data['pro_id']; ?>" class="edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete.php?proId=<?php echo $data['pro_id']; ?>&del_catId=<?php echo $data['cat_id'] ?>" class="delete">
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
        $select = "SELECT * FROM `project`";
        $select_run = mysqli_query($conn, $select);
        $total_records = mysqli_num_rows($select_run);
        $total_num =   ceil($total_records / $limit);

        echo '<ul class="pagination">';
        if ($page > 1) {
            echo "<li>
                    <a href='project.php?page=" . ($page - 1) . "'>Prev</a>
                </li>";
        }
        for ($i = 1; $i <= $total_num; $i++) {
            if ($i == $page) {
                $active = "active";
            } else {
                $active = "";
            }
            echo "<li>
                    <a href='project.php?page=$i' class=$active >$i</a>
                </li>";
        }
        if ($total_num > $page) {
            echo "<li>
                    <a href='project.php?page=" . ($page + 1) . "'>Next</a>
                </li>";
        }
        echo '</ul>';
        ?>
    </div>
</div>