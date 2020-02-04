<?php



//先查询出用户所在的block
//查出该block所在的所有街道
//查出属于这些街道的所有用户id
//获取所有街道的用户名

//对每个街道的用户进行分别绘制


require_once("../dbs/conn_db.php");
require_once("../dbs/map_op.php");

error_reporting(E_ALL);
ini_set("display_errors", 1);


if(!session_start())
{
    echo "you should login first";
    return;
}

$uid = $_SESSION["uid"];
$bid = get_block_id($uid);

$streets = get_street_of_block($bid);

//var_dump($streets);

$street_latlon = array();
foreach($streets as $key=>$value)
{
   $re = get_lat_lon($value);  //根据street返回经纬度
   $street_latlon[$value] = $re;
}


//var_dump($street_latlon);

//根据street 查出用户

$street_mem = array();
foreach($streets as $key=>$value)
{
  $re = get_street_mem($value);  //获取所有在这条街的用户
  $street_mem[$value] = $re;
}

// var_dump($street_mem);


// array(2) { [1]=> array(5) { [2]=> string(13) "Robert Wilson" [4]=> string(10) "Linda Wood" [5]=> string(10) "Susan Hall" [6]=> string(10) "Jean White" [7]=> string(8) "lily zhu" } 

// [2]=> array(1) { [3]=> string(9) "Paul Cook" } }


// array(2) { [1]=> array(2) { ["lat"]=> float(33.992599) ["lon"]=> float(-118.443713) } [2]=> array(2) { ["lat"]=> float(33.993201) ["lon"]=> float(-118.444785) } } 
// array(2) { [1]=> array(1) { ["$uid"]=> string(8) "lily zhu" } [2]=> array(1) { ["$uid"]=> string(9) "Paul Cook" } }

?>




<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        // map = new google.maps.Map(document.getElementById('map'), {
        //   center: {lat: -34.397, lng: 150.644},
        //   zoom: 3
        // });
        lat = 33.992599;
        lng =  -118.443713;
        var myLatLng = new google.maps.LatLng(lat, lng);

//显示地图中心点
      var myOptions = {
      zoom: 15,
      center: myLatLng,
      // mapTypeId: google.maps.MapTypeId.TERRAIN
  };

// 在div中显示整个地图
  var map = new google.maps.Map(document.getElementById('map'), myOptions);




<?php

 foreach($street_latlon as $sid=>$loc)
 {
   $lat = $loc["lat"];
   $lon = $loc["lon"];

    foreach($street_mem as $key=>$arr)
    {
      foreach($arr as $uid=>$name){
       //每人输出一个坐标点
       echo "lat".$uid ;
       echo "=".strval($lat).";";

       echo "lng".$uid;
       echo "=".strval($lon).";";

       echo " var myLatLng".$uid;
       echo "  = new google.maps.LatLng("."lat".$uid.","."lng".$uid.");";

       echo "var marker".$uid;
       echo "= new google.maps.Marker({
        position:";
        echo "myLatLng".$uid.",";
        echo "title: '".$name."'";

        echo "  });";

        echo "marker".$uid.".setMap(map);";

        $lat = $lat+0.001;

        // lat2=33.992599;
        // lng2=-118.443713; 
        // var myLatLng2 = new google.maps.LatLng(lat2,lng2);
        // var marker2= new google.maps.Marker({ position:myLatLng2,title: 'Robert Wilson' });
        // marker2.setMap(map);

       }
    }




 }

?>

//   lat2 =33.99222;
//   lng2 =  -118.443713;
//   var myLatLng2 = new google.maps.LatLng(lat2, lng2);


// //初始化一个 marker
// var marker2 = new google.maps.Marker({
//       position: myLatLng2,
//       title: "Hello World!"
//   });

// //在地图上显示mark
//   marker2.setMap(map);











      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6PqA7MVuR1hYpfm-iFfFzcp1tzkC6-sc&callback=initMap"
    async defer></script>
  </body>
</html>