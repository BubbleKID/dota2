
<?php

include '/data/get_hero.php';


//KDA
function kda($arr,$playernum)
{
   $kills=$arr['result']['players'][$playernum]['kills'];
   $deaths=$arr['result']['players'][$playernum]['deaths'];
   $assists=$arr['result']['players'][$playernum]['assists'];
   
 if($kills+$assists!=0)
 {
  
  
	if($deaths==0)
	{
		$kda=$kills+$assists;
	}
	
	else
	{
		$kda=($kills+$assists)/$deaths;
	}
 }
 else
 {
	$kda=0;
 }
 
  return round($kda ,1);
}

//参战率
//(杀人数+助攻数)÷己方人头总数=参战率

function in_battle($arr,$playernum,$is_Radiant)
{
	$totalkills=0;
	$kills=$arr['result']['players'][$playernum]['kills'];
	$assists=$arr['result']['players'][$playernum]['assists'];
 
	if($is_Radiant=1)//天辉
	{
	
		for($i=0;$i<5;$i++)
		{
			$totalkills=$totalkills+$arr['result']['players'][$i]['kills'];
		}
		//echo $totalkills;
	}
	else//夜魇
	{
		for($i=5;$i<10;$i++)
		{
			$totalkills=$totalkills+$arr['result']['players'][$i]['kills'];
		}
	}
	if($totalkills==0||($kills+$assists)==0)
	{
		echo "0";
	}
	else
	{
		$in_battle=($kills+$assists)/$totalkills;
		echo round($in_battle*100)."%";
	}
}

//计算伤害百分比

function damage_per($arr,$playernum,$is_Radiant)
{

	$totaldamages=0;
	$damages=$arr['result']['players'][$playernum]['hero_damage'];

	if($is_Radiant=1)//天辉
	{
	
		for($i=0;$i<5;$i++)
		{
			$totaldamages=$totaldamages+$arr['result']['players'][$i]['hero_damage'];
		}
	}
	else//夜魇
	{
		for($i=5;$i<10;$i++)
		{
			$totaldamages=$totaldamages+$arr['result']['players'][$i]['hero_damage'];
		}
	}

	if($damages==0||$totaldamages==0)
	{
		echo "0";
	}
	else
	{
		$damage_per=$damages/$totaldamages;
		echo round($damage_per*100)."%";
	}
	


}


//物品


function show_items($arr,$playernum)
{
		
		for($i=0;$i<6;$i++)
		{
			echo itemout($arr['result']['players'][$playernum]['item_'.$i]);
		}

}

//$matchid=994504802;

$matchid=$_GET['id'];

$matchurl='https://api.steampowered.com/IDOTA2Match_570/GetMatchDetails/V001/?key=7F01018BA3A364C2B521AC080CB7B3C3&match_id='.$matchid;

$contents = file_get_contents($matchurl); 

 
$arr=json_decode($contents,TRUE);


//echo $arr['result']['players'][0]['hero_id'];

//heroout(74);


//cho "<pre>";
//print_r($arr);
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
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
     </div>
    </nav>

    <div class="container" >
	
	</p>
		<ul class="nav nav-pills" role="tablist">
		<li role="presentation"><a href="accdetail.php">Account Summary</a></li>
		<li role="presentation"><a href="matches.php">Matches</a></li>
		<li role="presentation" class="active" ><a href="matchdetail_model.php">Match Detail</a></li>
		<li role="presentation"><a href="recommendation.php">Recommendation</a></li>
		</ul>
  
  <div>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#080808;color:#222;background-color:#e8edff;}
.tg th{font-family:Arial, sans-serif;font-size:16px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#080808;color:#999;background-color:#222222;}
.tg .tg-0ord{text-align:right}
.tg .tg-ifyx{background-color:#D2E4FC;text-align:right}
.tg .tg-s6z2{text-align:center}
.tg .tg-vn4c{background-color:#D2E4FC}
</style>


<center>比赛ID: <?php echo $matchid;?></center>


<p></p>
<table class="tg"  align="center" style="undefined;table-layout: fixed; width: 829px">
<colgroup>
<col style="width: 39px">
<col style="width: 86px">
<col style="width: 95px">
<col style="width: 40px">
<col style="width: 65px">
<col style="width: 59px">
<col style="width: 64px">
<col style="width: 71px">
<col style="width: 80px">
<col style="width: 80px">
<col style="width: 80px">
<col style="width: 80px">
<col style="width: 200px">
</colgroup>
  <tr>
    <th class="tg-s6z2" colspan="13">天辉</th>
    <th class="tg-031e"></th>
  </tr>
 <tr>
    <td class="tg-vn4c">No</td>
    <td class="tg-vn4c">Player ID</td>
    <td class="tg-vn4c">Hero</td>
    <td class="tg-vn4c">KDA</td>
    <td class="tg-vn4c">参战率 </td>
	<td class="tg-vn4c">伤害</td>
    <td class="tg-vn4c">伤害%</td>
    <td class="tg-vn4c">正/反补</td>
    <td class="tg-vn4c">经验/分钟</td>
    <td class="tg-vn4c">金钱/分钟</td>
    <td class="tg-vn4c">建筑伤害</td>
    <td class="tg-vn4c">英雄治疗</td>
    <td class="tg-vn4c">物品</td>
  </tr>
  <tr>
    <td class="tg-031e">1</td>
    <td class="tg-031e"><?php echo $arr['result']['players'][0]['account_id']?></td>
    <td class="tg-031e"><?php heroout( $arr['result']['players'][0]['hero_id']); echo $arr['result']['players'][0]['level']?> </td>
    <td class="tg-031e"><?php echo kda($arr,0);?></td>
    <td class="tg-031e"><?php echo in_battle($arr,0,1)?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][0]['hero_damage']?></td>
    <td class="tg-031e"><?php echo damage_per($arr,0,1)?></td>
	<td class="tg-031e"><?php echo $arr['result']['players'][0]['last_hits']."/".$arr['result']['players'][0]['denies']?></td>
	<td class="tg-031e"><?php echo $arr['result']['players'][0]['xp_per_min']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][0]['gold_per_min']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][0]['tower_damage']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][0]['hero_healing']?></td>
	<td class="tg-031e"><?php echo show_items($arr,0)?></td>
  </tr>
  <tr>
    <td class="tg-vn4c">2</td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][1]['account_id']?></td>
    <td class="tg-vn4c"><?php heroout( $arr['result']['players'][1]['hero_id']); echo $arr['result']['players'][1]['level']?> </td>
    <td class="tg-vn4c"><?php echo kda($arr,1);?></td>
    <td class="tg-vn4c"><?php echo in_battle($arr,1,1)?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][1]['hero_damage']?></td>
    <td class="tg-vn4c"><?php echo damage_per($arr,1,1)?></td></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][1]['last_hits']."/".$arr['result']['players'][1]['denies']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][1]['xp_per_min']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][1]['gold_per_min']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][1]['tower_damage']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][1]['hero_healing']?></td>
	<td class="tg-vn4c"><?php echo show_items($arr,1)?></td>
  </tr>
  <tr>
    <td class="tg-031e">3</td>
    <td class="tg-031e"><?php echo $arr['result']['players'][2]['account_id']?></td>
    <td class="tg-031e"><?php heroout( $arr['result']['players'][2]['hero_id']); echo $arr['result']['players'][2]['level']?> </td>
    <td class="tg-031e"><?php echo kda($arr,2);?></td>
    <td class="tg-031e"><?php echo in_battle($arr,2,1)?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][2]['hero_damage']?></td>
    <td class="tg-031e"><?php echo damage_per($arr,2,1)?></td>
	<td class="tg-031e"><?php echo $arr['result']['players'][2]['last_hits']."/".$arr['result']['players'][2]['denies']?></td>
	<td class="tg-031e"><?php echo $arr['result']['players'][2]['xp_per_min']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][2]['gold_per_min']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][2]['tower_damage']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][2]['hero_healing']?></td>
	<td class="tg-031e"><?php echo show_items($arr,2)?></td>
  </tr>
  <tr>
    <td class="tg-vn4c">4</td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][3]['account_id']?></td>
    <td class="tg-vn4c"><?php heroout( $arr['result']['players'][3]['hero_id']); echo $arr['result']['players'][3]['level']?> </td>
    <td class="tg-vn4c"><?php echo kda($arr,3);?></td>
    <td class="tg-vn4c"><?php echo in_battle($arr,3,1)?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][3]['hero_damage']?></td>
    <td class="tg-vn4c"><?php echo damage_per($arr,3,1)?></td></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][3]['last_hits']."/".$arr['result']['players'][3]['denies']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][3]['xp_per_min']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][3]['gold_per_min']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][3]['tower_damage']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][3]['hero_healing']?></td>
	<td class="tg-vn4c"><?php echo show_items($arr,3)?></td>
  </tr>
  <tr>
    <td class="tg-031e">5</td>
    <td class="tg-031e"><?php echo $arr['result']['players'][4]['account_id']?></td>
    <td class="tg-031e"><?php heroout( $arr['result']['players'][4]['hero_id']); echo $arr['result']['players'][4]['level']?> </td>
    <td class="tg-031e"><?php echo kda($arr,4);?></td>
    <td class="tg-031e"><?php echo in_battle($arr,4,1)?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][4]['hero_damage']?></td>
    <td class="tg-031e"><?php echo damage_per($arr,4,1)?></td>
	<td class="tg-031e"><?php echo $arr['result']['players'][4]['last_hits']."/".$arr['result']['players'][4]['denies']?></td>
	<td class="tg-031e"><?php echo $arr['result']['players'][4]['xp_per_min']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][4]['gold_per_min']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][4]['tower_damage']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][4]['hero_healing']?></td>
	<td class="tg-031e"><?php echo show_items($arr,4)?></td>
  </tr>
</table>

<p></p>
<table class="tg"  align="center" style="undefined;table-layout: fixed; width: 829px">
<colgroup>
<col style="width: 39px">
<col style="width: 86px">
<col style="width: 95px">
<col style="width: 40px">
<col style="width: 65px">
<col style="width: 59px">
<col style="width: 64px">
<col style="width: 71px">
<col style="width: 80px">
<col style="width: 80px">
<col style="width: 80px">
<col style="width: 80px">
<col style="width: 200px">
</colgroup>
  <tr>
    <th class="tg-s6z2" colspan="13">夜魇</th>
    <th class="tg-031e"></th>
  </tr>
  <tr>
    <td class="tg-vn4c">No</td>
    <td class="tg-vn4c">Player ID</td>
    <td class="tg-vn4c">英雄</td>
    <td class="tg-vn4c">KDA</td>
    <td class="tg-vn4c">参战率 </td>
	<td class="tg-vn4c">伤害</td>
    <td class="tg-vn4c">伤害%</td>
    <td class="tg-vn4c">正/反补</td>
    <td class="tg-vn4c">经验/分钟</td>
    <td class="tg-vn4c">金钱/分钟</td>
    <td class="tg-vn4c">建筑伤害</td>
    <td class="tg-vn4c">英雄治疗</td>
    <td class="tg-vn4c">物品</td>
  </tr>
  <tr>
    <td class="tg-031e">1</td>
    <td class="tg-031e"><?php echo $arr['result']['players'][5]['account_id']?></td>
    <td class="tg-031e"><?php heroout( $arr['result']['players'][5]['hero_id']); echo $arr['result']['players'][5]['level']?> </td>
    <td class="tg-031e"><?php echo kda($arr,5);?></td>
    <td class="tg-031e"><?php echo in_battle($arr,5,2)?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][5]['hero_damage']?></td>
    <td class="tg-031e"><?php echo damage_per($arr,5,2)?></td>
	<td class="tg-031e"><?php echo $arr['result']['players'][5]['last_hits']."/".$arr['result']['players'][5]['denies']?></td>
	<td class="tg-031e"><?php echo $arr['result']['players'][5]['xp_per_min']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][5]['gold_per_min']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][5]['tower_damage']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][5]['hero_healing']?></td>
	<td class="tg-031e"><?php echo show_items($arr,5)?></td>
  </tr>
  <tr>
    <td class="tg-vn4c">2</td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][6]['account_id']?></td>
    <td class="tg-vn4c"><?php heroout( $arr['result']['players'][6]['hero_id']); echo $arr['result']['players'][6]['level']?> </td>
    <td class="tg-vn4c"><?php echo kda($arr,6);?></td>
    <td class="tg-vn4c"><?php echo in_battle($arr,6,2)?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][6]['hero_damage']?></td>
    <td class="tg-vn4c"><?php echo damage_per($arr,6,2)?></td></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][6]['last_hits']."/".$arr['result']['players'][6]['denies']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][6]['xp_per_min']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][6]['gold_per_min']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][6]['tower_damage']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][6]['hero_healing']?></td>
	<td class="tg-vn4c"><?php echo show_items($arr,6)?></td>
  </tr>
  <tr>
    <td class="tg-031e">3</td>
    <td class="tg-031e"><?php echo $arr['result']['players'][7]['account_id']?></td>
    <td class="tg-031e"><?php heroout( $arr['result']['players'][7]['hero_id']); echo $arr['result']['players'][7]['level']?> </td>
    <td class="tg-031e"><?php echo kda($arr,7);?></td>
    <td class="tg-031e"><?php echo in_battle($arr,7,2)?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][7]['hero_damage']?></td>
    <td class="tg-031e"><?php echo damage_per($arr,7,2)?></td>
	<td class="tg-031e"><?php echo $arr['result']['players'][7]['last_hits']."/".$arr['result']['players'][7]['denies']?></td>
	<td class="tg-031e"><?php echo $arr['result']['players'][7]['xp_per_min']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][7]['gold_per_min']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][7]['tower_damage']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][7]['hero_healing']?></td>
	<td class="tg-031e"><?php echo show_items($arr,7)?></td>
  </tr>
  <tr>
    <td class="tg-vn4c">4</td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][8]['account_id']?></td>
    <td class="tg-vn4c"><?php heroout( $arr['result']['players'][8]['hero_id']); echo $arr['result']['players'][8]['level']?> </td>
    <td class="tg-vn4c"><?php echo kda($arr,8);?></td>
    <td class="tg-vn4c"><?php echo in_battle($arr,8,2)?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][8]['hero_damage']?></td>
    <td class="tg-vn4c"><?php echo damage_per($arr,8,2)?></td></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][8]['last_hits']."/".$arr['result']['players'][8]['denies']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][8]['xp_per_min']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][8]['gold_per_min']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][8]['tower_damage']?></td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][8]['hero_healing']?></td>
	<td class="tg-vn4c"><?php echo show_items($arr,8)?></td>
  </tr>
  <tr>
    <td class="tg-031e">5</td>
    <td class="tg-031e"><?php echo $arr['result']['players'][9]['account_id']?></td>
    <td class="tg-031e"><?php heroout( $arr['result']['players'][9]['hero_id']); echo $arr['result']['players'][9]['level']?> </td>
    <td class="tg-031e"><?php echo kda($arr,9);?></td>
    <td class="tg-031e"><?php echo in_battle($arr,9,2)?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][9]['hero_damage']?></td>
    <td class="tg-031e"><?php echo damage_per($arr,9,2)?></td>
	<td class="tg-031e"><?php echo $arr['result']['players'][9]['last_hits']."/".$arr['result']['players'][9]['denies']?></td>
	<td class="tg-031e"><?php echo $arr['result']['players'][9]['xp_per_min']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][9]['gold_per_min']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][9]['tower_damage']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][9]['hero_healing']?></td>
	<td class="tg-031e"><?php echo show_items($arr,9)?></td>
  </tr>
</table>

</colgroup>

 

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
