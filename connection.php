<?php

$connection=mysqli_connect("localhost","root","");
if(!$connection)
{die("connection failed".mysqli_connect_error());}
$db=mysqli_select_db($connection,"hostel");

?>