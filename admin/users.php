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
        <h2 class="tableTitle">users data</h2>
        <a href="add_users.php" class="add_btn">add user</a>
    </div>
    <div class="table">
        <table class="tableData" border="1" cellspacing="0">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>access</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>password</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <!-- fetch users data  -->
                <?php
                $limit = 5;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $offset = ($page - 1) * $limit;
                $select_user = "SELECT * FROM `users`  ORDER BY user_id DESC  LIMIT {$offset},{$limit} ";
                $select_user_run = mysqli_query($conn, $select_user);
                if (mysqli_num_rows($select_user_run) > 0) {
                    $sno = $offset + 1;
                    while ($data = mysqli_fetch_assoc($select_user_run)) {
                ?>

                        <tr>
                            <td><?php echo $sno ?></td>
                            <td><?php if ($data['role'] == 1) {
                                    echo "Admin";
                                } else {
                                    echo "User";
                                } ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['phone']; ?></td>
                            <td class="email"><?php echo $data['email']; ?></td>
                            <td><?php echo $data['password']; ?></td>
                            <td>
                                <div class="btns">

                                    <a href="delete.php?userId=<?php echo $data['user_id']; ?>" class="delete">
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
        $select = "SELECT * FROM `users`";
        $select_run = mysqli_query($conn, $select);
        $total_records = mysqli_num_rows($select_run);
        $total_num =   ceil($total_records / $limit);

        echo '<ul class="pagination">';
        if ($page > 1) {
            echo "<li>
                    <a href='users.php?page=" . ($page - 1) . "'>Prev</a>
                </li>";
        }
        for ($i = 1; $i <= $total_num; $i++) {
            if ($i == $page) {
                $active = "active";
            } else {
                $active = "";
            }
            echo "<li>
                    <a href='users.php?page=$i' class=$active >$i</a>
                </li>";
        }
        if ($total_num > $page) {
            echo "<li>
                    <a href='users.php?page=" . ($page + 1) . "'>Next</a>
                </li>";
        }
        echo '</ul>';
        ?>

    </div>
</div>