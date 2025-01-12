<?php
include './header.php';
include './sidebar.php';
include './conn.php';

// total projects 
$select_pro = "SELECT * FROM `project`";
$query_pro = mysqli_query($conn, $select_pro);
$total_pro = mysqli_num_rows($query_pro);

// total categorys 
$select_cat = "SELECT * FROM `category`";
$query_cat = mysqli_query($conn, $select_cat);
$total_cat = mysqli_num_rows($query_cat);


// total contacts 
$select_con = "SELECT * FROM `contact`";
$query_con = mysqli_query($conn, $select_con);
$total_con = mysqli_num_rows($query_con);


// total users 
$select_user = "SELECT * FROM `users`";
$query_user = mysqli_query($conn, $select_user);
$total_user = mysqli_num_rows($query_user);

?>

<div class="data">
    <h2 class="heading">our datas</h2>

    <!--  box container  -->
    <div class="data_container">

        <div class="box  pro">
            <div class="flex">
                <i class="fas fa-project-diagram"></i>
                <span class="num " id="pro"><?php echo $total_pro ?></span>
            </div>
            <p class="head">
                total projects
            </p>
        </div>

        <div class="box cate">
            <div class="flex">
                <i class="fas fa-list"></i>
                <span class="num" id="cate"><?php echo $total_cat ?></span>
            </div>
            <p class="head">
                total categorys
            </p>
        </div>

        <div class="box con">
            <div class="flex">
                <i class="fas fa-phone"></i>
                <span class="num" id="con"><?php echo $total_con ?></span>

            </div>
            <p class="head">
                total contacts
            </p>
        </div>

        <div class="box skill">
            <div class="flex">
                <i class="fas fa-users"></i>
                <span class="num" id="user"><?php echo $total_user ?></span>

            </div>
            <p class="head">
                total users
            </p>
        </div>

    </div>

    <!-- charts  -->

    <div class="chartjs">
        <div class="chart">
            <canvas id="myChart1" area-label="chart" role="img"></canvas>
        </div>
        <div class="chart">
            <canvas id="myChart2" area-label="chart" role="img"></canvas>
        </div>
    </div>





    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="./js/chart.js"></script>
</div>
</div>