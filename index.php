<?php
include './header.php';

$select_setting = "SELECT * FROM setting ";
$query_setting = mysqli_query($conn, $select_setting);
$data = mysqli_fetch_assoc($query_setting);


?>


<section class="hero">
    <div class="content">
        <h1><?php echo $data['name'] ?></h1>
        <h3><?php echo $data['professional'] ?> </h3>
        <a href="./admin/pdf/Anish.pdf" target="_blank" class="btn">download cv</a>
    </div>
</section>

<?php
include './footer.php';
?>