<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dota Mine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/ico/favicon.png">
  </head>



<BODY  > 
 

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
		
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Dota Mine</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container" >

        <h1>Dota2 Player Search</h1>
		
		
        <p>Version 0.02</p>
		<div >
			<form class="form-search" method="get" action="accdetail.php" >
				<input class="input-medium search-query" name="id" type="text" placeholder="输入dota2 ID" /> 
				<button class="btn btn-info"  type="submit">查询</button>
				
			</form>
		</div>
		
		
		
		<!-- 16:9 aspect ratio -->
		<div  class="embed-responsive embed-responsive-16by9">
			<iframe width="640" height="360" class="embed-responsive-item" src="http://staticlive.douyutv.com/common/share/play.swf?room_id=59813"></iframe>
		</div>
		
		
    </div> <!-- /container -->
	
	
	
	
	<!--div class="container" >

        <h3>Steam ID convert</h3>
        
		<div class="span12">
			<form class="form-search" method="get" action="idconvert.php" >
				<input class="input-medium search-query" name="steamid" type="text" placeholder="输入steam 64位ID" /> 
				<button class="btn "  type="submit">转换</button>
				
			</form>
		</div>
		
    </div> <!-- /container --

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>

<?php

define ('API_KEY','7F01018BA3A364C2B521AC080CB7B3C3');
define ('LANGUAGE', 'en_us');



//$url = "https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=7F01018BA3A364C2B521AC080CB7B3C3&steamids=76561198157747566"; 
//$contents = file_get_contents($url); 
//如果出现中文乱码使用下面代码 
//$getcontent = iconv("gb2312", "utf-8",$contents); 
//echo $contents; 
 
//$arr2=json_decode($contents,TRUE);
//$json_string =json_encode($arr2) ;
//echo "<script>";
//echo "getProfile($contents)";
//echo "</script>";
//echo "<pre>";

//print_r($arr2);
//print $arr2['response']['players'][0]['steamid'];;
//echo "</pre>";


?>
