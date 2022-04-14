
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

<h1> Manager's Login Page </h1>
<p> Username & Password: p.vaissheenavi </p>

<center>
<form method="post" action="login process.php"> 
        <input type="text" id="user" name="username" placeholder="Username"/>
        </hr>
        <input type="text" id="pass" name="password" placeholder="Password"/>
        </hr>
        <button type="submit" id="btn" name="login" default>Login</button>
</form>
</center>












<hr>

<?php
include_once "footer.inc";
?>

</body>
</html>