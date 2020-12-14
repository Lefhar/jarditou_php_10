<!--
        header

    -->   
    <?php 
define("title","Nous contacter");
define("description","Formulaire pour nous contacter");
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
         <p>* Ces zones sont obligatoires</p>
         <form action="http://bienvu.net/script.php" method="post" id="formulaire_contact"  name="formulaire_contact"  onsubmit="return verif();"> <!--balise form début du formulaire-->
         <fieldset><!--début fieldset pour les coordonnées-->
             <legend>Vos coordonnées</legend>
             <div class="form-group">
                 <label for="nom">Votre nom* :  </label>
                 <input type="text" id="nom" name="nom" class="form-control" placeholder="Votre nom" value="" required>
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
             <input type="radio" name="sexe" id="fem"  class="form-check-input" value="féminin" checked>
             <label for="fem" >Fémimin </label> 
            </div>
            <div class="form-check  form-check-inline">
              <input type="radio" name="sexe" id="masc"  class="form-check-input" value="masculin"  >
              <label for="masc" >Masculin</label><br>
             
            </div>
            <div class="form-group">
              <label for="date">Date de naissance* :  </label>
              <input type="date" id="date" name="date" class="form-control" required>
              <div id="ddate"></div><br>
            </div>

              <div class="form-group">
                 <label for="cp">Code postal :  </label>
                 <input type="text" id="cp" class="form-control" name="cp">
				    <div id="dcp"></div><br>
              </div>

              <div class="form-group">
                 <label for="adresse">Adresse :  </label>
                 <input type="text" id="adresse" name="adresse" class="form-control" placeholder="Votre adresse postale" >
				    <div id="dadresse"></div>
					<br>
             </div>

               <div class="form-group">
                 <label for="ville">Ville :  </label>
                 <input type="text" id="ville" class="form-control" name="ville">
				  <div id="dville"></div><br>
               </div>

              <div class="form-group">
                 <label for="email">Email :  </label>
                 <input type="email" id="email" name="email" class="form-control" placeholder="votre Email"  required>
                <div id="demail"></div><br>
             </div>

                </fieldset><!--fin fieldset pour les coordonnées-->
     
         <fieldset><!--début fieldset pour la demande-->
             <legend>Votre demande</legend>
             <div class="form-group">
          <label for="mescommandes"> Sujet* : </label>  
         
          <select name="mescommandes" id="mescommandes" class="form-control">
              <option value="">Choisissez</option>
                 <option value="Mes commandes">Mes commandes</option>
                 <option value="question">Question sur un produit</option>
                 <option value="Réclamation">Réclamation</option>
                 <option value="Autres">Autres</option>
             </select>
             <div id="dmescommandes"></div><br>
             </div>

             <div class="form-group">
             <label for="question">Votre question* : </label>
             <textarea name="question"  id="question" class="form-control" rows="2" cols="20" required></textarea> 
            <div id="dquestion"></div><br>
         </div>
         </fieldset><!--fin fieldset pour la demande-->
         <br>

         <div class="form-group">
     
            <div class="custom-control">
         <input type="checkbox" class="custom-control-input" id="cgu"  name="cgu" required >
          <label class="custom-control-label" for="cgu">* J'accepte le traitement informatique de ce formulaire.</label>     
         <div id="dcgu"></div><br>
        </div>
            </div>
            
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