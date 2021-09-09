<!-- search_all.php -->
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
    $image = 'src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6S66MBA2W-FIT5H_2-m1IyN-xuSdYocMv_0lLfm0qZLHqqmdbXqdvwpNn"';
} else {
    $image = 'src="' . $row1['profile_image'] . '"';
}
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="assets/css/search.css">
    <script src="assets/js/main.js"></script>

    <link rel="stylesheet" href="assets/css/mixstyle.css">
    </link>
    <style>
        .media {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
        }

        .form-control::placeholder {
            font-size: 0.95rem;
            color: #aaa;
            font-style: italic;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .form-control-underlined {
            border-width: 0;
            border-bottom-width: 1px;
            border-radius: 0;
            padding-left: 0;
        }


        button:focus {
            border: none;
        }
    </style>
</head>
<nav class="navbar navbar-light   px-md-5 py-md-4  p-2 shadow-sm " style="background-color: white;">


    <a class="nav text-decoration-none p-0" href="search_user.php?user=<?php echo $user; ?>"><img src="assets/img/mixy.png" alt="..." width="50" class="">
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
    <section id="counts " class="counts section-bg border-bottom border-5 ">
        <div class="container">
            <div class="text-center">
                <div class="row">
                    <div class="col-md-2 col-0"></div>
                    <div class="col">
                        <ul class="nav nav-pills d-flex justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Post</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">User</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- POST -->
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="mt-5 mx-5 ">
                                    <form action="" method="GET" id="clickpost">
                                        <div class="p-2 bg-white rounded rounded-pill shadow-sm ">
                                            <div class="input-group">
                                                <input type="text" placeholder="What're you searching for Post?" value="<?php echo @$_GET['searchpost']; ?>" name="searchpost" id="postinput" aria-describedby="searchpost" class="form-control border-0 px-md-5" required>
                                                <div class="input-group-append">
                                                    <button id="searchpost" href="?post=<?php echo @$_GET['searchpost']; ?>" type="button" class="btn btn-link text-primary form-control"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- USER -->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="mt-5 mx-5 ">
                                    <form action="" method="GET" id="clicktag">
                                        <div class="p-2 bg-white rounded rounded-pill shadow-sm">
                                            <div class="input-group">
                                                <input type="text" placeholder="What're you searching for tag?" value="<?php echo @$_GET['searchtag']; ?>" name="searchtag" id="taginput" aria-describedby="searchtag" class="form-control border-0 px-md-5" required>
                                                <div class="input-group-append">
                                                    <button id="searchtag" href="?user=<?php echo @$_GET['searchtag']; ?>" type="button" class="btn btn-link text-primary form-control"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-0"></div>
                </div>

            </div>
        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Team Section ======= -->
    <div id="team" class="team">
        <div class="container">
            <div class="row" id="searchpost1" style="display: none;">
            </div>
        </div>
    </div><!-- End Team Section -->

    <div id="" class="">
        <div class="container">
            <div class="row icon-boxes1" id="searchtag1">

            </div>

        </div>
    </div><!-- End Team Section -->
</main>

<!-- <input type="text" value="<?php //echo @$_GET['searchpost']; 
                                ?>" id="fetchpost" hidden> -->

<script>
    $(document).ready(function() {

        $('#searchpost').on('click', function() {
            var searchpost = 'searchpost';
            var fetchpost = $('#postinput').val();
            $.ajax({
                url: 'server.php',
                method: "POST",
                data: {
                    searchpost: searchpost,
                    fetchpost: fetchpost
                },
                beforeSend: function() {
                    $("#searchpost1").html("Processing");
                },
                success: function(data) {

                    $('#searchtag1').css("display", "none");
                    $('#searchpost1').css("display", "flex");
                    $('#searchpost1').html(data);
                }
            })
        });

        $('#searchtag').on('click', function() {
            var searchtag = 'searchtag';
            var fetchtag = $('#taginput').val();
            $.ajax({
                url: 'server.php',
                method: "POST",
                data: {
                    searchtag: searchtag,
                    fetchtag: fetchtag
                },
                beforeSend: function() {
                    $("#searchtag1").html("Processing");
                },
                success: function(data) {

                    $('#searchpost1').css("display", "none");
                    $('#searchtag1').css("display", "flex");
                    $('#searchtag1').html(data);
                }
            })
        });
    });
</script>