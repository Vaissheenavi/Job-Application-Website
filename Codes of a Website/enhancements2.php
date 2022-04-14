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

<h2 style="font-size: 33px">Enhancements that I have made to the website using JavaScript</h2>
<p style="font-size:22px"> I have enhanced the website using JavaScript by: </p>
<ul>
               <li style="font-size:19px">A Timer for the page</li>
               <li style="font-size:19px">A side Calendar and Current Time</li>
</ul>
<br>

<!-- I learned this technique from this website https://www.tutorialspoint.com/javascript/javascript_page_redirect.htm -->

<p style="font-size:19px"> I used a timer for a page (apply.html) in my website to ensure that the users can only fill up the form within 15 minutes. If the user takes up more than 15 minutes to fill up the form, it will return the user to the main page (index.html). I have significantly extended the basics of JavaScript because how a timer for a page is done and used has not been covered in both the lectures and tutorials. Furthermore, to create a timer for a page is also not a basic requirement in this assignment.To implement this feature, a programmer basically need to implement a redirect function and put in setTimeout so that when the time allocated is up, it will redirect the user to the main page. We need to use a function and in that function, we need to put the window's location in this case, it is the main page, insert a document writing the message that will be displayed on the screen for the user and to also insert the setTimeout. I have also included the JavaScript code that is needed to implement this feature as a comment below.

<!-- This is the JavaScript code that is needed to implement the feature

"use strict";     

function redirect() {
            window.location="index.php";
            }
            
            document.write("You will be redirected to main page in 15 minutes.");
            setTimeout('redirect()', 900000);
-->



This is the hyperlink to where I have used this feature in my website.
<a href="apply.php" target="_blank">Top Left Timer for the page</a>
</p>

<br>

<!-- I learned this technique from this YouTube website https://www.youtube.com/watch?v=HyhVjHGb19k -->

<p style="font-size:19px"> I used a side Calendar and Current Time in my website because it will be easier and faster for the user to know the day, date and time. I have significantly extended the basic Java Script because how a side Calendar and Current Time is done and applied has not been covered in both the lectures and tutorials. Moreover, to create a side Calendar and Current Time is also not a basic requirement in this assignment. This is what a programmer has to do to implement this feature. First, we have to create a function and call the variables of the required elements (eg: day, month, year and etc.), then use an if statement to make sure the website makes the correct decision based on the criteria that I have applied.  I have also included the JavaScript code that is needed to implement this feature as a comment below.


<!-- This is the JavaScript code that is needed to implement the feature

function renderTime() {
                var mydate = new Date();
                var year = mydate.getYear();
                    if(year<1000){
                       year+=1900
                   }
                  var day=mydate.getDay();
                  var month=mydate.getMonth();
                  var daym=mydate.getDate();
                  var dayarray=new Array("Sunday,","Monday,","Tuesday,","Wednesday,","Thursday,","Friday,","Saturday,");
                  var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
                
                
                  var currentTime= new Date();
                  var h = currentTime.getHours();
                  var m = currentTime.getMinutes();
                  var s = currentTime.getSeconds();
                
                      if(h ==24){
                          h=0;
                      } else if (h>12){
                          h=h-0
                      }
                
                      if(h<10){
                          h="0" + h;
                      }
                
                      if(m<10){
                          m="0" + m;
                      }
                
                     if(s<10){
                          s="0" + s;
                      }
                
                
                      var myClock=document.getElementById("clockDisplay");
                      myClock.textContent = "" +dayarray[day]+" "+daym+" "+montharray[month]+" "+year+ " | " +h+ ":" +m+ ":"+s;
                      myClock.innerText= "" +dayarray[day]+" "+daym+" "+montharray[month]+" "+year+ " | " +h+ ":" +m+ ":" +s;
            
                      setTimeout("renderTime()", 1000);
}

function init2() {
    renderTime();
}

-->

This is the hyperlink to where I have used this feature in my website.
<a href="apply.php#clockDisplay" target="_blank">A side Calendar and Current Time</a>
</p>

<br>
<hr>

<?php
include_once "footer.inc";
?>
</body>

</html>