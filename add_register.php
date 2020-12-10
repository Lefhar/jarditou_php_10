<?php 
if (session_status() == PHP_SESSION_ACTIVE) {
    header(" account.php");
    exit();
}else{
    var_dump($_POST);
    if(!empty($_POST['nom'])
    &&preg_match("`^[a-zA-Z]{2,}$`",$_POST['nom'])
    &&!empty($_POST['prenom'])
    &&preg_match("`^[a-zA-Z]{2,}$`",$_POST['prenom'])
    &&!empty($_POST['cp'])
    &&preg_match("`^[0-9]{4,5}$`",$_POST['cp'])
    &&!empty($_POST['ville'])
    &&preg_match("`^[a-zA-Z]{1,}$`",$_POST['ville'])
    &&!empty($_POST['email'])
    &&preg_match("`^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$`",$_POST['email'])
    &&!empty($_POST['password'])
    &&preg_match("`^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{12,})$`",$_POST['password'])
    &&!empty($_POST['confirpassword'])
    &&$_POST['password'] == $_POST['confirpassword']
    ){
        $salt = random_bytes(12);
echo $_POST['nom'];
echo $_POST['prenom'];
echo  bin2hex($salt) ;
    }

}

?>