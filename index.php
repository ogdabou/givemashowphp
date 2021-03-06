<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
        <link href="http://vjs.zencdn.net/4.1/video-js.css" rel="stylesheet">
        <script src="http://vjs.zencdn.net/4.1/video.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript" src="javascript/javascript.js"></script>
        <script type="text/javascript" src="javascript/keyListener.js"></script>
        <script type="text/javascript" src="javascript/annyang.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <title>Give me a show !</title>
        <script type="text/javascript">
            var next = function(){
                console.log("He said NEXT !");
                changeVideo();
            }

            if (annyang)
            {
                console.log("Annyang successfully started");
                var commands = {
                    'next': next,
                    'previous': changeToPreviousVideo,
                    'up' : updVolumeByTen,
                    'down' : downVolumeByTen
                };
                annyang.debug();
                annyang.init(commands);
                annyang.setLanguage('en');
                annyang.start();
            }
        </script>
    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <a class="navbar-brand" href="#">GiveMeAShow</a>
            
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav" id="menuContainer">
                    <li class="menuItem" id="videoMenu">
                        <a href="#" > Video</a>
                    </li>
                    <li class="menuItem" id="controlsMenu" onClick="moveVideo(controlsClickHandler);">
                        <a href="#" >Controls</a>
                    </li>
                    <li class="menuItem" id="aboutMenu" onClick="moveVideo(aboutClickHandler);">
                        <a href="#" > About</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="menuItem">
                        <a href="http://givemeasong.net" target="_blank">GiveMeASong!</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="mainContent row-fluid span12">
            <div class="row">
                <div id="videoTitle" class="col-xs-6 col-xs-offset-2"></div>
            </div>
            <div class="row">
                <video id="videoClip" class="video-js vjs-default-skin videoContainer col-xs-6 col-xs-offset-2"
                    controls preload="auto" width="640px" height="360px">
                </video>
                <div id="showChooser" class="col-xs-2">
                    <div id="showChooserTitle"><h5>Choose your show.</h5></div>
                    <hr/>
                    <div id="showList">
                        <?php
                                include("php/GenerateThumbs.php");
                        ?>
                    </div>
                </div>
                <div class="textContent col-xs-7 col-xs-offset-1">
                    <div id="aboutContent">
                        <h3>About</h3>
                        <hr/>
                        <p>
                            "Give Me A Show !" was developped to let you be lazier and happier.</br>
                            You can find another "Give Me.." website, but about musics at : 
                            <a href="http://givemeasong.net">Give Me A Song</a> </br>
                            It is our very first webSite and we need your feedbacks ! Contact us at : ogdabou@gmail.com.</br></br>
                            Dev stuff by Ogdabou</br>
                            Server stuff by Naixy</br>
                        </p>
                    </div>
                    <div id="controlsContent">
                        <h3>Controls</h3>
                        <hr/>
                        <h4>Keyboard</h4>
                        <ul>
                            <li>Left arrow : change to previous video.</li>
                            <li>Right arrow : random the next video.</li>
                        </ul>
                        <h4>Voice</h4>
                        <p>
                            We use a recent API which is only (for the moment) supported by Chrome. It cannot be used on Firefox. We will implement the 
                            thing on Firefox as soon as there is something available.</br>
                        </p>
                        <p>
                            We will work on a full voice-controlled website by the future.
                            Feel free to send us feedbacks and ideas.
                        </p>
                        <ul>
                            <li>"next" : random to the next video.</li>
                            <li>"previous" : go to the previous video.</li>
                            <li>"up" : up the volume by 10%</li>
                            <li>"down" : down the volume by 10%</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" language="javascript">
            $(".tab_content").hide();
            $(".file_content").hide();
            $("#aboutContent").hide();
            $("#controlsContent").hide();
            var aboutShown = "false";
            var controlsShown = "false";
            document.onkeydown = changeOnKeyDown;
            var videoPlayer = videojs("videoClip");
            var videosHystory = null;;
            var path = new Array();
            videoPlayer.on("ended", changeVideo);
            videoPlayer.on("fullscreenchange", removeVideoPlayerOffset);
            // videoPlayer.on("error", changeVideo);
            changeVideo();
            console.log("path:", path);
        </script>
    </body>
</html>
