<?php

require_once("conn_db.php");


error_reporting(E_ALL);
ini_set("display_errors", 1);


function leave_block_and_hood($Uid)
{
    $conn = conn_db();

    // 预处理及绑定
    $stmt = $conn->prepare(" UPDATE User SET block_id = -1 , hood_id = -1 WHERE uid =?");
    $stmt->bind_param("i",$uid);
    

          // 设置参数并执行
    $uid = $Uid;

    $stmt->execute();
    if($stmt)
    {
        return 1;
    }else{
        return 0;
    }

}

//将某个用户加入某个指定block 和 hood
function  join_into_block($Uid,$Bid,$Hid)
{
    $conn = conn_db();

    // 预处理及绑定
    $stmt = $conn->prepare("UPDATE User SET block_id = ? ,hood_id = ? WHERE  uid=?");
    $stmt->bind_param("iii", $bid,$hid,$uid);
    

    $bid = $Bid; 
    $hid = $Hid;        // 设置参数并执行
    $uid = $Uid;

    $stmt->execute();
    if($stmt)
    {
        return 1;
    }else{
        return 0;
    }

    #todo 将用户加入对应的hood
}



function add_block_request($Uid,$Bid,$Num)
{

    $conn = conn_db();
    $re= array();

    // 预处理及绑定
    $stmt = $conn->prepare("INSERT INTO block_request_list(uid ,bid, status) VALUES  (?,?,?) ");
    $stmt->bind_param("iii",$uid ,$bid, $status);
    

    $uid = $Uid;
    $bid = $Bid;
    $status = $Num;

    $stmt->execute();
    $stmt->store_result();  //store result;
    
    if($stmt)
    {
        
        return 1;
    }else{
       // echo "执行失败";
        return 0;
    }

}


function alter_block_request($Sid,$Bid,$Status)
{
    $conn = conn_db();
    $re= array();

    // 预处理及绑定
    $stmt = $conn->prepare("INSERT INTO block_request_list(uid ,bid, status) VALUES  (?,?,?) ");
    $stmt->bind_param("iii",$uid ,$bid, $status);
    

    $uid = $Sid;
    $bid = $Bid;
    $status = $Status;

    $stmt->execute();
    $stmt->store_result();  //store result;
    
    if($stmt)
    {
        
        return 1;
    }else{
       // echo "执行失败";
        return 0;
    }
}

  // CREATE TABLE IF NOT EXISTS `Message`(
    //     `mid` INT UNSIGNED AUTO_INCREMENT,
    //     `type` INT NOT NULL,
    //     `sender_id`  INT NOT NULL,
    //      `receiver_id` INT NOT NULL,
    //      `title` VARCHAR(40) ,
    //      `body` VARCHAR(200) ,
    //      `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    //      `location` bool ,
    //     `status`  INT NOT NULL,
    //     PRIMARY KEY ( `mid` )

    //sender recive type 
function  send_block_request($uid,$key)
{


    $conn = conn_db();
    $re= array();

    // 预处理及绑定
    $stmt = $conn->prepare("INSERT INTO Message(type,sender_id, receiver_id, status) VALUES  ( 1,?,?,0) ");
    $stmt->bind_param("ii",$rid,$sid);
    

    $rid = $key;
    $sid = $uid;
 
    $stmt->execute();
    $stmt->store_result();  //store result;
    
    if($stmt)
    {
        
        return 1;
    }else{
       // echo "执行失败";
        return 0;
    }

}


function get_block_request_status($Sid,$Bid)
{

    $re =0;
    $count=0;

    
    $conn = conn_db();
    
    // 预处理及绑定
    $stmt = $conn->prepare("select status from block_request_list where uid=? and bid=? ");
    $stmt->bind_param("ii", $uid,$bid);

    // 设置参数并执行
    $uid = $Sid;
    $bid = $Bid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($status);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
            $re= $status;
        }
     }

     return $re;
}



function delete_block_request($Sid,$Bid)
{
    
    $conn = conn_db();
    
    // 预处理及绑定
    $stmt = $conn->prepare("delete  from block_request_list where uid=? and bid=? ");
    $stmt->bind_param("ii", $uid,$bid);

    // 设置参数并执行
    $uid = $Sid;
    $bid = $Bid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt)    // 取回全部查询结果
     {
         //yes
         return 1;
     }else{
        return 0;
     }

}

function delete_block_req_message($Sid,$Bid)
{
   $conn = conn_db();
    
    // 预处理及绑定
    $stmt = $conn->prepare("delete  from Message where type = 1 and sender_id =? ");
    $stmt->bind_param("i", $uid);

    // 设置参数并执行
    $uid = $Sid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt)    // 取回全部查询结果
     {
         //yes
         return 1;
     }else{
        return 0;
     }
}


?>