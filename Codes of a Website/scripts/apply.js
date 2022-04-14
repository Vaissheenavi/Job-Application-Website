/**
* Author: P.Vaissheenavi 103508183
* Target: apply.html
* Purpose: This file is for additional data validation rules for Assignment 2.
* Created: 24/9/21
* Last updated: 24/9/21
* Credits: Tutor and CWA Assignment 2 instructions 
*/

"use strict";

var referenceNumber = document.getElementById("jobrefnum");
referenceNumber.value = localStorage.getItem("job");
referenceNumber.readOnly=true;

function validate() {
  
  var result = true; 


  var firstName = document.getElementById("firstname").value;
  var lastName = document.getElementById("lastname").value;
  var eMail = document.getElementById("email").value;
  var phoneNumber = document.getElementById("phonenum").value;
  var dob = document.getElementById("DateofBirth").value;
  var suburbTown= document.getElementById("suburbtown").value;
  var streetAddress= document.getElementById("streetaddress").value;
  var otherSkills= document.getElementById("others").value;

var gender="";
if(document.getElementById("male").checked)
   gender="Male";

else if(document.getElementById("female").checked)
   gender="Female";

else if(document.getElementById("nottosay").checked)
   gender="NotToSay";

sessionStorage.setItem("gender",gender)






  var date = new Date(dob);
  var today = new Date();
  var age = today.getFullYear() - date.getFullYear();

  if (age >= 80) { 
   
	document.getElementById("dobspan").innerHTML = "You must be 80 or younger to apply for this job.\n";
    result = false;
  }

  if (age <= 15) { 

    document.getElementById("dobspan").innerHTML = "You must be 15 or older to apply for this job.\n";
    result = false;
  }
	
 var postcode = document.getElementById("postcode").value;
 var state = document.querySelector('#state').value; 

 var regex;
 
	switch (state) {
		case "Please Select":
			return false;
		case "VIC":
			regex = new RegExp(/(3|8)\d+/);
		break;
		case "NSW":
			regex = new RegExp(/(1|2)\d+/);
        break;
		case "QLD":
			regex = new RegExp(/(4|9)\d+/);
        break;
		case "NT":
			regex = new RegExp(/0\d+/);
        break;
		case "WA":
			regex = new RegExp(/6\d+/);
        break;
		case "SA":
			regex = new RegExp(/5\d+/);
        break;
		case "TAS":
			regex = new RegExp(/7\d+/);
        break;
		case "ACT":
			regex = new RegExp(/0\d+/);
        break;
 }
	if(!postcode.match(regex)){
		document.getElementById("postcodespan").innerHTML = "Your postcode has to match the state.\n";
		result = false;
	} 
	
	var other = document.getElementById("otherskills").checked;
	var txt = document.getElementById("others").value;
	if (other == true &&  txt == "") {   
    	document.getElementById("textareaspan").innerHTML = "If you choose Other Skills, you cannot leave the text area empty.\n";
		result = false;
		
  }


    if (result == true) {
            storeInfo(firstName, lastName, dob, eMail, phoneNumber,postcode, streetAddress,state,suburbTown,otherSkills);
        }


	return result; 
}

function storeInfo(firstName, lastName, dob, eMail, phoneNumber,postcode,streetAddress,state, suburbTown,otherSkills) {     // store personal information to sessionStorage

    sessionStorage.firstName = firstName;
    sessionStorage.lastName = lastName;
    sessionStorage.dob = dob;
    sessionStorage.eMail = eMail;
    sessionStorage.phoneNumber = phoneNumber;
    sessionStorage.postcode = postcode;
    sessionStorage.streetAddress = streetAddress;
    sessionStorage.state = state;
    sessionStorage.suburbTown = suburbTown;
    sessionStorage.otherSkills = otherSkills;

var skills = [];
    if (analytic.checked) skills.push('Analytical Abilities');
    if (pjmanagement.checked) skills.push('Project Management');
    if (leadership.checked) skills.push('Leadership');
    if (creativity.checked) skills.push('Creativity');
    if (otherskills.checked) skills.push('Other skills');
    

    sessionStorage.setItem('skills', JSON.stringify(skills));


}

function personalInfo() {
    if(sessionStorage.firstName != undefined){ 
        document.getElementById("firstname").value = sessionStorage.firstName;
        document.getElementById("lastname").value = sessionStorage.lastName;
        document.getElementById("DateofBirth").value = sessionStorage.dob;
        document.getElementById("email").value = sessionStorage.eMail;
        document.getElementById("phonenum").value = sessionStorage.phoneNumber;
        document.getElementById("postcode").value = sessionStorage.postcode;
        document.getElementById("streetaddress").value = sessionStorage.streetAddress;
        document.getElementById("state").value = sessionStorage.state;
        document.getElementById("suburbtown").value = sessionStorage.suburbTown;
        document.getElementById("others").value = sessionStorage.otherSkills;


    var genderGet = sessionStorage.getItem("gender");
        if (genderGet=="Male")
            document.getElementById("male").checked = true;
        else if (genderGet=="Female")
            document.getElementById("female").checked = true;     
        else if (genderGet=="NotToSay")
            document.getElementById("nottosay").checked = true;


var skills = sessionStorage.getItem('skills') || '[]'

var parsedSkills = JSON.parse(skills) || [];

  analytic.checked = parsedSkills.includes('Analytical Abilities');
  pjmanagement.checked = parsedSkills.includes('Project Management');
  leadership.checked = parsedSkills.includes('Leadership');
  creativity.checked = parsedSkills.includes('Creativity');
  otherskills.checked = parsedSkills.includes('Other skills');
  
    }
}



function init() {

   if (!debug) {applyForm.onsubmit = validate;}

   var appForm = document.getElementById("appForm"); 

   appForm.onsubmit = validate; 

   personalInfo();


   redirect;

   
}

window.onload = init;
