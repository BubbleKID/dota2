<?php

include 'data/get_heroes.php';

//search
function search($array, $key, $value)
{
    $results = array();

    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }

    return $results;
}

//http://stackoverflow.com/questions/1019076/how-to-search-by-key-value-in-a-multidimensional-array-in-php/1019126#1019126
//$arr = array(0 => array(id=>1,name=>"cat 1"),
      //       1 => array(id=>2,name=>"cat 2"),
          //   2 => array(id=>3,name=>"cat 1"));

//print_r(search($arr, 'name', 'cat 1'));
//Output:

//Array
//(
 //   [0] => Array
 //       (
 //           [id] => 1
  //          [name] => cat 1
 //       )

  //  [1] => Array
 //       (
 //           [id] => 3
 //           [name] => cat 1
 //       )
//
//)






function heroout($heroid)
{
//$heroid=(string)($heroid-1);


$contents = file_get_contents('json/heroes.json');
$arr=json_decode($contents,TRUE);
//echo 11111;



//print_r(search($arr, 'id', '74'));

$out=search($arr, 'id', $heroid);


echo $out['0']['name'];

//in_array("antimage",$arr['heroes'][0])
//array_search(value,array,strict)
//if (array_search("74",$arr))
  //{
  //echo "Match found";
  //}
//else
//  {
 // echo "Match not found";
 // }


//echo "<pre>";
//print_r($arr);
//echo "</pre>";



$name=$out['0']['name'];

$suffixes="eg";

//eb 35x20px png
//sb 59x33px
//lg 205x11px 
//full 256x114px
//vert  234x272px  (jpg)

$img="http://media.steampowered.com/apps/dota2/images/heroes/".$name."_".$suffixes.".png";
$img5="http://media.steampowered.com/apps/dota2/images/heroes/".$name."_sb.png";
$img2="http://media.steampowered.com/apps/dota2/images/heroes/".$name."_lg.png";
$img3="http://media.steampowered.com/apps/dota2/images/heroes/".$name."_full.png";
$img4="http://media.steampowered.com/apps/dota2/images/heroes/".$name."_vert.jpg";

echo "<img src=" . $img5.">";

}

//heroout(5);
//heroout(74);
//heroout(65);
//heroout(41);
//heroout(93);

//echo "</pre>";
//echo  get_data_by_id(1,$arr);

?>
