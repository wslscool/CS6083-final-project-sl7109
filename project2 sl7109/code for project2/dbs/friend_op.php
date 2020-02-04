<?php
require_once("conn_db.php");


//根据用户id查找所有的
//type表示好友种类，有两种取值，0和1,代表neighbor关系，1代表好友关系。
//type的取值影响user1id和user2id的关系。如果type的值为0，代表两人是好友关系，并且是user1申请添加user2,request字段记录了添加好友的具体进程。如果type的值为1，代表两人是neighbor，
//并且user1单方面的将user2添加为neighbor。request在user1向user2发送申请的时候，取值为0，如果好友申请通过，该数值将会被修改为1.

// CREATE TABLE IF NOT EXISTS `Relation_List`(
//     `fid` INT UNSIGNED AUTO_INCREMENT,
//     `type` INT NOT NULL,
//     `user1_id` INT NOT NULL,
//     `user2_id` INT NOT NULL,
//     `request` INT NOT NULL  DEFAULT -1,
//     PRIMARY KEY ( `fid` )
//  )ENGINE=InnoDB DEFAULT CHARSET=utf8;

//发送好友请求的时候需要检查是否已经是好朋友

//获取所有用户id
function get_all_friends($Uid)
{
  //   type =1 request =1  user1=id or user2=id



         
    $re= array();

    $conn = conn_db();


// 预处理及绑定
$stmt = $conn->prepare("select user1_id from Relation_List where  type=1 and request =1  and user2_id = ?");
$stmt->bind_param("i", $uid);


$uid = $Uid;         // 设置参数并执行
$stmt->execute();
$stmt->store_result();  //store result;

if($stmt->num_rows==0)    // 取回全部查询结果
 {
     //chenck next type；
 }else{
    //  查询结果绑定到变量中
    $stmt->bind_result($rid);
    while ($stmt->fetch())
    {
        // 逐条从MySQL服务取数据
        array_push($re,$rid);
    }
 }


// 预处理及绑定
$stmt = $conn->prepare("select user2_id from Relation_List where  type=1 and request =1  and user1_id = ?");
$stmt->bind_param("i", $uid);


$uid = $Uid;         // 设置参数并执行
$stmt->execute();
$stmt->store_result();  //store result;

if($stmt->num_rows==0)    // 取回全部查询结果
 {
     //chenck next type；
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



function get_all_friends_request($Uid)
{
  //   type =1 request =1  user1=id or user2=id



         
    $re= array();

    $conn = conn_db();


// 预处理及绑定
$stmt = $conn->prepare("select user1_id from Relation_List where  type=1 and request =1  and user2_id = ?");
$stmt->bind_param("i", $uid);


$uid = $Uid;         // 设置参数并执行
$stmt->execute();
$stmt->store_result();  //store result;

if($stmt->num_rows==0)    // 取回全部查询结果
 {
     //chenck next type；
 }else{
    //  查询结果绑定到变量中
    $stmt->bind_result($rid);
    while ($stmt->fetch())
    {
        // 逐条从MySQL服务取数据
        array_push($re,$rid);
    }
 }


// 预处理及绑定
$stmt = $conn->prepare("select user2_id from Relation_List where  type=1 and request = -1  and user1_id = ?");
$stmt->bind_param("i", $uid);


$uid = $Uid;         // 设置参数并执行
$stmt->execute();
$stmt->store_result();  //store result;

if($stmt->num_rows==0)    // 取回全部查询结果
 {
     //chenck next type；
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




//输入id数组  返回name数组
function get_friend_name($re)
{

    $conn = conn_db();
 //遍历 array  获取用户名
 $re_name = array();
 foreach ($re as $key => $value) {

    // 预处理及绑定
$stmt = $conn->prepare("select user_name from User where uid = ?");
$stmt->bind_param("i", $uid);


$uid = $value;         // 设置参数并执行
$stmt->execute();
$stmt->store_result();  //store result;

if($stmt->num_rows==0)    // 取回全部查询结果
 {
     //chenck next type；
 }else{
    //  查询结果绑定到变量中
    $stmt->bind_result($name);
    while ($stmt->fetch())
    {
        // 逐条从MySQL服务取数据
        array_push($re_name,$name);
    }
 }
}

return $re_name;

}


// //获取对应block的所有成员 id
// function get_block_mem($Bid)
// {

//     $conn = conn_db();
//     $re= array();

//     // 预处理及绑定
//     $stmt = $conn->prepare("select uid from User where  block_id = ?");
//     $stmt->bind_param("i", $bid);
    

//     $bid = $Bid;         // 设置参数并执行
//     $stmt->execute();
//     $stmt->store_result();  //store result;
    
//     if($stmt->num_rows==0)    // 取回全部查询结果
//      {
//          //chenck next type；
//          echo "查询结果错误 至少应该具有用户一人";
//          exit();
//      }else{
//         //  查询结果绑定到变量中
//         $stmt->bind_result($rid);
//         while ($stmt->fetch())
//         {
//             // 逐条从MySQL服务取数据
//             array_push($re,$rid);
//         }
//      }

//      return $re;
// }


//获取对应hood的所有成员 id
function get_hood_mem($Bid)
{

    $conn = conn_db();
    $re= array();

    // 预处理及绑定
    $stmt = $conn->prepare("select uid from User where  hood_id = ?");
    $stmt->bind_param("i", $bid);
    

    $bid = $Bid;         // 设置参数并执行
    $stmt->execute();
    $stmt->store_result();  //store result;
    
    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         echo "查询结果错误 至少应该具有用户一人";
         exit();
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




//将好友要求插入数据表中   插入关系表中 
function sender_friend_request($sender_id,$requset_id)
{


    // `fid` INT UNSIGNED AUTO_INCREMENT,
    // `type` INT NOT NULL,
    // `user1_id` INT NOT NULL,
    // `user2_id` INT NOT NULL,
    // `request` INT NOT NULL  DEFAULT -1,
    // PRIMARY KEY ( `fid` )

    $conn = conn_db();
    $re= array();

    // 预处理及绑定
    $stmt = $conn->prepare("INSERT INTO Relation_List(type ,user1_id, user2_id) VALUES  (1,?,?) ");
    $stmt->bind_param("ii",$sid,$rid);
    

    $sid = $sender_id;         // 设置参数并执行
    $rid = $requset_id; 

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


//获取所有用户请求id
function get_friend_request_id($Uid)
{
    //从数据库中  获取所有 请求为该用户的id
    //  Relation_List
    // `fid` INT UNSIGNED AUTO_INCREMENT,
    // `type` INT NOT NULL,
    // `user1_id` INT NOT NULL,
    // `user2_id` INT NOT NULL,
    // `request` INT NOT NULL  DEFAULT -1,
    // PRIMARY KEY ( `fid` )

    
    $conn = conn_db();
    $re= array();

    // 预处理及绑定
    $stmt = $conn->prepare("select user1_id from Relation_List where  type =1 and request = -1 and user2_id = ?");
    $stmt->bind_param("i", $uid);
    

    $uid = $Uid;         // 设置参数并执行
    $stmt->execute();
    $stmt->store_result();  //store result;
    
    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         return "0";  //没有发送信息的人
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($user_id);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
            array_push($re,$user_id);
        }
     }

     return $re;
    

}


function delete_friend_requset($sender,$uid)
{

     
    $conn = conn_db();

    // 预处理及绑定
    $stmt = $conn->prepare("DELETE FROM Relation_List where type =1 and request = -1 and user2_id=? and user1_id=?");
    $stmt->bind_param("ii", $rid,$sid);
    

    $rid = $uid;         // 设置参数并执行
    $sid = $sender;

    $stmt->execute();
    if($stmt)
    {
        return 1;
    }else{
        return 0;
    }

}


function agree_friend_requset($sender,$uid)
{
     
    $conn = conn_db();

    // 预处理及绑定
    $stmt = $conn->prepare("UPDATE Relation_List SET request = 1 WHERE  user2_id=? and user1_id=?");
    $stmt->bind_param("ii", $rid,$sid);
    

    $rid = $uid;         // 设置参数并执行
    $sid = $sender;

    $stmt->execute();
    if($stmt)
    {
        return 1;
    }else{
        return 0;
    }

}


?>