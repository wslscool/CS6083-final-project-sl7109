<?php

require_once("../dbs/view_mess.php");
//使用php 动态的将查询信息生成成列表供用户查看
session_start();
$uid = $_SESSION["uid"];

error_reporting(E_ALL);
ini_set("display_errors", 1);

//根据用户id 查找发送给该用户的请求
//然后显示出来   如果用户阅读了 没有点同意   status 会被修改为1 ，以后这条信息就不会被阅读到了，在系统中等同于拒绝了建议
// 然后使用 php循环输出显示界面

//type = 1  status =0  receiver_id
$sender_list = get_unread_block_request($uid);

//var_dump($sender_list);

//先把 sender list 查出来   
//如果用户没有操作就是拒绝了
//如果用户同意了，就查找记录用户申请的block  list  进行查询  先判断是否满足条件，如果满足条件直接修改用户的block和hood id
//否则修改一下 block list  记录一下  就可以了



?>



<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>siliang mini project</title>

    <meta name='description' content='Source code generated using layoutit.com'>
    <meta name='author' content='LayoutIt!'>

    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet'>

  </head>
  <body>

    <div class='container-fluid'>
	<div class='row'>




 <?php
//array(1) { [0]=> array(3) { ["sender"]=> int(6) ["uname"]=> string(10) "Jean White" ["mid"]=> int(1) } }

foreach ($sender_list as $key=>$value)
{

    echo "<div class='col-md-2'>
    </div>
    <div class='col-md-8'>
        <p>".$value["uname"];

    echo "    </p>
    </div>
    <div class='col-md-2'>
         <a href ='agree_block_request.php?sid=".$value["sender"];

    echo "  '>
    <button type='button' class='btn btn-success'>
        agree
    </button>
</a>
</div>";

}


?>
		<!-- <div class='col-md-2'>
		</div>
		<div class='col-md-8'>
			<p> -->
<!-- 

        </p>
		</div>
		<div class='col-md-2'>
             <a href ='agree_block_request?sid=
             
             
             '>
			<button type='button' class='btn btn-success'>
				agree
            </button>
        </a>
        </div> -->


   



	</div>
</div>

    <script src='js/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/scripts.js'></script>
  </body>
</html>