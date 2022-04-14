<?php

$conn = @mysqli_connect("localhost", "root","", "login");

//to check connection
if(mysqli_connect_error())
{
    echo "Failed to connect to database:" . mysqli_connect_error();
}
?>