<?php
//fetch_chat_notification.php;

include("db.php");


$fromUser = $_POST["fromUser"];
$toUser = $_POST["toUser"];

if(isset($_POST["view"]))
{
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE message SET message_status=1 WHERE user_id=$toUser AND ToUser = $fromUser AND  message_status=0";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT message.user_id,message.message_status,message.uploaded_on_msg, message.Message,users.name FROM message INNER JOIN users ON users.user_id = message.user_id where message.user_id !='$fromUser'   order by id desc";
 $result = mysqli_query($connect, $query);
 $output = '';
 
//  $row1= mysqli_fetch_array(mysqli_query($connect,"SELECT message.user_id,message.uploaded_on_msg, message.Message,users.name FROM message INNER JOIN users ON users.user_id = message.user_id where message.user_id='$fromUser'"));
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
    if($row['message_status']=='0'){
   $output .='
   <li class="border bg-white">
   
    <a href="chatbox.php?toUser=' . $row['user_id'] . '">
     <strong>'.$row['name']."</strong> say <strong><i>".$row["Message"]."</i></strong> to you".'<br />
     <small><em>'.date("d M | h:i A",strtotime($row["uploaded_on_msg"])).'</em></small>
    </a>
   </li>
   
   ';
    }else if($row['message_status']=='1'){
        $output .='
   <li class="border bg-light">
   
    <a href="chatbox.php?toUser=' . $row['user_id'] . '">
     <strong>'.$row['name']."</strong> say <strong><i>".$row["Message"]."</i></strong> to you".'<br />
     <small><em>'.date("d M | h:i A",strtotime($row["uploaded_on_msg"])).'</em></small>
    </a>
   </li>
  
   ';

    }
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
//  $query_1 = "SELECT * FROM message WHERE message_status=0";
 $query_1 ="SELECT * FROM message where (user_id = '".$toUser."' AND ToUser = '".$fromUser."' AND message_status=0)" ;
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}


// $query = "SELECT * FROM message where user_id != '$fromUser' ORDER BY id DESC";
// $result = mysqli_query($connect, $query);
// while($row = mysqli_fetch_array($result)){
// echo $row['id'];}
?>