
<?php
session_start();
require_once('connect.php');

if(isset($_SESSION['username']) & !empty($_SESSION['username'])){
  //$smsg = "Already Logged In" . $_SESSION['username'];
  header('location: http://localhost/TRAVEL/home.html');
}

if(isset($_POST) & !empty($_POST)){
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $password = md5($_POST['password']);
  $sql = "SELECT * FROM `user` WHERE ";
  if(filter_var($username, FILTER_VALIDATE_EMAIL)){
    $sql .= "email='$username'";
  }else{
    $sql .= "username='$username'";
  }
  $sql .= " AND password='$password' ";
  $sql;
  $res = mysqli_query($connection, $sql);
  $count = mysqli_num_rows($res);

  if($count == 1){
    $_SESSION['username'] = $username;
    header('location: login.php');
  }else{
    $fmsg = "User does not exist";
  }
}
?>
<!DOCTYPE html>
<html>


    <head>
    
        <title>SaFaari </title>
        
        <meta charset="utf-8">
        
        <meta name="description" content="">
        
        <meta name="keywords" content="">
        
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
                        
                            <h2 style="padding-left:-20px;"> <div  >User Login Form </div> </h2>
							<h3 style="margin-left:250px">
      <?php if(isset($fmsg)){  echo $fmsg;} ?></h3>
							</div>
                    
                    
                    
                    </div>
                
                </div>
            
            
            </div>
                        <div class="row" style="margin-top:40px;">
                             <div class="col-sm-4"></div>	
                              <div class="col-sm-5">							 
			                    <form class="form-signin" method="POST">
      
 <input type="text" name="username" id="username" class="form-control" placeholder="Username or Email">
        <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">login</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
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
