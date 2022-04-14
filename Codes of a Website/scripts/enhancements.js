/**
* Author: P.Vaissheenavi 103508183
* Target: apply.html
* Purpose: This file is for additional data validation rules for Assignment 2.
* Created: 24/9/21
* Last updated: 24/9/21
* Credits: Tutor and CWA Assignment 2 instructions 
*/


// This part of enhancements is from https://www.tutorialspoint.com/javascript/javascript_page_redirect.htm 



"use strict";     

function redirect() {
            window.location="index.php";
            }
            
            document.write("You will be redirected to main page in 15 minutes.");
            setTimeout('redirect()', 900000);

/** This enhancement is a calender and clock that keeps track of the current time. 
    
This is from youtube: https://www.youtube.com/watch?v=HyhVjHGb19k   */


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

window.addEventListener("load", init2);