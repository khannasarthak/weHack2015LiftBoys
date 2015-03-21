<?php session_start();
    if(!empty($_SESSION['level']))
    {if($_SESSION['level']==2)
    {header( 'Location: application.php'); }
    if($_SESSION['level']==1){
    header('Location:user.php');
    }
    }?>

<!DOCTYPE html>
<html>

<head>
    <link type="text/css" rel=stylesheet href="css/materialize.css" media="screen,projection">

    <link type="text/css" rel="stylesheet" href="css/animate.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.shake.js"></script>
    <script src="js/jquery.md5.js"></script>


    <title>Stealth Gaming Lounge : Login</title>
</head>

<body class="blue">
    <script>
        $(document).ready(function () {

            $('#loginBtn').click(function () {
                var username = $("#user_name").val();
                var password = $.md5($("#password").val());


                $.ajax({
                    type: "POST",
                    url: "login.php",
                    data: "number=" + username + "&pwd=" + password + "&system=PC",

                    success: function (html) {
                        if (html == 2) {
                            window.location.href = "application.php";
                        }

                        else if(html == 1){
                         $.ajax({
                         type: "POST",
                             url: "pricingThere.php",
                             data: "number=" + username,
                             
                             success: function(data){
                             if(data==0){
                             window.location.href = "selectPricing.php";
                             }
                                 else{
                                 window.location.href = "user.php";
                                 }
                             }
                         });
                          
                        }
                        else if(html == 3){

                          $("#loginCard").shake();
                            $("#error").html("<span style='color:#cc0000'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error:</span> All systems full ");
                        }
                        else if(html == 4){

                          $("#loginCard").shake();
                            $("#error").html("<span style='color:#cc0000'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error:</span> User already logged in ");
                        }
                         else {
                            //Shake animation effect.
                            $("#loginCard").shake();
                            $("#error").html("<span style='color:#cc0000'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error:</span> Invalid username or password. ");
                        }
                    }
                });


                return false;
            });

        });
    </script>
    <div class="container">
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>

        <div class="row" id="loginrow">

            <div id="loginCard" class="col s4 offset-s4 card animated fadeInDown">

                <div class="card-content">

                    <span class="card-title black-text">Log In</span>
                    <form id="loginForm" class="col s12" method="post" action="#">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="user_name" type="text" name="user_name" required>
                                <label for="username">Contact Number</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" name="password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="row">
                            <div id="error">
                            </div>
                        </div>
                </div>
                <div class="card-action">
                    <button class="btn waves-effect waves-light" id="loginBtn" type="button">Submit
                        <i class="mdi-content-send right"></i>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- <script type="text/javascript" src="js/prism.js"></script>-->
    <script type="text/javascript" src="js/materialize.js"></script>
</body>



</html>
