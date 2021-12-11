<!DOCTYPE html>
<head>
<?php 
    session_start();
    if(!isset($_SESSION['user'])) {
        header("location: http://localhost/project/Login/login.php");
    }
?>
    <title>Listing</title>
<link rel="stylesheet" href="listingl.css">
</head>
<body>-
    
    <div id = "Listing_Form" style="margin-top: 2.5%;">
        <form action="listing.php" method="POST" enctype="multipart/form-data">
        <table style="width:100%">
            <tr>
            <td class="headings"> Type of Property </td> 
            <td> <input type="radio" name="prop_type" value="2BHK" > 2BHK  
             <input type="radio" name="prop_type" value="3BHK" > 3BHK  
             <input type="radio" name="prop_type" value="4BHK"> 4BHK  
             <input type="radio" name="prop_type" value="Bungalow"> Bungalow</td>
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
            <td class="headings"> Offered For </td> 
            <td> <input type="radio" name="offered_for" value="PG"> PG &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="offered_for" value="Rent"> RENT
            <input type="radio" name="offered_for" value="Sale"> SALE </td>
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
             <td class="headings">Price</td>
             <td><input type="number" name="price_set" style = "width:340px" required></td>
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
             <td class="headings">Nearest Railway</td>
             <td><input type="text" name="nearest_railway" style = "width:340px" required></td>
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
             <tr>
             <td class="headings">Nearest Airport</td> <td><input type="text" name="nearest_airport" style = "width:340px" required></td>
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
            <td class="headings">Nearest Hospital</td> <td><input type="text" name="nearest_hospital" style = "width:340px" required></td>
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
            <td class="headings">Address</td> <td><input type="text" name="address" style = "width:340px" required></td>
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
            <td class="headings">City</td> <td><input type="text" name="city" style = "width:340px" required></td>
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
            <td class="headings">Image</td> <td><input type="file" name="image" id='image' style = "width:340px" required></td>
            </tr>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
            <td class="headings">Additional Details</td> <td><textarea name="description" rows= "7" style = "width:340px; resize: none;" > </textarea></td>
            </tr>
            </table>
        <input type="submit" name="Submit_Button" style="position: relative; left: 45%; font-weight: bold;" value="List">
        </form>
    </div>
</body>
</html>
<?php 
    $con=mysqli_connect("localhost","root","1111","project");
    if(isset($_POST['Submit_Button']))
    {
        $prop_type=isset($_POST['prop_type'])?$_POST['prop_type']:"";
        $offered=isset($_POST['offered_for'])?$_POST['offered_for']:"";
        $price=isset($_POST['price_set'])?$_POST['price_set']:'';
        $nearest_railway=isset($_POST['nearest_railway'])?$_POST['nearest_railway']:"";
        $nearest_airport=isset($_POST['nearest_airport'])?$_POST['nearest_airport']:"";
        $nearest_hospital=isset($_POST['nearest_hospital'])?$_POST['nearest_hospital']:"";
        $address=isset($_POST['address'])?$_POST['address']:"";
        $city=isset($_POST['city'])?$_POST['city']:"";
        $description=isset($_POST['description'])?$_POST['description']:"";
        $email=$_SESSION['user'];

        $query = "SELECT COALESCE(MAX(property_id), 0) FROM property";
        $res = mysqli_query($con,$query);
        $res = mysqli_fetch_row($res)[0];
        $res=$res+1;
        echo basename($_FILES['image']['name']);
        $path = savefile($res);
        echo $res;
        echo $price;
        echo( $prop_type . " ". $offered . " ". $price . " ". $nearest_railway . " ". $nearest_airport. " ". $nearest_hospital. " ". $address. " ". $address. " ". $city. " ". $email);
        $insert_listing_data ="Insert into Property values('$res','$email','$prop_type','$offered','$price','$nearest_railway','$nearest_airport','$nearest_hospital','$address','$city','$description','$path')";
        mysqli_query($con,$insert_listing_data);
        header("location:http://localhost/project/User/profile.php");
    }
    function savefile($path){
            $target_dir = "images/"; 
            $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
            $target_file = $target_dir.$path.'.'.$imageFileType;
            echo($target_file);
            if($imageFileType!='png' && $imageFileType!='jpeg' && $imageFileType!='jpg'){
                header("");//wrong type error page
            }
            else{
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            }
            return $target_file;
    }   
?>

