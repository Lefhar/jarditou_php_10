<!--
        header

    -->   
    <?php 
define("title","Inscription");
define("description","Formulaire pour vous inscrires");
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
         <p>* Ces zones sont obligatoires</p>
         <form action="add_register.php" method="post" id="inscription"  name="inscription"  onsubmit="return verif();" autocomplete="off"> <!--balise form début du formulaire-->
         <fieldset><!--début fieldset pour les coordonnées-->
             <legend>Inscription</legend>
             <div class="form-group">
                 <label for="nom">Votre nom* :  </label>
                 <input type="text" id="nom" name="nom" class="form-control" placeholder="Votre nom"  required>
                 <div id="dnom"></div>
                 <br>
               </div>
               <div class="form-group">
                 <label for="prenom">Votre prénom* :  </label>
                 <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Votre prénom"  required>
                 <div id="dprenom"></div><br>
               </div>
             
             <p>Sexe* : </p>
             <div class="form-check  form-check-inline">
             <input type="radio" name="sexe" id="fem"  class="form-check-input" value="f" checked>
             <label for="fem" >Fémimin </label> 
            </div>

            <div class="form-check  form-check-inline">
              <input type="radio" name="sexe" id="masc"  class="form-check-input" value="h"  >
              <label for="masc" >Masculin</label><br>
            </div>

            <div class="form-check  form-check-inline">
              <input type="radio" name="sexe" id="null"  class="form-check-input" value="null"  >
              <label for="null" >Autre</label><br>
            </div>
            
            <div class="form-group">
                 <label for="adresse">Adresse :  </label>
                 <input type="text" id="adresse" name="adresse" class="form-control" placeholder="Votre adresse postale" >
				    <div id="dadresse"></div>
					<br>
             </div>

              <div class="form-group">
                 <label for="cp">Code postal :  </label>
                 <input type="text" id="cp" class="form-control" name="cp">
				    <div id="dcp"></div><br>
              </div>



               <div class="form-group">
                 <label for="ville">Ville :  </label>
                 <input type="text" id="ville" class="form-control" name="ville">
				  <div id="dville"></div><br>
               </div>

              <div class="form-group">
                 <label for="email">Email :  </label>
                 <input type="email" id="email" name="email" class="form-control" placeholder="votre Email"  autocomplete="off" required>
                <div id="demail"></div><br>
             </div>

             <div class="form-group">
                 <label for="confirmemail">Confirmer votre email :  </label>
                 <input type="email" id="confirmemail" name="confirmemail" class="form-control" placeholder="votre Email" autocomplete="off" required>
                <div id="dconfirmemail"></div><br>
             </div>

             <div class="form-group">
                 <label for="password">Mot de passe : (votre mot de passe doit contenir au minimum 12 caractéres dont une majuscule un chiffre et un symbole) </label>
                 <input type="password" id="password" name="password" class="form-control" placeholder="Votre mot de passe" autocomplete="off" required>
                <div id="dpassword"></div><br>
             </div>

             <div class="form-group">
                 <label for="confirpassword">Confirmer votre email :  </label>
                 <input type="password" id="confirpassword" name="confirmpassword" class="form-control" placeholder="Votre mot de passe" autocomplete="off" required>
                <div id="dconfirpassword"></div><br>
             </div>
                </fieldset><!--fin fieldset pour les coordonnées-->
     
         <fieldset><!--début fieldset pour la demande-->
           
            
        <div class="form-group">
              <button type="submit"  class="btn btn-dark btn-lg">Envoyer</button>    <button type="reset" class="btn btn-dark btn-lg">Annuler</button>
         </div>
     </form> <!--balise form fin du formulaire-->
      </div>
    </article>

   
        </div>
    </div>
</div> 
    <!--
        Footer
    -->
<?php include('footer.php');?>