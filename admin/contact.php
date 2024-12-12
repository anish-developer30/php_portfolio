<?php
include './sidebar.php';
include './header.php';
include './conn.php';
?>
<div class="data">
    <!-- tables  -->
    <div class="flex">
        <h2 class="tableTitle">contact data</h2>
    </div>
    <div class="table">
        <table class="tableData">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>country</th>
                    <th>city</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <!-- fetch contact data  -->
                <?php
                $limit = 5;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $offset = ($page - 1) * $limit;
                $select_contact = "SELECT * FROM `contact` ORDER BY contact_id DESC  LIMIT {$offset},{$limit} ";
                $select_contact_run = mysqli_query($conn, $select_contact);
                if (mysqli_num_rows($select_contact_run) > 0) {
                    $sno = $offset + 1;
                    while ($data = mysqli_fetch_assoc($select_contact_run)) {
                ?>

                        <tr>
                            <td><?php echo $sno ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td class="email"><?php echo $data['email']; ?></td>
                            <td><?php echo $data['phone']; ?></td>
                            <td><?php echo $data['country']; ?></td>
                            <td><?php echo $data['city']; ?></td>
                            <td>
                                <div class="btns">

                                    <a href="delete.php?conId=<?php echo $data['contact_id']; ?>" class="delete">
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
        $select = "SELECT * FROM `contact`";
        $select_run = mysqli_query($conn, $select);
        $total_records = mysqli_num_rows($select_run);
        $total_num =   ceil($total_records / $limit);

        echo '<ul class="pagination">';
        if ($page > 1) {
            echo "<li>
                    <a href='contact.php?page=" . ($page - 1) . "'>Prev</a>
                </li>";
        }
        for ($i = 1; $i <= $total_num; $i++) {
            if ($i == $page) {
                $active = "active";
            } else {
                $active = "";
            }
            echo "<li>
                    <a href='contact.php?page=$i' class=$active >$i</a>
                </li>";
        }
        if ($total_num > $page) {
            echo "<li>
                    <a href='contact.php?page=" . ($page + 1) . "'>Next</a>
                </li>";
        }
        echo '</ul>';
        ?>
    </div>

</div>