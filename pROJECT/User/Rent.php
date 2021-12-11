<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="BSR.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<img
  src="bg2.jpeg"
  style="width: 100%; height: 100%;z-index: -1;position:fixed;top:0px;left:0px;"
  
/>
    <div class="topnav" id="myTopnav">
        <img src="25694.png" alt="Home" style="cursor: pointer; position: absolute; left: 20px; height: 50px;" onclick="location.href = 'http://localhost/project/Home/homepage.php'">
        <a href="http://localhost/project/User/Buy.php" >Buy</a>
        <a style="background-color:black;color:white;">Rent</a>
        <a href="http://localhost/project/User/PG.php">PG</a>
        
        <?php
            session_start();
            if(isset($_SESSION['user'])) {
                echo "<a href='http://localhost/project/logout.php' style='position: relative; left: 35.6%;'>Logout</a>";
                echo<<<END
                    <img src="http://localhost/project/Home/prof-icon2.png" alt="Profile"  style="cursor: pointer; position: absolute; left: 94%; height: 48px; margin-top: 1.1px;" onclick="location.href = 'http://localhost/project/User/master_profile.php'">
                    END;
            }
            else{
                echo "<a href='http://localhost/project/Login/login.php' style='position: relative; left: 40%;'>Login</a>";
            }
        ?>
    </div>
    <div class="searchbox">
        <div class="search-container">
            <form action="Rent.php" method="GET">
                <input type="text" placeholder="Enter City.." name="search">
                <button type="submit" name="submit_button"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div name="spacer" style="margin-top: 5%"></div>



    <div>
    <?php
            $conn = mysqli_connect("localhost","root","1111","project");

            if(isset($_GET["submit_button"])){    
 
                $city = isset($_GET["search"])? $_GET["search"]:"";


                if ($city==''){
                    echo '<script> alert("Enter a city");</script>';
                }
                else
                {
                    $result_res = mysqli_query($conn,"select Price,type_of_property,Nearest_railway,Nearest_airport,nearest_hospital,address,description , img_path from Property where city = '$city' AND offered_for = 'Rent' ");
                    $temp;
                    while($temp = mysqli_fetch_assoc($result_res))
                    {   
                        $temp_path=$temp['img_path'];
                        $temp_address=$temp['address'];
                        $temp_Nearest_railway=$temp['Nearest_railway'];
                        $temp_Nearest_airport=$temp['Nearest_airport'];
                        $temp_nearest_hospital=$temp['nearest_hospital'];
                        $temp_description=$temp['description'];
                        $temp_type=$temp['type_of_property'];
                        $temp_price=$temp['Price'];
                        echo(" <div class='individual_property' >


                                    <div class='image_div'>
                                    <div> <image src='$temp_path' class='property_image'></div>
                                    </div>
                    
                                    <div style='width:45%;margin-top:5px;'>  

                                    <div> Address : $temp_address </div>
                                    <div> Nearest Railwaystation : $temp_Nearest_railway </div>
                                    <div> Nearest Airport : $temp_Nearest_airport </div>
                                    <div> Nearest Hospital : $temp_nearest_hospital </div>
                                    <div> Miscellaneous : $temp_description </div>
                                    
                                    </div>

                                    <div style='display:flex;width:25%'>

                                    <div style='width:50%;text-align:center;'>
                                    <div style='margin-top:49%'>$temp_type : </div>
                                    </div>
                                    <div style='width:45%;text-align:center;'>
                                    <div style='margin-top:55%'>₹$temp_price</div>
                                    </div>     
                                
                                </div>
                                    </div> ");
                    }
                }     }       
        ?>
    </div>
</body>
</html>
