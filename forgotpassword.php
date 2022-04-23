<!DOCTYPE html>
<html>
<!-- change page after login -->
<!-- Mobile Specific Metas -->
<!-- Font-->
<!-- Main Style Css -->
<!-- <link rel="stylesheet" href="assets/css/login_style.css"/> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<script src="https://kit.fontawesome.com/e5486f0711.js" crossorigin="anonymous"></script>
<!-- bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<script src="https://kit.fontawesome.com/e5486f0711.js" crossorigin="anonymous"></script>

<!-- <link rel="stylesheet" href="assets/css/search.css"></link> -->

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" href="assets/css/mixstyle.css">
</link>
<!-- bootstrap -->

<style>
    body {
        margin: 0;
    }

    .page-content {
        width: 100%;
        margin: 0 auto;
        background-image: -moz-linear-gradient(136deg, rgb(224, 195, 252) 0%, rgb(142, 197, 252) 100%);
        background-image: -webkit-linear-gradient(136deg, rgb(224, 195, 252) 0%, rgb(142, 197, 252) 100%);
        background-image: -ms-linear-gradient(136deg, rgb(224, 195, 252) 0%, rgb(142, 197, 252) 100%);
        display: flex;
        display: -webkit-flex;
        justify-content: center;
        -o-justify-content: center;
        -ms-justify-content: center;
        -moz-justify-content: center;
        -webkit-justify-content: center;
        align-items: center;
        -o-align-items: center;
        -ms-align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
    }

    .form-v2-content {
        background: #fff;
        width: 851px;
        border-radius: 15px;
        -o-border-radius: 15px;
        -ms-border-radius: 15px;
        -moz-border-radius: 15px;
        -webkit-border-radius: 15px;
        margin: 100px 0;
        position: relative;
        display: flex;
        display: -webkit-flex;
    }

    .form-v2-content .form-left {
        margin-bottom: -4px;
        position: relative;
    }

    .form-v2-content .form-left img {
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
    }

    .form-v2-content .form-left .text-1,
    .form-v2-content .form-left .text-2 {
        font-family: 'Roboto', sans-serif;
        font-weight: 700;
        color: #fff;
    }

    .form-v2-content .form-left .text-1 {
        position: absolute;
        left: 9%;
        bottom: 15%;
    }

    .form-v2-content .form-left .text-2 {
        position: absolute;
        right: 8%;
        bottom: 1.5%;
    }

    .form-v2-content .form-left .text-1 p {
        font-size: 32px;
        line-height: 1.67;
    }

    .form-v2-content .form-left .text-1 span {
        font-size: 25px;
        display: block;
    }

    .form-v2-content .form-left .text-2 p {
        font-size: 18px;
    }

    .form-v2-content .form-left .text-2 span {
        font-size: 35px;
        padding-right: 9px;
    }

    .form-v2-content .form-detail {
        padding: 20px 40px 20px 40px;
        position: relative;
        width: 100%;
    }

    .form-v2-content .form-detail h2 {
        font-family: 'Roboto', sans-serif;
        font-weight: 700;
        color: #333;
        font-size: 28px;
        position: relative;
        padding: 6px 0 0;
        margin-bottom: 25px;
    }

    .form-v2-content .form-row {
        width: 100%;
        position: relative;
    }

    .form-v2-content .form-detail label {
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
        font-size: 16px;
        color: #666;
        display: block;
        margin-bottom: 11px;
    }

    .form-v2-content .form-detail .form-row label#valid {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        -o-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        width: 14px;
        height: 14px;
        border-radius: 50%;
        -o-border-radius: 50%;
        -ms-border-radius: 50%;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        background: #53c83c;
    }

    .form-v2-content .form-detail .form-row label#valid::after {
        content: "";
        position: absolute;
        left: 5px;
        top: 1px;
        width: 3px;
        height: 8px;
        border: 1px solid #fff;
        border-width: 0 2px 2px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .form-v2-content .form-detail .form-row label.error {
        padding-left: 0;
        margin-left: 0;
        display: block;
        position: absolute;
        bottom: -10px;
        width: 100%;
        background: none;
        color: red;
    }

    .form-v2-content .form-detail .form-row label.error::after {
        content: "\f343";
        font-family: "LineAwesome";
        position: absolute;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        right: 10px;
        top: -31px;
        color: red;
        font-size: 18px;
        font-weight: 900;
    }

    .form-v2-content .form-detail .input-text {
        margin-bottom: 27px;
    }

    .form-v2-content .form-detail input {
        width: 100%;
        padding: 11.5px 15px;
        border: 1px solid #e5e5e5;
        border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        appearance: unset;
        -moz-appearance: unset;
        -webkit-appearance: unset;
        -o-appearance: unset;
        -ms-appearance: unset;
        outline: none;
        -moz-outline: none;
        -webkit-outline: none;
        -o-outline: none;
        -ms-outline: none;
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        color: #333;
    }

    .form-v2-content .form-detail .form-row input:focus {
        border: 1px solid #53c83c;
    }

    .form-v2-content .form-detail input[type="radio"] {
        outline: none;
        -moz-outline: none;
        -webkit-outline: none;
        -o-outline: none;
        -ms-outline: none;
        -o-appearance: none;
        -ms-appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        display: inline-block;
        width: 20px;
        height: 20px;
        padding: 4px;
        background-clip: content-box;
        border: 1px solid #e5e5e5;
        background-color: #fff;
        border-radius: 50%;
        -o-border-radius: 50%;
        -ms-border-radius: 50%;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        cursor: pointer;
        float: left;
        margin-top: 0;
    }

    .form-v2-content .form-detail .form-checkbox {
        width: 80%;
        margin-top: -17px;
        position: relative;
    }

    .form-v2-content .form-detail .form-checkbox input {
        position: absolute;
        opacity: 0;
    }

    .form-v2-content .form-detail .form-checkbox .checkmark {
        position: absolute;
        top: 20px;
        left: 0;
        height: 15px;
        width: 15px;
        border: 1px solid #ccc;
        cursor: pointer;
    }

    .form-v2-content .form-detail .form-checkbox .checkmark::after {
        content: "";
        position: absolute;
        left: 5px;
        top: 1px;
        width: 3px;
        height: 8px;
        border: 1px solid #385cb9;
        border-width: 0 2px 2px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        transform: rotate(45deg);
        display: none;
    }

    .form-v2-content .form-detail .form-checkbox input:checked~.checkmark::after {
        display: block;
    }

    .form-v2-content .form-detail .form-checkbox p {
        margin-left: 35px;
        color: #666;
        font-size: 16px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        line-height: 1.67;
    }

    .form-v2-content .form-detail .form-checkbox a {
        font-weight: 500;
        color: #385cb9;
        text-decoration: underline;
    }

    .form-v2-content .form-detail .register {
        background: #3b63ca;
        border-radius: 6px;
        -o-border-radius: 6px;
        -ms-border-radius: 6px;
        -moz-border-radius: 6px;
        -webkit-border-radius: 6px;
        width: 160px;
        border: none;
        margin: 6px 0 50px 0px;
        cursor: pointer;
        font-family: 'Roboto', sans-serif;
        color: #fff;
        font-weight: 500;
        font-size: 16px;
    }

    .form-v2-content .form-detail .register:hover {
        background: #3356b0;
    }

    .form-v2-content .form-detail .form-row-last input {
        padding: 15.5px;
    }

    input::-webkit-input-placeholder {
        /* Chrome/Opera/Safari */
        color: #999;
        font-size: 14px;
    }

    input::-moz-placeholder {
        /* Firefox 19+ */
        color: #999;
        font-size: 14px;
    }

    input:-ms-input-placeholder {
        /* IE 10+ */
        color: #999;
        font-size: 14px;
    }

    input:-moz-placeholder {
        /* Firefox 18- */
        color: #999;
        font-size: 14px;
    }

    /* Responsive */
    @media screen and (max-width: 991px) {
        .form-v2-content {
            margin: 40px 20px;
            flex-direction: column;
            -o-flex-direction: column;
            -ms-flex-direction: column;
            -moz-flex-direction: column;
            -webkit-flex-direction: column;
        }

        .form-v2-content .form-left {
            width: 100%;
        }

        .form-v2-content .form-left img {
            width: 100%;
            border-bottom-left-radius: 0px;
            border-top-right-radius: 15px;
        }

        .form-v2-content .form-detail {
            padding: 30px 20px 30px 20px;
            width: auto;
        }

        .form-v2-content .form-detail .form-row input {
            width: 95%;
        }

        .form-v2-content .form-detail .form-checkbox {
            width: 100%;
        }
    }

    @media screen and (max-width: 575px) {
        .form-v2-content .form-detail .form-row input {
            width: 89.5%;
        }
    }
</style>

<body class="form-v2">
    <div class="page-content">
        <div class="form-v2-content">
            <div class="form-left d-none d-md-block">
                <img src="assets/image/form-v2.jpg" alt="form">
                <div class="text-1">
                    <p>Bring Your Post Along</p>
                </div>
            </div>

            <div class="form-detail text-center d-flex align-items-center justify-content-center">
                <div>
                    <img src="assets/image/fotgot.png" width="100" alt="">
                    <h1 class="mt-3 h4">Forgot Password?</h1>
                    <p>Contact admin to change password. </p>
                    <p class=" text-left"><b>Email</b> - vishwakarmaneetesh1654@gmail.com</p>
                    <a href="index.php" class="m-5" style="margin-top: 1rem;">Login</a>
                </div>

            </div>
        </div>
    </div>

</body>

</html>

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



<script>
    $(document).ready(function() {

        $('#check').click(function() {
            if ($('#password').attr('type') == 'text') {
                $('#password').attr('type', 'password');
            } else {
                $('#password').attr('type', 'text');
            }
        });


        $('#login').on('click', function() {
            $("#login_form").show();
            $("#register_form").hide();
        });
        $('#register').on('click', function() {
            $("#register_form").show();
            $("#login_form").hide();
        });


        $('#butsave').on('click', function() {
            var v = document.getElementById("error");
            emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var name = $('#name').val();
            var email = $('#email').val();

            var username = $('#username').val();
            var phone = $('#phone').val();
            var password = $('#password').val();
            var confirm_password = $('#confirm_password').val();
            if (name == "" && email == "" && phone == "" && password == "") {
                $("#error").show();
                $('#error').html('Please fill all the field!');
                v.className += " alert-danger";
            } else if (!emailReg.test(email)) {
                $("#error").show();

                $('#error').html('Email is not valid!');
                v.className += " alert-danger";
            } else if (password != confirm_password) {
                $("#error").show();

                $('#error').html('Password is not same!');
                v.className += " alert-danger";
            } else if (!password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
                $("#error").show();
                $('#error').html('Please use Both uppercase and lowercase!');
                v.className += " alert-danger";
            } else if (!password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                $("#error").show();
                $('#error').html('Please use special character!');
                v.className += " alert-danger";
            } else if (!password.length > 7) {
                $("#error").show();
                $('#error').html('Please use more than 8 Character!');
                v.className += " alert-danger";
            } else {

                $.ajax({
                    url: "login_reg_insert.php",
                    type: "POST",
                    data: {
                        type: 1,
                        name: name,
                        email: email,
                        username: username,
                        phone: phone,
                        password: password
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {

                            $('#register_form').find('input:text').val('');
                            $("#error").show();
                            $('#error').html('Registration successfull Go to Login !');
                            v.className += " alert-success";
                        } else if (dataResult.statusCode == 201) {
                            $("#error").show();
                            $('#error').html('Email ID already exists !');
                            v.className += " alert-danger";

                        } else if (dataResult.statusCode == 202) {
                            $("#error").show();
                            $('#error').html('Username already exists !');
                            v.className += " alert-danger";
                        } else if (dataResult.statusCode == 203) {
                            $("#error").show();
                            $('#error').html('Not Inserted !');
                            v.className += " alert-danger";

                        }

                    }
                });
            }

        });
        $('#butlogin').on('click', function() {
            $("#error").hide();
            $("#error1").hide();

            var v = document.getElementById("error");
            var username = $('#email_log').val();
            var password = $('#password_log').val();
            username.trim(username);
            password.trim(password);
            if (username == "" && password == "") {
                $("#error").show();
                $('#error').html('Please fill all the field!');
                v.className += " alert-danger";
            } else {
                $.ajax({
                    url: "login_reg_insert.php",
                    type: "POST",
                    data: {
                        type: 2,
                        username: username,
                        password: password
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            window.location.href = "search_user.php?user=" + dataResult.username;
                        } else if (dataResult.statusCode == 900) {
                            window.location.href = "admin/index.php?user=" + dataResult.username;
                        } else if (dataResult.statusCode == 201) {
                            $("#error").show();
                            $('#error').html('Invalid EmailId or Password !');
                            v.className += " alert-danger";
                        } else if (dataResult.statusCode == 203) {
                            $("#error").show();
                            $('#error').html('Invalid EmailId or Password attemp!' + dataResult.attemp);
                            v.className += " alert-danger";
                        } else if (dataResult.statusCode == 204) {
                            $("#error").show();
                            $('#error').html('To many failed login attempts. Please login after 30 sec');
                            v.className += " alert-danger";
                        }
                    }
                });
            }

        });


    });
</script>