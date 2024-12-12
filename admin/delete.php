<?php
include './conn.php';

// delete categorys 
if (isset($_GET['catId'])) {
    $catId = $_GET['catId'];
    $delete_cat = "DELETE FROM `category` WHERE  cat_id=$catId";
    if (mysqli_query($conn, $delete_cat)) {
        header("Location: http://localhost/MYSite/admin/category.php");
    } else {
        echo "<script> alert('Category Not Deleted ') </script>";
    }
}


// delete users 
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $delete_user = "DELETE FROM `users` WHERE  user_id=$userId";
    if (mysqli_query($conn, $delete_cat)) {
        header("Location: http://localhost/MYSite/admin/users.php");
    } else {
        echo "<script> alert('user Not Deleted ') </script>";
    }
}


// project delete 
if (isset($_GET['proId'])) {
    $proId = $_GET['proId'];
    $del_catId = $_GET['del_catId'];


    $select_project = "SELECT * FROM `project` WHERE  pro_id=$proId;";
    $result  = mysqli_query($conn, $select_project) or die("image delete from folder query error");
    $getImg = mysqli_fetch_assoc($result);

    unlink('upload/' . $getImg['pro_img']);

    $delete_project = "DELETE FROM `project` WHERE  pro_id=$proId;";
    $delete_project  .= "UPDATE category SET post = post-1 WHERE cat_id = $del_catId";

    if (mysqli_multi_query($conn, $delete_project)) {
        header("Location: http://localhost/MYSite/admin/project.php");
    } else {
        echo "<script> alert('project Not Deleted ') </script>";
    }
}


// contact delete 
if (isset($_GET['conId'])) {
    $conId = $_GET['conId'];
    $delete_contact = "DELETE FROM `contact` WHERE  contact_id=$conId";
    if (mysqli_query($conn, $delete_contact)) {
        header("Location: http://localhost/MYSite/admin/contact.php");
    } else {
        echo "<script> alert('contact Not Deleted ') </script>";
    }
}


// education delete 
if (isset($_GET['eduId'])) {
    $eduId = $_GET['eduId'];
    $delete_edu = "DELETE FROM `education` WHERE  edu_id=$eduId";
    if (mysqli_query($conn, $delete_edu)) {
        header("Location: http://localhost/MYSite/admin/education.php");
    } else {
        echo "<script> alert('education Not Deleted ') </script>";
    }
}


// experience delete 
if (isset($_GET['exId'])) {
    $exId = $_GET['exId'];
    $delete_ex = "DELETE FROM `experience` WHERE  ex_id=$exId";
    if (mysqli_query($conn, $delete_ex)) {
        header("Location: http://localhost/MYSite/admin/experience.php");
    } else {
        echo "<script> alert('experience Not Deleted ') </script>";
    }
}
