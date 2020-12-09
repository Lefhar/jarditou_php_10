<!--
        header

    -->   
    <?php 
    include_once('db.php');
    $pro_id = $_GET['pro_id'];
    $query = $db->prepare("SELECT pro_id, cat_nom , cat_id, pro_libelle, pro_prix, pro_couleur, pro_photo, pro_description, pro_stock, pro_ref, pro_bloque, pro_d_ajout, pro_d_modif FROM produits join categories on cat_id = pro_cat_id WHERE pro_id = :pro_id ORDER BY pro_libelle");
    $query->bindParam(":pro_id", $pro_id);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
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
    <div class="container-fluid"><div class="row"><img src="src/img/promotion.jpg" class="w-100" alt="Jarditou" title="Jarditou"></div></div>
    <div class="container-fluid">
   
    <div class="row">
    <!-- 
        colonne central
    -->
    <div class="col-12">
            <article>
            
       <legend> Modification du produit <?php echo $row['pro_libelle'];?></legend>
       <?php if(!empty($_GET['e'])){echo error((int)$_GET['e']);}?>
          <form action="update_script.php" method="POST" id="modification_produit"  name="modification_produit" > <!--balise form début du formulaire-->
          <fieldset>
             <input type="hidden" id="pro_id"  name="pro_id" value="<?php echo $row['pro_id'];?>"><!--  post de pro_id en input masqué -->

        <div class="form-group row">
        <label for="pro_ref" class="col-sm-2 col-form-label col-12">ID :</label>
        <div class="col-sm-10 col-12"> 
        <input type="text" class="form-control"  value="<?php echo $row['pro_id'];?>" disabled> <br>
        </div>
        </div>   

        

        <div class="form-group row">
        <label for="pro_ref" class="col-sm-2 col-form-label col-12">Référence :</label>
        <div class="col-sm-10 col-12"> 
        <input type="text" class="form-control is-valid" id="pro_ref"  name="pro_ref"  data-maxlength="10" value="<?php echo $row['pro_ref'];?>"> <br>
        <div id="pro_refError" class="counter"><span>0</span> caractères (10 max)</div> 
        </div>
        </div>   

        <div class="form-group row">
        <label for="cat_id" class="col-sm-2 col-form-label" >Catégorie  </label>
        <div class="col-sm-10 col-12"> 
        <select name="cat_id" id="cat_id" class="form-control is-valid">
        <?php   $query2 = $db->prepare('SELECT cat_nom, cat_id  FROM  categories WHERE   cat_id != :cat_id ORDER BY cat_nom asc');
                $query2->execute(array('cat_id' => $row['cat_id'] ));
                echo '<option value="'.$row['cat_id'].'">'.$row['cat_nom'].'</option>' ;
                while ($cat = $query2->fetch(PDO::FETCH_ASSOC)) 
                {
                echo '<option value="'.$cat['cat_id'].'">'.$cat['cat_nom'].'</option>' ;
                $query2->closeCursor();//on libére la mémoire
                }?>
        </select><br>
        </div>
          </div>
           
        <div class="form-group row">
        <label for="pro_libelle" class="col-sm-2 col-form-label col-12">Libellé :</label>
        <div class="col-sm-10 col-12"> 
        <input type="text" class="form-control is-valid" id="pro_libelle"  name="pro_libelle"  data-maxlength="200" value="<?php echo $row['pro_libelle'];?>"> <br>
        <div id="pro_libelleError" class="counter"><span>0</span> caractères (200 max)</div> 
        </div>
        </div>   

        <div class="form-group row">
        <label for="pro_couleur" class="col-sm-2 col-form-label col-12">Couleur :</label>
        <div class="col-sm-10 col-12"> 
        <input type="text" class="form-control is-valid" id="pro_couleur"  name="pro_couleur"   data-maxlength="30" value="<?php echo $row['pro_couleur'];?>"> <br>
        <div id="pro_couleurError" class="counter"><span>0</span> caractères (30 max)</div> 
        </div>
        </div>  

        <div class="form-group row">
        <label for="pro_img" class="col-sm-2 col-form-label col-12">Extension de la photo :</label>
        <div class="col-sm-10 col-12"> 
        <input type="text" class="form-control is-valid" id="pro_img"  name="pro_img"  value="<?php echo $row['pro_photo'];?>"> <br>
        </div>
        </div>   


        <div class="form-group row">
        <label for="pro_prix" class="col-sm-2 col-form-label col-12">Prix :</label>
        <div class="col-sm-10 col-12"> 
        <input  type="number"  step="any" class="form-control is-valid" id="pro_prix"  name="pro_prix"  value="<?php echo $row['pro_prix'];?>"> <br>
        </div>
        </div>   

        <div class="form-group row">
        <label for="pro_stock" class="col-sm-2 col-form-label col-12">Stock :</label>
        <div class="col-sm-10 col-12"> 
        <input  type="number" class="form-control is-valid" id="pro_stock"  name="pro_stock"  value="<?php echo $row['pro_stock'];?>"> <br>
        </div>
        </div>   

        <div class="form-group row">
        <div class="col-sm-2 col-12"> 
        <p>Bloquer le produit ? :</p>
        </div>
         <div class="form-check  form-check-inline col-sm-9 col-12 pl-4">
        <input type="radio" class="form-check-input" id="pro_stock_oui" name="pro_bloque" value="1" <?php if($row['pro_bloque']==1){echo 'checked';}?>>
        <label for="pro_stock_oui" class="form-check-input">Oui</label>
        <input type="radio" class="form-check-input" id="pro_stock_non" name="pro_bloque" value="0"<?php if($row['pro_bloque']==0){echo 'checked';}?>>
        <label for="pro_stock_non" class="form-check-input">Non</label>
         <br>
        </div>
        </div>

        <div class="form-group row">
        <label for="pro_description" class="col-sm-2 col-form-label" >Description produit  </label>
        <div class="col-sm-10 col-12"> 
        <textarea rows="8" name="pro_description"   id="pro_description"  data-maxlength="1000" class="form-control" cols="30" rows="10"  placeholder="description (1000 caractères MAX)"><?php echo $row['pro_description'];?></textarea><br>
        <div id="pro_descriptionError" class="counter"><span>0</span> caractères (1000 max)</div> 
        </div>
        </div>

        <div class="form-group row">
        <label for="pro_d_ajout" class="col-sm-2 col-form-label col-12">Date d'ajout :</label>
        <div class="col-sm-10 col-12"> 
        <input class="form-control"   value="<?php echo $row['pro_d_ajout'];?>" disabled> <br>
        </div>
        </div>   
        
        <?php if($row['pro_d_modif']){?>
        <div class="form-group row">
        <label for="pro_d_ajout" class="col-sm-2 col-form-label col-12">Date de modification :</label>
        <div class="col-sm-10 col-12"> 
        <input class="form-control"   value="<?php echo $row['pro_d_modif'];?>" disabled> <br>
        <?php }?>
        </div>
        </div>   
        

        <div class="form-group">
        <a href="index.php"  class="btn btn-dark btn-lg">Retour</a>         <button type="submit"  class="btn btn-success btn-lg">Enregistrer</button>    
         </div>
  </fieldset>
     </form> <!--balise form fin du formulaire-->
 
    </article>

    </div>
        </div>
    </div>

    <!--
        Footer
    -->
<?php include('footer.php');?>