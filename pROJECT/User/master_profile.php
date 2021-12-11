<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="master_profile.css">
</head>

<body style = ' '>
<img
  src="testbg.jpg"
  style="width: 100%; height: 100%;z-index: -1;position:absolute;top:0px;left:0px;"
  
/>
    <div class="topnav">
        <img src="25694.png" alt="Home" style="cursor: pointer; position: absolute; left: 20px; height: 50px;" onclick="location.href = 'http://localhost/project/Home/homepage.php'">
        <a href="http://localhost/project/user/profile.php" target='Lower_Frame'>Profile</a>
        <a href="http://localhost/project/user/listing.php" target='Lower_Frame'>List new Property</a>
        <a href="http://localhost/project/user/properties.php" target='Lower_Frame'>My Listed Properties</a>
        <a href='http://localhost/project/logout.php' style='position: relative; left: 33%;'>Logout</a>
    </div>

    <div >
        <div>
            <iframe frameBorder="0" src="http://localhost/project/User/profile.php" name='Lower_Frame' style='height:680px; width:99.5%;'></iframe>
        </div>
    </div>
</body>
</html>
<?php 

?>