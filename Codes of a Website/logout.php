<!DOCTYPE html>
<html lang="en">

<link href= "styles/stylephp.css" rel="stylesheet"/>

<?php
session_start();
if(session_destroy()){
    header("Location: login.php");
}

?>