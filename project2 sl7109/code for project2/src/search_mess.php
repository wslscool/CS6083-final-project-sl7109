<?php

//var_dump($_POST);
//array(1) { ["search"]=> string(5) "aaaaa" }

//拿到用户输入的字符串  进行查找   并根据查找结果  进行显示

require_once("../dbs/view_mess.php");

if(!session_start())
{
    echo "you should login first";
}


$uid = $_SESSION["uid"];
$keyword = $_POST["search"];

$re = get_key_search_message($keyword,$uid);

//var_dump($re);

//array(2) { [0]=> array(6) { ["sender"]=> int(1) ["uname"]=> string(11) "James Smith" ["mid"]=> int(7) ["title"]=> string(5) "test3" ["body"]=> string(8) "content3" ["loca"]=> int(1) }
// [1]=> array(6) { ["sender"]=> int(4) ["uname"]=> string(10) "Linda Wood" ["mid"]=> int(10) ["title"]=> string(5) "test5" ["body"]=> string(8) "content5" ["loca"]=> int(1) } }
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

    <a href='reply_block.php?id=".$val["sender"];
    
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