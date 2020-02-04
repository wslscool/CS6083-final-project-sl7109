<?php

require_once("conn_db.php");


error_reporting(E_ALL);
ini_set("display_errors", 1);



function get_all_neighbor($Uid)
{
            
    $re= array();

    $conn = conn_db();



// 预处理及绑定
$stmt = $conn->prepare("select user2_id from Relation_List where  type=0 and  user1_id = ?");
$stmt->bind_param("i", $uid);


$uid = $Uid;         // 设置参数并执行
$stmt->execute();
$stmt->store_result();  //store result;

if($stmt->num_rows==0)    // 取回全部查询结果
 {
     //chenck next type；
 }else{
    //  查询结果绑定到变量中
    $stmt->bind_result($fid);
    while ($stmt->fetch())
    {
        // 逐条从MySQL服务取数据
        array_push($re,$fid);
    }
 }


return $re;

}




//获取对应block的所有成员 id
function get_block_mem($Bid)
{

    $conn = conn_db();
    $re= array();

    // 预处理及绑定
    $stmt = $conn->prepare("select uid from User where  block_id = ?");
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



function add_neighbor_rela($req,$sender)
{

    // `fid` INT UNSIGNED AUTO_INCREMENT,
    // `type` INT NOT NULL,
    // `user1_id` INT NOT NULL,
    // `user2_id` INT NOT NULL,
    // `request` INT NOT NULL  DEFAULT -1,

    $conn = conn_db();
    
    // 预处理及绑定
    $stmt = $conn->prepare("INSERT INTO Relation_List(type,user1_id, user2_id) VALUES  (0,?,? ) ");
    $stmt->bind_param("ii", $sender,$rid);

    // 设置参数并执行
    $sid = $sender;
    $rid = $req;
  
    $stmt->execute();

     if($stmt)
     {
         //echo "注册成功，请返回登陆";
         return 1;
     }else{
        // echo "执行失败";
         return 0;
     }
    

}


?>