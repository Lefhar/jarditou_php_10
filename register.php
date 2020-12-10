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
    <div class="container">
   
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
                 <textarea type="text" id="adresse" name="adresse" class="form-control" placeholder="Votre adresse postale"  cols="30" rows="6"></textarea>
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
                 <label for="password">Mot de passe : (votre mot de passe doit contenir au minimum 12 caractéres dont une majuscule un chiffre et un symbole) </label>
               
                 <div class="input-group">
             <input type="password" id="password" name="password" class="form-control" placeholder="Votre mot de passe"  minlength="12"  autocomplete="off" required="" aria-describedby="viewpassword">
      <div class="input-group-append" id="password"> <span class="input-group-text" id="viewpassword">
    <i class="fa fa-eye-slash" aria-hidden="true" id="eyepassword"></i></span>
      </div>
    </div>
    <div id="dpassword"></div>
    </div>

             <div class="form-group"  id="divconfirmmdp">
                 <label for="confirpassword">Confirmer votre mot de passe :  </label>
                 <div class="input-group" >
             <input type="password" id="confirpassword" name="confirpassword" class="form-control" minlength="12" placeholder="Confirmer votre mot de passe" autocomplete="off" required="" aria-describedby="viewconfirpassword">
      <div class="input-group-append" id="confirpassword"> <span class="input-group-text" id="viewconfirpassword">
    <i class="fa fa-eye-slash" aria-hidden="true" id="eyeconfirmpassword"></i></span>
      </div>
    </div>
    <div id="dconfirpassword"></div>
    </div>
                <br>
             </div>
            
     
  
            
        <div class="form-group">
              <button type="submit"  class="btn btn-dark btn-lg">Envoyer</button>    <button type="reset" class="btn btn-dark btn-lg">Annuler</button>
         </div>
         </fieldset><!--fin fieldset pour les coordonnées-->
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