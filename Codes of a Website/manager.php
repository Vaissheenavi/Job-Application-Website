<?php session_start();
if(empty($_SESSION['id'])){
    header('Location:login.php');
}



?>



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

<div class="containers">
        <a href="logout.php">Log Out</a>
</div>

<h2> All Applications </h2>


    <?php 
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $query = "";
    if (isset ($_POST["ID"])) {
        $ID = $_POST["ID"];
        $ID = sanitise_input($ID);
        $query = "SELECT * FROM `eoi` WHERE `JobRefNum` LIKE '%$ID%'";
    }
    else if (isset ($_POST["firstname"]) || isset ($_POST["lastname"])) {
        $FirstName = $_POST["firstname"];
        $LastName = $_POST["lastname"];
        $FirstName = sanitise_input($FirstName);
        $LastName = sanitise_input($LastName);
        $query = "SELECT * FROM `eoi` WHERE `firstname` LIKE '%$FirstName%' AND `lastname` LIKE '%$LastName%'";
    }

    if (isset($_POST['sort'])) {
        $sort = $_POST['sort'];
        
        if ($sort == "") {
                $query = "SELECT * from Applicant";
        } else if (isset($_POST['status'])) {
            $status = $_POST['status'];
        
            $query = "SELECT * from `eoi` WHERE status='$status' ORDER BY $sort";
        } else {
            $query = "SELECT * from `eoi` ORDER BY $sort";
        }
    }
    
    elseif (isset ($_POST["Delete"])) {
        $Delete = $_POST["Delete"];
        $Delete = sanitise_input($Delete);
        $query = "DELETE FROM `eoi` WHERE `JobRefNum` LIKE '%$Delete%'";
        require_once ("settings.php");      
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            echo "< p> Database collection failure </p>"; 
            }
            else {     
                $result = mysqli_query($conn, $query);  
                if ($result)
                    $query = "ALTER TABLE `eoi` AUTO_INCREMENT=1";
                    $result = mysqli_query($conn, $query);
                    header("location:manager.php");
                    exit();
            }
    }
    if (isset($_POST["EOInum"]) && isset($_POST["newStatus"])){
        $newStatus = $_POST["EOInum"];
        $updating = $_POST["newStatus"];
        if (!$newStatus=="" && !$updating==""){
            $query = "UPDATE eoi SET Status='$_POST[newStatus]' where EOInumber = '$_POST[EOInum]'";
            //echo $query;
            require_once ("settings.php"); 
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
            $result = @mysqli_query($conn, $query);
                if ($result){
                    //echo "<p> Successfully changed EOI num: $newStatus to $updating</p>";
                }
                else if (isset ($_POST["All"])) {
                    $query = "SELECT * FROM eoi";
                }
        }
    }
    if (isset ($_POST["All"])) {
        $query = "SELECT * FROM `eoi`";
    }        

    
    require_once ("settings.php");      
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        echo "< p> Database collection failure. </p>"; 
    }
    else {     
        if ($query == "")
            $query = "SELECT * FROM `eoi`";
        $result = @mysqli_query($conn, $query);      
        if(!$result) {
            echo "<p> Click on the 'View All Records' button below to see all applications. </p>";
        }
        else {
            echo "<table border=\"l\">\n";
            echo "<tr>\n"
            ."<th scope =\"col\"> EOInumber </th>\n"
            ."<th scope =\"col\"> JobRefNumber </ th>\n"
            ."<th scope =\"col\"> FirstName </th>\n"
            ."<th scope =\"col\"> LastName </th>\n"
            ."<th scope =\"col\"> StreetAddress </th>\n"
            ."<th scope =\"col\"> Suburb </ th>\n"
            ."<th scope =\"col\"> State </th>\n"
            ."<th scope =\"col\"> Postcode </th>\n"
            ."<th scope =\"col\"> Email </th>\n"
            ."<th scope =\"col\"> PhoneNumber </ th>\n"
            ."<th scope =\"col\"> Skills </th>\n"
            ."<th scope =\"col\"> OtherSkills </th>\n"
            ."<th scope =\"col\"> Status </th>\n"
            ."</tr>\n";

            while ($row = @mysqli_fetch_assoc($result)) {
                echo "<tr>\n";
                echo "<td>",$row["EOInumber"],"</td>\n";
                echo "<td>",$row["JobRefNum"],"</td>\n"; 
                echo "<td>",$row["FirstName"],"</td >\n"; 
                echo "<td>",$row["LastName"],"</td>\n";
                echo "<td>",$row["StreetAddress"],"</td>\n";
                echo "<td>",$row["Suburb"],"</td>\n"; 
                echo "<td>",$row["State"],"</td >\n"; 
                echo "<td>",$row["Postcode"],"</td>\n";
                echo "<td>",$row["Email"],"</td>\n";
                echo "<td>",$row["PhoneNumber"],"</td>\n"; 
                echo "<td>",$row["Skills"],"</td >\n"; 
                echo "<td>",$row["OtherSkills"],"</td>\n";
                echo "<td>",$row["Status"],"</td>\n";
                echo "</tr>\n";
            }
            echo "</table>\n";                 
        }
    }   
    ?>


<h2>List of All Applications</h2>
    <form action="manager.php" method="post">
        
        <input type="submit" value="View All Records" name="All"/>
    </form>




    <h2>Search based on ID </h2>
    <form action="manager.php" method="post">
        <p><label>Enter Job Reference Number: <input type="text" name="ID" /></label></p>
        <input type="submit" value="Search" />
    </form>

    <hr>
    
    <h2>Search based on First/Last Name </h2>
    <form action="manager.php" method="post">
        <p><label>Enter First Name: <input type="text" name="firstname" /></label></p>
        <p><label>Enter Last Name: <input type="text" name="lastname" /></label></p>

        <input type="submit" value="Search" />

        

        
    </form>

    <hr>

    <h2>Delete Application </h2>
    <form action="manager.php" method="post">
        <p><label>Enter a Job Reference Number : <input type="text" name="Delete" /></label></p>
        <input type="submit" value="Delete" />
    </form>
    

    
    <hr>

    <h2>Update the Status of Application </h2>
    <form action="manager.php" method="post">
    
    <p><label for="EOInum">EOInumber: </label><input type="text" name="EOInum" id="EOInum1" /></p>
        <p>
        <label for="">Status Upating</label>
        <input type="radio" name="newStatus" value="New" /> New
        <input type="radio" name="newStatus" value="Current" /> Current
        <input type="radio" name="newStatus" value="Final" /> Final
        </p>
        <input type="submit" value="Update" />
        <br>
    </form>

    <hr>

    <h2>Sort By: </h2>

    <form method='post' action='manager.php'>
    <select name='sort' id='sort'>
            <option value="" selected="selected">Please select</option>
            <option value='JobRefNum'>Job Reference No.</option>
            <option value='FirstName'>First name</option>
            <option value='LastName'>Last name</option>
            <option value='State'>State</option>
            <option value='Status'>Status</option>
    </select>
    <p>Status: 
        <label><input type='radio' name='status' value='New'>New</label>
        <label><input type='radio' name='status' value='Current'>Current</label>
        <label><input type='radio' name='status' value='Final'>Final</label>
</p>
    <input type='submit' name="sort_btn" value='Sort'>
</form>



    <hr>

<?php
include_once "footer.inc";
?>

</body>
</html>