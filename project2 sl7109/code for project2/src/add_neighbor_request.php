<?php

// var_dump($_GET);
//array(2) { ["request_id"]=> string(1) "7" ["sender"]=> string(1) "2" }

//插入neighbor关系
require_once("../dbs/conn_db.php");
require_once("../dbs/neighbor_op.php");


$sender = $_GET["sender"];
$req = $_GET["request_id"];

$re = add_neighbor_rela($req,$sender);
if($re ==1)
{
    echo "add already";
}else{
    echo "add fail";
}

?>