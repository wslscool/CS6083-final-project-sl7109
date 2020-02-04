<?php
require_once("conn_db.php");

function check_user_name($Name)
{

$conn = conn_db();

// 预处理及绑定
$stmt = $conn->prepare("select * from User where  user_name= ? ");
$stmt->bind_param("s", $name);

// 设置参数并执行
$name = $Name;
$stmt->execute();

//store result;
$stmt->store_result();  

// 取回全部查询结果
if($stmt->num_rows==0)
 {
    // echo "unique name";
     return 1;
 }else{
     //echo "not unique";
     return 0;
 }


$stmt->close();
$conn->close();
}


// return the result
function register_db($name,$Email,$City_id,$Street_id,$Passwd_hash)
{
    $conn = conn_db();

    $City_id = intval($City_id);
    $Street_id = intval($Street_id);

    
    // 预处理及绑定
    $stmt = $conn->prepare("INSERT INTO User(user_name,email, address_city_id , address_street_id ,password) VALUES  ( ?,?,?,?,? ) ");
    $stmt->bind_param("ssiis", $user_name,$email,$city_id,$street_id,$password_hash);

    // 设置参数并执行
    $user_name = $name;
    $email = $Email;
    $city_id = $City_id;
    $street_id = $Street_id;
    $password_hash = $Passwd_hash;
    $stmt->execute();

     if($stmt)
     {
         //echo "注册成功，请返回登陆";
         return 1;
     }else{
        // echo "执行失败";
         return 0;
     }
    
    $stmt->close();
    $conn->close();
}

check_user_name("aa bb");
//register_db("aa","aa","1","2","aaaa");
?>