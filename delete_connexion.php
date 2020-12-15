<?php 
session_start();
 if(file_exists("db.php")){include("db.php");}
if(!empty($_SESSION['login'])&&!empty($_SESSION['jeton'])){
    unset($_COOKIE["jarditou"]);
    setcookie("jarditou", '', time() - 4200, '/');
    $_SESSION['login'] = "";
    $_SESSION['jeton'] = "";
    session_destroy();
    header("Location: index.php");
    exit();
}else{
    header("Location: index.php");
    exit();
}
?>
