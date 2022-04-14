/**
* Author: P.Vaissheenavi 103508183
* Target: apply.html
* Purpose: This file is for additional data validation rules for Assignment 2.
* Created: 24/9/21
* Last updated: 24/9/21
* Credits: Tutor and CWA Assignment 2 instructions 
*/



"use strict";     

function hyperlink() {
    var job1 = document.getElementById("GP105").id;
    localStorage.setItem("job",job1);

    window.location.assign("apply.php");
}

function hyperlink2() {
    var job2 = document.getElementById("PM231").id;
    localStorage.setItem("job",job2);
    
    window.location.assign("apply.php");
}

function hyperlink3() {
    var job3 = document.getElementById("SE455").id;
    localStorage.setItem("job",job3);
    
    window.location.assign("apply.php");
}

function hyperlink4() {
    var job4 = document.getElementById("HT060").id;
    localStorage.setItem("job",job4);
    
    window.location.assign("apply.php");
}
function init() {
    var applyHere = document.getElementById("applyhere");
    applyHere.onclick = hyperlink;

    var applyHere2 = document.getElementById("applyhere2");
    applyHere2.onclick = hyperlink2;

    var applyHere3 = document.getElementById("applyhere3");
    applyHere3.onclick = hyperlink3;

    var applyHere4 = document.getElementById("applyhere4");
    applyHere4.onclick = hyperlink4;
}

window.onload = init;	