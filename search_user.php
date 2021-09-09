<?php
//user_dashboard.php
include("db.php");
include('auth.php');

// include('header.php');
// include('nav.php');

$user = $_REQUEST['user'];

$count = mysqli_num_rows(mysqli_query($connect, "SELECT content_id FROM urlfetcher where account='$user' "));


$user_id = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users where username='" . $_SESSION['username'] . "'"));

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
  <title>Document</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/e5486f0711.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="assets/css/search.css">
  </link>

  <link rel="stylesheet" href="assets/css/mixstyle.css"></link>
  <!-- bootstrap -->

  <style>



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


  <nav class="navbar navbar-light   px-md-5 py-md-4 shadow-sm">
    <a class="nav text-decoration-none" href="#"><img src="assets/img/mixy.png" alt="..." width="50" class="">
      <h2 class="text-dark pt-1">Mixy</h2>
    </a>
    <div class="d-flex">
    <a class="nav-link text-dark" href="all_user.php" tabindex="-1" aria-disabled="true" style="font-size: 25px;"><strong>For you </strong></a>
    <a class="nav-link text-dark hidelink" href="follower_info.php" tabindex="-1" aria-disabled="true" style="font-size: 25px;"><strong>Make Friend</strong></a>
    </div>
    <div class="dropdown">
      <a onclick="myFunction()" class="dropbtn fa fa fa-cog mx-3 text-decoration-none text-dark" style="font-size: 25px;"></a>
      <div id="myDropdown" class="dropdown-content">
        <?php if ($user == $_SESSION['username']) { ?>
          <a class="fas fa-plus-circle openBtn text-decoration-none text-dark" data-toggle="modal" data-target="#exampleModal" style="font-size: 30px;margin-top: 9px;"></a>
          <a class="nav-link  fa1 fab fa-facebook-messenger text-dark" href="chatbox.php" style="font-size: 30px;margin-top: 9px;"></a>
        <?php } ?>
        <a type="button" class="nav-link text-dark fa1 fa fa-search openBtn text-center" onclick="openSearch()" style="font-size: 30px;margin-top: 9px;"></a>
        <a class="nav-link  fa1 fa fa-user text-dark" href="update_profile.php" style="font-size: 30px;margin-top: 9px;"></a>
        <?php if ($user == $_SESSION['username']) { ?>
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
                  <div class="card-body">
                    <!-- <a href="user_dashboard.php " class="text-muted text-decoration-none">@<?php echo $row1['username']; ?></a><br> -->
                    <h2 class="mt-0 text-sm-center text-md-left"><?php echo ucfirst($row1['name']); ?></h2>
                    <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                      <div class="d-flex flex-column"> <span class="follo ">Followers</span> <span class=" h4"><?php echo $row1["follower_number"]; ?></span> </div>
                      <div class="d-flex flex-column"> <span class="follo">Following</span> <span class=" h4"><?php echo $row1["following_number"]; ?></span> </div>
                      <div class="d-flex flex-column"> <span class="follo">Post</span> <span class=" h4"><?php echo $count;?></span> </div>
                    </div>
                    <?php if ($user_id['user_id'] != $row1['user_id']) { ?>
                      <div class=" mt-2 d-flex flex-row align-items-center">
                        <span id="user_list" class=""></span>
                        <a href="chatbox.php?toUser=<?php echo $row1['user_id']; ?>" class="btn  btn-primary w-100 ml-2 font-weight-bold"><i class="fas fa-comment-dots pr-1"></i>Chat</a>
                      </div>
                    <?php } ?>
                    <div class="">
                      <div class="dropdown">
                        <a class="dropbtn fa fa fa-share-alt mx-3 text-decoration-none text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="" style="font-size: 30px;"></a>
                        <div class="dropdown-menu  dropdown-content" aria-labelledby="dropdownMenuLink" style="background: none;margin-top:9px;position: absolute;border: none;">
                          <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url; ?>&media=<?php echo $featuredimage; ?>&description=<?php echo $row1['bio']; ?>" title="Share on Pinterest" target="_blank" class="fab fa-pinterest"></a>
                          <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $row1['name']; ?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $featuredimage; ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)" title="Share on Facebook" target="_blank" class="fab fa-facebook"></a>
                          <a href="http://twitter.com/share?text=<?php echo $row1['name'] . ": " . $row1['bio']; ?>&url=<?php echo " " . $url ?>&hashtags=<?php echo $hashtag ?>" target="_blank" title="Tweet" class="fab fa-twitter"></a>
                          <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url ?>&title=<?php echo $row1['name'] ?>&summary=<?php echo $row1['bio'] ?>&source=<?php echo $url ?>" target="_blank" title="Share on LinkedIn" class="fab fa-linkedin"></a>
                          <a href="https://wa.me/?text=<?php echo $url ?>" target="_blank" title="Share on Whatsapp" class="fab fa-whatsapp"></a>
                          <a href="mailto:?subject=<?php echo $row1['name'] ?>&amp;body=<?php echo $url ?>" target="_blank" title="Share on Email" class="fa fa-envelope"></a>
                        </div>
                      </div>
                      <?php if ($user == $_SESSION['username']) { ?>
                        <a class="fas fa-plus-circle openBtn text-decoration-none text-dark" data-toggle="modal" data-target="#exampleModal" style="font-size: 30px;margin-top: 9px;"></a>
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
          <!-- <div class="col-lg-6 col-md-12 col-12 d-md-flex align-items-md-stretch py-4">
            <div class=" ">

              <div class="dropdown">
                <a onclick="myFunction()" class="dropbtn fa fa fa-share-alt mx-3 text-decoration-none text-dark" style="font-size: 30px;"></a>
                <div id="myDropdown" class="dropdown-content">
                  <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url; ?>&media=<?php echo $featuredimage; ?>&description=<?php echo $row1['bio']; ?>" title="Share on Pinterest" target="_blank" class="fab fa-pinterest"></a>
                  <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $row1['name']; ?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $featuredimage; ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)" title="Share on Facebook" target="_blank" class="fab fa-facebook"></a>
                  <a href="http://twitter.com/share?text=<?php echo $row1['name'] . ": " . $row1['bio']; ?>&url=<?php echo " " . $url ?>&hashtags=<?php echo $hashtag ?>" target="_blank" title="Tweet" class="fab fa-twitter"></a>
                  <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url ?>&title=<?php echo $row1['name'] ?>&summary=<?php echo $row1['bio'] ?>&source=<?php echo $url ?>" target="_blank" title="Share on LinkedIn" class="fab fa-linkedin"></a>
                  <a href="https://wa.me/?text=<?php echo $url ?>" target="_blank" title="Share on Whatsapp" class="fab fa-whatsapp"></a>
                  <a href="mailto:?subject=<?php echo $row1['name'] ?>&amp;body=<?php echo $url ?>" target="_blank" title="Share on Email" class="fa fa-envelope"></a>
                </div>
              </div>
              <?php if ($user == $_SESSION['username']) { ?>
                  <a class="fas fa-plus-circle openBtn text-decoration-none text-dark" data-toggle="modal" data-target="#exampleModal" style="font-size: 30px;margin-top: 9px;"></a>
                  <a class="nav-link  fa1 fab fa-facebook-messenger text-dark" href="chatbox.php" style="font-size: 30px;margin-top: 9px;"></a>
                  <a class="fas fa-sign-out-alt  text-decoration-none text-dark" href="logout.php" style="font-size: 30px;"></a>
                <?php } ?>
              <a class="nav-link  fa1 fa fa-user text-dark" href="update_profile.php" style="font-size: 30px;margin-top: 9px;"></a>


            </div>
          </div> -->

        </div>

      </div>
    </section>


    <!-- ======= Team Section ======= -->
    <section id="team" class="team px-md-5">
      <div class="m-md-5 p-3" data-aos="fade-up" data-aos-delay="100">
        <div class="row " id="fetch_post1">

        </div>

      </div>
    </section>
    <!-- End Team Section -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center text-decoration-none"><i class="fas fa-arrow-up text-white"></i></a>

    <!-- Add url modal -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content m-0 p-0">
          <div class=" m-0 p-0">

            <div class="">
              <div class="column" style="background-color:white;">
                <div class="p-4" style="margin-top: 15%;">

                  <h1 class="text-center">Add a post here</h1><br>
                  <h5 class="text-justify text-muted">Post any website link, Image, Instagram posts, Youtube video by pasting the link above.</h5><br>
                  <div class="alert " id="error" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
                  </div>
                  <div>
                    <!-- url input -->
                    <input type="url" name="url" id="url" placeholder="paste your link here" class="form-control" required autofocus>

                  </div>
                  <!-- url fetch -->
                  <div class="py-2"><input type="submit" name="upload" class="btn btn-info" id="upload" value="Fetch"></div>
                  <!-- tags -->
                  <div class="my-3 catag" id="catag" style="display:none;">

                    <label> Catagories:</label>

                    <select class="form-control  js-example-basic-multiple js-states js-example-responsive js-example-basic-multiple-limit" multiple="true" id="catagories" style="width: 100%;">
                      <option value="blogs" selected="selected">blogs</option>
                      <option value="news">news</option>
                      <option value="sports">sports</option>
                      <option value="technology">technology</option>
                      <option value="travel">travel</option>
                      <option value="business">business</option>
                      <option value="fashion">fashion</option>
                      <option value="fitness">fitness</option>
                      <option value="food">food</option>

                    </select>
                  </div>
                  <!-- tags end -->
                  <!-- insert -->
                  <div class="py-2"><input type="submit" name="insert" class="btn btn-info" id="insert" value="insert" style="display:none;"></div>

                </div>

              </div>
              <div class="column url-image" style="background-color:white
                ;">

                <div class="spinner-border p-4 font-weight-bolder text-secondary " role="status" id="loading" style="margin-top: 255px; margin-left: 150px; display:none;">
                  <span class="sr-only">Loading...</span>
                </div>

                <figure class="rounded bg-white figure2col pt-3" id="figure" style="display:none;">
                  <img id="result1" name="image" src="#" alt="" class=" w-100 img-fluid card-img-top" style="border-top-right-radius: 15px;border-top-left-radius: 15px;">

                  <figcaption class="p-2 card-img-bottom" style="background: #80808012;border-bottom-left-radius: 15px;border-bottom-right-radius: 21px;">
                    <h2 class="h5 font-weight-bold mb-2 font-italic" id="title" name="title"></h2>
                    <p class="mb-0 text-small text-muted font-italic" id="description" name="description"></p>
                  </figcaption>
                </figure>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end Add url modal -->



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

</script>
<script>
  // dropdown start
  /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  // dropdown end
</script>
<script>
  $(document).ready(function() {
    // post hover
    $(window).load(function() {
      $('.post-module').hover(function() {
        $(this).find('.description').stop().animate({
          height: "toggle",
          opacity: "toggle"
        }, 300);
      });
    });
    // post hover end

    fetch_post1();

    function fetch_post1() {
      var accoun = $('#accoun').val();
      var action12 = 'fetch_post1';

      $.ajax({
        url: 'server.php',
        method: "POST",
        data: {
          action12: action12,
          accoun: accoun
        },
        success: function(data) {
          $('#fetch_post1').html(data);

        }
      })
    }


    fetch_user();

    function fetch_user() {
      var action_follow = 'fetch_user';
      var accoun = $('#accoun').val();

      $.ajax({
        url: "server.php",
        method: "POST",
        data: {
          action_follow: action_follow,
          accoun: accoun,
        },
        success: function(data) {
          $('#user_list').html(data);
        }
      });
    }

    // fetch_user_button();
    // function fetch_user_button()
    // {
    //    var userid = $('#accoun').val();
    //     var action = 'fetch_user_button';
    //     $.ajax({
    //         url:"server.php",
    //         method:"POST",
    //         data:{fetch_user_button:fetch_user_button,
    //           userid:'userid'
    //         },
    //         success:function(data)
    //         {
    //             $('#fetch_user_button').html(data);
    //         }
    //     });
    // }
    // following baction
    $(document).on('click', '.action_button', function() {
      var sender_id = $(this).data('sender_id');
      var action_follow = $(this).data('action');
      $.ajax({
        url: "server.php",
        method: "POST",
        data: {
          sender_id: sender_id,
          action_follow: action_follow
        },
        success: function(data) {
          fetch_user();
          fetch_post();
        }
      })
    });
    $('.js-example-basic-multiple').select2();

    $(".js-example-theme-multiple").select2({
      theme: "classic"
    });
    $(".js-example-responsive").select2({
      width: 'resolve' // need to override the changed default
    });

    $(".js-example-basic-multiple-limit").select2({
      maximumSelectionLength: 3
    });

  });
</script>