<?php

require_once("../dbs/conn_db.php");
require_once("../dbs/neighbor_op.php");
require_once("../dbs/friend_op.php");

session_start();
$uid = $_SESSION["uid"];


//先查询到该用户所在的block
//再查询到和用户属于同一block的用户
//查出用户所有 neighbor id
//取补集
//输出html页面


$bid = get_block_id($uid);

//var_dump($bid);
if($bid ==0)
{
    exit();
}

$block_memb = get_block_mem($bid);

//var_dump($block_memb);

$neighbor = get_all_neighbor($uid);

//var_dump($friend);

//删除 已经是neighbor的人和 自己
$final_re =array();

foreach ($block_memb as $key => $value) {

    if(in_array($value,$neighbor)){
        //已经是好友
        
    }else{
        
            if($value == $uid)
            {
                //如果是自己
            }else{
                //可以加入最后的候选集合
                array_push($final_re,$value);
            }
       
    }

}

//var_dump($final_re);


$re_name = get_friend_name($final_re);

//var_dump($re_name);

$id_name=array();
//处理成id -> name 这种类型
foreach ($re_name as $key => $value) {
    $id_name[ $final_re[$key]] = $value;
}


//var_dump($id_name);
?>



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
    <h3>Block Member</h3>
<?php


foreach ($id_name as $key => $value) {


    echo "<div class='row'>
    <div class='col-md-2'>
    </div>
    <div class='col-md-8'>
        <p> name :   ".$value;

//    / echo 

echo	"</p>
</div>
<div class='col-md-2'>
     <a href='add_neighbor_request.php?request_id=".$key;
     
     echo "&sender=".$uid;
     
echo "'>
    <button type='button' class='btn btn-primary'>
        add
    </button>
</a>
</div>
</div>";

}

?>





</div>

    <script src='js/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/scripts.js'></script>
  </body>
</html>
