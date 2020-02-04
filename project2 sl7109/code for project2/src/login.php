<?php

//check user exists?
// check password right or not
//login success! set sessision or cookie!


// if(password_verify("aa", $passwd_hash)) {
//     echo  "密码正确";
//    }else{
//     echo "密码错误";
//    }

require_once("../dbs/login_db.php");
$user = $_POST["firstname"]." ".$_POST["lastname"];
$passwd = $_POST["password"];


$re = check_user($user);
$password_hash=$re[1];
if($password_hash=="0")
{
    //echo $password_hash;
    echo "user not exists";
}else{
   
     if(password_verify($passwd,$password_hash)) {
        session_start();
        //  注册登陆成功的 admin 变量，并赋值 true
        $_SESSION["admin"] = true;
        $_SESSION["uid"] = $re[0];
        $_SESSION["name"] = $user;
    echo  "login correct";


    //重定向浏览器 

    //echo $_SESSION["uid"];
    header("Location: http://47.111.29.63/src/main.php"); 
    //确保重定向后，后续代码不会被执行 
    exit;

    //重定向页面到主页

   }else{
    echo "login failed!";
   }
}



?>
