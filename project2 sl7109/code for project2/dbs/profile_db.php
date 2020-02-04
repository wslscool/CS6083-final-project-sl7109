<?php
require_once("conn_db.php");

function search_profile_db($Uid)
{

  
    $re="";

    $conn = conn_db();
// 预处理及绑定
$stmt = $conn->prepare("select photopath, self_intro,family_intro from Profile where  uid= ? ");
$stmt->bind_param("i", $uid);

// 设置参数并执行
$uid = $Uid;
$stmt->execute();


//store result;
$stmt->store_result();  

// 取回全部查询结果   查不到返回结果为0  否则返回数组
if($stmt->num_rows==0)
 {
    //echo "no such user";
     return "0";
 }else{
    //  查询结果绑定到变量中
    $stmt->bind_result($photo,$self,$family);
    while ($stmt->fetch())
    {
        // 逐条从MySQL服务取数据
        $re = array($photo,$self,$family);
    }
     // var_dump($re);
     return $re;
 }


$stmt->close();
$conn->close();


}



function check_profile_db($Uid)
{
    $re= -1;

    $conn = conn_db();
// 预处理及绑定
$stmt = $conn->prepare("select pid from Profile where  uid= ? ");
$stmt->bind_param("i", $uid);

// 设置参数并执行
$uid = $Uid;
$stmt->execute();


//store result;
$stmt->store_result();  

// 取回全部查询结果   查不到返回结果为0  否则返回数组
if($stmt->num_rows==0)
 {
    //echo "no such user";
     return -1;
 }else{
    //  查询结果绑定到变量中
    $stmt->bind_result($pid);
    while ($stmt->fetch())
    {
        // 逐条从MySQL服务取数据
        $re = $pid;
    }
      
     return $re;
 }


$stmt->close();
$conn->close();


}


function delete_old_profile($Pid)
{
    $re= "0";
    $conn = conn_db();
// 预处理及绑定
$stmt = $conn->prepare("DELETE FROM Profile WHERE pid=? ");
$stmt->bind_param("i", $pid);

// 设置参数并执行
$pid = $Pid;
$re = $stmt->execute();

if($re)
{
    return "yes";
}else{
    return "0";
}


}


function  alter_profile($Uid,$Self,$Family,$Destination)
{
    //执行插入语句，并返回插入结果。
    $conn = conn_db();
    
    // 预处理及绑定
    $stmt = $conn->prepare("INSERT INTO Profile(uid,photopath,self_intro, family_intro) VALUES  ( ?,?,?,? ) ");
    $stmt->bind_param("isss", $uid,$photo,$self,$family);

    // 设置参数并执行
    $uid =  $Uid;
    $self = $Self;
    $family = $Family;
    $photo = $Destination;
    $stmt->execute();

   
     if($stmt)
     {
         //echo "注册成功，请返回登陆";
         return 1;
     }else{
        // echo "执行失败";
         return 0;
     }
    
    $stmt->close();
    $conn->close();

}


?>