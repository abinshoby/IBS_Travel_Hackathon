<?php

require_once('connect.php');
if(isset($_POST) &!empty($_POST))
{
$username = mysqli_real_escape_string($connection, $_POST['username']);
$verification_key = md5($username);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = md5($_POST['password']);
$passwordagain = md5($_POST['passwordagain']);

if($password == $passwordagain){

$fmsg = "";
$usernamesql = "SELECT * FROM `user` WHERE username='$username'";
$usernameres = mysqli_query($connection, $usernamesql);
$count = mysqli_num_rows($usernameres);
if($count == 1){
$fmsg .= "Username exists in Database, please try different user name";
}

else{
	$emailsql = "SELECT * FROM `user` WHERE email='$email'";
$emailres = mysqli_query($connection, $emailsql);
$emailcount = mysqli_num_rows($emailres);
if($emailcount == 1){
$fmsg .= "Email exists in Database, please reset your password";}
else
{
$sql = "INSERT INTO `user` (username, email, password) VALUES ('$username', '$email', '$password')";
$result = mysqli_query($connection, $sql);
if($result){
$smsg = "User Registered succesfully";
}
else{
$fmsg .= "Failed to register user";
}
}
}
}else{
$fmsg = "Password not matching";
}
}
?>
<html>


    <head>
    
        <title>SaFaari </title>
        
        <meta charset="utf-8">
        
        <meta name="description" content="TKM COLLEGE OF ENGINEERING IEDC WEBSITE">
        
        <meta name="keywords" content="IEDC,INNOVATION,TKM,MAKER COMMUNITY">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        
         <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:500italic,600italic,600,700,700italic,300italic,300,400,400italic,800,900' rel='stylesheet' type='text/css'>
        
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,600italic,700,900' rel='stylesheet' type='text/css'>
      
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        
        <!-- Fontawesome  -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
        <!-- Animate CSS -->
        <link rel="stylesheet" type="text/css" href="css/animate.css">
		
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <link rel="stylesheet" href="css/indec2test.css">
	    <link rel="stylesheet" href="css/items.css">
       
       <!-- Bootstrap JavaScript -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
             
        <!-- Add wow js lib -->
        <script src="js/wow.min.js"></script>
      
        <!-- Custom Js -->
        <script src="js/custom.js"></script>
		
	 </head>
	 <body>
    
        <!-- Header -->
        <header class="header" id="HOME">
            
          <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
      <a class="navbar-brand page-scroll" href="#page-top"> <i class="fa fa-paper-plane-o"></i> SaFaari</a> </div>
    
   
  </div>
  <!-- /.container --> 
</nav>
 
		 </header>
		 
	
        
		   <div class="contact-us-form " style="margin-top:40px;">
                   <div class="container">
            
                <div class="row">
                
                    <div class="col-md-10 col-md-offset-1">
                    
                        <!-- About us Title & Description -->
                        <div class="section-title">
                        
                            <h2 style="padding-left:-20px;"> <div  >Registration Form </div> </h2>
							<h3 style="padding-left:60px"><?php if(isset($smsg)){  echo $smsg;} ?> 
      <?php if(isset($fmsg)){  echo $fmsg;} ?></h3>
							</div> 
                    
                    
                    
                    </div>
                
                </div>
            
            
            </div>
                       <div class="row" style="margin-top:40px;">
                             <div class="col-sm-4"></div>	
                              <div class="col-sm-5">							 
			                    <form class="form-signin" method="POST">
      
 <input type="text" name="username" id="username" class="form-control" placeholder="Username">
<span id="usernameResult"></span> 
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?php if(isset($email) & !empty($username)){ echo $email; } ?>" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Password Again</label>
        <input type="password" name="passwordagain" id="inputPassword" class="form-control" placeholder="Password Again" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
      </form>
		   
                        </div>
						 <br><br><br>
						 
						
                </div>
            </div>
 </div>
		<br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  
           
      
            
            
        
   
     

		 
		 <!-- Footer -->
        <footer class="footer">
        
            <div class="container">
            
                <div class="row">
                
                    <div class="col-md-6">
                    
                        <div id="copyright">
                            <p>POWERED BY<a href="#"> - DEVELOPERS</a></p>
                        </div>
                    </div>
                  
                
                
                </div>
            
            </div>
        
        
        </footer>
        

	
	</body>
</html>
