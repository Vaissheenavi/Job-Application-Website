<!DOCTYPE html>
<html lang="en">

<link href= "styles/stylephp.css" rel="stylesheet"/>
<script src="scripts/apply.js"></script>  
<script src="scripts/enhancements.js"></script> 

 
 

<body id="applypage">

<!-- Made the logo using https://editor.freelogodesign.org/en/logo/edit/04e01af2dba44230ac0ea8b2b7de0b48?template=7948603&category=20&companyName=Hype%20Games%20Entertainment -->

<h1 id="logo"><img src= "images/gamelogo.png" class="gamelogo" alt="Game Company Logo" height="250"></h1>

<h1 style="font-size: 45px" >Hype Games Entertainment</h1>

<?php

include_once "menu.inc";
include_once "header.inc";

?>

<br>

<div id="clockDisplay" class="container" ></div>
<br>
<hr>


<h2 style="font-size: 33px">Vacant Jobs Application</h2>
<p style="font-size:19px">If you are interested in any of the vacant jobs available in Hype Games Entertainment, do fill up the form below.</p>

<hr>

<?php
function getAge($dob){
  $bday = new DateTime($dob);
  $today = new Datetime(date('m.d.y'));
  if($bday>$today){
    return 'You are not born yet';
  }
  $diff = $today->diff($bday);
  return 'You need to be 15 to 18 years old to apply and your Current Age is : '.$diff->y.' Years, '.$diff->m.' month, '.$diff->d.' days';
}
?>
<h1 id= "agechecker" class="center">Calculate Age from DOB using PHP</h1>
<hr>
<div class="form-wrapper">
  <form>
    <div class="input-wrapper">
      <label>Date of Birth</label>
      <input type="date" name="dob" value="<?php echo (isset($_GET['dob']))?$_GET['dob']:'';?>">
      <input type="submit" value="Calculate Age">
    </div>
  </form>
  <?php
    if(isset($_GET['dob']) && $_GET['dob']!=''){?>
      <div class="result-wrapper">
        
        <?php echo getAge($_GET['dob']);?>
      </div>
    <?php }
  ?>
</div>

<br>


<hr>




<form id="appForm" method="post" action="processEOI.php" novalidate=”novalidate”>


<fieldset>
     <legend style="font-size:19px"><strong>Job Detail</strong></legend>
<p>
   <label for="jobrefnum" style="font-size:19px">Job reference number:</label>
   <input type="text" pattern="[A-Z0-9]{5}" id= "jobrefnum" name="jobrefnum" required/>
</p>

</fieldset>

<br>
<br>

<fieldset>
     <legend style="font-size:19px"><strong>Applicant Details</strong></legend>
<p>
   <label for="firstname" style="font-size:19px">First Name:</label>
   <input type="text" pattern="[a-zA-Z]{2,20}" id="firstname" name="firstname" required/>

   <label for="lastname" style="font-size:19px">Last Name:</label>
   <input type="text" pattern="[a-zA-Z]{2,20}" id="lastname" name="lastname" required/> 
 </p>
 <p> 
   <label for ="DateofBirth" style="font-size:19px">Date of Birth:</label>
   <input type="date" pattern="\d{1,2}\/\d{1,2}\/\d{4}" name="dateofbirth" id="DateofBirth" required/>
   <span id="dobspan"></span>
</p>
</fieldset>

<br>
<br>

<fieldset>
     <legend style="font-size:19px"><strong>Gender</strong></legend>
<br>
<label for="male" style="font-size:19px"><input type="radio" id="male" name="gender" value="Male" required/>Male</label>
<label for="female" style="font-size:19px"><input type="radio" id="female" name="gender" value="Female"/>Female</label>
<label for="nottosay" style="font-size:19px"><input type="radio" id="nottosay" name="gender" value="Preferred not to say"/>Preferred not to say</label>
</fieldset>

<br>
<br>

<fieldset>
     <legend style="font-size:19px"><strong>Home Location</strong></legend>
<p>
  <label for="streetaddress" style="font-size:19px">Street Address:</label>
  <input type="text" id="streetaddress" name="streetaddress" maxlength="40" required/>
</p>

<p>
  <label for="suburbtown" style="font-size:19px">Suburb/Town:</label>
  <input type="text" id="suburbtown" name="suburbtown" maxlength="40" required/>
</p>


<p><label for="state" style="font-size:19px" >State</label>
   <select name="state" id="state" required>
       <option value="">Please Select</option>
       <option value="VIC">VIC</option>
       <option value="NSW">NSW</option>
       <option value="QLD">QLD</option>
       <option value="NT">NT</option>
       <option value="WA">WA</option>
       <option value="SA">SA</option>
       <option value="TAS">TAS</option>
       <option value="ACT">ACT</option>
   </select>
</p>

<p>
   <label for="postcode" style="font-size:19px">PostCode:</label>
   <input type="text" pattern="^[0-9]{4}$" id="postcode" name="postcode" required/>
   <span id="postcodespan"></span>
</p>

</fieldset>
<br>
<br>

<fieldset>
<legend style="font-size:19px"><strong>Additional Information</strong></legend>
<p> 
<label for="email" style="font-size:19px">Email:</label>
<input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required/>
</p>

<p>
<label for="phonenum" style="font-size:19px">Phone Number:</label>
<input type="tel" name= "phonenum" id="phonenum" maxlength="12" pattern="{8,12}" placeholder="For eg. 0400 000 000" required/>
</p>



<p>
<label style="font-size:19px">Skills List:</label>
<label for="analytic" style="font-size:19px"><input type="checkbox" id= "analytic" name="list[]" value="analytical" required/>Analytical Abilities</label>
<label for="pjmanagement" style="font-size:19px"><input type="checkbox" id="pjmanagement" name="list[]" value="pjmanagement"/>Project Management</label>
<label for="leadership" style="font-size:19px"><input type="checkbox" id="leadership" name="list[]" value="leadership"/>Leadership</label>
<label for="creativity" style="font-size:19px"><input type="checkbox" id="creativity" name="list[]" value="creativity"/>Creativity</label>
<label for="otherskills" style="font-size:19px"><input type="checkbox" id="otherskills" name="list[]" value="otherskills"/>Other skills</label>
</p>

<p><label for="others" style="font-size:19px">Other skills:</label>
   <textarea placeholder="Write your other skills here..." id="others" name="others" rows="5" cols="50"></textarea>
   <span id="textareaspan"></span>
</p>


</fieldset>



<br>
<br>
<input type="submit" value="Apply"/>
<input type="reset" value="Reset form"/>
</form> 


<br>
<br>



<hr>

<script src="scripts/apply.js"></script>   

<?php
include_once "footer.inc";
?>

</body>

</html>