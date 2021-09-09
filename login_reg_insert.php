<?php
include("db.php");
session_start();
if ($_POST['type'] == 1) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$duplicate = mysqli_query($connect, "select * from users where email='$email'");
	$duplicate1 = mysqli_query($connect, "select * from users where username='$username'");
	if (mysqli_num_rows($duplicate) > 0) {
		echo json_encode(array("statusCode" => 201));
	} else if (mysqli_num_rows($duplicate1) > 0) {
		echo json_encode(array("statusCode" => 202));
	} else {
		$sql = "INSERT INTO `users`( `name`, `email`, `phone`, `password`,`username`,`uploaded_on`) 
			VALUES ('$name','$email','$phone','" . md5($password) . "', '$username',NOW())";

		$sql1 = "CREATE TABLE `$username` (
			`content_id` int(11) NOT NULL AUTO_INCREMENT,
			`user_id` int(11) NOT NULL,
			`url` varchar(255) NOT NULL,
			`title` varchar(255) NOT NULL,
			`description` varchar(255) NOT NULL,
			`imageurl` varchar(255) NOT NULL,
			`uploaded_on` datetime NOT NULL,
			`account` varchar(11) NOT NULL,
			`catagories` varchar(255) CHARACTER SET utf8 NOT NULL,
			`post_status` enum('0','1') CHARACTER SET utf8 NOT NULL COMMENT '0-active,1-inactive',
			PRIMARY KEY (content_id)
			 )
			";

		if (mysqli_query($connect, $sql) && mysqli_query($connect, $sql1)) {
			echo json_encode(array("statusCode" => 200));
		} else {
			echo json_encode(array("statusCode" => 203));
		}
	}
	mysqli_close($connect);
}

if ($_POST['type'] == 2) {
	// $time=time()-30;
	// $ip_address=getIpAddr();
	// $check_login_row=mysqli_fetch_assoc(mysqli_query($connect,"select count(*) as total_count from loginlog where trytime>$time and ipaddr='$ip_address'"));
	// $total_count=$check_login_row['total_count'];
	// echo $total_count;


	$email = $_POST['username'];
	$password = $_POST['password'];

	$check = mysqli_query($connect, "select * from users where email='$email' AND password='" . md5($password) . "'");
	// $usernam = mysqli_fetch_array($check);
	// $username = $usernam['username'];
	// $user_id = $usernam['user_id'];

	// if (mysqli_num_rows($check) > 0) {
	if (mysqli_num_rows($check) > 0) {

		$check1 = mysqli_query($connect, "select * from users where email='$email'");
		$usernam = mysqli_fetch_array($check1);
		$username = $usernam['username'];

		$user_id = $usernam['user_id'];

		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['user_id'] = $user_id;

		echo json_encode(array("statusCode" => 200, "username" => $username));
	} else {

		// $trytime = time();
		// $insert  = mysqli_query($connect,"Insert into loginlog (ipaddr,trytime) values ('$ip_address','$trytime')") ;
		echo json_encode(array("statusCode" => 201));
	}

	mysqli_close($connect);
}

function getIpAddr(){
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ipAddr = $_SERVER['HTTP_CLIENT_IP'];
	}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ipAddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$ipAddr = $_SERVER['REMOTE_ADDR'];
	}
	return $ipAddr;
}
// update profile

if ($_POST['type'] == 3) {
	$name = $_POST['name'];
	$username = $_POST['username'];
	$phone = $_POST['phone'];
	$bio = $_POST['bio'];
	$website = $_POST['website'];

	if (empty($name) && empty($phone) && empty($email)) {
		echo json_encode(array("statusCode" => 204));
	} else {

		$sql = "UPDATE users set `name`='$name', `phone`='$phone', `bio`='$bio', `website`='$website' where `username` ='$username'";
		if (mysqli_query($connect, $sql)) {
			echo json_encode(array("statusCode" => 200));
		} else {
			echo json_encode(array("statusCode" => 203));
		}
	}
	mysqli_close($connect);
}

if ($_POST['type'] == 4) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$curpass = $_POST['curpass'];

	if (empty($password)) {
		echo json_encode(array("statusCode" => 204));
	} else {
		$row = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * from users where username='$username'"));
		if ($row['password'] == md5($curpass)) {

			$sql = "UPDATE users set `password`='" . md5($password) . "' where `username` ='$username'";

			if (mysqli_query($connect, $sql)) {
				echo json_encode(array("statusCode" => 200));
			} else {
				echo json_encode(array("statusCode" => 203));
			}
		} else {
			echo json_encode(array("statusCode" => 201));
		}
	}
	mysqli_close($connect);
}
