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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e5486f0711.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../assets/css/search.css">
    </link>

    <link rel="stylesheet" href="../assets/css/mixstyle.css">
    </link>

    <style>
        body {
            background: url(../assets/img/hero-bg1.jpg) top center;
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
                <div class="media d-flex align-items-center"><a class="text-decoration-none text-white" href="../search_user.php?user=<?php echo $user; ?>"><img src="../assets/img/mixy.PNG" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                        <div class="mr-3">
                            <h2 class="m-auto font-weight-bold">Mixy</h2>
                    </a>
                </div>
                <!-- <a type="button" class="text-dark fa fa-search text-decoration-none" onclick="openSearch()" style="font-size: 20px;margin-top: 0px;background:white;padding: 5px;    border-radius: 50px"></a> -->
            </div>
    </div>
    <h3 class="px-4 text-break"> <?php echo ucwords($row1['name']); ?></h3><br>



    <!-- <p class=" text-secondary font-weight-bold text-uppercase px-3 small pb-4 mb-0 " data-aos="fade-up" data-aos-delay="100">Interest</p> -->
    <!-- <a id="yours" href="index.php" class="btn btn-outline-slide  font-weight-bold text-uppercase list-group-item  bg-slide text-white" data-aos="fade-up" data-aos-delay="100" style="width: 100%;text-align: left;">
        Home
    </a> -->
    <a id="yours" href="index.php" class="btn btn-outline-slide  font-weight-bold text-uppercase list-group-item  bg-slide text-white" data-aos="fade-up" data-aos-delay="100" style="width: 100%;text-align: left;">
        User
    </a>

    </nav>

    <div id="content">
        <?php
        $id = $_GET['id'];
        $name = $_GET['name'];
        $query = mysqli_query($connect, "SELECT * FROM `users` where username != '$user' ");
        $query1 = mysqli_query($connect, "SELECT * FROM `urlfetcher` where user_id = '$id' ");

        ?>

        <h1><?php echo $name; ?> Post</h1>
        <div class="table-responsive mt-4">
            <div id="employee_table">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Image</th>
                        <th width="30%">Title</th>
                        <th width="30%">Description</th>
                        <th width="30%">Catagory</th>
                        <th width="30%">View </th>
                        <th width="30%">Delete</th>
                    </tr>

                    <?php
                    if (mysqli_num_rows($query1) > 0) {

                        while ($row = mysqli_fetch_array($query1)) {


                            if (empty($row['image'])) {
                                $image = 'src="../assets/image/insert_side.png"';
                            } else {
                                $image = 'src="../' . $row['image'] . '"';
                            }
                    ?>
                            <tr>
                                <td><img <?php echo $image; ?> width="100"></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['catagories']; ?></td>
                                <td><a href="<?php echo $row["url"]; ?>" type="button" name="viewpost" id="<?php echo $row["user_id"]; ?>" class="btn btn-primary btn-xs">View Post</a></td>
                                <td><a type="button" name="view" value="Delete" id="<?php echo $row["content_id"]; ?>" class="btn text-white btn-danger btn-xs view_data">Delete</a></td>
                            </tr>
                        <?php }
                    } else {
                        ?>
                        <tr>
                            <td class="text-center " colspan="100">Not Found</td>
                        </tr>
                    <?php
                    } ?>
                </table>
            </div>
        </div>

    </div>

    </div>


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center text-decoration-none text-white"><i class="fa fa-arrow-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- <script src="../assets/js/jquery-3.5.1.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    <!-- bootstrap -->
    <input type="text" id="accoun" value="<?php echo $user; ?>" style="display:none;">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="../assets/js/fetchurl.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="../assets/js/main.js"></script>
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
</script>


<script>
    $(document).ready(function() {
        $(document).on('click', '.view_data', function() {
            var delete_post = $(this).attr("id");
            console.log('====================================');
            console.log(delete_post);
            console.log('====================================');
            if (confirm('Are you sure you want to delete?')) {
                $.ajax({
                    url: "user_logic.php",
                    method: "POST",
                    data: {
                        delete_post: delete_post
                    },
                    success: function(data) {
                        var dataResult = JSON.parse(data);

                        console.log('====================================');
                        console.log(dataResult);
                        console.log('====================================');
                        if (dataResult.statusCode == 1) {
                            swal("Deleted Successfully!", {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            });
                        } else {
                            swal("Deleted Un Successfully!", {
                                icon: "error",
                            })
                        }
                    }
                });
            }
        });
        $(function() {
            $('#update_data').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var name = button.data('name');
                var status = button.data('status');
                var modal = $(this);

                modal.find('#name1').val(name);
                modal.find('#status1').val(status);
                modal.find('#id_modal').val(id);
            });
        });
        $(document).on('click', '#update_detail', function() {
            var id = $('#id_modal').val();
            var name1 = $('#name1').val();
            var status1 = $('#status1').val();

            console.log('====================================');
            console.log(id, name1, status1);
            console.log('====================================');

            $.ajax({
                url: "user_logic.php",
                method: "POST",
                catch: false,
                data: {
                    update: 1,
                    id: id,
                    name: name1,
                    status: status1
                },
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 1) {
                        $('#update_data').modal().hide();
                        swal("Data Updated!", {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        });
                    }
                }
            });
        });
    });
</script>