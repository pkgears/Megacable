<?php 
	if(isset($_SESSION["usuario"])){
		echo " ";
	}
	else{
		header("location:../error/error1002x.php");
		//exit();
	}

 ?>