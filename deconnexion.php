<?php 
define("title","Confirmation de déconnexion");
define("description","Veuillez confirmer la déconnexion");
include('header.php');?>

    <!--
        content

    -->   
    <div class="container">
   
    <div class="row">
    <!-- 
        colonne central
    -->
    <div class="col-12 p-5 m-5">
            <article>
   

        <!-- formulaire de suppréssion du produit si get del ==1 -->
    <div class="card m-4" >
  
     <div class="card-body">
        <h1 class="card-title">Etes vous sûr de vouloir vous déconnecter ?</h1>
            <form action="delete_connexion.php" method="POST">
                <input id="confirm" name="confirm" type="hidden" value="1">
                <button class="btn btn-danger">Déconnecter</button>  <a href="index.php" class="btn btn-success">Annuler</a> 
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