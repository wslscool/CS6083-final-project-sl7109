<?php
require_once("conn_db.php");

 function check_user($UserName)
 {
     
    $re="";

    $conn = conn_db();
// 预处理及绑定
$stmt = $conn->prepare("select uid,password from User where  user_name= ? ");
$stmt->bind_param("s", $name);

// 设置参数并执行
$name = $UserName;
$stmt->execute();


//store result;
$stmt->store_result();  

// 取回全部查询结果
if($stmt->num_rows==0)
 {
    //echo "no such user";
     return array(0,0);
 }else{
    //  查询结果绑定到变量中
    $stmt->bind_result($Uid,$Pass);
    while ($stmt->fetch())
    {
        // 逐条从MySQL服务取数据
        $uid = $Uid; 
        $passwd=  $Pass;
    }
      $re = array($uid,$passwd);
     return $re;
 }


$stmt->close();
$conn->close();


 }

 //check_user("a b");

 ?>