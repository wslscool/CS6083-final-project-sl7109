<?php

require_once("conn_db.php");

function get_street_of_block($Bid)
{

    $conn = conn_db();
    $re= array();

    // 预处理及绑定
    $stmt = $conn->prepare("select sid from Block_and_Street where  bid = ?");
    $stmt->bind_param("i", $bid);
    

    $bid = $Bid;         // 设置参数并执行
    $stmt->execute();
    $stmt->store_result();  //store result;
    
    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         echo "0";
         return array();
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($rid);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
            array_push($re,$rid);
        }
     }

     return $re;



}



function get_lat_lon($Sid)
{
    $conn = conn_db();
    $re= array();

    // 预处理及绑定
    $stmt = $conn->prepare("select lat , lon from Street where  sid = ?");
    $stmt->bind_param("i", $sid);
    

    $sid = $Sid;         // 设置参数并执行
    $stmt->execute();
    $stmt->store_result();  //store result;
    
    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         echo "0";
         return array();
     }else{
        //  查询结果绑定到变量中
   
        $stmt->bind_result($lat,$lon);

        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
          //  array_push($re,$rid);
            $re['lat'] = $lat;
            $re['lon'] = $lon;
        }
     }

     return $re;

}


?>