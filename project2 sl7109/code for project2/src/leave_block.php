<?php

require_once("../dbs/conn_db.php");
require_once("../dbs/block_op.php");

error_reporting(E_ALL);
ini_set("display_errors", 1);


if(!session_start())
{
    echo "you should login first";
    return;
}

$uid = $_SESSION["uid"];
$bid = get_block_id($uid);

var_dump($bid);

if($bid== -1)
{
    echo "you should join block first";
}else{
    $re = leave_block_and_hood($uid);
    if($re ==1){
        echo "leave already!";
    }else{
        echo "leave block failed ! please retry";
    }
}


?>