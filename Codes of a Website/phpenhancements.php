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

<h2 style="font-size: 33px">Enhancements that I have made to the website using PHP</h2>
<p style="font-size:22px"> I have enhanced the website using PHP by: </p>
<ul>
               <li style="font-size:19px">A Login/Logout Page</li>
               <li style="font-size:19px">Age Checker for the elderly</li>
               <li style="font-size:19px">Sorting the Order of Selected Fields</li>
</ul>
<br>

<!-- I learned this technique from this Youtube website https://www.youtube.com/watch?v=FgaTtbDbpvE -->

<p style="font-size:19px"> For the first enhancement, I did a Login and Logout Page in my website to ensure that only authorised people can get access to a website. It is important for a website to have Login and Log Out features because this ensures the security of the website. To briefly explain how this Login and Log Out page works on my website is that, 
in order to access the manager of the website (manager.php), the user must enter a valid username and password so that they will be able to view the data inside the manager page.
Once the manager have viewed and obtained all the relevant data, they can Log Out of the manager page. Thus, unauthorised people will not be able to get access to the data recorded. Other users will not be able to enter directly using a URL after logging out.
I have also significantly extended the basics of PHP because how a Login/Log Out page is done and used has not been covered in both the lectures and tutorials. Furthermore, to create a Login/Log Out page is also not a basic requirement in this assignment.
This is the hyperlink to where I have used this feature in my website.
<a href="manager.php" target="_blank">Login/Log Out page</a>
</p>

<br>

<!-- I learned this technique from this Youtube website https://www.youtube.com/watch?v=AoBob28lv0g-->


<p style="font-size:19px"> For the second enhancement, I did the Age Checker for the elderly(old people) in my website because if someone who wants to apply for the job is old (eg: 70 years old), they have a high tendency to forget basic things just like their age. 
Therefore, I made it as an enhancement at the top section of my page, so that they will not waste their time and effort to fill up the whole form and wait until the end (after clicking the 'apply' button) only then there is an error. 
It is important for a website to have this features because people who are old (eg: 50 to 80 years old) can still apply for a job in this company. To briefly explain how this Age checker works on my website is that, 
the user can input their date of birth in the top of the page (apply.php) and once the user has entered, it will display their age and it will also remind the old people of their age and whether they can still apply for a job in this company or not.
Thus, the elderly people will not just enter their particulars without knowing.
I have also significantly extended the basics of PHP because how a Age checker is done and used has not been covered in both the lectures and tutorials. Furthermore, to create a Age checker for the elderly is also not a basic requirement in this assignment.
This is the hyperlink to where I have used this feature in my website.
<a href="apply.php#agechecker" target="_blank"> Age Checker for the elderly </a>
</p>

<br>

<!-- I learned this technique from this Youtube website https://www.youtube.com/watch?v=MlJVt3rTj1Q -->


<p style="font-size:19px"> For the last enhancement, I did the Sorting the Order of Selected Fields in my website because it will be easier for the manager to track, obtain and analyze the data recorded in the database. 
How this enhancement works is that, the manager can choose to sort the data according to the fields such as Job Ref Number, First and Last name which essentially will change the state and status as well. 
I have also significantly extended the basics of PHP because how Sorting the Order of Selected Fields is done and used has not been covered in both the lectures and tutorials. Furthermore, to create a Sorting the Order of Selected Fields is also not a basic requirement in this assignment.
This is the hyperlink to where I have used this feature in my website.
<a href="manager.php#sort" target="_blank"> Sorting the Order of Selected Fields</a>
</p>

<br>

<hr>
<?php
include_once "footer.inc";
?>

</body>

</html>