<?php 

require_once("../dbs/profile_db.php");
session_start();
$uid= $_SESSION['uid'];


$re = search_profile_db($uid);
if($re== "0")
{
    echo "you profile is plain, you should write it first";
    return;
}else{
    //输出一个php页面
    if($re[0] == "***")
    {

    }else{
       //进行页面重定向  转到新的profile页面
       header("Location: http://47.111.29.63/src/view_profile2.php"); 
       //确保重定向后，后续代码不会被执行 
       exit;
    }
}



?>