<?php 


require_once("../dbs/view_mess.php");
require_once("../dbs/friend_op.php");
require_once("../dbs/neighbor_op.php");
require_once("../dbs/conn_db.php");

session_start();
$uid = $_SESSION["uid"];
$rid = intval($_GET["rid"]);
$type = intval($_GET["type"]);

//根据用户发送的信息  将信息存储起来
//var_dump($_POST);

//var_dump($_POST["contact_list"]);


if($_POST["location"] == "on"){
    $loca = 1;
}else{
    $loca = 0;
    echo "no location";
}

$title = $_POST["title"];
$body = $_POST["contact_list"];


send_sb_message($uid,$rid,$title,$body,$loca,$type);


echo "send success!!!";

?>