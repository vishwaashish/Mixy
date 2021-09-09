<?php
// session_start();

include('auth.php');
include('db.php');
$user = $_SESSION['username'];
$userids = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users where username = '$user'"));
$userid = $userids['user_id'];
$_SESSION["user_id"] = $userid;
// echo $_SESSION["user_id"];


if (empty($userids['profile_image'])) {
    $profile_image = "image/user.jpg";
} else {
    $profile_image = $userids['profile_image'];
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <?php include("header.php"); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>


    <link rel="stylesheet" href="assets/css/search.css">
    <style>
        .container {
            max-width: 1170px;
            margin: auto;
        }

        img {
            max-width: 100%;
        }

        .inbox_people {
            background: #f8f8f8 none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 40%;
            border-right: 1px solid #c4c4c4;
        }

        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
            background: #f8f8f8 none repeat scroll 0 0;
        }

        .top_spac {
            margin: 20px 0 0;
        }


        .recent_heading {
            float: left;
            width: 40%;
        }

        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%;
            /* padding: */
        }

        .headind_srch {
            padding: 10px 29px 10px 20px;
            overflow: hidden;
            border-bottom: 1px solid #c4c4c4;
        }

        .recent_heading h4 {
            color: #05728f;
            font-size: 21px;
            margin: auto;
        }

        .srch_bar input {
            border: 1px solid #cdcdcd;
            border-width: 0 0 1px 0;
            width: 80%;
            padding: 2px 0 4px 6px;
            background: none;
        }

        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }

        .srch_bar .input-group-addon {
            margin: 0 0 0 -27px;
        }

        .chat_ib h5 {
            font-size: 15px;
            color: #464646;
            margin: 0 0 8px 0;
        }

        .chat_ib h5 span {
            font-size: 13px;
            float: right;
        }

        .chat_ib p {
            font-size: 14px;
            color: #989898;
            margin: auto
        }

        .chat_img {
            float: left;
            width: 11%;
        }

        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }

        .chat_people {
            overflow: hidden;
            clear: both;
        }

        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }

        .inbox_chat {
            height: auto;
            overflow-y: auto;
        }

        .active_chat {
            background: #ebebeb;
        }

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }

        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }

        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }

        .received_withd_msg {
            width: 57%;
        }

        .mesgs {
            float: left;
            padding: 30px 15px 0 25px;
            width: 60%;
        }

        .sent_msg p {
            background: #05728f none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .outgoing_msg {
            overflow: hidden;
            margin: 26px 0 26px;
        }

        .sent_msg {
            float: right;
            width: 46%;
        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }

        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            /* position: absolute; */
            right: 0;
            top: 11px;
            width: 33px;
        }

        .messaging {
            padding: 0 0 50px 0;
        }

        .msg_history {
            height: 516px;
            overflow-y: auto;
        }

        .vertical-nav {
            min-width: 17rem;
            width: 17rem;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.4s;
            overflow-y: scroll;
        }

        .page-content {
            width: calc(100% - 17rem);
            margin-left: 17rem;
            transition: all 0.4s;
        }

        /* for toggle behavior */

        #sidebar.active {
            margin-left: -17rem;
        }

        #content.active {
            width: 100%;
            margin: 0;
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -17rem;
            }

            #sidebar.active {
                margin-left: 0;
            }

            #content {
                width: 100%;
                margin: 0;
            }

            #content.active {
                margin-left: 17rem;
                width: calc(100% - 17rem);
            }
        }

        .hover:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }


        .chat_message_area {
            /* position: relative;
            width: 100%;
            height: auto;
            background-color: #FFF;
            border: 1px solid #CCC;
            border-radius: 3px; */
        }

        #message {
            width: 100%;
            height: auto;
            min-height: 40px;
            overflow: auto;
            padding: 6px 24px 6px 12px;
        }

        .image_upload {
            /* position: absolute;
            top: 3px;
            right: 3px; */
        }

        .image_upload>form>input {
            display: none;
        }

        .image_upload img {
            width: 24px;
            cursor: pointer;
        }

        /* body {
    background: #599fd9;
    background: -webkit-linear-gradient(to right, #599fd9, #c2e59c);
    background: linear-gradient(to right, #599fd9, #c2e59c);
    min-height: 100vh;
    overflow-x: hidden;
  } */
        body {
            background: url(assets/img/hero-bg.jpg) top center;
            width: 100%;
            /* height: 100vh; */
            position: relative;
            background-size: cover;
            position: relative;

        }

        .separator {
            margin: 3rem 0;
            border-bottom: 1px dashed #fff;
        }

        .text-uppercase {
            letter-spacing: 0.1em;
        }

        .text-gray {
            color: #aaa;
        }

        #loading {
            text-align: center;
            background: url('loader.gif') no-repeat center;
            height: 150px;
        }

        .container1 {

            display: flex;
            justify-content: center;
        }

        .col {
            padding-right: 0px;
            padding-left: 0px;
        }

        .media {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
        }
    </style>
</head>

<body>
      <!-- search box popover -->
<div id="myOverlay" class="overlay">
  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
  <div class="overlay-content">
    <form action="search_all.php">
    <div class="p-3 rounded rounded-pill shadow-lg bg-white">
            <div class="input-group">
              <input type="search" placeholder="Search" name="searchpost" aria-describedby="button-addon1" class="form-control border-0 bg-whight">
              <div class="input-group-append">
                <button id="button-addon1" type="submit" class="btn btn-link text-primary form-control" ><i class="fa fa-search"></i></button>
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
                <a class="nav " href="search_user.php?user=<?php echo $user; ?>"><img src="assets/img/mixy.png" alt="..." width="70" class="">
                    <h1 class="text-dark"><strong>Mixy</strong></h1>
                </a>
            </ul>
            <ul class="nav justify-content-end">
                <li class="nav-item m-auto">
                    <a class="nav-link h4 mt-2 text-dark" href="all_user.php" tabindex="-1" aria-disabled="true"><strong>For you</strong></a>
                </li>
                <!-- <li class="nav-item">
                    <a type="button" class="nav-link text-dark fa1 fa fa-plus-circle   openBtn" data-toggle="modal" data-target="#exampleModal" style="font-size: 30px;margin-top: 9px;"></a>

                </li> -->
                <li>
        <a type="button" class="nav-link text-dark fa1 fa fa-search openBtn" onclick="openSearch()"  style="font-size: 30px;margin-top: 9px;"></a>
        </li>
                <li class="nav-item">
                    <a class="nav-link  fa1 fa fa-user text-dark" href="update_profile.php" style="font-size: 30px;margin-top: 9px;"></a>
                </li>
                <li class="nav-item m-auto px-3">
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Notifications <span class="badge badge-light count"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        </div>
                </li>

            </ul>
        </div>
    </header>

    <main id="" class="" style="padding-top: 110px;">
        <div class="container">

            <div class="">
                <div class="">
                    <h2 class=" text-center"><strong>Messager<strong< /h2>
                </div>

            </div>



            <input type="text" id="fromUser" value="<?php echo $userid ?>" hidden />
            <div class="messaging">
                <?php
                if (isset($_POST['search'])) {
                    $valueToSearch = $_POST['valueToSearch'];
                    $msgs = mysqli_query($connect, "SELECT * FROM users WHERE CONCAT (name) LIKE '%" . $valueToSearch . "%' ORDER BY user_id DESC");
                } else {
                    // $userss = mysqli_query($connect, "SELECT * FROM message INNER JOIN users ON users.user_id = message.user_id where message.user_id !='$userid' order by id desc");
                    $msgs = mysqli_query($connect, "SELECT * FROM users where user_id != '$userid'");
                    // $use = mysqli_fetch_array($userss);

                }

                ?>
                <div class="inbox_msg">
                    <div class="inbox_people">
                        <div class="headind_srch">
                            <div class="recent_heading">
                                <h4>Recent</h4>
                            </div>
                            <div class="srch_bar">
                                <div class="stylish-input-group">
                                    <form action="" method="post">
                                        <input type="text" class="search-bar" placeholder="Search" name="valueToSearch">
                                        <span class="input-group-addon">
                                            <button type="submit" name="search"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- users -->
                        <div class="inbox_chat">
                            <?php
                            while ($msg = mysqli_fetch_array($msgs)) {
                                if (empty($msg['profile_image'])) {
                                    $image = "image/user.jpg";
                                } else {
                                    $image = $msg['profile_image'];
                                }

                                echo '
                            <div class="chat_list active_chat">
                                <div class="chat_people">
                                <div class="chat_img"> <img src=' . $image . ' alt="" style="height:45px;width:50px;border-radius:50px;"> </div>
                                    <div class="chat_ib">
                                    <a class="text-decoration-none" href="?toUser=' . $msg['user_id'] . '">
                                        <h5>' . ucwords($msg['name']) . ' <span class="chat_date">' . date("M d", strtotime($msg['uploaded_on'])) . '</span>
                                        </h5>

                                        <p></p>
                                    </a>
                                    </div>
                                </div>
                            </div>
                                ';
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Name  -->
                    <div class="row headind_srch" style="background: #f8f8f8 none repeat scroll 0 0;">
                        <div class="col-md">
                            <?php
                            if (isset($_GET['toUser'])) {
                                $userName = mysqli_query($connect, "SELECT * FROM users WHERE user_id ='" . $_GET["toUser"] . "' ");
                                $uName = mysqli_fetch_assoc($userName);
                                echo '<input type="text" value=' . $_GET["toUser"] . ' id="toUser" hidden/>';
                                echo '
                            <div class="media">
                                <img class="align-self-center mr-3" src=' . $uName['profile_image'] . ' alt="" style="height:50px;width:50px;border-radius:50px;">
                                <div class="media-body">
                                    <h5 class="mt-2 mx-3 "><strong>
                                        ' . ucwords($uName['name']) . '</strong>
                                    </h5>
                                </div>
                            </div>';
                            } else {
                                $userName = mysqli_query($connect, "SELECT * FROM users");
                                $uName = mysqli_fetch_assoc($userName);
                                $_SESSION["toUser"] = $uName["user_id"];
                                echo '<input type="text" value=' . $_SESSION["toUser"] . ' id="toUser" hidden/>';
                                echo '
                            <div class="media">
                                <img class="align-self-center mr-3" src=' . $uName['profile_image'] . ' alt="" style="height:50px;width:50px;border-radius:50px;">
                                <div class="media-body">
                                    <h5 class="mt-2 ">
                                        ' . $uName['name'] . '
                                    </h5>
                                </div>
                            </div>';
                            } ?>

                        </div>
                        <div class="col-md">

                        </div>
                    </div>
                    <!-- chat system -->
                    <div class="mesgs bg-white">
                        <div class="row msg_history text-break" id="msgBody">

                            <?php
                            if (isset($_GET["toUser"])) {
                                $chats = mysqli_query($connect, "SELECT * FROM message 
                                                where (user_id = '" . $_SESSION["user_id"] . "' AND
                                                ToUser = '" . $_GET["toUser"] . "') OR (user_id = '" . $_GET["toUser"] . "' AND ToUser = '" . $_SESSION["user_id"] . "')")
                                    or die("Failed to query database" . mysqli_error($connect));
                            } else {

                                $chats = mysqli_query($connect, "SELECT * FROM message where (user_id = '" . $_SESSION["user_id"] . "' AND
                                                ToUser = '" . $_SESSION["toUser"] . "') OR (user_id = '" . $_SESSION["toUser"] . "' AND ToUser = '" . $_SESSION["user_id"] . "')")
                                    or die("Failed to query database" . mysqli_error($connect));

                                while ($chat = mysqli_fetch_assoc($chats)) {
                                    echo $chat["Message"];
                                    if (empty($chat['profile_image'])) {
                                        $image = "image/user.jpg";
                                    } else {
                                        $image = $chat['profile_image'];
                                    }
                                    if ($chat["user_id"] == $userid) {
                                        echo '
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                            <p>' . $chat["Message"] . '</p>
                                            <span class="time_date"> 11:01 AM | June 9</span>
                                        </div>
                                    </div>';
                                    } else {
                                        echo '<div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src=' . $image . ' style="height:40px;width:50px;border-radius:50px;"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>' . $chat["Message"] . '</p>
                                            <span class="time_date">  ' . date("h:m | M d", strtotime($chat['uploaded_on_msg'])) . '</span>
                                        </div>
                                    </div>
                                </div>
                                ';
                                    }
                                }
                            }
                            ?>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <!--<textarea name="group_chat_message" id="group_chat_message" class="form-control"></textarea>!-->
                                    <div class="chat_message_area">
                                        <div id="message" contenteditable class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-flex justify-content-center">

                                <!-- upload image to chat -->
                                <div class="image_upload mx-2">
                                    <form id="uploadImage" method="post" action="upload_image_chat.php">
                                        <label for="uploadFile"><i class="fa fa-upload msg_send_btn text-center p-1 " aria-hidden="true"></i></label>
                                        <input class="" type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
                                    </form>
                                </div>
                                <!-- send button -->
                                <button id="send" class="msg_send_btn btn-success" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </main>
</body>

</html>
<script src="assets/js/main.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#send").on("click", function() {
            message = $("#message").html();

            if (message == '') {
                alert("type somthing");
            } else {
                $.ajax({
                    url: "plugin/chat/insertMessage.php",
                    method: "POST",
                    data: {
                        fromUser: $("#fromUser").val(),
                        toUser: $("#toUser").val(),
                        message: message
                    },
                    dataType: "text",

                    success: function(data) {
                        $("#message").html("");

                    }
                });
            }
        });

        setInterval(function() {
            // $('#msgBody').html('<div id="preloader" style=""></div>');
            $.ajax({
                url: "plugin/chat/realTimeChat.php",
                method: "POST",
                data: {
                    fromUser: $("#fromUser").val(),
                    toUser: $("#toUser").val()
                },
                dataType: "text",
                beforeSend: function() {
                    $("#msgBody").html("Processing");
                },
                success: function(data) {
                    $("#msgBody").html(data);
                    // $("#msgBody").scrollDown(0);
                    $("#msgBody").scrollTop($("#msgBody")[0].scrollHeight);
                }
            });
        }, 5000);



        // notification system
        function load_unseen_notification(view = '') {
            $.ajax({
                url: "fetch_chat_notification.php",
                method: "POST",
                data: {
                    view: view,
                    fromUser: $("#fromUser").val(),
                    toUser: $("#toUser").val()
                },
                dataType: "json",
                success: function(data) {
                    $('.dropdown-menu').html(data.notification);
                    if (data.unseen_notification > 0) {
                        $('.count').html(data.unseen_notification);
                    }
                }
            });
        }

        load_unseen_notification();

        $(document).on('click', '.toggle', function() {
            $('.count').html('');
            load_unseen_notification('yes');
        });

        setInterval(function() {
            load_unseen_notification();;
        }, 1000);

        function isURL(str) {
            var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
                '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|' + // domain name
                '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
                '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
                '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
                '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator
            return pattern.test(str);
        }

       


        $('#uploadFile').on('change', function() {
            $('#uploadImage').ajaxSubmit({
                target: "#message",
                resetForm: true
            });
        });

        // $("#message").emojioneArea({

        //     pickerPosition: "top",
        //     toneStyle: "bullet"
        //     // tones: false
        //     // autocomplete: false,
        //     // inline: true,
        //     // hidePickerOnBlur: false
        // });

    });
</script>