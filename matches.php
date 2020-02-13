<?php
session_start();
include 'idconvert.php';
define('API_KEY', '7F01018BA3A364C2B521AC080CB7B3C3');
$dota2id = $_SESSION['dota2id'];
//$dota2id= $_GET['id'];
//$playerid=MAKE_64_BIT($_GET['id']);
//$playerid=MAKE_64_BIT(109883310);
$playerid = MAKE_64_BIT($_SESSION['dota2id']);
//https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/v001/
//steamids=76561198157747566
$url = 'https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/v001/?key=7F01018BA3A364C2B521AC080CB7B3C3&account_id='.$dota2id.'&matches_requested=10';
//$lastmatch ="https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/V001/?key=7F01018BA3A364C2B521AC080CB7B3C3&account_id=".$playerid."&matches_requested=1";
//echo " last";
//echo $lastmatch;

$contents = file_get_contents($url);
//如果出现中文乱码使用下面代码
//$getcontent = iconv("gb2312", "utf-8",$contents);
//echo $contents;

$arr = json_decode($contents, true);

//$matchnum = count($arr['result']['matches']);//比赛场数

//echo $matchnum;
function matchout($arr, $matchnum)
{
    for ($i = 0; $i < 10; $i++) {
        $matchid = $arr['result']['matches'][$i]['match_id'];
        echo  '比赛ID:'.($i + 1)."  <a href='matchdetail_model.php?id=".$matchid."'>".$matchid.'</a>';
        echo '</p>';
    }
}

//echo "<pre>";

//print_r($arr2);

//echo "</pre>";

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
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
     </div>
    </nav>

    <div class="container" >
		</p>
		<ul class="nav nav-pills" role="tablist">
		<li role="presentation" ><a href="accdetail.php">Account Summary</a></li>
		<li role="presentation"class="active" ><a href="matches.php">Matches</a></li>
		<li class="disabled" role="presentation"><a href="matchdetail_model.php">Match Detail</a></li>
		<li role="presentation"><a href="recommendation.php">Recommendation</a></li>
		</ul>
		
       
		<h5>Last 10 Matches:</h5>
		<h5><?php matchout($arr, 10); ?></h5>
		
		
		
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
