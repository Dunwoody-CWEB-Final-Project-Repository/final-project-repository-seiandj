<?php
  session_start();
//Database Configuration File
include('config/database.php');
error_reporting(0);

  if(isset($_POST['login']))
  {

    // Getting username/ email and password
    $uname=$_POST['username'];
    $password=$_POST['password'];
    // Fetch data from database on the basis of username/email and password
    $sql ="SELECT username,email,password FROM user WHERE (username=:usname || email=:usname)";
    $query= $con -> prepare($sql);
    $query-> bindParam(':usname', $uname, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach ($results as $row) {
$hashpass=$row->password;
}
//verifying Password
if (password_verify($password, $hashpass)) {
$_SESSION['userlogin']=$_POST['username'];
    echo "<script type='text/javascript'> document.location = 'tradegoods.php'; </script>";
  } else {
echo "<script>alert('Wrong Password');</script>";

  }
}
//if username or email not found in database
else{
echo "<script>alert('User not registered with us');</script>";
  }

}
?>


<html>
<head>
<meta charset="utf-8">
<title>Shadowlands Auctioneer Login</title>
<link href="css/loginStyleSheet.css" rel="Stylesheet">
</head>
<!-- Login form created by https://codepen.io/AlexXxCornejo/pen/mjMNPQ --> 
<body class="main-bg">
        <div class="login-container text-c animated flipInX">
                <div>
                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                </div>
                    <h3 class="text-whitesmoke">Shadowlands Auctioneer</h3>
                    <p class="text-whitesmoke">Login</p>
                <div class="container-content">
                    <form class="margin-t" id="loginForm" method="post">

                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="*********" required="">
                        </div>

                        <button type="submit" class="form-button button-l margin-b" name="login" >Sign In</button>

                        <p class="text-whitesmoke text-center"><small>Do not have an account?</small></p>
                        <a class="text-darkyellow" href="signup.php"><small>Create Account</small></a>
                
                    </form>
                    <a href="tradegoods.php" style="color:white;" >Trade Goods TEMPORARY LINK</a>
                    <!--<p class="margin-t text-whitesmoke"><small> Andrew Seigworth &copy; 2021</small> </p> -->
                </div>
            </div>
</body>
</html>