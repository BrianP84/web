<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "prenda";
	
    $con=mysqli_connect($servername,$username,$password,$database);
    if(!$con)
    {
        die(" Connection Error ");
    }
?>