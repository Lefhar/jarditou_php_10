<?php 
include('db.php');

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
define("title","".$row['cat_nom']." ".$row['pro_libelle']);
define("description","Modification de ".$row['cat_nom']." ".$row['pro_libelle']);
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
            <?php if(empty($_GET['del'])){?>
    <div class="card m-4" >
  <img  class="img-fluid" width="160" src="src/img/<?php echo $row['pro_id'];?>.<?php echo $row['pro_photo'];?>" alt="<?php echo ''.$row['cat_nom'].' '.$row['pro_libelle'].' '.$row['pro_couleur'].'';?>" title="<?php echo ''.$row['cat_nom'].' '.$row['pro_libelle'].' '.$row['pro_couleur'].'';?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo ''.$row['cat_nom'].' '.$row['pro_libelle'].'';?> <?php echo $row['pro_couleur'];?></h5>
    <p class="card-text"><?php echo $row['pro_description'];?></p>
    <p class="card-text">Prix : <?php echo $row['pro_prix'];?>&euro;</p>
    <p class="card-text">Stock : <?php echo $stock;?> Produit disponible</p>
    <p class="card-text">Référence : <?php echo $row['pro_ref']?></p>
    <p class="card-text">catégorie : <?php echo $row['cat_nom']?></p>
    <p class="card-text">Ajouté le : <?php echo $row['pro_d_ajout']?></p>
    <a href="update_form.php?pro_id=<?php echo $row['pro_id'];?>" class="btn btn-primary">Modifier</a>   <a href="detail.php?pro_id=<?php echo $row['pro_id'];?>&del=1"   class="btn btn-danger">Supprimer le produit</a>
    <?php $query->closeCursor(); ?>
  </div>
</div>

     <?php }elseif(!empty($_GET['del'])&&$_GET['del']==1){?>

        <!-- formulaire de suppréssion du produit si get del ==1 -->
    <div class="card m-4" >
        <img  class="img-fluid" width="160" src="src/img/<?php echo $row['pro_id'];?>.<?php echo $row['pro_photo'];?>" alt="<?php echo ''.$row['cat_nom'].' '.$row['pro_libelle'].' '.$row['pro_couleur'].'';?>" title="<?php echo ''.$row['cat_nom'].' '.$row['pro_libelle'].' '.$row['pro_couleur'].'';?>">
     <div class="card-body">
        <h1 class="card-title">Etes vous sûr de vouloir supprimer <?php echo ''.$row['cat_nom'].' '.$row['pro_libelle'].' '.$row['pro_couleur'].'';?> de la base de données ?</h1>
            <form action="delete_form.php" method="POST">
                <input id="del" name="del" type="hidden" value="1">
                <input id="confirm" name="confirm" type="hidden" value="1">
                <input id="pro_id" name="pro_id" type="hidden" value="<?php echo $row['pro_id'];?>">
                <button class="btn btn-danger">Supprimer</button>  <a href="index.php" class="btn btn-success">Annuler</a> 
            </form>
   </div>
</div>
 <?php } ?>
  </article>

    </div>
        </div>
    </div>

    <!--
        Footer
    -->
     
<?php include('footer.php');?>