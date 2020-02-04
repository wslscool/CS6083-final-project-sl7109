<?php

require_once("../dbs/friend_op.php");

//var_dump($_GET);
//array(2) { ["type"]=> string(1) "1" ["uid"]=> string(1) "3" }
//type =0  拒绝 
//type =1  接收


if(!session_start())
{
    echo "you should login first";
}

$uid = $_SESSION["uid"];

$type = intval($_GET["type"]);
$sender = intval($_GET["uid"]);

//根据type 决定删除或者 修改
if($type == 0)
{
    $re = delete_friend_requset($sender,$uid);
    if($re==0)
    {
        echo "reject failed";
    }else{
        echo "reject already";
    }
}else{
    $re = agree_friend_requset($sender,$uid);
    if($re==0)
    {
        echo "agree failed";
    }else{
        echo "agree already";
    }
}
