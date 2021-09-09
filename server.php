<?php
//sserver.php
// like system in all_user.php
// connect to database
include("db.php");
include('auth.php');
include('database_connection.php');
$user = $_SESSION['username'];
$user_id1 = mysqli_query($connect, "SELECT user_id FROM `users` where username='$user'");
$users_id = mysqli_fetch_array($user_id1);
$user_id = $users_id['user_id'];



// if user clicks like or dislike button
if (isset($_POST['action1'])) {
	$content_id = $_POST['content_id'];
	$action1 = $_POST['action1'];
	switch ($action1) {
		case 'like':
			$sql = "INSERT INTO rating_info (user_id, content_id, rating_action) 
         	   VALUES ($user_id, $content_id, 'like') 
         	   ON DUPLICATE KEY UPDATE rating_action='like'";
			break;
		case 'dislike':
			$sql = "INSERT INTO rating_info (user_id, content_id, rating_action) 
               VALUES ($user_id, $content_id, 'dislike') 
         	   ON DUPLICATE KEY UPDATE rating_action='dislike'";
			break;
		case 'unlike':
			$sql = "DELETE FROM rating_info WHERE user_id=$user_id AND content_id=$content_id";
			break;
		case 'undislike':
			$sql = "DELETE FROM rating_info WHERE user_id=$user_id AND content_id=$content_id";
			break;
		default:
			break;
	}

	// execute query to effect changes in the database ...
	mysqli_query($connect, $sql);
	echo getRating($content_id);
	exit(0);
}

// Get total number of likes for a particular post
function getLikes($id)
{
	global $connect;
	$sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE content_id = $id AND rating_action='like'";
	$rs = mysqli_query($connect, $sql);
	$result = mysqli_fetch_array($rs);
	return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
	global $connect;
	$sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE content_id = $id AND rating_action='dislike'";
	$rs = mysqli_query($connect, $sql);
	$result = mysqli_fetch_array($rs);
	return $result[0];
}

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
	global $connect;
	$rating = array();
	$likes_query = "SELECT COUNT(*) FROM rating_info WHERE content_id = $id AND rating_action='like'";
	$dislikes_query = "SELECT COUNT(*) FROM rating_info 
		  			WHERE content_id = $id AND rating_action='dislike'";
	$likes_rs = mysqli_query($connect, $likes_query);
	$dislikes_rs = mysqli_query($connect, $dislikes_query);
	$likes = mysqli_fetch_array($likes_rs);
	$dislikes = mysqli_fetch_array($dislikes_rs);
	$rating = [
		'likes' => $likes[0],
		'dislikes' => $dislikes[0]
	];
	return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($content_id)
{
	global $connect;
	global $user_id;
	$sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
  		  AND content_id=$content_id AND rating_action='like'";
	$result = mysqli_query($connect, $sql);
	if (mysqli_num_rows($result) > 0) {
		return true;
	} else {
		return false;
	}
}

// Check if user already dislikes post or not
function userDisliked($content_id)
{
	global $connect;
	global $user_id;
	$sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
  		  AND content_id=$content_id AND rating_action='dislike'";
	$result = mysqli_query($connect, $sql);
	if (mysqli_num_rows($result) > 0) {
		return true;
	} else {
		return false;
	}
}


// follow user follower_info.php


if (isset($_POST['action'])) {
	$output = '';
	if ($_POST['action'] == 'fetch_user') {
		$query = "
		SELECT * FROM users 
		WHERE user_id != '" . $user_id . "' 
		ORDER BY user_id DESC 
		
		";
		$statement = $connect1->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			if (strlen($row['name']) > 15) {
				$name = substr($row['name'], 0, 15);
				$name = "$name...";
			} else {
				$name = $row['name'];
			}
			if (strlen($row['bio']) > 17) {
				$bio = substr($row['bio'], 0, 18);
				$bio = "$bio...";
			} else {
				$bio = $row['bio'];
			}
			$profile_image = '';
			if (empty($row['profile_image'])) {
				$profile_image = '<img src="assets/image/user.jpg" class="rounded-circle img-thumbnail img-responsive mt-3 shadow-sm" width="100" style="border-radius:100%;width: 150px;height: 150px;" />';
			} else {
				$profile_image = '<img src=" ' . $row["profile_image"] . '" class="rounded-circle img-thumbnail img-responsive mt-3 shadow-sm" width="100" style="border-radius:100%;width: 150px;height: 150px;"/>';
			}
			$output .= '
			<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box1" style="min-width: 100%;">
            <div class="icon d-flex justify-content-center ">
			<a class="text-decoration-none text-dark" href="search_user.php?user=' . $row["username"] . '" >
                    ' . $profile_image . ' </a></div>
			<a class="text-decoration-none" id="user_data" href="search_user.php?user=' . $row["username"] . '" >
            <h6 class="title text-muted">@' . $row["username"] . '</h6>
			<h4 class="title">' . ucwords($row["name"]) . '</h4>
			<h5 class="title text-danger">' . $row["follower_number"] . ' Followers</h5>
			
			</a>
			<div class="text-center" >
                            ' . make_follow_button($connect1, $row["user_id"], $user_id) . '     
            </div>
          </div>
        </div>
			
			';
		}
		echo $output;
	}
	//follow
	if ($_POST['action'] == 'follow') {
		$query = "
		INSERT INTO follower_info 
		(sender_id, receiver_id) 
		VALUES ('" . $_POST["sender_id"] . "', '" . $user_id . "')
		";
		$statement = $connect1->prepare($query);
		if ($statement->execute()) {
			$sub_query = "
			UPDATE users SET follower_number = follower_number + 1 WHERE user_id = '" . $_POST["sender_id"] . "'
			";

			$statement = $connect1->prepare($sub_query);
			$statement->execute();


			$query3 = "select count(receiver_id) as c from follower_info as f join users as u on f.sender_id = u.user_id WHERE receiver_id = $user_id ";
			$result3 = mysqli_query($connect, $query3);
			$foll = '';
			if ($result3) {
				while ($row = mysqli_fetch_assoc($result3)) {
					$foll = $row['c'];
				}
			}
			$sub_query1 = "
			UPDATE users SET following_number = $foll WHERE user_id = '" . $user_id . "';
			";
			$statement = $connect1->prepare($sub_query1);
			$statement->execute();

			// $notification_text = '<b>' . Get_user_name($connect1, $_SESSION["user_id"]) . '</b> has follow you.';

			// $insert_query = "
			// INSERT INTO tbl_notification 
			// (notification_receiver_id, notification_text, read_notification) 
			// VALUES ('".$_POST["sender_id"]."', '".$notification_text."', 'no')
			// ";

			// $statement = $connect1->prepare($insert_query);
			// $statement->execute();
		}
	}

	if ($_POST['action'] == 'unfollow') {
		$query = "
		DELETE FROM follower_info 
		WHERE sender_id = '" . $_POST["sender_id"] . "' 
		AND receiver_id = '" . $user_id . "'
		";
		$statement = $connect1->prepare($query);
		if ($statement->execute()) {
			$sub_query = "
			UPDATE users 
			SET follower_number = follower_number - 1 
			WHERE user_id = '" . $_POST["sender_id"] . "'
			";

			$statement = $connect1->prepare($sub_query);
			$statement->execute();

			$query3 = "select count(receiver_id) as c from follower_info as f join users as u on f.sender_id = u.user_id WHERE receiver_id = $user_id ";
			$result3 = mysqli_query($connect, $query3);
			$foll = '';
			if ($result3) {
				while ($row = mysqli_fetch_assoc($result3)) {
					$foll = $row['c'];
				}
			}
			$sub_query1 = "
			UPDATE users SET following_number = $foll WHERE user_id = '" . $user_id . "';
			";
			$statement = $connect1->prepare($sub_query1);
			$statement->execute();

			// $sub_query1 = "
			// UPDATE users SET following_number = following_number - 1 WHERE user_id = '".$_POST["sender_id"]."'
			// ";
			// $statement = $connect1->prepare($sub_query1);
			// $statement->execute();


			// $notification_text = '<b>' . Get_user_name($connect1, $_SESSION["user_id"]) . '</b> has unfollow you.';

			// $insert_query = "
			// INSERT INTO tbl_notification 
			// (notification_receiver_id, notification_text, read_notification) 
			// VALUES ('".$_POST["sender_id"]."', '".$notification_text."', 'no')
			// ";
			// $statement = $connect1->prepare($insert_query);

			// $statement->execute();
		}
	}
}



// follow single user search_user.php



if (isset($_POST['action_follow'])) {
	$output = '';
	if ($_POST['action_follow'] == 'fetch_user') {
		$userid = $_POST['accoun'];
		$query = "
		SELECT * FROM users 
		WHERE username = '" . $userid . "' 
		
		
		
		";
		$statement = $connect1->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			if (strlen($row['name']) > 15) {
				$name = substr($row['name'], 0, 15);
				$name = "$name...";
			} else {
				$name = $row['name'];
			}
			if (strlen($row['bio']) > 17) {
				$bio = substr($row['bio'], 0, 18);
				$bio = "$bio...";
			} else {
				$bio = $row['bio'];
			}
			$profile_image = '';
			if (empty($row['profile_image'])) {
				$profile_image = '<img src="' . $row["profile_image"] . '" class="rounded-circle img-thumbnail img-responsive mt-3 shadow-sm" width="100" style="border-radius:100%;" />';
			} else {
				$profile_image = '<img src="assets/image/user.jpg" class="rounded-circle img-thumbnail img-responsive mt-3 shadow-sm" width="100" style="border-radius:100%;"/>';
			}
			$output .= '
			
			
							  ' . make_follow_button1($connect1, $row["user_id"], $user_id) . '     
			  
			
			  
			
			';
		}
		echo $output;
	}
	//follow -- search_user.php
	if ($_POST['action_follow'] == 'follow1') {
		$query = "
		INSERT INTO follower_info 
		(sender_id, receiver_id) 
		VALUES ('" . $_POST["sender_id"] . "', '" . $user_id . "')
		";
		$statement = $connect1->prepare($query);
		if ($statement->execute()) {
			$sub_query = "
			UPDATE users SET follower_number = follower_number + 1 WHERE user_id = '" . $_POST["sender_id"] . "'
			";

			$statement = $connect1->prepare($sub_query);
			$statement->execute();


			$query3 = "select count(receiver_id) as c from follower_info as f join users as u on f.sender_id = u.user_id WHERE receiver_id = $user_id ";
			$result3 = mysqli_query($connect, $query3);
			$foll = '';
			if ($result3) {
				while ($row = mysqli_fetch_assoc($result3)) {
					$foll = $row['c'];
				}
			}
			$sub_query1 = "
			UPDATE users SET following_number = $foll WHERE user_id = '" . $user_id . "';
			";
			$statement = $connect1->prepare($sub_query1);
			$statement->execute();

			// $notification_text = '<b>' . Get_user_name($connect1, $_SESSION["user_id"]) . '</b> has follow you.';

			// $insert_query = "
			// INSERT INTO tbl_notification 
			// (notification_receiver_id, notification_text, read_notification) 
			// VALUES ('".$_POST["sender_id"]."', '".$notification_text."', 'no')
			// ";

			// $statement = $connect1->prepare($insert_query);
			// $statement->execute();
		}
	}

	if ($_POST['action_follow'] == 'unfollow1') {
		$query = "
		DELETE FROM follower_info 
		WHERE sender_id = '" . $_POST["sender_id"] . "' 
		AND receiver_id = '" . $user_id . "'
		";
		$statement = $connect1->prepare($query);
		if ($statement->execute()) {
			$sub_query = "
			UPDATE users 
			SET follower_number = follower_number - 1 
			WHERE user_id = '" . $_POST["sender_id"] . "'
			";

			$statement = $connect1->prepare($sub_query);
			$statement->execute();

			$query3 = "select count(receiver_id) as c from follower_info as f join users as u on f.sender_id = u.user_id WHERE receiver_id = $user_id ";
			$result3 = mysqli_query($connect, $query3);
			$foll = '';
			if ($result3) {
				while ($row = mysqli_fetch_assoc($result3)) {
					$foll = $row['c'];
				}
			}
			$sub_query1 = "
			UPDATE users SET following_number = $foll WHERE user_id = '" . $user_id . "';
			";
			$statement = $connect1->prepare($sub_query1);
			$statement->execute();

			// $sub_query1 = "
			// UPDATE users SET following_number = following_number - 1 WHERE user_id = '".$_POST["sender_id"]."'
			// ";
			// $statement = $connect1->prepare($sub_query1);
			// $statement->execute();


			// $notification_text = '<b>' . Get_user_name($connect1, $_SESSION["user_id"]) . '</b> has unfollow you.';

			// $insert_query = "
			// INSERT INTO tbl_notification 
			// (notification_receiver_id, notification_text, read_notification) 
			// VALUES ('".$_POST["sender_id"]."', '".$notification_text."', 'no')
			// ";
			// $statement = $connect1->prepare($insert_query);

			// $statement->execute();
		}
	}
}

if (isset($_POST["action12"])) //user_dashbord
{
	$accoun = $_POST["accoun"];

	$query = "
	SELECT * FROM `urlfetcher` WHERE account ='$accoun' ORDER BY content_id DESC
	";

	$statement = $connect1->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if ($total_row > 0) {
		foreach ($result as $res) {
			$domain = $res['url'];
			$domain1 = explode('/', $domain);
			$content_id = $res['content_id'];


			$delete = '';
			if (strlen($res['title']) > 35) {
				$title = substr($res['title'], 0, 35);
				$title = "$title...";
			} else {
				$title = $res['title'];
			}
			if (strlen($res['description']) > 110) {
				$description = substr($res['description'], 0, 110);
				$description = "$description...";
			} else {
				$description = $res['description'];
			}
			if ($description == "null") {
				$description1 = "Not Found";
			} else {

				$description1 = $description;
			}
			if ($accoun == $_SESSION['username']) {
				$delete = "<a style=\"font-size:18px\"  type=\"button\" class=\"delete\" name=\"delete\" id=\"$content_id\" > <i class=\"fa fa-trash \"></i></a> ";
			}
			if (userLiked($res['content_id'])) {
				$post_class = 'class="fa1 fa fa-thumbs-up like-btn text-danger"';
			} else {
				$post_class = 'class="fa1 fa fa-thumbs-o-up like-btn text-danger"';
			}
			if (userDisliked($res['content_id'])) {
				$post_class1 = 'class="fa1 fa fa-thumbs-down dislike-btn"';
			} else {
				$post_class1 = 'class="fa1fa fa-thumbs-o-down dislike-btn"';
			}

			$url1 = $res['url'];

			$output .= '
			<div class="col-lg-3 col-md-6 d-flex align-items-stretch icon-box " data-aos="fade-up" data-aos-delay="100" >
			<div class="">
			<div class="column_post">
			  <!-- Post-->
			  <div class="post-module">
				<!-- Thumbnail-->
				<div class="thumbnail"><img src=' . $res['image'] . '></div>
				<!-- Post Content-->
				<div class="post-content">
				
				  <div class="category">' . $res['catagories'] . '</div>
				  <div class="row py-2 bg-light">
								<div class="col-6">
									<a class="text-decoration-none text-muted float-left" href="https://' . $domain1[2] . '" target=\"_blank\" rel=\"nofollow\">' . $domain1[2] . '</a>
								</div>
								<div class="col-6 text-right">
								' . $delete . '
								<div class="dropdown">
								<a class="dropbtn fa fa fa-share-alt mx-3 text-decoration-none text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="" style="font-size: 18px;"></a>
								<div class="dropdown-menu dropdown_post post dropdown-content" aria-labelledby="dropdownMenuLink" style="background: none;margin-top:9px;position: absolute;border: none;">
								  <a  href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . $res['title'] . '&amp;p[url]=' . $res['url'] . '" target="_parent" href="javascript: void(0)" title="Share on Facebook" target="_blank" class="fab fa-facebook"></a>
								  <a href="https://www.pinterest.com/pin/create/button/?url=' . $res['url'] . '&description=' . $res['title'] . ' " title="Share on Pinterest" target="_blank" class="fab fa-pinterest"></a>
								  <a href="http://twitter.com/share?text=' . $res['title'] . '&url=' . $res['url'] . '&hashtags=' . $res['catagories'] . '" target="_blank" title="Tweet" class="fab fa-twitter"></a>
								  <a href="http://www.linkedin.com/shareArticle?mini=true&url=' . $res['url'] . '&title=' . $res['title'] . '&source=' . $res['url'] . '" target="_blank" title="Share on LinkedIn" class="fab fa-linkedin"></a>
								  <a href="https://wa.me/?text=' . $res['url'] . '" target="_blank" title="Share on Whatsapp" class="fab fa-whatsapp"></a>
								  <a href="mailto:?subject=' . $res['title'] . '&amp;body=' . $res['url'] . '" target="_blank" title="Share on Email" class="fa fa-envelope"></a>
								  </div>
								</div>
						
                      
								</div>
						</div>
				  <a class="text-decoration-none text-dark" href="' . $domain . '" target="_blank">
				  <h1 class="title">' . $title . '</h1>
				  </a>
				  <h2 class="sub_title">...</h2>
				  <p class="description" style="display: none; height: 100px; opacity: 1;">' . $description1 . '</p>
				  <div class="post-meta"><span class="timestamp"><i class="fa fa-clock"></i> ' . date("h:i A| M-y ", strtotime($res['uploaded_on'])) . '</span>
				  <i ' . $post_class . '
				  data-id="' . $res['content_id'] . '"></i><span class="likes px-2" style="display:inline-block; font-size:15px; font-weight:bold;">' . getLikes($res['content_id']) . '</span> 
				  </div>
				</div>
			  </div>
			</div>
		  </div>
			</div>

			';
		}
	} else {
		$output = '<h4 m-5 text-muted>No Post Found</h4>';
	}
	echo $output;
}



// fetch user following post
// SELECT * FROM $user
// 		INNER JOIN users ON users.user_id = $user.user_id 
// 		LEFT JOIN follower_info ON follower_info.sender_id = $user.user_id 
// 		WHERE follower_info.receiver_id = $user_id OR $user.user_id = $user_id
// 		GROUP BY $user.content_id 
// 		ORDER BY $user.content_id DESC


// all_user.php fetch own post
if (isset($_POST["action32"])) {
	$query = "
		SELECT * FROM urlfetcher WHERE user_id = '$user_id'
	
		ORDER BY content_id DESC 
		";
	$statement = $connect1->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();

	if ($total_row > 0) {

		foreach ($result as $row) {

			$domain = $row['url'];
			$account = $row['account'];
			$domain1 = explode('/', $domain);

			if (strlen($row['title']) > 28) {
				$title = substr($row['title'], 0, 28);
				$title = "$title...";
			} else {
				$title = $row['title'];
			}
			if (strlen($row['description']) > 72) {
				$description = substr($row['description'], 0, 72);
				$description = "$description...";
			} else {
				$description = $row['description'];
			}
			if ($description == "null") {
				$description1 = " ";
			} else {

				$description1 = $description;
			}

			if (userLiked($row['content_id'])) {
				$post_class = 'class="fa1 fa fa-thumbs-up like-btn text-danger"';
			} else {
				$post_class = 'class="fa1 fa fa-thumbs-o-up like-btn text-danger"';
			}
			if (userDisliked($row['content_id'])) {
				$post_class1 = 'class="fa fa-thumbs-down dislike-btn"';
			} else {
				$post_class1 = 'class="fa fa-thumbs-o-down dislike-btn"';
			}

			$facebook = '';
			if ($user_id != $row['user_id']) {
				$facebook = '<a class="text-decoration-none text-muted float-center " id="user_data" href="chatbox.php?toUser=' . $row['user_id'] . '" ><i class="fab fa-facebook-messenger text-primary"></i> </a>';
			}
			if (empty($row['image'])) {
				$postimage = 'assets/image/image.jpg';
			} else {
				$postimage = $row['image'];
			}

			@$output .= '
			
			<div class="col-lg-4 col-md-6 d-flex align-items-stretch icon-box" data-aos="fade-up" data-aos-delay="100" >
			<div class="member post-module">
			<div class="member-img">
			<a class="text-decoration-none text-dark" >
				<img src="' . $postimage . '" class="card-img-top imageurl" style="height: 285px;">
			</a>
				<div class="social ">
				<a  href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . $row['title'] . '&amp;p[url]=' . $row['url'] . '"  href="javascript: void(0)" title="Share on Facebook" target="_blank" class="fab fa-facebook "  ></a>
				<a href="https://www.pinterest.com/pin/create/button/?url=' . $row['url'] . '&description=' . $row['title'] . ' " title="Share on Pinterest" target="_blank" class="fab fa-pinterest"></a>
				<a href="http://twitter.com/share?text=' . $row['title'] . '&url=' . $row['url'] . '&hashtags=' . $row['catagories'] . '" target="_blank" title="Tweet" class="fab fa-twitter" ></a>
				<a href="http://www.linkedin.com/shareArticle?mini=true&url=' . $row['url'] . '&title=' . $row['title'] . '&source=' . $row['url'] . '" target="_blank" title="Share on LinkedIn" class="fab fa-linkedin"></a>
				<a href="https://wa.me/?text=' . $row['url'] . '" target="_blank" title="Share on Whatsapp" class="fab fa-whatsapp"></a>
				<a href="mailto:?subject=' . $row['title'] . '&amp;body=' . $row['url'] . '" target="_blank" title="Share on Email" class="fa fa-envelope"></a>
				</div>
			</div>
			<div class="member-info mt-0">
			<div class="row py-2 bg-light">
						<div class="col-6">
							<a class="text-decoration-none text-muted float-left" href="https://' . $domain1[2] . '" target=\"_blank\" rel=\"nofollow\">' . $domain1[2] . '</a>
						</div>
						<div class="col-6">
						<a class="text-decoration-none text-muted float-center px-4" id="user_data" href="search_user.php?user=' . $account . '" >' . ucwords($account) . '</a>
						' . $facebook . '
							
							<!-- Modal -->
						</div>
			</div>
			
			<a class="text-decoration-none text-dark" href="' . $domain . '" target="_blank">
			<h4 class="card-title mt-2 text-justify" style="font-size:20px;">' . $title . '</h4>
			<p class="card-text text-justify deshide" >' . $description1 . '</p>
			</a>
				<div class="row d-flex justify-content-center m-auto pt-3 px-3">
					<div class="col-6 post-info">
								<div class="text-left">
									<!-- if user likes post, style button differently -->
									<i ' . $post_class . '
										data-id="' . $row['content_id'] . '"></i><span class="likes px-2" style="display:inline-block; font-size:15px; font-weight:bold;">' . getLikes($row['content_id']) . '</span>
		
									</div>
					</div
					<div class="col-6">
						' . date("h:i A| M-y ", strtotime($row['uploaded_on'])) . '
					</div
				</div>
								
				</div>
			</div>
			</div>
		</div>
				';
		}
	} else {
		$output = '<div class="nopostfound"><div class="display-2"><strong>No Post Found</strong></div><br>
			<a href="follower_info.php" class="btn btn-info btn-lg">Follow Some User!</a>
			<div>';
	}
	echo $output;
}

// friend post

if (isset($_POST["action33"])) {
	// $query = "
	// SELECT * FROM urlfetcher WHERE user_id = '$user_ids'
	// ORDER BY content_id DESC 
	// ";
	$query = "
		Select * from urlfetcher 
		INNER JOIN users ON users.user_id = urlfetcher.user_id
		LEFT JOIN follower_info ON follower_info.sender_id = urlfetcher.user_id
		WHERE follower_info.receiver_id = $user_id 
		GROUP BY urlfetcher.content_id
		ORDER BY urlfetcher.content_id DESC
		";
	$statement = $connect1->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();

	if ($total_row > 0) {

		foreach ($result as $row) {

			$domain = $row['url'];
			$account = $row['account'];
			$domain1 = explode('/', $domain);

			if (strlen($row['title']) > 28) {
				$title = substr($row['title'], 0, 28);
				$title = "$title...";
			} else {
				$title = $row['title'];
			}
			if (strlen($row['description']) > 72) {
				$description = substr($row['description'], 0, 72);
				$description = "$description...";
			} else {
				$description = $row['description'];
			}
			if ($description == "null") {
				$description1 = " ";
			} else {

				$description1 = $description;
			}

			if (userLiked($row['content_id'])) {
				$post_class = 'class="fa1 fa fa-thumbs-up like-btn text-danger"';
			} else {
				$post_class = 'class="fa1 fa fa-thumbs-o-up like-btn text-danger"';
			}
			if (userDisliked($row['content_id'])) {
				$post_class1 = 'class="fa fa-thumbs-down dislike-btn"';
			} else {
				$post_class1 = 'class="fa fa-thumbs-o-down dislike-btn"';
			}
			$facebook = '';
			if ($user_id != $row['user_id']) {
				$facebook = '<a class="text-decoration-none text-muted float-center " id="user_data" href="chatbox.php?toUser=' . $row['user_id'] . '" ><i class="fab fa-facebook-messenger text-primary"></i> </a>';
			}
			if (empty($row['image'])) {
				$postimage = 'assets/image/image.jpg';
			} else {
				$postimage = $row['image'];
			}

			@$output .= '
				<div class="col-lg-4 col-md-6 d-flex align-items-stretch icon-box" data-aos="fade-up" data-aos-delay="100" >
				<div class="member post-module">
				<div class="member-img">
				<a class="text-decoration-none text-dark" >
					<img src="' . $postimage . '" class="card-img-top imageurl" style="height: 285px;">
				</a>
					<div class="social ">
					<a  href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . $row['title'] . '&amp;p[url]=' . $row['url'] . '"  href="javascript: void(0)" title="Share on Facebook" target="_blank" class="fab fa-facebook "  ></a>
					<a href="https://www.pinterest.com/pin/create/button/?url=' . $row['url'] . '&description=' . $row['title'] . ' " title="Share on Pinterest" target="_blank" class="fab fa-pinterest"></a>
					<a href="http://twitter.com/share?text=' . $row['title'] . '&url=' . $row['url'] . '&hashtags=' . $row['catagories'] . '" target="_blank" title="Tweet" class="fab fa-twitter" ></a>
					<a href="http://www.linkedin.com/shareArticle?mini=true&url=' . $row['url'] . '&title=' . $row['title'] . '&source=' . $row['url'] . '" target="_blank" title="Share on LinkedIn" class="fab fa-linkedin"></a>
					<a href="https://wa.me/?text=' . $row['url'] . '" target="_blank" title="Share on Whatsapp" class="fab fa-whatsapp"></a>
					<a href="mailto:?subject=' . $row['title'] . '&amp;body=' . $row['url'] . '" target="_blank" title="Share on Email" class="fa fa-envelope"></a>
					</div>
				</div>
				<div class="member-info mt-0">
				<div class="row py-2 bg-light">
							<div class="col-6">
								<a class="text-decoration-none text-muted float-left" href="https://' . $domain1[2] . '" target=\"_blank\" rel=\"nofollow\">' . $domain1[2] . '</a>
							</div>
							<div class="col-6">
							<a class="text-decoration-none text-muted float-center px-4" id="user_data" href="search_user.php?user=' . $account . '" >' . ucwords($account) . '</a>
							' . $facebook . '
								
								<!-- Modal -->
							</div>
				</div>
				
				<a class="text-decoration-none text-dark" href="' . $domain . '" target="_blank">
				<h4 class="card-title mt-2 text-justify" style="font-size:20px;">' . $title . '</h4>
				<p class="card-text text-justify deshide" >' . $description1 . '</p>
				</a>
					<div class="row d-flex justify-content-center m-auto pt-3 px-3">
						<div class="col-6 post-info">
									<div class="text-left">
										<!-- if user likes post, style button differently -->
										<i ' . $post_class . '
											data-id="' . $row['content_id'] . '"></i><span class="likes px-2" style="display:inline-block; font-size:15px; font-weight:bold;">' . getLikes($row['content_id']) . '</span>
			
										</div>
						</div
						<div class="col-6">
							' . date("h:i A| M-y ", strtotime($row['uploaded_on'])) . '
						</div
					</div>
									
                    </div>
				</div>
				</div>
			</div>
				';
		}
	} else {
		$output = '<div class="nopostfound"><div class="display-2"><strong>No Post Found</strong></div><br>
			<a href="follower_info.php" class="btn btn-info btn-lg">Follow Some User!</a>
			<div>';
	}
	echo $output;
}


// searchpost
if (isset($_POST["searchpost"])) {
	@$fetchpost = $_POST['fetchpost'];
	$query = "Select * from urlfetcher where concat(catagories,title) LIKE concat('%','$fetchpost','%')";
	$statement = $connect1->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();

	if ($total_row > 0) {

		foreach ($result as $row) {

			$domain = $row['url'];
			$account = $row['account'];
			$domain1 = explode('/', $domain);

			if (strlen($row['title']) > 28) {
				$title = substr($row['title'], 0, 28);
				$title = "$title...";
			} else {
				$title = $row['title'];
			}
			if (strlen($row['description']) > 72) {
				$description = substr($row['description'], 0, 72);
				$description = "$description...";
			} else {
				$description = $row['description'];
			}
			if ($description == "null") {
				$description1 = " ";
			} else {

				$description1 = $description;
			}

			if (userLiked($row['content_id'])) {
				$post_class = 'class="fa1 fa fa-thumbs-up like-btn text-danger"';
			} else {
				$post_class = 'class="fa1 fa fa-thumbs-o-up like-btn text-danger"';
			}
			if (userDisliked($row['content_id'])) {
				$post_class1 = 'class="fa fa-thumbs-down dislike-btn"';
			} else {
				$post_class1 = 'class="fa fa-thumbs-o-down dislike-btn"';
			}
			$facebook = '';
			if ($user_id != $row['user_id']) {
				$facebook = '<a class="text-decoration-none text-muted float-center " id="user_data" href="chatbox.php?toUser=' . $row['user_id'] . '" ><i class="fab fa-facebook-messenger text-primary"></i> </a>';
			}


			@$output .= '
				<div class="col-lg-4 col-md-6 d-flex align-items-stretch icon-box"  >
				<div class="member">
				<div class="member-img">
				<a class="text-decoration-none text-dark" >
					<img src="' . $row['image'] . '" class="card-img-top imageurl" style="height: 285px;">
				</a>
					<div class="social ">
					<a href=""><i class="bi bi-twitter"></i></a>
					<a href=""><i class="bi bi-facebook"></i></a>
					<a href=""><i class="bi bi-instagram"></i></a>
					<a href=""><i class="bi bi-linkedin"></i></a>
					</div>
				</div>
				<div class="member-info mt-0">
				<div class="row py-2 bg-light">
							<div class="col-6">
								<a class="text-decoration-none text-muted float-left" href="https://' . $domain1[2] . '" target=\"_blank\" rel=\"nofollow\">' . $domain1[2] . '</a>
							</div>
							<div class="col-6">
							<a class="text-decoration-none text-muted float-center px-4" id="user_data" href="search_user.php?user=' . $account . '" >' . ucwords($account) . '</a>
							' . $facebook . '
								
								<!-- Modal -->
							</div>
				</div>
				
				<a class="text-decoration-none text-dark" href="' . $domain . '" target="_blank">
				<h4 class="card-title mt-2 text-justify" style="font-size:20px;">' . $title . '</h4>
				<p class="card-text text-justify">' . $description1 . '</p>
				</a>
				<div class="row d-flex justify-content-center m-auto pt-3 px-3">
				<div class="col post-info">
							<div class="text-left">
								<!-- if user likes post, style button differently -->
								<i ' . $post_class . '
									data-id="' . $row['content_id'] . '"></i><span class="likes px-2" style="display:inline-block; font-size:15px; font-weight:bold;">' . getLikes($row['content_id']) . '</span>
	
								</div>
				</div
				<div class="col">
					' . date("h:i A| M-y ", strtotime($row['uploaded_on'])) . '
				</div
			</div>
							
                    </div>
				</div>
				</div>
			</div>
				';
		}
	} else {
		$output = '<div class="nopostfound"><div class="display-2"><strong>No Post Found</strong></div><br>
			<a href="all_user.php" class="btn btn-info btn-lg">We have Something For You!</a>
			<div>';
	}
	echo $output;
}



if (isset($_POST["searchtag"])) {

	@$fetchtag = $_POST['fetchtag'];
	$output = '';
	$query = "
		SELECT * FROM users 
		WHERE username Like CONCAT('%','$fetchtag','%')
		ORDER BY user_id DESC 
		
		";
	$statement = $connect1->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach ($result as $row) {
		if (strlen($row['name']) > 15) {
			$name = substr($row['name'], 0, 15);
			$name = "$name...";
		} else {
			$name = $row['name'];
		}
		if (strlen($row['bio']) > 17) {
			$bio = substr($row['bio'], 0, 18);
			$bio = "$bio...";
		} else {
			$bio = $row['bio'];
		}
		$profile_image = '';
		if (empty($row['profile_image'])) {
			$profile_image = '<img src="' . $row["profile_image"] . '" class="rounded-circle img-thumbnail img-responsive mt-3 shadow-sm" width="100" style="border-radius:100%;" />';
		} else {
			$profile_image = '<img src="assets/image/user.jpg" class="rounded-circle img-thumbnail img-responsive mt-3 shadow-sm" width="100" style="border-radius:100%;"/>';
		}
		$output .= '
			<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box1" style="min-width: 100%;">
            <div class="icon d-flex justify-content-center">
			<a class="text-decoration-none text-dark" href="search_user.php?user=' . $row["username"] . '" >
                    ' . $profile_image . ' </a></div>
			<a class="text-decoration-none" id="user_data" href="search_user.php?user=' . $row["username"] . '" >
            <h6 class="title text-muted">@' . $row["username"] . '</h6>
			<h4 class="title">' . ucwords($row["name"]) . '</h4>
			<h5 class="title text-danger">' . $row["follower_number"] . ' Followers</h5>
			
			</a>
			<div class="text-center" >
                            ' . make_follow_button($connect1, $row["user_id"], $user_id) . '     
            </div>
          </div>
        </div>
			
			';
	}
	echo $output;
}
