
<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<?php 
    session_start();
    if(isset($_SESSION['user'])) {
        header("location: http://localhost/project/Home/homepage.php");
    }
?>
<script>
    if (<?php echo $_SESSION['signuperror']; ?>){
        alert('The email-id you entered already exists');
        <?php $_SESSION['signuperror']=false;?>
    }
</script>
<script src="jas.js"></script>
<body >
<img
  src="bg2.jpeg"
  style="width: 100%; height: 100%;z-index: -1;position:absolute;top:0px;left:0px;"
  
/>
    <div class="signup">
    <div class="inner_signup" >
        <form  action = "signup.php" onsubmit="return my_Validate()" method = "POST" name="signup_form">
            <input type="text" name = "username" placeholder = "NAME" required > <br> <br>
            <input type="email" name="email" placeholder = "EMAIL" required> <br> <br>
            <input type="password" name="pass" placeholder = "PASSWORD" required> <br> <br>
            <input type="password" name="cpass" placeholder = "CONFIRM PASSWORD"required> <br> <br>
            <input type="date" name="DOB" placeholder="DOB" required style="width:95%"> <br> <br>
            <input type="number" name="age" placeholder="AGE" required> <br> <br>
            +91 <input type="text" name="phone" placeholder="Phone_No :" required style="display: inline-block" size=15> <br> <br>
            <input type="submit" name="submit_button">
        </form>
   
        <p style="position: relative; "><a href="http://localhost/project/Login/login.php"> Already a user? Sign In</a></p>
    </div>
    
    </div>
    
</body>
</html>
<?php 

    $conn = mysqli_connect("localhost","root","1111","project");
    if(!(isset($_SESSION['signuperror']))){
        $_SESSION['signuperror']=false;
    }
    if(isset($_POST["submit_button"])) //if submit button is pressed
    {
        $email = isset($_POST["email"])? $_POST["email"]:"";
        $name = isset($_POST["username"]) ? $_POST["username"] : "";
        $password=isset($_POST["pass"])? $_POST["pass"]:"";
        $dob=isset($_POST["DOB"])? $_POST["DOB"]:"";
        $phone=isset($_POST["phone"])?$_POST["phone"]:"";
        $age=isset($_POST["age"])?$_POST["age"]:"";
        $confirm_password = isset($_POST["cpass"])?$_POST["cpass"]:"";
        
        $query2="insert into user values('$name','$phone','$dob',$age,'$email','$password')";
        Check_email_in_database($conn,$email,$query2);
    }

    function Check_email_in_database($conn,$email,$query2)
    {
        $query = "select email from user where email = '$email' ";
        $qresult = mysqli_query($conn,$query);
        if (mysqli_num_rows($qresult)==0)
        {
            $_SESSION['user']=$email;
            mysqli_query($conn,$query2);
            header("location:http://localhost/project/Home/homepage.php");
        }
        else{
            $_SESSION['signuperror']=true;
            header("location:http://localhost/project/signup/signup.php");
        }
    }
?>

