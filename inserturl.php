<?php
include('db.php');
include('auth.php');
$user = $_SESSION['username'];

?>

<?php
error_reporting(0);
$user_id = mysqli_query($connect,"SELECT user_id FROM `users` where username='$user'");
$users_id = mysqli_fetch_array($user_id);
$row =$users_id['user_id'];

if(isset($_POST["url"]))
{
    $message = '';
	$image = '';
	$title = '';
	$description='';
    $image_url='';
    $account = '';

    $url= $_POST["url"];
    $title= $_POST["title"];
    $description= $_POST["description"];
    $image= $_POST["image"];
    $image_title= $_POST["image_title"];
    $account= $_POST["account"];
    $catagories= $_POST["catagories"];

    $data = file_get_contents($image);
    $new = 'assets/img/postimage/'.time().'.jpg';
    file_put_contents($new, $data);
        
    if($catagories == TRUE){
        $query = "INSERT INTO urlfetcher(user_id,url,title,description,imageurl,image,uploaded_on,account,catagories,post_status)  VALUES ('$row','$url','$title','$description','$image','$new', NOW() ,'$account','$catagories','1') "; 
        $message1 = "Inserted";
    }
    else{
        $message = "Insert catagories";
    }

    if((mysqli_query($connect,$query))){
        $message = $message1;
    }
    else{
        $message = "Not Inserted";
    }


	$output = array(
        'message'	=>	$message,
        'name' => $name,
		'image'		=>	$image,
		'title'		=>	$title,
		'description'=>	$description,
        'account' => $account
	);
	echo json_encode($output);
}

if(isset($_POST["employee_id"]))  
{  
    $id = $_POST["employee_id"];
     $output = '';
     session_start();
     $user= $_SESSION['username'];   
     $connect = mysqli_connect("localhost", "root", "", "mix"); 
     $user_id1 = mysqli_query($connect,"SELECT user_id FROM `users` where username='$user'");
     $row = mysqli_fetch_array($user_id1);
     $user_id =$row['user_id'];
     

     $query = "DELETE FROM urlfetcher WHERE account = '$user' && content_id = '$id'";  
     $result = mysqli_query($connect, $query);  
     $query1 = "DELETE FROM rating_info WHERE user_id = '$user_id' && content_id = '$id'";  
     $result1 = mysqli_query($connect, $query1);  
  
}  

?>