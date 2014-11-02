<?php



session_start();


unset($_SESSION['dota2id']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dota Mine</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>



<body> 
 

    <nav  class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
      <div class="container">	
		<div class="navbar-inner">
		  <button type="button"  class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Dota Mine</a>
		</div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
     </div>
    </nav>

    <div class="container" >

        <center><h1><center>Dota2 Player Search</h1></center>
		
		
        <center><p>Version 0.04</p></center>
		<div >
			<center>
			<form class="form-search " method="get" action="accdetail.php" >
				<input class="form-control input-lg" name="id" type="text" placeholder="输入dota2 ID" /> 
				</p>
				<button class="btn btn-info btn-lg"  type="submit">查询</button>
				
			</form>
			</center>
		</div>
		
		
		
		<!-- 16:9 aspect ratio -->
		<!--div  class="embed-responsive embed-responsive-16by9">
			<iframe width="640" height="360" class="embed-responsive-item" src="http://staticlive.douyutv.com/common/share/play.swf?room_id=59813"></iframe>
		</div-->
		
		
    </div> <!-- /container -->
	
	
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

