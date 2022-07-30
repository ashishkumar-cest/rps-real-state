<?php 
		$conn = mysqli_connect("localhost","root","","rpsrealestate");
		if($conn->connect_error){
			echo "Not Connected";
		}
?>