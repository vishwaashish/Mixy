<?php
//user_dashboard.php
include("db.php");
include('auth.php');
include('header.php');
// include('nav.php');

$user = $_SESSION['username'];

$query1 = "SELECT * FROM `users` where username='$user'";
$search_result1 = mysqli_query($connect, $query1);
$row1 = mysqli_fetch_array($search_result1);
if (empty($row1['profile_image'])) {
  $image = 'src="assets/image/user.jpg"';
} else {
  $image = 'src="' . $row1['profile_image'] . '"';
}

if (isset($_POST['search'])) {
  $searchpost = $_POST['searchpost'];
  echo $searchpost;
}


?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="assets/css/search.css">
<style type="">
  .media{
  display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
}

/* url */
.column {
  float: left;
  width: 50%;
  height: 600px; /* Should be removed. Only for demonstration */
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.figure2col{
    height:600px;
}

.url-image {
  background-image: url("assets/image/url.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  
}
.imageurl{
    object-fit: cover;
    border-radius: 3px;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}

.spinner-border {
    display: inline-block;
    width: 2rem;
    height: 2rem;
    vertical-align: text-bottom;
    border: 1.25em solid currentColor;
    border-right-color: transparent;
    border-radius: 50%;
    -webkit-animation: spinner-border .75s linear infinite;
    animation: spinner-border .75s linear infinite;
}
.mymove{
  animation: mymove 2s;
  animation-fill-mode: forwards;
}
@keyframes mymove {
  from {margin-top: 600px;}
  to {margin-top: 0px;}
}
/* dropdownlist in urlfinder */
/* .select2-container .select2-selection--single .select2-selection__rendered {
    display: block;
    padding-left: 8px;
    padding-right: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 15rem;
} */
.icon-box:hover {
    transform: scale(1.08);
}
  
body{
  background: url(assets/img/hero-bg.jpg)  top center;
  width: 100%;
  /* height: 100vh; */
  position: relative;
  background-size: cover;
  position: relative;
  
}
#team {
  width: 100%;
  /* height: 100vh; */
  position: relative;
  background: url("../img/hero-bg.jpg") top center;
  background-size: cover;
  position: relative;
}

#team:before {
  content: "";
  background: rgba(255, 255, 255, 0.8);
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
}
#main{
  padding-top: 80px;

}

/* dropdown */

.dropdown {
  /* position: relative; */
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
    min-width: 184px;
    margin-top: 8px;
    overflow: auto;
    /* box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 5%); */
    z-index: 1;
}

.dropdown-content a {
    animation: ani 1s;
    padding: 12px;
    text-decoration: none;
    border: solid #f8fbfe 2px;
    display: block;
    border-radius: 5px;
    font-size: 25px;
}


@keyframes ani {
    from {margin-top: -50px;}
    to {margin-top: 0px;}
  }



.show {display: flex;}

/* post */
.post-module {
  position: relative;
  z-index: 1;
  display: block;
  background: #FFFFFF;
  min-width: 270px;
  height: 470px;
  -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
  -webkit-transition: all 0.3s linear 0s;
  -moz-transition: all 0.3s linear 0s;
  -ms-transition: all 0.3s linear 0s;
  -o-transition: all 0.3s linear 0s;
  transition: all 0.3s linear 0s;
}
.post-module:hover,
.hover {
  -webkit-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
}
.post-module:hover .thumbnail img,
.hover .thumbnail img {
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  transform: scale(1.1);
  opacity: .6;
}
.post-module .thumbnail {
  background: #000000;
  height: 400px;
  overflow: hidden;
}
.post-module .thumbnail .date {
  position: absolute;
  top: 20px;
  right: 20px;
  z-index: 1;
  background: #e74c3c;
  width: 55px;
  height: 55px;
  padding: 12.5px 0;
  -webkit-border-radius: 100%;
  -moz-border-radius: 100%;
  border-radius: 100%;
  color: #FFFFFF;
  font-weight: 700;
  text-align: center;
  -webkti-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.post-module .thumbnail .date .day {
  font-size: 18px;
}
.post-module .thumbnail .date .month {
  font-size: 12px;
  text-transform: uppercase;
}
.post-module .thumbnail img {
  display: block;
  width: 120%;
  -webkit-transition: all 0.3s linear 0s;
  -moz-transition: all 0.3s linear 0s;
  -ms-transition: all 0.3s linear 0s;
  -o-transition: all 0.3s linear 0s;
  transition: all 0.3s linear 0s;
}
.post-module .post-content {
  position: absolute;
  bottom: 0;
  background: #FFFFFF;
  width: 100%;
  padding: 30px;
  -webkti-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  -moz-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  -ms-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  -o-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
}
.post-module .post-content .category {
  position: absolute;
  top: -34px;
  left: 0;
  background: #e74c3c;
  padding: 10px 15px;
  color: #FFFFFF;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
}
.post-module .post-content .title {
  margin: 0;
  padding: 0 0 10px;
  color: #333333;
  font-size: 26px;
  font-weight: 700;
}
.post-module .post-content .sub_title {
  margin: 0;
  padding: 0 0 20px;
  color: #e74c3c;
  font-size: 20px;
  font-weight: 400;
}
.post-module .post-content .description {
  display: none;
  color: #666666;
  font-size: 14px;
  line-height: 1.8em;
}
.post-module .post-content .post-meta {
  margin: 30px 0 0;
  color: #999999;
}
.post-module .post-content .post-meta .timestamp {
  margin: 0 16px 0 0;
}
.post-module .post-content .post-meta a {
  color: #999999;
  text-decoration: none;
}
.hover .post-content .description {
  display: block !important;
  height: auto !important;
  opacity: 1 !important;
}

/* .post-module .description:hover{
  display: block;
} */

 .column {
  /* width: 50%;
  padding: 0 25px; */
  -webkti-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  float: left;
  margin:5px;
}
 .column .demo-title {
  margin: 0 0 15px;
  color: #666666;
  font-size: 18px;
  font-weight: bold;
  text-transform: uppercase;
}
 .info {
  width: 300px;
  margin: 50px auto;
  text-align: center;
}
 .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 24px;
  font-weight: bold;
  color: #333333;
}
 .info span {
  color: #666666;
  font-size: 12px;
}
 .info span a {
  color: #000000;
  text-decoration: none;
}
 .info span .fa {
  color: #e74c3c;
}

</style>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script> -->

<body>
  
<?php
  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
  else
    $url = "http://";
  // Append the host(domain name, ip) to the URL.   
  $url .= $_SERVER['HTTP_HOST'];

  // Append the requested resource location to the URL   
  $url .= "/OnePage/OnePage/search_user.php?user=$user";

  echo '<a href="' . $url . '">' . $url . '</a>';
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

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between ">
      <ul class="nav justify-content-start">
        <a class="nav" href="user_dashboard.php"><img src="assets/img/mixy.png" alt="..." width="70" class="">
          <h1 class="text-dark pt-2"><strong>Mixy</strong></h1>
        </a>
      </ul>

      <ul class="nav justify-content-end">
        <li class="nav-item m-auto">
          <a class="nav-link h4 mt-2 text-dark" href="all_user.php" tabindex="-1" aria-disabled="true"><strong>For you</strong></a>
        </li>
        <li>
          <a type="button" class="nav-link text-dark fa1 fa fa-search openBtn" onclick="openSearch()" style="font-size: 30px;margin-top: 9px;"></a>
        </li>
        <li class="nav-item">
          <a type="button" class="nav-link text-dark fa1 fa fa-plus-circle   openBtn" data-toggle="modal" data-target="#exampleModal" style="font-size: 30px;margin-top: 9px;"></a>

        </li>
        <li class="nav-item">
          <a class="nav-link  fa1 fab fa-facebook-messenger text-dark" href="chatbox.php" style="font-size: 30px;margin-top: 9px;"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link  fa1 fa fa-user text-dark" href="update_profile.php" style="font-size: 30px;margin-top: 9px;"></a>
        </li>

      </ul>

    </div>
  </header>

  <main id="main">

    <!-- ======= Counts Section ======= -->
    <section id="counts " class="counts section-bg border-bottom border-5 ">
      <div class="container">
        <div class="row  d-flex align-items-center justify-content-between">
          <div class=" col-lg-6 col-md-12 col-12 d-md-flex align-items-md-stretch">
            <div class="media">
              <img <?php echo $image; ?> class="align-self-center img-fluid rounded-circle img-thumbnail shadow-sm" alt="..." style="width:150px;height:150px">
              <div class=" text-left px-4">
                <a href="user_dashboard.php " class="text-muted text-decoration-none">@<?php echo $row1['username']; ?></a><br>
                <h1 class="mt-0"><?php echo ucfirst($row1['name']); ?></h1>
                <h5 class="text-break"><span class="text-muted">Email:</span> <?php echo $row1['email']; ?><br></h5>
                <h5 class="text-break"><span class="text-muted">Phone No:</span> <?php echo $row1['phone']; ?><br></h5>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-12 d-md-flex align-items-md-stretch pt-sm-5">
            <div class=" ">
              <a href="follower_info.php" class="mx-md-3  h4 text-decoration-none text-dark">Followers <span class="badge bg-primary"><?php echo $row1["follower_number"]; ?></span> </a>
              <a href="follower_info.php" class="mx-md-3  h4 text-decoration-none text-dark">Following <span class="badge bg-primary"><?php echo $row1["following_number"]; ?></span> </a>
              <a class="fas fa-plus-circle mx-3  openBtn text-decoration-none text-dark" data-toggle="modal" data-target="#exampleModal" style="font-size: 30px;"></a>
              <!-- <a class="fa fa fa-share-alt mx-3 text-decoration-none text-dark" href="#" data-toggle="modal" data-target="#exampleModal1" style="font-size: 30px;"></a> -->
              <div class="dropdown">
                <a onclick="myFunction()" class="dropbtn fa fa fa-share-alt mx-3 text-decoration-none text-dark"  style="font-size: 30px;"></a>
                <div id="myDropdown" class="dropdown-content">
                  <a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;" class="fab fa-facebook"></a>
                  <a href="https://twitter.com/intent/tweet?" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=%20Check%20up%20this%20awesome%20content' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;" class="fab fa-twitter"></a>

                  <a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' + encodeURIComponent(document.title)); return false;" class="fab fa-linkedin"></a>
                  <a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' + encodeURIComponent(document.title)); return false;" class="fab fa-pinterest"></a>
                </div>
              </div>
              <a class="fas fa-sign-out-alt mx-3 text-decoration-none text-dark" href="logout.php" style="font-size: 30px;"></a>

            </div>
          </div>
          <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Share</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center " style="font-size: 30px;">
                  <a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(<?php echo $url ?>) + '&t=' + encodeURIComponent(<?php echo $url ?>)); return false;" class="fab fa-facebook"></a>
                  <a href="https://twitter.com/intent/tweet?" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=%20Check%20up%20this%20awesome%20content' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;" class="fab fa-twitter"></a>

                  <a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' + encodeURIComponent(document.title)); return false;" class="fab fa-linkedin"></a>
                  <a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' + encodeURIComponent(document.title)); return false;" class="fab fa-pinterest"></a>
                </div>

              </div>
            </div>
          </div>
          <!-- share end -->



        </div>

      </div>
    </section><!-- End Counts Section -->


    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row" id="fetch_post1">

        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

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
                  <!-- <label> Catagories:</label>
                            <input list="post" name="catagories" id="catagories" class="form-control" placeholder="Select Tags" >
                            <datalist id="post">
                                <option value="blogs">
                                <option value="news">
                                <option value="sports">
                                <option value="technology">
                                <option value="travel">
                                <option value="business">
                                <option value="fashion">
                                <option value="fitness">
                                <option value="food">
                            </datalist> -->
                  <label> Catagories:</label>

                  <select class="form-control  js-example-basic-multiple js-states js-example-responsive js-example-basic-multiple-limit" multiple="true" id="catagories" style="width: 100%;">
                    <option value="blogs">blogs</option>
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

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>




  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <input type="text" id="accoun" value="<?php echo $user; ?>" style="display:none;">

  <!-- add url script -->
  <script src="assets/js/fetchurl.js"></script>
  <script>
    $('.select2').select2();
  </script>
  <script>
    $('#exampleModal').on('hidden.bs.modal', function() {
      $('#fetch_post1').reload();
    })


    $(document).ready(function() {
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
  <script>
    $(document).ready(function() {


    });
  </script>