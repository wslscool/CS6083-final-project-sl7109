<?php 


require_once("../dbs/view_mess.php");
require_once("../dbs/friend_op.php");
require_once("../dbs/neighbor_op.php");
require_once("../dbs/conn_db.php");

session_start();
$uid = $_SESSION["uid"];



//根据用户发送的信息  将信息存储起来
var_dump($_POST);
//var_dump($_POST["contact_list"]);


$req = $_POST["first1"];
if($_POST["location"] == "on"){
    $loca = 1;
}else{
    $loca = 0;
    echo "no location";
}

$title = $_POST["title"];
$body = $_POST["contact_list"];

if($req == "Hood"){

     //给整个block发消息

     $hood_id = get_hood_id($uid);  //获取用户所在的id
     $hood_mem = get_hood_mem($hood_id);

     foreach($hood_mem as $key=>$value)
     {
         $type = 5;
        send_sb_message($uid,$value,$title,$body,$loca,$type);
     }
     

}else if($req == "Block")
{
    //给整个block发消息

    $block_id = get_block_id($uid);
    $block_mem = get_block_mem($block_id);

    foreach($block_mem as $key=>$value)
    {
        $type = 5;
       send_sb_message($uid,$value,$title,$body,$loca,$type);
    }
    


}else if($req== "Neighbors"){
    //给neighbor发信息

    $re = get_all_neighbor($uid);
    foreach ($re as $key=>$value)
    {
        $type = 4;
        send_sb_message($uid,$value,$title,$body,$loca,$type);
    }

}else if($req == "Friends"){
    //给所有friend发消息
    $re = get_all_friends($uid); 
    foreach ($re as $key=>$value)
    {
        $type = 3;
        send_sb_message($uid,$value,$title,$body,$loca,$type);
    }


}else if($req == "Neighbor or Friend")
{
    //给某个人发信息
    $reciver = intval($_POST["second2"]);
    $type = 7;
    send_sb_message($uid,$value,$title,$body,$loca,$type);

}

echo "alreay  send";

?>
