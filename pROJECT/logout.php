<?php 
    session_start();
    session_destroy();
    header("location: http://localhost/project/Home/homepage.php");
?>