<?php

include("../../db.php");
include("../../auth.php");

$fromUser = $_POST["fromUser"];
$toUser = $_POST["toUser"];
$output = "";

$chats = mysqli_query($connect, "SELECT * FROM message where (user_id = '" . $fromUser . "' AND ToUser = '" . $toUser . "') OR (user_id = '" . $toUser . "' AND ToUser = '" . $fromUser . "')");

$chat1 = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM message where (user_id = '" . $fromUser . "' AND ToUser = '" . $toUser . "') OR (user_id = '" . $toUser . "' AND ToUser = '" . $fromUser . "')"));
$row = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users where user_id = $fromUser"));
// $chat1 = mysqli_fetch_assoc($row);
if (empty($row['profile_image'])) {
    $image = "assets/image/user.jpg";
} else {
    $image = $row['profile_image'];
}

// echo $chat1["user_id"];
// echo $chat1["ToUser"];

// if ($fromUser != @$chat1["ToUser"]) {
    while ($chat = mysqli_fetch_assoc($chats)) {

        $message = $chat['Message'];

        if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $message)) {
            $message1 = "<a href='$message' target='_blank' class='text-info'>$message</a>";
        } else {
            $message1 = $message;
        }



        if ($chat["user_id"] == $fromUser) {
            $output .= '
        <div class="outgoing_msg">
            <div class="sent_msg">
                <p>' . $message1 . '</p>
                <span class="time_date">' . date("h:i A | M d", strtotime($chat['uploaded_on_msg'])) . '</span>
            </div>
        </div>';
        } else {
            $output .= '<div class="incoming_msg">
        <div class="incoming_msg_img"> <img src=' . $image . ' style="height:40px;width:50px;border-radius:50px;"> </div>
        <div class="received_msg">
            <div class="received_withd_msg">
                <p>' . $message1 . '</p>
                <span class="time_date"> ' . date("h:i A | M d", strtotime($chat['uploaded_on_msg'])) . '</span>
            </div>
        </div>
    </div>
    ';
        }
    }
// } else {
//     $output .= '
//     <h2 class="mt-5 text-center">Please Select the Friend to Message.</h2>
//     ';
// }

echo $output;
