<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <link rel="stylesheet" href="prof.css">
</head>

<body style = 'height: 100%;'>

    <?php 
        session_start();
        if(!isset($_SESSION['user'])) {
            header("location: http://localhost/project/Login/login.php");
        }
        $email = $_SESSION['user'];
    ?>
    
    <table id="profile">
        <tr>
            <td style="position: relative; left: 31.5% ; "> <img src="prof-icon.png" width="164px" height="136px"></td>
        </tr>
        <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        <tr>
            <td> Name : </td>
            <td> <?php
                    $conn = mysqli_connect("localhost", "root", "1111", "project");
                    $query = "SELECT person_name from user where email= '$email'";
                    $res = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($res);
                    echo ($row[0]);
                    ?>
            </td>
        </tr>
        <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        <tr>
            <td> Phone :  </td>
            <td> <?php
                    $conn = mysqli_connect("localhost", "root", "1111", "project");
                    $query = "SELECT phone from user where email= '$email'";
                    $res = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($res);
                    echo ($row[0]);
                    ?>
            </td>
        </tr>
        <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        <tr>
            <td> Date of Birth :  </td>
            <td> <?php
                    $conn = mysqli_connect("localhost", "root", "1111", "project");
                    $query = "SELECT dob from user where email= '$email'";
                    $res = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($res);
                    echo ($row[0]);
                    ?>
            </td>
        </tr>
        <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        <tr>
            <td> Age :  </td>
            <td> <?php
                    $conn = mysqli_connect("localhost", "root", "1111", "project");
                    $query = "SELECT age from user where email= '$email'";
                    $res = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($res);
                    echo ($row[0]);
                    ?>
            </td>
        </tr>
        <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        <tr>
            <td> Email-ID/User-name:  </td>
            <td> <?php
                    $conn = mysqli_connect("localhost", "root", "1111", "project");
                    $query = "SELECT email from user where email= '$email'";
                    $res = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($res);
                    echo ($row[0]);
                    ?>
            </td>
        </tr>
    </table>


</body>

</html>