<?php 

//想要加入block 首先必须是不属于任何block的
// 检查block id是什么
// 如果是 -1 查询所有block list   并循环打印    
// #todo  此处还可以指定只允许用户加入对应street允许加入的block
//否则警告退出  
require_once("../dbs/conn_db.php");


if(!session_start())
{
    echo "you should login first";
    return;
}

$uid = $_SESSION["uid"];

$bid = get_block_id($uid);

//var_dump($bid);

if($bid>0)
{
    echo "you should leave block first! then you can join other block";
    return;
}else{

    //
    $block_list_id = get_block_list();
    //var_dump($block_list_id);
}



    // $block_list_id = get_block_list();
    // var_dump($block_list_id);

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


foreach ($block_list_id as $key => $value) {
    echo " 		<div class='col-md-2'>
    </div>
    <div class='col-md-8'>
        <p>".$value;


        echo "        </p>
		</div>
		<div class='col-md-2'>
             <a href ='join_block2.php?id=".$key;


             echo "             '>
             <button type='button' class='btn btn-success'>
             join
             </button>
         </a>
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



