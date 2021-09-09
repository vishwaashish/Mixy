<?php

include('database_connection.php');
include('db.php');
session_start();

include("header.php");

$user = $_SESSION['username'];

$count = mysqli_num_rows(mysqli_query($connect, "SELECT content_id FROM urlfetcher where account='$user' "));
$query1 = "SELECT * FROM `users` where username='$user'";
$search_result1 = mysqli_query($connect, $query1);
$row1 = mysqli_fetch_array($search_result1);
if (empty($row1['profile_image'])) {
  $image = 'src="assets/image/user.jpg"';
} else {
  $image = 'src="' . $row1['profile_image'] . '"';
}

if (empty($row1['profile_image'])) {
  $image1 = "assets/image/user.jpg";
} else {
  $image1 =  $row1['profile_image'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/e5486f0711.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="assets/css/search.css">
  </link>

  <link rel="stylesheet" href="assets/css/mixstyle.css">
  </link>
  <!-- bootstrap -->

  <style>

body {
  background: url(assets/img/hero-bg1.jpg) top center;
  width: 100%;
  /* height: 100vh; */
  position: relative;
  background-size: cover;
  position: relative;

}a.text-dark:focus, a.text-dark:hover {
    color: #6749b9!important;
}

/* @media screen and (min-width: 720px) { */
  a .nav-link{
    font-size:10px;
  }
/* } */

  </style>
</head>

<body>
<?php
  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
    $url = "https://";
    $image2 = "https://";
  }
  else{
    $url = "http://";

    $image2 = "http://";}
  // Append the host(domain name, ip) to the URL.   
  $url .= $_SERVER['HTTP_HOST'];
  $image2 .= $_SERVER['HTTP_HOST'];
  // Append the requested resource location to the URL   
  $url .= "/OnePage/OnePage/search_user.php?user=$user";

  // echo '<a href="' . $url . '">' . $url . '</a>';
  $featuredimage = $image2."/".$image1;

  ?>

  <!-- search box popover -->
  <div id="myOverlay" class="overlay">
    <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
    <div class="overlay-content">
      <form action="search_all.php">
        <div class="p-3 rounded rounded-pill shadow-lg bg-white">
          <div class="input-group">
            <input type="search" placeholder="Search" name="searchpost" aria-describedby="button-addon1" class="form-control border-0 bg-whight">
            <div class="input-group-append">
              <button id="button-addon1" type="submit" class="btn btn-link text-primary form-control"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- search end -->


  <nav class="navbar navbar-light   px-md-5 py-md-4 shadow-sm " style="background-color: white;">

   
    <a class="nav text-decoration-none p-0" href="search_user.php?user=<?php echo $user;?>"><img src="assets/img/mixy.png" alt="..." width="50" class="">
      <h2 class="text-dark pt-1">Mixy</h2>
    </a>
    <div class="d-flex">
    <a class="nav-link text-dark" href="all_user.php" tabindex="-1" aria-disabled="true" style="font-size: 20px;"><b>For you </b></a>
    </div>
    <div class="dropdown">
      <a onclick="myFunction()" class="dropbtn fa fa fa-cog mx-3 text-decoration-none text-dark" style="font-size: 25px;"></a>
      <div id="myDropdown" class="dropdown-content">
        <?php if ($row1['username'] == $_SESSION['username']) { ?>
          <!-- <a class="fas fa-plus-circle openBtn text-decoration-none text-dark" data-toggle="modal" data-target="#exampleModal" style="font-size: 30px;margin-top: 9px;"></a> -->
          <a class="nav-link  fa1 fab fa-facebook-messenger text-dark" href="chatbox.php" style="font-size: 30px;margin-top: 9px;"></a>
        <?php } ?>
        <a type="button" class="nav-link text-dark fa1 fa fa-search openBtn text-center" onclick="openSearch()" style="font-size: 30px;margin-top: 9px;"></a>
        <a class="nav-link  fa1 fa fa-user text-dark" href="update_profile.php" style="font-size: 30px;margin-top: 9px;"></a>
        <?php if ($row1['username'] == $_SESSION['username']) { ?>
          <a class="fas fa-sign-out-alt text-decoration-none text-dark" href="logout.php" style="font-size: 30px;margin-top: 9px;"></a>
        <?php } ?>
      </div>
    </div>

  </nav>




  <main id="main">


    <!-- ======= Counts Section ======= -->
    <section id="counts " class="counts bg-theme border-bottom border-5 py-5">
      <div class="container">


        <!-- <div class="row m-3">
          <h4>
            You searched :- <strong><?php echo ucwords($user); ?></strong>
          </h4>
        </div> -->

        <div class="row  d-flex align-items-center justify-content-between">
          <div class=" col d-md-flex align-items-md-stretch justify-content-center">


            <div class=" mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-5 m-auto text-center thumbnil">
                  <figure class="figure1">
                  <img <?php echo $image; ?> class="align-self-center img-fluid  shadow-sm  bg-white" alt="...">
                  </figure>
                </div>
                <div class="col-md-7">
                  <div class="card-body ml-md-3">
                    <!-- <a href="user_dashboard.php " class="text-muted text-decoration-none">@<?php echo $row1['username']; ?></a><br> -->
                    <h2 class="mt-0 text-sm-center text-md-left"><?php echo ucfirst($row1['name']); ?></h2>
                    <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                      <div class="d-flex flex-column"> <span class="follo ">Followers</span> <span class=" h4"><?php echo $row1["follower_number"]; ?></span> </div>
                      <div class="d-flex flex-column"> <span class="follo">Following</span> <span class=" h4"><?php echo $row1["following_number"]; ?></span> </div>
                      <div class="d-flex flex-column"> <span class="follo">Post</span> <span class=" h4"><?php echo $count;?></span> </div>
                    </div>
                    <?php if ($row1['username'] != $_SESSION['username']) { ?>
                      <div class=" mt-2 d-flex flex-row align-items-center">
                        <span id="user_list" class=""></span>
                        <a href="chatbox.php?toUser=<?php echo $row1['user_id']; ?>" class="btn  btn-primary w-100 ml-2 font-weight-bold"><i class="fas fa-comment-dots pr-1"></i>Chat</a>
                      </div>
                    <?php } ?>
                    <div class="">
                      <div class="dropdown">
                        <a class="dropbtn fa fa fa-share-alt ml-3 text-decoration-none text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="" style="font-size: 30px;"></a>
                        <div class="dropdown-menu  dropdown-content" aria-labelledby="dropdownMenuLink" style="background: none;margin-top:9px;position: absolute;border: none;">
                          <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url; ?>&media=<?php echo $featuredimage; ?>&description=<?php echo $row1['bio']; ?>" title="Share on Pinterest" target="_blank" class="fab fa-pinterest"></a>
                          <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $row1['name']; ?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $featuredimage; ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)" title="Share on Facebook" target="_blank" class="fab fa-facebook"></a>
                          <a href="http://twitter.com/share?text=<?php echo $row1['name'] . ": " . $row1['bio']; ?>&url=<?php echo " " . $url ?>&hashtags=<?php echo $hashtag ?>" target="_blank" title="Tweet" class="fab fa-twitter"></a>
                          <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url ?>&title=<?php echo $row1['name'] ?>&summary=<?php echo $row1['bio'] ?>&source=<?php echo $url ?>" target="_blank" title="Share on LinkedIn" class="fab fa-linkedin"></a>
                          <a href="https://wa.me/?text=<?php echo $url ?>" target="_blank" title="Share on Whatsapp" class="fab fa-whatsapp"></a>
                          <a href="mailto:?subject=<?php echo $row1['name'] ?>&amp;body=<?php echo $url ?>" target="_blank" title="Share on Email" class="fa fa-envelope"></a>
                        </div>
                      </div>
                      <?php if ($row1['username'] == $_SESSION['username']) { ?>
                        <!-- <a class="fas fa-plus-circle openBtn text-decoration-none text-dark" data-toggle="modal" data-target="#exampleModal" style="font-size: 30px;margin-top: 9px;"></a> -->
                        <a class="nav-link  fa1 fab fa-facebook-messenger text-dark" href="chatbox.php" style="font-size: 30px;margin-top: 9px;"></a>
                        <a class="fas fa-sign-out-alt  text-decoration-none text-dark" href="logout.php" style="font-size: 30px;"></a>
                      <?php } ?>
                      <a class="nav-link  fa1 fa fa-user text-dark" href="update_profile.php" style="font-size: 30px;margin-top: 9px;"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
         
        </div>

      </div>
    </section>


    <div id="" class="">
            <div class="container">
                <div class="row icon-boxes1" id="user_list">

                </div>

            </div>
        </div><!-- End Team Section -->



    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center "><i class="fas fa-arrow-up text-white"></i></a>

   

    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- bootstrap -->
    <input type="text" id="accoun" value="<?php echo $user; ?>" style="display:none;">

    <script src="assets/js/fetchurl.js"></script>

    <script src="assets/js/main.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

</body>

</html>

<script>
    $(document).ready(function() {
        fetch_user();

        function fetch_user() {
            var action = 'fetch_user';
            $.ajax({
                url: "server.php",
                method: "POST",
                data: {
                    action: action
                },
                success: function(data) {
                    $('#user_list').html(data);
                }
            });
        }
        // following baction
        $(document).on('click', '.action_button', function() {
            var sender_id = $(this).data('sender_id');
            var action = $(this).data('action');
            $.ajax({
                url: "server.php",
                method: "POST",
                data: {
                    sender_id: sender_id,
                    action: action
                },
                success: function(data) {
                    fetch_user();
                    fetch_post();
                }
            })
        });
        // following baction end

    });
</script>