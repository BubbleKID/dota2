<?php
session_start();
include 'idconvert.php';
define ('API_KEY','7F01018BA3A364C2B521AC080CB7B3C3');

if(isset($_SESSION['dota2id']))
{
	//$dota2id= $_GET['id'];
	$dota2id=$_SESSION['dota2id'];
	$playerid=MAKE_64_BIT($dota2id);
	
//echo "设置".$dota2id."    ".$playerid;
}
else
{
	$dota2id=$_GET['id'];
	$playerid=MAKE_64_BIT($dota2id);
	$_SESSION['dota2id']=$dota2id;
	
	
//echo "未设置". $dota2id;
}

	//$dota2id=$_GET['id'];
	//$_SESSION['dota2id']=$dota2id;


//if(isset($_SESSION['playerid']))
//{
	//$playerid=MAKE_64_BIT($_GET['id']);
	//$playerid=$_SESSION['playerid'];
//}
//else
//{
//	$playerid=MAKE_64_BIT($_GET['id']);
	//$_SESSION['playerid']=$playerid;
//}





//

//steamids=76561198157747566
$url = "https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=7F01018BA3A364C2B521AC080CB7B3C3&steamids=".$playerid; 
$lastmatch ="https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/V001/?key=7F01018BA3A364C2B521AC080CB7B3C3&account_id=".$playerid."&matches_requested=1";
//echo " last";
//echo $lastmatch;

$contents = file_get_contents($url); 
//如果出现中文乱码使用下面代码 
//$getcontent = iconv("gb2312", "utf-8",$contents); 
//echo $contents; 
 
$arr2=json_decode($contents,TRUE);
//$json_string =json_encode($arr2) ;
//echo "<script>";
//echo "getProfile($contents)";
//echo "</script>";
//echo "<pre>";

//print_r($arr2);
// $arr2['response']['players'][0]['steamid'];

//print $arr2['response']['players'][0]['avatarmedium'];
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
		<li role="presentation" class="active"><a href="accdetail.php">Account Summary</a></li>
		<li role="presentation"><a href="matches.php">Matches</a></li>
		<li class="disabled" role="presentation"><a href="matchdetail_model.php">Match Detail</a></li>
		<li role="presentation"><a href="recommendation.php">Recommendation</a></li>
		</ul>
		<!-img src= http://media.steampowered.com/steamcommunity/public/images/avatars/a1/a193c5c95c7126166224b87431c2cda91a515fe7_medium.jpg" class="img-circle"->
		
        <h5>
		
		<img src="<?php print $arr2['response']['players'][0]['avatarmedium'];?>" class="img-circle">
		
		<p>Name: <?php print $arr2['response']['players'][0]['personaname'];?></p>
		
		<p>Steam ID: <?php print $arr2['response']['players'][0]['steamid'];?></p>
		<p>Dota2 ID: <?php echo $dota2id;?></p>
		</h5>
		
		
    </div> <!-- /container -->

	
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

