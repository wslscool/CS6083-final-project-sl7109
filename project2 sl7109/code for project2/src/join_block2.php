<?php

//var_dump($_GET);

//查找当前所有block的成员id
//并根据查询结果决定如何发送申请
//如果 mem = 0  直接加入
// 否则所有人都发送请求信息
//如果 mem <3   设置固定数值
//否则将数值设置为3 
//成功加入以后  删除所有请求信息

error_reporting(E_ALL);
ini_set("display_errors", 1);


require_once("../dbs/conn_db.php");
require_once("../dbs/neighbor_op.php");
require_once("../dbs/block_op.php");


if(!session_start())
{
    echo "you should login first";
    return;
}

$uid = $_SESSION["uid"];
//var_dump($uid);

$bid = intval($_GET["id"]);

$block_mem_id = get_block_mem($bid);

if(sizeof($block_mem_id)==0)
{
    $hid = get_hood_id_of_block($bid);
    $re = join_into_block($uid,$bid,$hid);

    if($re==1)
    {
        echo "join already";
    }else{
        echo "join fail!  please retry";
    }

    $re = delete_block_request($uid,$bid);
    if($re==0){
        echo "delete_block_request failed";
        return;
    }else{
        //echo "success1";
    }
    $re = delete_block_req_message($uid,$bid);
    if($re==0){
        echo "delete_block_req_message failed";
        return;
    }else{
        //echo "success2";
        echo "operation success!";
    }

}else{
    $num =0;
    if(sizeof($block_mem_id)<3){
        //把request设置成size
        $num = sizeof($block_mem_id);
    }else{
        //直接把request 设置成3
        $num = 3;
    }

    $re = add_block_request($uid,$bid,$num);
    if($re==1)
    {
        echo "add_block_request already";
    }else{
        echo "add_block_request fail!  please retry";
    }


    
foreach ($block_mem_id as $key => $value) {

    $re = send_block_request($uid,$key);
    if($re==1)
    {
        echo "send_block_request already";
    }else{
        echo "send_block_request fail!  please retry";
    }
 
 }
 
 echo "request send already! please wait";

 

}



//遍历用户id  发送申请信息

?>