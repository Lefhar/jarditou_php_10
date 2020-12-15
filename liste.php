<?php 
define("title","Nos produits");
define("description","Notre gamme de produits");
include('header.php');
?>

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
                <h2>Nos produits</h2>
                <div class="dropdown m-2">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Trier par
          </button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
            <li class="dropdown-submenu">
              <a class="dropdown-item" tabindex="-1" href="#">Catégorie</a>
              <ul class="dropdown-menu">
                <li class="dropdown-item"><a tabindex="-1" href="<?php echo basename($_SERVER['PHP_SELF']);?>?cat=asc">Croissant</a></li>
                <li class="dropdown-item"><a tabindex="-1" href="<?php echo basename($_SERVER['PHP_SELF']);?>?cat=desc">Décroissant</a></li>
              </ul>
            </li>
        
		
            <li class="dropdown-submenu">
              <a class="dropdown-item" tabindex="-1" href="#">Prix</a>
              <ul class="dropdown-menu">
                <li class="dropdown-item"><a tabindex="-1" href="<?php echo basename($_SERVER['PHP_SELF']);?>?prix=asc">Croissant</a></li>
                <li class="dropdown-item"><a tabindex="-1" href="<?php echo basename($_SERVER['PHP_SELF']);?>?prix=desc">Décroissant</a></li>
              </ul>
            </li>
         </ul>
         <?php if(!empty($row['u_mail'])){?>
         <a class="btn btn-success float-right" href="add_form.php">Ajouter un produit</a>
         <?php } ?>
        </div>
                
                <div class="table-responsive">
                <table class="table table-sm table-striped table-striped-warning table-bordered"><!--début du tableau-->
                
                
                
                
                
            <thead class="thead-light">
              <tr>
              <th  scope="col">Photos</th><!--titre colonne 1-->
              <th scope="col" >ID</th><!--colonne 2-->
              <th scope="col">Référence</th><!--titre colonne 3-->
              <th scope="col">Libellé</th><!--titre colonne 4-->
              <th scope="col">Prix</th><!--titre colonne 5-->
              <th scope="col">Stock</th><!--titre colonne 6-->
              <th scope="col">Couleur</th><!--titre colonne 7-->
              <th scope="col">Ajout</th><!--titre colonne 8-->
              <th scope="col">Modif</th><!--titre colonne 9-->
              <th scope="col">Bloqué</th><!--titre colonne 9-->
            </tr>
            </thead>
            <tbody>

            
<?php  
if(!empty($_GET['cat'])&&$_GET['cat'] =='asc')
{
      $order = "order by cat_nom asc";
}
elseif(!empty($_GET['cat'])&&$_GET['cat'] =='desc')
{
  $order = "order by cat_nom desc";
}
elseif(!empty($_GET['prix'])&&$_GET['prix'] =='asc')
{
      $order = "order by pro_prix asc";
}
elseif(!empty($_GET['prix'])&&$_GET['prix'] =='desc')
{
      $order = "order by pro_prix desc";
}
else
{
  $order = "order by pro_id asc";
}
    

    $query = $db->prepare('SELECT pro_id, cat_nom , pro_libelle, pro_prix, pro_couleur, pro_photo, pro_ref, pro_stock, pro_d_ajout, pro_d_modif, pro_bloque  FROM produits join categories on cat_id = pro_cat_id '.$order);
    $query->execute();//execution
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) //notre boucle while pour afficher tout les produits
    {
      $bloque ="";
if($row['pro_bloque']){$bloque ='<span class="bloque">bloqué</span>';}

       echo '<tr  class="table-striped-warning">
              <td ><img width="100" src="src/img/'.$row['pro_id'].'.'.$row['pro_photo'].'" alt="'.$row['cat_nom'].' '.$row['pro_libelle'].'"  title="'.$row['cat_nom'].' '.$row['pro_libelle'].'" class="img-fluid" /></td>
              <td>'.$row['pro_id'].'</td>
              <td>'.$row['pro_ref'].'</td>
              <td><a href="detail.php?pro_id='.$row['pro_id'].'" title="détail" alt="détail">'.$row['pro_libelle'].'</a></td>
              <td>'.$row['pro_prix'].'&euro;</td>
              <td>'.$row['pro_stock'].'</td>
              <td>'.$row['pro_couleur'].'</td>
              <td>'.$row['pro_d_ajout'].'</td>
              <td>'.$row['pro_d_modif'].'</td>
              <td>'.$bloque.'</td>
            </tr>';

    }
    $query->closeCursor();
        ?>
     
                    </tbody>
                  </table> <!--fin du tableau-->
                </div><!--fermeture de la div table responsive-->
                </article>
        </div>
    </div>
</div> 

    <!--
        Footer
    -->
    <?php include('footer.php');?>