<?php

//database_connection.php

$connect1 = new PDO("mysql:host=localhost;dbname=mix", "root", "");




function Get_user_name($connect1, $user_id)
{
	$query = "
	SELECT username FROM users 
	WHERE user_id = '".$user_id."'
	";

	$statement = $connect1->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	foreach($result as $row)
	{
		return $row["username"];
	}
}



function make_follow_button($connect1, $sender_id, $receiver_id)
{
	$query = "
	SELECT * FROM follower_info 
	WHERE sender_id = '".$sender_id."' 
	AND receiver_id = '".$receiver_id."'
	";
	$statement = $connect1->prepare($query);
	$statement->execute();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		$output = '<button type="button" name="follow_button" class="btn btn-success action_button" data-action="unfollow" data-sender_id="'.$sender_id.'" style="width:150px;"><strong> Following</strong></button>';
	}
	else
	{
		$output = '<button type="button" name="follow_button" class="btn btn-primary text-white action_button" data-action="follow" data-sender_id="'.$sender_id.'" style="width:150px;color:white;"><i class="fas fa-user-plus"></i><strong> Follow</strong></button>';
	}
	return $output;
}

// follow button search_user.php
function make_follow_button1($connect1, $sender_id, $receiver_id)
{
	$query = "
	SELECT * FROM follower_info 
	WHERE sender_id = '".$sender_id."' 
	AND receiver_id = '".$receiver_id."'
	";
	$statement = $connect1->prepare($query);
	$statement->execute();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		$output = '<button type="button" name="follow_button" class="btn btn-success action_button" data-action="unfollow1" data-sender_id="'.$sender_id.'" style="width:150px;"><strong> Following</strong></button>';
	}
	else
	{
		$output = '<button type="button" name="follow_button" class="btn btn-primary text-white action_button" data-action="follow1" data-sender_id="'.$sender_id.'" style="width:150px;color:white;"><i class="fas fa-user-plus"></i><strong> Follow</strong></button>';
	}
	return $output;
}





function Get_user_id($connect1, $username)
{
	$query = "
	SELECT user_id FROM users 
	WHERE username = '".$username."'
	";	
	$statement = $connect1->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["user_id"];
	}
}




?>