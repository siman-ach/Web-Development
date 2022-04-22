<?php
session_start();
if (! empty($_SESSION['username']))
?>
<html>
<head>
    <title> COVID-CT: Registration </title>
    <link rel="stylesheet" type="text/css" href="menu.css"/>
    <script type="text/javascript">

        function FindPosition(oElement)
        {
            if(typeof( oElement.offsetParent ) != "undefined")
            {
                for(var posX = 0, posY = 0; oElement; oElement = oElement.offsetParent)
                {
                    posX += oElement.offsetLeft;
                    posY += oElement.offsetTop;
                }
                return [ posX, posY ];
            }
            else
            {
                return [ oElement.x, oElement.y ];
            }
        }

        function GetCoordinates(e)
        {
            var PosX = 0;
            var PosY = 0;
            var ImgPos;
            ImgPos = FindPosition(myImg);
            if (!e) var e = window.event;
            if (e.pageX || e.pageY) {
                PosX = e.pageX;
                PosY = e.pageY;
            } else if (e.clientX || e.clientY) {
                PosX = e.clientX + document.body.scrollLeft
                    + document.documentElement.scrollLeft;
                PosY = e.clientY + document.body.scrollTop
                    + document.documentElement.scrollTop;
            }
            PosX = PosX - ImgPos[0];
            PosY = PosY - ImgPos[1];
            document.getElementById("x").innerHTML = PosX;
            document.getElementById("y").innerHTML = PosY;

            document.getElementById('positionX').value = PosX;
            document.getElementById('positionY').value = PosY;

            DisplayMarker(markerX, markerY);
        }
        function DisplayMarker(markerX, markerY){

            //reposition marker within map
            document.getElementById("black_marker").style.left=markerX + "px";
            document.getElementById("black_marker").style.top=markerY + "px";
            //marker will only be visible to user upon mouse click
            document.getElementById("black_marker").style.zIndex = 1;
        }

        //-->
    </script>
</head>
<body>
    <div id="header">
    COVID - 19 Contact Tracing
    </div>
      <div id="nav">
      <ul>
        <li> <a class="unselected" href="homepage.php"> Home</a></li>
        <li> <a class="unselected" href= "visits_overview.php ">Overview</a></li>
        <li><a class="selected" href= "visits_overview2.php ">Add Visit</a></li>
        <li><a class="unselected" href= "visits_overview3.php ">Report</a></li>
        <li><a class="unselected" href= "settings.HTML">Settings</a></li>
        <li><a class="unselected" href= "index.php">Logout</a></li>
    </div>
    <div class= "right-side">
    <h2> Add a new Visit </h2>
    <br>
      <hr class="line">
      <div class="visit-form">

        <form id="visit-form" action="visits.inc.php" method="post" >

        <input name="date" type="text" class="form-control" placeholder="Date" required >
        <br>
        <input name="time" type="text" class="form-control" placeholder="Time" required >
        <br>
        <input name="duration" type="text" class="form-control" placeholder="Duration" required >
        <br>
        <input name="posX" id="positionX" type="hidden" value ="">
        <input name="posY" id="positionY" type="hidden" value ="">

        <div class="somespace">

        <button type="submit" name="add" class="Submit"> Add </button>
        <br>
        <button type="reset" class="Submit"> Cancel </button>
        </div>

      </form>
      </div>
        <div class="map">
            <img id="myImgId" alt="exeter map" src="exeter.jpeg"  border="4" width="620" height="510" usemap="#map1" />
            <p id="posX">X:<span id="x"></span></p>
            <p id="posY">Y:<span id="y"></span></p>
            <img id="black_marker" src="marker_black.png" style="border: none; width: 30px; height: 30px; position: absolute; z-index: -1;"/>

            <script type="text/javascript">

                var myImg = document.getElementById("myImgId");
                myImg.onmousedown = GetCoordinates;

            </script>
        </div>
</body>
</html>
