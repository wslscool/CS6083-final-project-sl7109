<?php

//var_dump($_GET);
//array(2) { ["request_id"]=> string(1) "7" ["sender"]=> string(1) "2" }
error_reporting(E_ALL);
ini_set("display_errors", 1);
//将用户的请求插入数据表中的  关系数据库中

require_once("../dbs/friend_op.php");

if(session_start()){}else{
    echo "please login first";
}

$uid = $_SESSION["uid"];


$sender_id = intval($_GET["sender"]);
if($sender_id!==$uid){
    echo "add friend error";
    exit();
}
$requset_id = intval($_GET["request_id"]);

$re = sender_friend_request($sender_id,$requset_id);
if($re == 0)
{
    echo "request failed ! please retry";
}else{
    echo "request sender already! please wait";
}


?>