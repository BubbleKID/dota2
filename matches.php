<?php

include 'idconvert.php';



define ('API_KEY','7F01018BA3A364C2B521AC080CB7B3C3');
$dota2id=109883310;
//$dota2id= $_GET['id'];
//$playerid=MAKE_64_BIT($_GET['id']);
$playerid=MAKE_64_BIT(109883310);

//https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/v001/
//steamids=76561198157747566
$url = "https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/v001/?key=7F01018BA3A364C2B521AC080CB7B3C3&account_id=".$dota2id."&matches_requested=10";; 
//$lastmatch ="https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/V001/?key=7F01018BA3A364C2B521AC080CB7B3C3&account_id=".$playerid."&matches_requested=1";
//echo " last";
//echo $lastmatch;

$contents = file_get_contents($url); 
//如果出现中文乱码使用下面代码 
//$getcontent = iconv("gb2312", "utf-8",$contents); 
//echo $contents; 
 
$arr=json_decode($contents,TRUE);



$matchnum = count($arr['result']['matches']);//比赛场数

//echo $matchnum;
function matchout($arr,$matchnum)
{
	for($i=1;$i<$matchnum;$i++)
	{

		$matchid=$arr['result']['matches'][$i]['match_id'];
		echo  "比赛ID: "."<a href='matchdetail_model.php?id=".$matchid."'>".$matchid."</a>";
		echo "</p>";

	}
}

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
          <a class="brand" href="index.php">Dota Mine</a>
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
		<ul class="nav nav-pills" role="tablist">
		<li role="presentation" ><a href="#">Account Summary</a></li>
		<li role="presentation"class="active" ><a href="matches.php">Matches</a></li>
		<li role="presentation"><a href="recommendation.php">Recommendation</a></li>
		</ul>
		<!-img src= http://media.steampowered.com/steamcommunity/public/images/avatars/a1/a193c5c95c7126166224b87431c2cda91a515fe7_medium.jpg" class="img-circle"->
		
        <h5>
		
		<!-img src="<?php //print $arr2['response']['players'][0]['avatarmedium'];?>" class="img-circle"->
		
		<?php matchout($arr,$matchnum);?>
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