<?php 
if (session_status() == PHP_SESSION_ACTIVE) {
    header(" account.php");
}else{
    var_dump($_POST);

}

?>