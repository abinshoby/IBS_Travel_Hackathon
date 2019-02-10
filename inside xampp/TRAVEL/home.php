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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- Fontawesome  -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
    
      
		
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <link rel="stylesheet" type="text/css" href="css/home.css">
       
        <!-- Bootstrap JavaScript -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>     
        <!-- Add wow js lib -->
     
      
		
	 </head>
	 <body>
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
				   
<div class="container-fluid">
<script>
			function submitpost(){
			var exp = $("#userpost").val();
			var state = $("#poststate").val();
			var cost = $("#postcost").val();
			var title = $("#posttitle").val();
			var tag = $("#posttag").val();
			$("#hidden").load("addpost.php",{
				exp: exp,
				state: state,
				cost: cost,
				title: title,
				tag: tag
			})
			$("#hidden").load("feelings.php",{
				text: exp		  
			})
			}
			function upvote(x){
				$("#userid"+x).load("upvote.php",{
					id: x
				})
			}
			function showlang(x){
				$("#trans"+x).css({"display":"block"})
			}
			function sendtrans(x){
				var z = document.getElementById(x).textContent;
				var d = $("#language"+x).val();
				if(true){
					$("#"+x).load("translator.php",{
						text: z,
						to: d
					})
				}
			}
			function showcomm(x){
				$("#readcommentid"+x).css({"display":"block"})
			}
	$(document).ready(function(){
		$(".left").load("loadFeed.php")
	})
</script>			
	<div class="left">

		
		


		
		
		
		
	</div>
		
	<div class="right">
		
		<div class="row"></div>
		
	</div>
		
</div>               
		 
		 <!-- Footer -->
<!--
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
-->
        

	
	</body>
</html>
