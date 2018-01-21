<?php
session_start();
if(!$_SESSION["login"] == true) {
    header('Location: login.html');
}
?>
<!DOCTYPE html>
<html lang="en" style="height:100%;">
    <head> 
        <meta charset="utf-8"> 
        <title>Front Page Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="keywords" content="pinegrow, blocks, bootstrap" />
        <meta name="description" content="My new website" />
        <link rel="shortcut icon" href="ico/favicon.png"> 
        <!-- Core CSS -->         
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
        <!-- Style Library -->         
        <link href="css/style-library-1.css" rel="stylesheet">
        <link href="css/plugins.css" rel="stylesheet">
        <link href="css/blocks.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->         
        <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.6.9/firebase.js"></script>
        <script>
            $(document).ready(function(){


            // Initialize Firebase
            // TODO: Replace with your project's customized code snippet
            var config = {
                apiKey: "AIzaSyCPo5-BG9O9x2jXRAmNuH66G3b_ZL5MbIA",
                authDomain: "trust-education-foundation.firebaseapp.com",
                databaseURL: "trust-education-foundation.firebaseio.com",

            };

            var app = firebase.initializeApp(config);


            //        firebase.auth().signInAnonymously()
            //                .then(function() {
            //                    console.log('Logged in as Anonymous!')
            //                }).catch(function(error) {
            //            var errorCode = error.code;
            //            var errorMessage = error.message;
            //            console.log(errorCode);
            //            console.log(errorMessage);
            //        });

            var email = "mark@semiplay.com";
            var password = "123456";

            firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
                console.log(error.code);
                console.log(error.message);
            });




            var ref = firebase.database().ref();

            ref.on("value", function(snapshot) {
                var current = snapshot.val().current;
                $("#day").val(current.day);
                $("#currentDay").text(current.day);
                $("#line1").val(current.line1);
                $("#currentLine1").text(current.line1);
                $("#line2").val(current.line2);
                $("#currentLine2").text(current.line2);
                $("#line3").val(current.line3);
                $("#currentLine3").text(current.line3);
                $("#line4").val(current.line4);
                $("#currentLine4").text(current.line4);
                console.log(snapshot.val().current.day);
            }, function (error) {
                console.log("Error: " + error.code);
            });

                $("#afSubmit").on('click', function () {
                    var currentRef = firebase.database().ref("current/");

                    currentRef.update({
                        day: $("#day").val(),
                        line1:$("#line1").val(),
                        line2:$("#line2").val(),
                        line3:$("#line3").val(),
                        line4:$("#line4").val()
                    });
                    alert('updated');

                });


            });
        </script>
    </head>     
    <body data-spy="scroll" data-target="nav">
        <header id="header-1" class="soft-scroll header-1">
            <!-- Navbar -->
            <nav class="main-nav navbar-fixed-top headroom headroom--pinned">
                <div class="container">
                    <!-- Brand and toggle -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#"></a>
                    </div>
                    <!-- Navigation -->
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active nav-item">
                                <a href="front.html">Front Page Admin</a>
                            </li>
                            <li class="nav-item">
                                <a href="chat.html">Chat Admin</a>
                            </li>
                            <li class="nav-item dropdown">
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Dropdown 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Dropdown 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Dropdown 3</a>
                                    </li>
                                    <li>
                                        <a href="#">Dropdown 4</a>
                                    </li>
                                </ul>                                 
                            </li>
                            <!--//dropdown-->                             
                            <li class="nav-item">
</li>
                        </ul>
                        <!--//nav-->
                    </div>
                    <!--// End Navigation -->
                </div>
                <!--// End Container -->
            </nav>
            <!--// End Navbar -->
        </header>
        <div class="content-block contact-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="contact" class="form-container">
                            <fieldset>
                                <div id="message"></div>
                                <form id="admin">
                                    <div class="form-group">
                                        <input name="day" id="day" type="text" value="" placeholder="Day" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input name="line1" id="line1" type="text" value="" placeholder="Line 1" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input name="line2" id="line2" type="text" value="" placeholder="Line 2" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input name="line3" id="line3" type="text" value="" placeholder="Line 3" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input name="line4" id="line4" type="text" value="" placeholder="Line 4" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <div class="editContent">
</div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="button" id="afSubmit" name="afSubmit">Update</button>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                        <!-- /.form-container -->
                    </div>
                    <div class="col-md-6">
                        <h2>Current Message</h2>
                        <p>This is the message currently displayed on the app Home Page</p>
                        <div class="well">
                            <div id="currentDay"></div>
                            <div id="currentLine1">
</div>
                            <div id="currentLine2">
</div>
                            <div id="currentLine3">
</div>
                            <div id="currentLine4">
</div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
    </body>     
</html>
