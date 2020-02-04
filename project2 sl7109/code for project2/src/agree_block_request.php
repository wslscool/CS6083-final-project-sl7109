<?php
//如果用户同意了，就查找记录用户申请的block  list  进行查询  先判断是否满足条件，如果满足条件直接修改用户的block和hood id  并删除旧的请求。
//否则修改一下 block list  记录一下  就可以了

error_reporting(E_ALL);
ini_set("display_errors", 1);


require_once("../dbs/conn_db.php");
require_once("../dbs/block_op.php");


if(!session_start())
{
    echo "   you should login first";
    return;
}

$uid = $_SESSION["uid"];
$bid = get_block_id($uid);
$sid = $_GET["sid"];
 
//查找数据库中现在的状态   查出status
$status = get_block_request_status($sid,$bid);



if($status == 1)
{
    //已经可以成功加入  删除加入记录 和 message记录
    //修改用户的block id和hood id
    $re = delete_block_request($sid,$bid);
    if($re==0){
        echo "delete_block_request failed";
        return;
    }else{
        //echo "success1";
    }
    $re = delete_block_req_message($sid,$bid);
    if($re==0){
        echo "delete_block_req_message failed";
        return;
    }else{
        //echo "success2";
        echo "operation success!";
    }

}else{
    $status =$status -1;
    alter_block_request($sid,$bid,$status);
}


 echo "operation success!";