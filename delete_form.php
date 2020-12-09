<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);  
include_once('db.php');

$pro_id = (int)$_POST['pro_id'];

            $query = $db->prepare("SELECT pro_id FROM produits WHERE pro_id = :pro_id ORDER BY pro_libelle");
            $query->bindParam(":pro_id", $pro_id);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();//on libére la mémoire
            
if(!empty($row['pro_id'])&&!empty($_POST['del'])&&$_POST['del']==1&&!empty($_POST['confirm'])&&$_POST['confirm']==1)
{
            $req = $db->prepare('DELETE FROM produits WHERE pro_id= :pro_id');
            $req->bindParam(':pro_id', $row['pro_id']);
            $success = $req->execute();
            $req->closeCursor();//on libére la mémoire


    if($success)
    {

    header("Location: index.php");
    }
    else
    {

    header("Location: detail.php?pro_id=".$pro_id."&e=3");
    }
}
else
{
    header("Location: index.php");
}
?>