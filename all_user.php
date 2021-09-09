<?php
include('auth.php');
include('db.php');
// include("header.php");
$user = $_SESSION['username'];

?>
<link rel="stylesheet" href="assets/css/search.css">
<!doctype html>
<html lang="en">

<head>
  <title>MIXY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- 
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/e5486f0711.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="assets/css/search.css">
  </link>

  <link rel="stylesheet" href="assets/css/mixstyle.css">
  </link>

  <style>
    body {
      background: url(assets/img/hero-bg1.jpg) top center;
      width: 100%;
      position: relative;
      background-size: cover;
      position: relative;
    }
  </style>
</head>

<body>
  <?php

  $query1 = "SELECT * FROM `users` where username='$user'";
  $search_result1 = mysqli_query($connect, $query1);
  $row1 = mysqli_fetch_array($search_result1);

  ?>
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

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
      </div>

      <div class="p-4 pt-5 mb-2 ">
        <div class="media d-flex align-items-center"><a class="text-decoration-none text-white" href="search_user.php?user=<?php echo $user;?>"><img src="assets/img/mixy.PNG" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
          <div class="mr-3">
            <h2 class="m-auto font-weight-bold">Mixy</h2></a>
          </div> <a type="button" class="text-dark fa fa-search text-decoration-none" onclick="openSearch()" style="font-size: 20px;margin-top: 0px;background:white;padding: 5px;    border-radius: 50px"></a>
        </div>
      </div>
      <h3 class="px-4 text-break"> <?php echo ucwords($row1['name']); ?></h3><br>



      <!-- <p class=" text-secondary font-weight-bold text-uppercase px-3 small pb-4 mb-0 " data-aos="fade-up" data-aos-delay="100">Interest</p> -->
      <button id="yours" href="" class="btn btn-outline-slide  font-weight-bold text-uppercase list-group-item  bg-slide text-white" data-aos="fade-up" data-aos-delay="100" style="width: 100%;text-align: left;">
        Yours
      </button>
      <button id="friend" href="" class="btn btn-outline-slide   font-weight-bold text-uppercase list-group-item  bg-slide float-left text-white py-3" data-aos="fade-up" data-aos-delay="100" style="width: 100%;text-align: left;">
        Friend Post
      </button>
      <button id="check" href="" class="btn btn-outline-slide  font-weight-bold text-uppercase list-group-item  bg-slide  text-white py-3" data-aos="fade-up" data-aos-delay="100" style="width: 100%;text-align: left;">
        For You
      </button>
      <div class="">

        <ul class="nav flex-column bg-slide mb-0 list-unstyled components mb-5" id="filter_data1">

          <!-- <p class=" text-gray font-weight-bold text-uppercase px-3 small p-4 mb-0 " data-aos="fade-up" data-aos-delay="100">Catagories</p> -->
          <?php
          $sql = mysqli_query($connect, "select * from urlfetcher");
          $cats = array();

          while ($row = mysqli_fetch_array($sql)) {

            $cats[] =  $row['catagories'];
            // print_r($cats);

          ?>

          <?php
          }
          $dup = array();
          // print_r($cats);
          foreach (array_unique($cats) as $cat) {
            $xx = explode(",", $cat);

            // print_r($xx);
            foreach (array_unique($xx) as $x1) {
              $dup[] = $x1;
            }
          }
          foreach (array_unique($dup) as $x) { ?>
            <li class="nav-item " id="check" data-aos="fade-up" data-aos-delay="100">
              <div class="list-group-item btn-outline-slide checkbox nav-link text-white font-weight-bold bg-slide ">
                <label><input type="checkbox" class=" common_selector catagories py-3  " value="<?php echo $x; ?>"> <?php echo strtoupper($x); ?></label>
              </div>
            </li>
          <?php
          }


          //       
          ?>
        </ul>


      </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class=" ">
      <!-- your post -->
      <div class="team">
        <div class="row  post_list " id="post_list" data-aos="fade-up" data-aos-delay="100">
        </div>
      </div>

      <!-- friend post  -->
      <div class="team ">
        <div class="row friend_post " id="friend_post" data-aos="fade-up" data-aos-delay="100">
        </div>
      </div>

      <!-- filter post  -->
      <div id="filter_data">
        <div id="team" class="team">
          <div class="" data-aos="fade-up" data-aos-delay="100">
            <div class="row filter_data">
            </div>
          </div>
        </div>
      </div>
      <!-- End filter post -->

    </div>



    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center text-decoration-none text-white"><i class="fa fa-arrow-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- bootstrap -->
    <input type="text" id="accoun" value="<?php echo $user; ?>" style="display:none;">

    <script src="assets/js/fetchurl.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>


<script>
  (function($) {

    "use strict";

    var fullHeight = function() {

      $('.js-fullheight').css('height', $(window).height());
      $(window).resize(function() {
        $('.js-fullheight').css('height', $(window).height());
      });

    };
    fullHeight();

    $('#sidebarCollapse').on('click', function() {
      $('#sidebar').toggleClass('active');
    });

  })(jQuery);
</script>


<script>
  $(window).load(function() {
    $('.member').hover(function() {
      $(this).find('.deshide').stop().animate({
        height: "toggle",
        opacity: "toggle"
      }, 300);
    });
  });
  $(document).ready(function() {



    $("#post_list").hide();
    $("#filter_data").show();

    $("#friend_post").hide();
    $('#yours').on('click', function() {
      $("#post_list").show();
      $("#filter_data").hide();
      $("#filter_data1").hide();
      $("#friend_post").hide();

    });
    $('#check').on('click', function() {
      $("#filter_data").show();
      $("#post_list").hide();
      $("#filter_data1").show();
      $("#friend_post").hide();
    });
    $('#friend').on('click', function() {
      $("#friend_post").show();
      $("#post_list").hide();
      $("#filter_data").hide();
      $("#filter_data1").hide();
    });

    filter_data();

    function filter_data() {
      $('.filter_data').html('<div id="preloader1" style=""></div>');
      var action = 'fetch_data';
      var catagories = get_filter('catagories');

      $.ajax({
        url: "fetch_data.php",
        method: "POST",
        data: {
          action: action,
          catagories: catagories
        },
        success: function(data) {
          $('.filter_data').html(data);
        }
      });
    }

    function get_filter(class_name) {
      var filter = [];
      $('.' + class_name + ':checked').each(function() {
        filter.push($(this).val());
      });
      return filter;
    }

    $('.common_selector').click(function() {
      filter_data();
    });
    fetch_post();

    function fetch_post() {
      var action32 = 'fetch_post';
      $.ajax({
        url: 'server.php',
        method: "POST",
        data: {
          action32: action32
        },
        success: function(data) {
          $('#post_list').html(data);
        }
      })
    }
    friend_post();

    function friend_post() {
      var action33 = 'fetch_post';
      $.ajax({
        url: 'server.php',
        method: "POST",
        data: {
          action33: action33
        },
        success: function(data) {
          $('#friend_post').html(data);
        }
      })
    }



  });
</script>