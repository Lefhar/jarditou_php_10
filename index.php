<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
$file = basename($_SERVER['PHP_SELF']);
if(file_exists($file))
{
    switch($file){
        case 'index.php';
        include('liste.php');
    break;
    default :
        include($file);
    }

}
else
{
    include('404.php');
}
?>