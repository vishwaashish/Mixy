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
    
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

    .profile{
      width: 12%;
    }
  </style>
</head>

<body>
  <?php

  $query1 = "SELECT * FROM `users` where username='$user'";
  $search_result1 = mysqli_query($connect, $query1);
  $row1 = mysqli_fetch_array($search_result1);
  if (empty($row1['profile_image'])) {
    $image = 'src="assets/image/user.jpg"';
  } else {
    $image = 'src="' . $row1['profile_image'] . '"';
  }
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
      <a href="all_user.php" class="btn btn-outline-slide  font-weight-bold text-uppercase list-group-item  bg-slide text-white" style="width: 100%;text-align: left;">
      For You
    </a>
    <!-- <button  id="yours" href="" class="  btn btn-outline-dark text-uppercase list-group-item  text-white  bg-dark float-left py-3" style="width: 100%;text-align: left;">
          Yours
        </button>
      -->
      <button id="edit_profile" href="" class="btn btn-outline-slide  font-weight-bold text-uppercase list-group-item  bg-slide text-white" style="width: 100%;text-align: left;">
      Edit Profile
    </button>
    <button id="change_pass" href="" class="btn btn-outline-slide  font-weight-bold text-uppercase list-group-item  bg-slide text-white" style="width: 100%;text-align: left;">
      Change Password
    </button>
     
    </nav>

    <!-- Page Content  -->
    <div id="content" class=" ">
      
    <!-- edit profile -->
    <div class="" id="edit_profile_show">
      <h1>Edit Profile</h1>
      <div class="container my-5">
        <div class="form-group text-center">
          <img id="blah" <?php echo $image ?> alt="..." width="200" class=" rounded-circle img-thumbnail shadow-sm" style="height:200px">
        </div>
        <div class="alert error" id="error1" style="display:none;">
          <div class="error_show" id="error_show"></div>
          <div><a href="#" class="close error_link" data-dismiss="alert" aria-label="close">X</a></div>
        </div>

        <table class="table borderless">
          <div class="table-responsive-md">
            <tr>
              <td  class="pt-3 text-uppercase profile"><span>Image:</span></td>
              <td><input type="file" class="form-control-file " name="fileToUpload" id="fileToUpload" value="<?php echo $image ?>" onchange="readURL(this);"></td>
            </tr>

            <form id="insert_edit_profile" method="post">
              <tr>
                <td  class="pt-3 text-uppercase"><span>Username:</span></td>
                <td><input type="username" class="form-control" id="username" placeholder="username" name="username" value="<?php echo $row1['username'] ?>" disabled></td>
              </tr>
              <tr>
                <td  class="pt-3 text-uppercase"><span>Email:</span></td>
                <td><input type="email" class="form-control" id="email" placeholder="email" name="email" value="<?php echo $row1['email'] ?>" disabled></td>
              </tr>
              <tr>
                <td  class="pt-3 text-uppercase"><span>Fullname:</span></td>
                <td><input type="text" class="form-control" id="name" placeholder="FullName" name="name" value="<?php echo $row1['name'] ?>"></td>
              </tr>
              <tr>
                <td  class="pt-3 text-uppercase"><span>Website:</span></td>
                <td><input type="url" class="form-control" rel="nofollow" id="website" placeholder="website" name="website" value="<?php echo $row1['website'] ?>"><span class="text-muted">eg. www.linkedin.com</span></td>
              </tr>
              <tr>
                <td  class="pt-3 text-uppercase"><span>Bio:</span></td>
                <td><textarea class="form-control " id="bio" name="bio" placeholder=" a" required><?php echo $row1['bio'] ?></textarea></td>
              </tr>
              <tr>
                <td  class="pt-3 text-uppercase"><span>Phone No:</span></td>
                <td><input type="text" class="form-control" id="phone" placeholder="Phone Number " name="phone" value="<?php echo $row1['phone'] ?>"></td>
              </tr>
              <tr>
                <td>
                  <div class="mb-3"></div>
                  <input type="button" name="save" class="btn btn-primary" value="Update profile" id="save_edit_profile">
                </td>
              </tr>
            </form>
          </div>
        </table>

      </div>
    </div>
    <!-- end edit profile -->
    <!-- edit password -->
    <div class="" id="edit_password">
      <h1>Edit Password</h1>
      <div class="container my-5">
        <div class="form-group text-center">
          <img id="blah" <?php echo $image ?> alt="..." width="200" class=" rounded-circle img-thumbnail shadow-sm" style="height:200px">
        </div>

        <div class="alert error " id="error" style="display:none;">
          <div class="error_show" id="error_show1"></div>
          <div><a href="#" class="close error_link" data-dismiss="alert" aria-label="close">X</a></div>
        </div>
        <table class="table">
          <div class="table-responsive-md">



            <form id="insert_edit_password" method="post">
              <tr>
                <td style="width:17%" class="pt-3 text-uppercase"><span>Username:</span></td>
                <td><input type="username" class="form-control" id="username1" placeholder="username" name="username" value="@<?php echo $row1['username'] ?>" disabled></td>
              </tr>
              <tr>
                <td style="width:17%" class="pt-3 text-uppercase"><span>Current Password:</span></td>
                <td><input type="password" class="form-control" id="curpass" placeholder="password" name="password"></td>
              </tr>
              <tr>
                <td style="width:17%" class="pt-3 text-uppercase"><span>New Password:</span></td>
                <td><input type="password" class="form-control" id="password" placeholder="password" name="password"></td>
              </tr>
              <tr>
                <td style="width:17%" class="pt-3 text-uppercase"><span>Confirm Password:</span></td>
                <td><input type="password" class="form-control" id="confirm_password" placeholder="confirm_password" name="confirm_password"></td>
              </tr>
              <tr>
                <td>
                  <div class="mb-3"></div>
                  <input type="button" name="save" class="btn btn-primary" value="Update Password" id="butsave">
                </td>
              </tr>



            </form>
          </div>
        </table>
      </div>
    </div>



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
  $(function() {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
    });
  });
 </script>

<script>
  $(document).ready(function() {
    $("#post_list").hide();
    $("#edit_password").hide();

    $('#yours').on('click', function() {
      $("#post_list").show();
      $("#edit_password").hide();
      $("#edit_profile_show").hide();

    });

    $('#edit_profile').on('click', function() {
      $("#edit_profile_show").show();
      $("#edit_password").hide();
      $("#post_list").hide();

    });
    $('#change_pass').on('click', function() {
      $("#edit_password").show();
      $("#edit_profile_show").hide();
      $("#post_list").hide();

    });


    //   fetch post
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
    //  end fetch post

    $('#fileToUpload').change(function() {
      var v = document.getElementById("error1");
      var extension = $('#fileToUpload').val().split('.').pop().toLowerCase();
      var username = $('#username').val();
      var file_data = $('#fileToUpload').prop('files')[0];
      var formData = new FormData();
      formData.append('file', file_data);
      //alert(formData);
      if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        alert("Invalid Image File");
        $('#fileToUpload').val('');
        return false;
      }
      $.ajax({
        url: "update_image_ajax.php?username=" + username,
        type: "POST",
        dataType: "text",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success: function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          if (dataResult.statusCode == 200) {
            $("#error1").show();
            $('#error_show').html('Profile Picture Updated Successfully!');
            v.className += " alert-success";
          }
        }
      });
    });

    $('#save_edit_profile').on('click', function() {
      var v = document.getElementById("error1");
      var name = $('#name').val();
      var username = $('#username').val();
      var phone = $('#phone').val();
      var bio = $('#bio').val();
      var website = $('#website').val();
      setTimeout(function() {
        $("#error1").fadeOut(1000);
      }, 3000);

      if (name == "" || phone == "") {
        // $("#error1").show();
        // $('#error_show').html('Please fill all the field!');
        // v.className += " alert-danger";
        swal("Please fill all the field!", {
                                icon: "warning",
        })
      } else {
        $.ajax({
          url: "login_reg_insert.php",
          type: "POST",
          data: {
            type: 3,
            name: name,
            username: username,
            phone: phone,
            bio: bio,
            website: website
          },
          cache: false,
          beforeSend: function() {
            $('#save_edit_profile').val("Processing...");
          },

          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
              // $("#error1").show();
              // $('#error_show').html('inserted successfull!');
              // v.className += " alert-success";
              swal("Inserted successfull", {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                });
            } else if (dataResult.statusCode == 203) {
              // $("#error1").show();
              // $('#error_show').html('Not Inserted !');
              // v.className += " alert-danger";
              swal("Not Inserted!", {
                                icon: "error",
        })
            } else if (dataResult.statusCode == 204) {
              // $("#error1").show();
              // $('#error_show').html('Please fill all the field!');
              // v.className += " alert-danger";
              swal("Please fill all the field!", {
                                icon: "warning",
        })
            }
            $('#save_edit_profile').css("background-color", "green");
            $('#save_edit_profile').val("Update Profile");
          }
        });
      }

    });


    $('#butsave').on('click', function() {
      var v = document.getElementById("error");
      var username = $('#username').val();
      var password = $('#password').val();
      var curpass = $('#curpass').val();
      var confirm_password = $('#confirm_password').val();
      setTimeout(function() {
        $("#error").fadeOut(1000);
      }, 3000);
      if (password == "" || curpass=="") {
        // $("#error").show();
        // $('#error_show1').html('Please fill all the field!');
        // v.className += " alert-danger";
        swal("Please fill all the field!", {
                                icon: "warning",
        })
      } else if (password != confirm_password) {
        // $("#error").show();
        // $('#error_show1').html('Password is not same!');
        // v.className += " alert-danger";
        swal("Password is not same!", {
                                icon: "error",
        })
      } else if (!password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
        $("#error").show();
        $('#error_show1').html('Please use Both uppercase and lowercase!');
        v.className += " alert-danger";
      } else if (!password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
        $("#error").show();
        $('#error_show1').html('Please use special character!');
        v.className += " alert-danger";
      } else if (!password.length > 7) {
        $("#error").show();
        $('#error_show1').html('Please use more than 8 Character!');
        v.className += " alert-danger";
      } else {

        $.ajax({
          url: "login_reg_insert.php",
          type: "POST",
          data: {
            type: 4,
            username: username,
            password: password,
            curpass:curpass
          },
          cache: false,
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
              // $("#error").show();
              // $('#error_show1').html('successfull updated');
              // v.className += " alert-success";
              swal("Updated Successfully!", {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                });
            } else if (dataResult.statusCode == 203) {
              // $("#error").show();
              // $('#error_show1').html('Not Inserted !');
              // v.className += " alert-danger";
              swal("Not Inserted!", {
                                icon: "error",
                            }).then((result) => {
                                location.reload();
                });
            } else if (dataResult.statusCode == 204) {
              // $("#error1").show();
              // $('#error_show1').html('Please fill all the field!');
              // v.className += " alert-danger";
              swal("Please fill all the field!", {
                                icon: "warning",
                            })
            } else if (dataResult.statusCode == 201) {
              // $("#error1").show();
              // $('#error_show1').html('Current Password is not same!');
              // v.className += " alert-danger";
              swal("Current Password is not same!", {
                                icon: "error",
                            })
            }

          }

        });
      }

    });
  });
</script>




<!-- image preview on edit profile  -->
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<!-- // // end image preview on edit profile  -->