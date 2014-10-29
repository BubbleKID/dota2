
<?php
//KDA
function kda($arr,$playernum)
{
   $kills=$arr['result']['players'][$playernum]['kills'];
   $deaths=$arr['result']['players'][$playernum]['deaths'];
   $assists=$arr['result']['players'][$playernum]['assists'];
  if($death=0)
  {
	$kda=$kills+$assists;
  }
  
  else
  {
	$kda=($kills+$assists)/$deaths;
  }
  return $kda;
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

	$in_battle=($kills+$assists)/$totalkills;
	echo $in_battle;
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

	$damage_per=$damages/$totaldamages;
	echo $damage_per;


}


//物品


function show_items($arr,$playernum)
{
		
		for($i=0;$i<6;$i++)
		{
			echo $arr['result']['players'][$playernum]['item_'.$i].",";
		}

}




include 'contact.php';

$matchid=990460765;

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

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  
  <div>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-0ord{text-align:right}
.tg .tg-ifyx{background-color:#D2E4FC;text-align:right}
.tg .tg-s6z2{text-align:center}
.tg .tg-vn4c{background-color:#D2E4FC}
</style>
<table class="tg" style="undefined;table-layout: fixed; width: 829px">
<colgroup>
<col style="width: 39px">
<col style="width: 86px">
<col style="width: 85px">
<col style="width: 81px">
<col style="width: 83px">
<col style="width: 59px">
<col style="width: 64px">
<col style="width: 71px">
<col style="width: 60px">
<col style="width: 54px">
<col style="width: 47px">
<col style="width: 80px">
<col style="width: 150px">

比赛ID: <?php echo $matchid;?>

</colgroup>
  <tr>
    <th class="tg-s6z2" colspan="12">天辉</th>
    <th class="tg-031e"></th>
  </tr>
  <tr>
    <td class="tg-vn4c">No</td>
    <td class="tg-vn4c">Player</td>
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
	<td class="tg-031e"><?php echo $arr['result']['players'][0]['last_hits']?></td>
	<td class="tg-0ord"><?php echo $arr['result']['players'][0]['xp_per_min']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][0]['gold_per_min']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][0]['tower_damage']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][0]['hero_healing']?></td>
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
    <td class="tg-ifyx"><?php echo $arr['result']['players'][1]['last_hits']?></td>
    <td class="tg-ifyx"><?php echo $arr['result']['players'][1]['xp_per_min']?></td>
    <td class="tg-ifyx"><?php echo $arr['result']['players'][1]['gold_per_min']?></td>
    <td class="tg-ifyx"><?php echo $arr['result']['players'][1]['tower_damage']?></td>
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
	<td class="tg-031e"><?php echo $arr['result']['players'][2]['last_hits']?></td>
	<td class="tg-0ord"><?php echo $arr['result']['players'][2]['xp_per_min']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][2]['gold_per_min']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][2]['tower_damage']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][2]['hero_healing']?></td>
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
    <td class="tg-ifyx"><?php echo $arr['result']['players'][3]['last_hits']?></td>
    <td class="tg-ifyx"><?php echo $arr['result']['players'][3]['xp_per_min']?></td>
    <td class="tg-ifyx"><?php echo $arr['result']['players'][3]['gold_per_min']?></td>
    <td class="tg-ifyx"><?php echo $arr['result']['players'][3]['tower_damage']?></td>
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
	<td class="tg-031e"><?php echo $arr['result']['players'][4]['last_hits']?></td>
	<td class="tg-0ord"><?php echo $arr['result']['players'][4]['xp_per_min']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][4]['gold_per_min']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][4]['tower_damage']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][4]['hero_healing']?></td>
	<td class="tg-031e"><?php echo show_items($arr,4)?></td>
  </tr>
</table>

<p></p>
<table class="tg" style="undefined;table-layout: fixed; width: 829px">
<colgroup>
<col style="width: 39px">
<col style="width: 86px">
<col style="width: 72px">
<col style="width: 81px">
<col style="width: 83px">
<col style="width: 59px">
<col style="width: 64px">
<col style="width: 71px">
<col style="width: 60px">
<col style="width: 54px">
<col style="width: 47px">
<col style="width: 113px">
</colgroup>
  <tr>
    <th class="tg-s6z2" colspan="11">夜魇</th>
    <th class="tg-031e"></th>
  </tr>
  <tr>
    <td class="tg-vn4c">No</td>
    <td class="tg-vn4c">玩家</td>
    <td class="tg-vn4c">英雄</td>
    <td class="tg-vn4c">KDA</td>
    <td class="tg-vn4c">参展率 </td>
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
    <td class="tg-031e"><?php heroout( $arr['result']['players'][5]['hero_id']);?></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][5]['xp_per_min']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][5]['gold_per_min']?></td>
    <td class="tg-0ord">1:15</td>
    <td class="tg-0ord">1:41</td>
    <td class="tg-031e">123</td>
  </tr>
  <tr>
    <td class="tg-vn4c">2</td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][6]['account_id']?></td>
    <td class="tg-vn4c"><?php heroout( $arr['result']['players'][6]['hero_id']);?></td>
    <td class="tg-vn4c"></td>
    <td class="tg-vn4c"></td>
    <td class="tg-vn4c"></td>
    <td class="tg-vn4c"></td>
    <td class="tg-ifyx">15:30</td>
    <td class="tg-ifyx">14:10</td>
    <td class="tg-ifyx">15:45</td>
    <td class="tg-ifyx">16:00</td>
    <td class="tg-vn4c"></td>
  </tr>
  <tr>
    <td class="tg-031e">3</td>
    <td class="tg-031e"><?php echo $arr['result']['players'][7]['account_id']?></td>
    <td class="tg-031e"><?php heroout( $arr['result']['players'][7]['hero_id']);?></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-0ord">70%</td>
    <td class="tg-0ord">55%</td>
    <td class="tg-0ord">90%</td>
    <td class="tg-0ord">88%</td>
    <td class="tg-031e"></td>
  </tr>
  <tr>
    <td class="tg-vn4c">4</td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][8]['account_id']?></td>
    <td class="tg-vn4c"><?php heroout( $arr['result']['players'][8]['hero_id']);?></td>
    <td class="tg-vn4c"></td>
    <td class="tg-vn4c"></td>
    <td class="tg-vn4c"></td>
    <td class="tg-vn4c"></td>
    <td class="tg-vn4c"></td>
    <td class="tg-vn4c"></td>
    <td class="tg-vn4c"></td>
    <td class="tg-vn4c"></td>
    <td class="tg-vn4c"></td>
  </tr>
  <tr>
    <td class="tg-031e">5</td>
    <td class="tg-031e"><?php echo $arr['result']['players'][9]['account_id']?></td>
    <td class="tg-031e"><?php heroout( $arr['result']['players'][9]['hero_id']);?></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
  </tr>
</table>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>