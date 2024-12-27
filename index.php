<?php
include './header.php';

$select_setting = "SELECT * FROM setting ";
$query_setting = mysqli_query($conn, $select_setting);
$data = mysqli_fetch_assoc($query_setting);


?>


<section class="hero">
    <div class="content">
        <h1><?php echo $data['name'] ?></h1>
        <a href="" class="btn">download cv</a>
    </div>
</section>

<?php
include './footer.php';
?>