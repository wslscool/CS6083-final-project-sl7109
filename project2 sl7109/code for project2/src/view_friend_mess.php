<?php

require_once("../dbs/view_mess.php");
//使用php 动态的将查询信息生成成列表供用户查看
session_start();
$uid = $_SESSION["uid"];

error_reporting(E_ALL);
ini_set("display_errors", 1);

//规定返回值为 id  title body location[直接返回字符串]
// 选择时筛选条件  id type status

//echo $uid;
$re = get_unread_friend_mess($uid);

//将location处理成统一的格式
foreach($re as $k=>$val)
{
    if($val == "Private"){ 

    }else{
        $re[$k]["loca"] = "city:   ".$val["loca"][0]."  <br>street:   ".$val["loca"][1];
    }
}



//$re =  get_unread_friend_mess($uid); 
 //var_dump($re);


 //循环遍历信息 并打印输出

//UPDATE Message SET location=1 WHERE mid = 8;


//array(1) { [0]=> array(6) { ["sender"]=> int(3)
    // ["uname"]=> string(9) "Paul Cook"
    // ["mid"]=> int(8) ["title"]=> string(5) "test3"
    // ["body"]=> string(8) "content3"
    // ["loca"]=> array(2) { [0]=> string(11) "Los Angeles" [1]=> string(11) "Glencoe Ave" } } }

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>siliang mini project</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">




<?php 


foreach($re as $k=>$val)
{
   // echo "<h1>Hello User, </h1> <p>Welcome to </p>"; 

    echo "<div class='row'>  <div class='col-md-2'> <h3>Sender : </h3> <p>".$val["uname"] ;
    //echo htmlentities($str,ENT_QUOTES,"UTF-8");

    echo "</p>

    <a href='reply_friend.php?id=".$val["sender"];
    
   echo" '><button type='button' class='btn btn-success' contenteditable='true' name=".$val["sender"];
    
    
    echo ">reply</button></a>


    </div>
    <div class='col-md-8'>
        <div class='card'>
            <h5 class='card-header'>
            Title:   ".$val["title"];


    echo "	</h5>
    <div class='card-body'>
        <p height ='800' class='card-text'>  content:   ".$val["body"];


    echo "				</p>
    </div>
</div>
</div>
<div class='col-md-2'>
<p>   Location:   <br>".$val["loca"];


echo "

</p>
</div>
</div>
</div>
</div>


";

}


?>





</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>