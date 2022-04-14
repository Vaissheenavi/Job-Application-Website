<!DOCTYPE html>
<html lang="en">

<body>

<!-- Made the logo using https://editor.freelogodesign.org/en/logo/edit/04e01af2dba44230ac0ea8b2b7de0b48?template=7948603&category=20&companyName=Hype%20Games%20Entertainment -->

<h1 id="logo"><img src= "images/gamelogo.png" class="gamelogo" alt="Game Company Logo" height="250"></h1>

<h1 style="font-size: 45px" >Hype Games Entertainment</h1>

<?php

include_once "menu.inc";
include_once "header.inc";

?>
<br>

<hr>


<h2 style="font-size: 33px">Enhancements that I have made to the website</h2>
<p style="font-size:22px"> I have enhanced the website by using: </p> 
<ul>
               <li style="font-size:19px">Image Map</li>
               <li style="font-size:19px">Animated Logo</li>
</ul>

<br>

<!-- I learned this technique from this YouTube website https://www.youtube.com/watch?v=6PMgqzGGDRU -->

<p style="font-size:19px"> I used an Image Map in my website to improve users experience of the website and this will also make the website more user-friendly. I have significantly extended the basic HTML and CSS because how an Image Map is done and used has not been covered in both the lectures and tutorials. Furthermore, to create an Image Map is also not a basic requirement in this assignment. I have also included the code is needed to implement this feature as a comment below.


<!-- This is the code that is needed to implement the feature

<img src="images/map.png" usemap="#imagemap" height="450"/>
<map name="imagemap">
<area shape="rect" coords="34,44,270,350" alt="Computer" href="https://www.google.com.my/maps/dir//131+Hotham+St,+East+Melbourne+VIC+3002,+Australia/@-37.8113453,144.9722676,18.11z/data=!4m8!4m7!1m0!1m5!1m1!1s0x6ad642e9a1cb6a01:0x2e2d08f8f7399e1b!2m2!1d144.98579!2d-37.8143913">
</map>

This location is from Google Maps https://www.google.com.my/maps

-->


This is the hyperlink to where I have used this feature in my website.
<a href="index.php#imagemap" target="_blank">Image Map</a>
</p>

<br>

<!-- I learned this technique from this YouTube website https://www.youtube.com/watch?v=G34g7vcpN0s -->
<p style="font-size:19px"> I used a logo animation in my website because animated logos are an effective promotional tool. I have significantly extended the basic HTML and CSS because how an animated logo is done and applied has not been covered in both the lectures and tutorials. Moreover, to create an animated logo is also not a basic requirement in this assignment. I have also included the code is needed to implement this feature as a comment below.


<!-- This is the CSS code that is needed to implement the feature

.gamelogo{width:300px;
   cursor:pointer;
   animation:movedown 1s linear 1;
   animation-delay:1s;
   
}


@keyframes movedown {
    0%{
        Transform: translateY(-100px);
    }
    100%{
        Transform: translateY(0);
    }
}

-->

This is the hyperlink to where I have used this feature in my website.
<a href="index.php#logo" target="_blank">Animated Logo</a>

</p>
<br>

<hr>

<?php
include_once "footer.inc";
?>
</body>

</html>
