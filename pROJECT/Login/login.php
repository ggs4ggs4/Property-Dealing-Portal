<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>
<?php 
    session_start();
    if(isset($_SESSION['user'])) {
        header("location: http://localhost/project/Home/homepage.php");
    }
?>
<script>
    if (<?php echo $_SESSION['loginerror']; ?>){
        alert('The email-id and password you entered do not match');
        <?php $_SESSION['loginerror']=false;?>
    }
</script>

<body>
<img
  src="bg2.jpeg"
  style="width: 100%; height: 100%;z-index: -1;position:absolute;top:0px;left:0px;"
  
/>
<link rel="stylesheet" href="loginstyle.css">
<div class="signup">
    <div class="inner_signup">
        <form  action = "login.php" method = "POST" name="signup_form">
             <input type="email" name="email" placeholder="EMAIL :" required> <br> <br>
             <input type="password" name="pass" placeholder="PASSWORD :" required> <br> <br>
            <input type="submit" name="submit_button">
        </form>
        <br>      
    <p style="position: relative; "> <a href="http://localhost/project/Signup/signup.php"> New Here? Sign Up</a> </p>
    </div>
    
</div>
</body>
</html>

<?php
 
   $conn = mysqli_connect("localhost","root","1111","project");
   if(!(isset($_SESSION['loginerror']))){
        $_SESSION['loginerror']=false;
   }
   if(isset($_POST["submit_button"])) //if submit button is pressed
   {
       $email=isset($_POST['email'])?$_POST['email']:"";
       $pass=isset($_POST['pass'])?$_POST['pass']:"";
       $res=mysqli_query($conn,"select * from user where email='$email' and password = '$pass'");
       
       if(mysqli_num_rows($res)==1){
            $_SESSION['user']=$email;
            header("location:http://localhost/project/Home/homepage.php"); 
           }else{
            $_SESSION['loginerror']=true;
            header("location:http://localhost/project/Login/login.php");
        }
    }
?>
