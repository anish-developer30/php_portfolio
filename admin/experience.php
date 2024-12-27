<?php
include './header.php';
include './sidebar.php';
include './conn.php';

if ($_SESSION['role'] == 0) {
    echo "<script> window.location.href='http://localhost/MYSite/admin/dashboard.php'</script>";
}
?>


<div class="data">
    <!-- tables  -->
    <div class="flex">
        <h2 class="tableTitle">experience data</h2>
        <a href="add_experience.php" class="add_btn">add experience</a>
    </div>
    <div class="table">
        <table class="tableData" border="1" cellspacing="0">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>role</th>
                    <th>start year</th>
                    <th>end year</th>
                    <th>company</th>
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
                $select_ex = "SELECT * FROM `experience` ORDER BY ex_id DESC  LIMIT {$offset},{$limit} ";
                $select_ex_run = mysqli_query($conn, $select_ex);
                if (mysqli_num_rows($select_ex_run) > 0) {
                    $sno = $offset + 1;
                    while ($data = mysqli_fetch_assoc($select_ex_run)) {
                ?>

                        <tr>
                            <td><?php echo $sno ?></td>

                            <td><?php echo $data['role']; ?></td>
                            <td><?php echo $data['syear']; ?></td>
                            <td><?php echo $data['eyear']; ?></td>
                            <td><?php echo $data['company']; ?></td>
                            <td style="width: 400px;"><?php echo $data['description']; ?></td>

                            <td>
                                <div class="btns">

                                    <a href="delete.php?exId=<?php echo $data['ex_id']; ?>" class="delete">
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
        $select = "SELECT * FROM `experience`";
        $select_run = mysqli_query($conn, $select);
        $total_records = mysqli_num_rows($select_run);
        $total_num =   ceil($total_records / $limit);

        echo '<ul class="pagination">';
        if ($page > 1) {
            echo "<li>
                    <a href='experience.php?page=" . ($page - 1) . "'>Prev</a>
                </li>";
        }
        for ($i = 1; $i <= $total_num; $i++) {
            if ($i == $page) {
                $active = "active";
            } else {
                $active = "";
            }
            echo "<li>
                    <a href='experience.php?page=$i' class=$active >$i</a>
                </li>";
        }
        if ($total_num > $page) {
            echo "<li>
                    <a href='experience.php?page=" . ($page + 1) . "'>Next</a>
                </li>";
        }
        echo '</ul>';
        ?>
    </div>

</div>