<?php

session_start();
include("../../db.php");

$fromUser = $_POST["fromUser"];
$toUser = $_POST["toUser"];
$message = $_POST["message"];


$output="";

$sql = "INSERT INTO message (user_id, ToUser, Message,message_status, uploaded_on_msg) VALUES ('$fromUser','$toUser','$message','1',NOW())";

if($connect->query($sql)){
    $output.="";
}
else{
    $output.="Error, Please Try Again.";
}
echo $output;
?>