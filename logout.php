<?php

	session_start(); //initialization
	session_unset();  //unset All
        session_destroy(); // destroy All
      
        header("Location:index.php");
	

?>