<?php 
if(file_exists("db.php")){include("db.php");}
if(file_exists("connect.php")){include("connect.php");}
if(empty($connect['u_mail'])){
  header("Location:login.php");
  exit();
}
    $pro_id = $_GET['pro_id'];
    $query = $db->prepare("SELECT pro_id, cat_nom , cat_id, pro_libelle, pro_prix, pro_couleur, pro_photo, pro_description, pro_bloque, pro_stock, pro_ref, pro_d_ajout FROM produits join categories on cat_id = pro_cat_id WHERE pro_id = :pro_id ORDER BY pro_libelle");
    $query->bindParam(":pro_id", $pro_id);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $stock = $row['pro_stock'] ;
    if(!$row['pro_bloque'])
    { 
$stock = $row['pro_stock'] - $row['pro_bloque'];
    }
    if(empty($row['pro_id']))
    {  
          header("Location: 404.php");
        exit();
    }
define("title","Vous voulez supprimer ".$row['cat_nom']." ".$row['pro_libelle']."?" );
define("description","Confirmation de suppréssion  ".$row['cat_nom']." ".$row['pro_libelle']);
include('header.php');?>

    <!--
        content

    -->   
    <div class="container-fluid">
   
    <div class="row">
    <!-- 
        colonne central
    -->
    <div class="col-12">
            <article>
    <div class="card m-4" >
        <img  class="img-fluid" width="160" src="src/img/<?php echo $row['pro_id'];?>.<?php echo $row['pro_photo'];?>" alt="<?php echo ''.$row['cat_nom'].' '.$row['pro_libelle'].' '.$row['pro_couleur'].'';?>" title="<?php echo ''.$row['cat_nom'].' '.$row['pro_libelle'].' '.$row['pro_couleur'].'';?>">
     <div class="card-body">
        <h1 class="card-title">Etes vous sûr de vouloir supprimer <?php echo ''.$row['cat_nom'].' '.$row['pro_libelle'].' '.$row['pro_couleur'].'';?> de la base de données ?</h1>
            <form action="delete_script.php" method="POST">
                <input id="del" name="del" type="hidden" value="1">
                <input id="confirm" name="confirm" type="hidden" value="1">
                <input id="pro_id" name="pro_id" type="hidden" value="<?php echo $row['pro_id'];?>">
                <button class="btn btn-danger">Supprimer</button>  <a href="index.php" class="btn btn-success">Annuler</a> 
            </form>
   </div>
</div>

  </article>

    </div>
        </div>
    </div>

    <!--
        Footer
    -->
     
<?php include('footer.php');?>