<?php

//在数据库中查找 该用户的请求
require_once("../dbs/friend_op.php");


error_reporting(E_ALL);
ini_set("display_errors", 1);


if(!session_start())
{
    echo "you should login first";
}


$uid = $_SESSION["uid"];
$request_user_id = get_friend_request_id($uid);  //返回所有申请者的id

//var_dump($request_user_id);
if($request_user_id == "0")
{
    echo "no request";
    return;
}



$re_name = get_friend_name($request_user_id);  //返回所有申请者的名字


//var_dump($re_name);

$id_name=array();
//处理成id -> name 这种类型
foreach ($re_name as $key => $value) {
    $id_name[ $request_user_id[$key]] = $value;
}

//var_dump($id_name);
//填充到一个数组中
//打印可请求的数据  允许用户同意或者拒绝


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

foreach ($id_name as $key => $value) {

    echo "<div class='col-md-10'>
    <p>".$value;

    echo "	</p>
    </div>
    <div class='col-md-1'>
         <a href='deal_friend_request.php?type=1&uid=".$key;


    echo " '>
    <button type='button' class='btn btn-success'>
        accept
    </button>
</a>
</div>
<div class='col-md-1'>
<a href='deal_friend_request.php?type=0&uid=".$key;

echo " '>
<button type='button' class='btn btn-success'>
    reject
</button>
</a>
</div>
";



}


?>


			<!-- </p>
		</div>
		<div class='col-md-1'>
             <a href='deal_friend_request.php?type=1&uid=
              -->
             <!-- '>
			<button type='button' class='btn btn-success'>
				accept
            </button>
        </a>
		</div>
		<div class='col-md-1'>
        <a href='deal_friend_request.php?type=0&uid=
        
        '>
			<button type='button' class='btn btn-success'>
				reject
            </button>
        </a>
        </div>
         -->






	</div>
</div>

    <script src='js/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/scripts.js'></script>
  </body>
</html>



