<?php 
require_once("../dbs/friend_op.php");
//发送好友请求的时候  向特定用户 send message...
//用户收到信息后可以决定是否同意

//根据用户id查找所有的
//type表示好友种类，有两种取值，0和1,代表neighbor关系，1代表好友关系。
//type的取值影响user1id和user2id的关系。如果type的值为0，代表两人是好友关系，并且是user1申请添加user2,request字段记录了添加好友的具体进程。如果type的值为1，代表两人是neighbor，
//并且user1单方面的将user2添加为neighbor。request在user1向user2发送申请的时候，取值为0，如果好友申请通过，该数值将会被修改为1.

session_start();
$Uid = $_SESSION["uid"];


$re = get_all_friends($Uid);  //获取所有好友id
$re_name = get_friend_name($re);

//显示所有好友列表
//var_dump($re_name);



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


    foreach($re_name as $key => $value)
    {

		echo  "<div class='col-md-2'>
		</div>
		<div class='col-md-8'>
            <p>".$value;

        echo "
        </p>
</div>
<div class='col-md-2'>
</div>
";



    }



   ?>
            







	</div>
</div>

    <script src='js/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/scripts.js'></script>
  </body>
</html>