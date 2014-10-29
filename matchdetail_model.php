
<?php

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
<col style="width: 113px">

比赛ID: <?php echo $matchid;?>

</colgroup>
  <tr>
    <th class="tg-s6z2" colspan="11">天辉</th>
    <th class="tg-031e"></th>
  </tr>
  <tr>
    <td class="tg-vn4c">No</td>
    <td class="tg-vn4c">Player</td>
    <td class="tg-vn4c">Hero</td>
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
    <td class="tg-031e"><?php echo $arr['result']['players'][0]['account_id']?></td>
    <td class="tg-031e"><?php heroout( $arr['result']['players'][0]['hero_id']); echo $arr['result']['players'][0]['level']?> </td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
	<td class="tg-0ord"><?php echo $arr['result']['players'][0]['xp_per_min']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][0]['gold_per_min']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][0]['tower_damage']?></td>
    <td class="tg-0ord"><?php echo $arr['result']['players'][0]['hero_damage']?></td>
    <td class="tg-031e"><?php echo $arr['result']['players'][0]['hero_healing']?></td>
  </tr>
  <tr>
    <td class="tg-vn4c">2</td>
    <td class="tg-vn4c"><?php echo $arr['result']['players'][1]['account_id']?></td>
    <td class="tg-vn4c"><?php heroout( $arr['result']['players'][1]['hero_id']);?></td>
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
    <td class="tg-031e"><?php echo $arr['result']['players'][2]['account_id']?></td>
    <td class="tg-031e"><?php heroout( $arr['result']['players'][2]['hero_id']);?></td>
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
    <td class="tg-vn4c"><?php echo $arr['result']['players'][3]['account_id']?></td>
    <td class="tg-vn4c"><?php heroout( $arr['result']['players'][3]['hero_id']);?></td>
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
    <td class="tg-031e"><?php echo $arr['result']['players'][4]['account_id']?></td>
    <td class="tg-031e"><?php heroout( $arr['result']['players'][4]['hero_id']);?></td>
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