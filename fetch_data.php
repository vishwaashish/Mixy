<?php include('server.php'); ?>

<?php


//fetch_data.php

$connect1 = new PDO("mysql:host=localhost;dbname=mix", "root", "");
include('db.php');
if (isset($_POST["action"])) {
	$sql = mysqli_query($connect, "select * from users");
	$user = array();
	while ($userfetch = mysqli_fetch_array($sql)) {
		$user[] =  $userfetch['username'];
	}
	foreach ($user as $user) {
		if(isset($_POST["catagories"])){
		$query1 = "
		SELECT * FROM urlfetcher WHERE post_status = '1' AND
	";
		}else{
			$query1 = "
		SELECT * FROM urlfetcher WHERE post_status = '1' ";
		}
		$query2 = '';
		if (isset($_POST["catagories"])) {
			$catagories_filter = implode("','", $_POST["catagories"]);
			$catagories_filter = $_POST["catagories"];

			foreach ($catagories_filter as $catagories_filte) {
				$query2 .= "catagories LIKE concat('%','$catagories_filte','%')";
				$query2 .=" OR ";
			}
			// 	$query1 .= 
			// 	// "AND catagories IN('" . $catagories_filter . "')

		}
	}

	$query1 .= $query2 . ";";
	$query1 = str_replace("OR ;"," ",$query1);

	// $query = implode(" UNION ", $query);
	$statement = $connect1->prepare($query1);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';

	$user_id1 = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM users where username='".$_SESSION['username']."'"));



	if ($total_row > 0) {
		foreach ($result as $row) {
			$domain = $row['url'];
			$account = $row['account'];
			$domain1 = explode('/', $domain);
			$id = $row['user_id'];
			if (strlen($row['title']) > 35) {
				$title = substr($row['title'], 0, 35);
				$title = "$title...";
			} else {
				$title = $row['title'];
			}
			if (strlen($row['description']) > 110) {
				$description = substr($row['description'], 0, 110);
				$description = "$description...";
			} else {
				$description = $row['description'];
			}

			if (userLiked($row['content_id'])) {
				$post_class = 'class="fa1 fa fa-thumbs-up like-btn text-danger"';
			} else {
				$post_class = 'class="fa1 fa fa-thumbs-o-up like-btn text-danger"';
			}
			if (userDisliked($row['content_id'])) {
				$post_class1 = 'class="fa1 fa fa-thumbs-down dislike-btn"';
			} else {
				$post_class1 = 'class="fa1fa fa-thumbs-o-down dislike-btn"';
			}
			if ($description == "null") {
				$description1 = " ";
			} else {

				$description1 = $description;
			}
			$facebook = '';
			if ($user_id1['user_id'] != $row['user_id']) {
				$facebook = '<a class="text-decoration-none text-muted float-center " id="user_data" href="chatbox.php?toUser=' . $row['user_id'] . '" ><i class="fab fa-facebook-messenger text-primary"></i> </a>';
			}


			$file_headers = @get_headers($row['imageurl'] );
			if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
				$postimage = 'assets/img/hero-bg.jpg';
			}
			else {
				$postimage = $row['image'] ;
			}
			

			$output .= '
			<div class="col-lg-4 col-md-6 d-flex align-items-stretch icon-box" data-aos="fade-up" data-aos-delay="100" >
				<div class="member ">
				<div class="member-img">
				<a class="text-decoration-none text-dark" >
					<img src="' . $postimage . '" class="card-img-top imageurl" style="height: 285px;">
				</a>
					<div class="social ">
					<a  href="http://www.facebook.com/sharer.php?s=100&amp;p[title]='.$row['title'].'&amp;p[url]='.$row['url'].'"  href="javascript: void(0)" title="Share on Facebook" target="_blank" class="fab fa-facebook "  ></a>
					<a href="https://www.pinterest.com/pin/create/button/?url='.$row['url'].'&description='.$row['title'].' " title="Share on Pinterest" target="_blank" class="fab fa-pinterest"></a>
					<a href="http://twitter.com/share?text='.$row['title'].'&url='.$row['url'].'&hashtags='.$row['catagories'].'" target="_blank" title="Tweet" class="fab fa-twitter" ></a>
					<a href="http://www.linkedin.com/shareArticle?mini=true&url='.$row['url'].'&title='.$row['title'].'&source='.$row['url'].'" target="_blank" title="Share on LinkedIn" class="fab fa-linkedin"></a>
					<a href="https://wa.me/?text='.$row['url'].'" target="_blank" title="Share on Whatsapp" class="fab fa-whatsapp"></a>
					<a href="mailto:?subject='.$row['title'].'&amp;body='.$row['url'].'" target="_blank" title="Share on Email" class="fa fa-envelope"></a>
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
					<div class="row row1 d-flex justify-content-center m-auto pt-3 px-3">
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
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>

<script>
	$(document).ready(function() {

		// if the user clicks on the like button ...
		$('.like-btn').on('click', function() {
			var content_id = $(this).data('id');
			$clicked_btn = $(this);
			if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
				action1 = 'like';
			} else if ($clicked_btn.hasClass('fa-thumbs-up')) {
				action1 = 'unlike';
			}
			$.ajax({
				url: 'fetch_data.php',
				type: 'post',
				data: {
					'action1': action1,
					'content_id': content_id
				},
				success: function(data) {
					res = JSON.parse(data);
					if (action1 == "like") {
						$clicked_btn.removeClass('fa-thumbs-o-up');
						$clicked_btn.addClass('fa-thumbs-up');
					} else if (action1 == "unlike") {
						$clicked_btn.removeClass('fa-thumbs-up');
						$clicked_btn.addClass('fa-thumbs-o-up');
					}
					// display the number of likes and dislikes
					$clicked_btn.siblings('span.likes').text(res.likes);
					$clicked_btn.siblings('span.dislikes').text(res.dislikes);

					// change button styling of the other button if user is reacting the second time to post
					$clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
				}
			});

		});

		// if the user clicks on the dislike button ...
		$('.dislike-btn').on('click', function() {
			var content_id = $(this).data('id');
			$clicked_btn = $(this);
			if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
				action1 = 'dislike';
			} else if ($clicked_btn.hasClass('fa-thumbs-down')) {
				action1 = 'undislike';
			}
			$.ajax({
				url: 'fetch_data.php',
				type: 'post',
				data: {
					'action1': action1,
					'content_id': content_id
				},
				success: function(data) {
					res = JSON.parse(data);
					if (action1 == "dislike") {
						$clicked_btn.removeClass('fa-thumbs-o-down');
						$clicked_btn.addClass('fa-thumbs-down');
					} else if (action1 == "undislike") {
						$clicked_btn.removeClass('fa-thumbs-down');
						$clicked_btn.addClass('fa-thumbs-o-down');
					}
					// display the number of likes and dislikes
					$clicked_btn.siblings('span.likes').text(res.likes);
					$clicked_btn.siblings('span.dislikes').text(res.dislikes);

					// change button styling of the other button if user is reacting the second time to post
					$clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
				}
			});

		});

	});
</script>