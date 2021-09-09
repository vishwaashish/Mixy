<?php 
include("db.php");
session_start();

// update image code of update_profile.php
if(!$_FILES['file']['error'])
{
    $filename = $_FILES['file']['tmp_name'];
    $username=$_GET['username'];
    $location='assets/upload/'.time().$_FILES['file']['name'];
    move_uploaded_file($filename, $location);
    $sql = "UPDATE users set `profile_image`= '$location' where `username` ='$username'";
        if (mysqli_query($connect, $sql)) {
            echo json_encode(array("statusCode"=>200));
        } 
        else {
            echo json_encode(array("statusCode"=>203));
        }
    mysqli_close($connect);
}
// update image code of update_profile.php
?>