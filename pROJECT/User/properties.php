<!DOCTYPE html>
<html lang="en">
<head>
    <title>Properties</title>
</head>
<?php 
    $conn = mysqli_connect("localhost","root","1111","project");
    session_start();
    if(!isset($_SESSION['user'])) {
        header("location: http://localhost/project/Login/login.php");
    }
    $user = $_SESSION["user"];
    $result_res = mysqli_query($conn,"select property_id,address,type_of_property,offered_for,price from Property where owner = '$user' ");
    $results = array();
    $temp;
    while($temp = mysqli_fetch_assoc($result_res))
    {
        array_push($results,$temp);
    }
    unset($temp);
?>

<body>
    
    <form action="properties.php" method="POST">
        <table style="width:100%;">
        <tr style="height:50px;background-color:#d9d9d9; " ;>
            <th>Property ID </th>
            <th>Address </th>
            <th>Type Of Property</th>
            <th>Offered For </th>
            <th>Price</th>
            <th>Check</th>
        </tr> 
        <?php 
            foreach($results as $result)
            {
                echo '<tr style="height:50px; background-color:#d9d9d9;"  >';
                foreach($result as $key => $val)
                    echo "<td style='text-align:center;' > $val </td>";
                $idd = $result['property_id'];
                echo(" <td style='text-align:center'> <input type='checkbox' name = 'exp[]' value=$idd onclick='console.log(id)'> </td>");
                echo('</tr>');
            }
        ?>
    </table>
        <input type="submit" name="Submit_Button" value="Delist" >
    </form>
    
</body>
</html>
<?php 
    if(isset($_POST["Submit_Button"])){
        $check= isset($_POST["exp"])?$_POST["exp"]:[];
        for($start=0;$start<count($check);$start++){
            $file_pointer=mysqli_query($conn,"select img_path from Property where property_id = $check[$start]");
            $file_pointer=mysqli_fetch_assoc($file_pointer);
            unlink($file_pointer['img_path']);
            mysqli_query($conn,"delete from Property where property_id = $check[$start]");
        }
        
        header("location: http://localhost/project/User/profile.php");
    }
?>

