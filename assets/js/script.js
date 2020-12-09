function verif()
{
//début de recupération des données du formulaire
        var nom = document.formulaire_contact.nom.value;
        var prenom = document.formulaire_contact.prenom.value;
        var date = document.formulaire_contact.date.value;
        var cp = document.formulaire_contact.cp.value;
        var adresse = document.formulaire_contact.adresse.value;
        var ville = document.formulaire_contact.ville.value;
        var mescommandes = document.formulaire_contact.mescommandes.value;
        var email = document.formulaire_contact.email.value;
        var cgu = document.querySelector('#cgu:checked');
        var question = document.formulaire_contact.question.value;

        //regex de contrôle des données
        var verif 	= /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/
        var ctrnom= /^[a-zA-Z]{2,}$/
        var ctrprenom = /^[a-zA-Z]{2,}$/
        var ctrcp = /^[0-9]{4,5}$/ 
        var ctrdate = /^[0-9]{4,4}-[0-9]{2,2}-[0-9]{2,2}$/
        var ctrquestion = /^[a-zA-Z0-9_.-]{4,}$/
        var ctradresse = /^[a-zA-Z0-9_.-]{2,}$/
        //au minimum 1 caractére car il existe la ville Y nom le plus court code postal 80190
        var ctrville= /^[a-zA-Z]{1,}$/
        var testedate = date.split('-');
        var dateactuelle=new Date()
        var year = dateactuelle.getFullYear();
        var diffdate = year - 110;
        var dateenv = year - 15;
        var validy = false//valeur par défaut
        if(parseInt(testedate[0])<parseInt(dateenv)&&testedate[0]>diffdate){// on contrôle que la personne a entre 15 ans et 120 ans
        validy = true
        }
    if (verif.exec(email) == null)// si email ne contient pas des lettre point chiffre avant @ aprés arobase pareilhormis là le point est interdit etc
    {

        document.getElementById("demail").innerHTML="<div class=\"alert alert-danger\" role=\"alert\">vous devez entrer une email correct</div>";//si c'est null on affiche box alerte
        document.getElementById("email").className = "form-control is-invalid";//on change la couleur de l'input en rouge
        var controlmail = false;//on retourne false au form pour évité l'envoie du formulaire

    }
    else
    {

        document.getElementById("email").className = "form-control is-valid";//on change la couleur de l'input en vert
        document.getElementById("demail").innerHTML="";//si c'est null on affiche rien
        var controlmail = true;//on retourne true pour cette variable

    } 

  
    if (ctradresse.exec(adresse) == null)// on contrôle l'entré
    {

        document.getElementById("dadresse").innerHTML="<div class=\"alert alert-danger\" role=\"alert\">vous devez entrer une adresse correct</div>";//si c'est null on affiche box alerte
        document.getElementById("adresse").className = "form-control is-invalid";//on change la couleur de l'input en rouge
        var controladresse = false;//on retourne false au form pour évité l'envoie du formulaire

    }
    else
    {

        document.getElementById("adresse").className = "form-control is-valid";//on change la couleur de l'input en vert
        document.getElementById("dadresse").innerHTML="";//si c'est null on affiche rien
        var controladresse = true;//on retourne true pour cette variable

    } 
    if (ctrville.exec(ville) == null)// on contrôle l'entré
    {

        document.getElementById("dville").innerHTML="<div class=\"alert alert-danger\" role=\"alert\">vous devez entrer une ville correct</div>";//si c'est null on affiche box alerte
        document.getElementById("ville").className = "form-control is-invalid";//on change la couleur de l'input en rouge
        var controlville= false;//on retourne false au form pour évité l'envoie du formulaire

    }
    else
    {

        document.getElementById("ville").className = "form-control is-valid";//on change la couleur de l'input en vert
        document.getElementById("dville").innerHTML="";//si c'est null on affiche rien
        var controlville = true;//on retourne true pour cette variable

    } 
    if (ctrcp.exec(cp) == null)// si email ne contient pas des lettre point chiffre avant @ aprés arobase pareil hormis là le point est interdit etc
    {

        document.getElementById("dcp").innerHTML="<div class=\"alert alert-danger\" role=\"alert\">vous devez entrer un code postal correct entre 4 à 5 chiffre suivant le pays</div>";//si c'est null on affiche box alerte
        document.getElementById("cp").className = "form-control is-invalid";//on change la couleur de l'input en rouge
        var controlcp = false;//on retourne false au form pour évité l'envoie du formulaire

    }
    else
    {

        document.getElementById("cp").className = "form-control is-valid";//on change la couleur de l'input en vert
        document.getElementById("dcp").innerHTML="";//si c'est null on affiche rien
        var controlcp = true;//on retourne true pour cette variable

    } 

    if (ctrnom.exec(nom) == null)//si nom ne contient pas au moins deux lettre on sait jamais monsieur wu sa existe :D
    {
      
        document.getElementById("nom").className = "form-control is-invalid";//on change la couleur de l'input en rouge
        document.getElementById("dnom").innerHTML="<div class=\"alert alert-danger\" role=\"alert\">Veuillez entrer correctement votre Nom</div>";//si c'est null on affiche box alerte
        var controlnom = false;//on retourne false au form pour évité l'envoie du formulaire

    }
    else
    {

        document.getElementById("nom").className = "form-control is-valid";//on change la couleur de l'input en vert
        document.getElementById("dnom").innerHTML="";//si c'est null on affiche rien
        var controlnom = true;//on retourne true pour cette variable
    }


    if (ctrprenom.exec(prenom) == null)// si prenom ne contient pas au moins deux caractére alphabétique pareil on rejette
    {

        document.getElementById("dprenom").innerHTML="<div class=\"alert alert-danger\" role=\"alert\">Veuillez entrer correctement votre Prénom</div>";//si c'est null on affiche box alerte
        document.getElementById("prenom").className = "form-control is-invalid";//on change la couleur de l'input en rouge
        var controlprenom = false;//on retourne false au form pour évité l'envoie du formulaire
    
    }
    else
    {
        document.getElementById("prenom").className = "form-control is-valid";//on change la couleur de l'input en vert
        document.getElementById("dprenom").innerHTML="";//si c'est null on affiche rien
        var controlprenom = true;//on retourne true pour cette variable
    }


    if (ctrdate.exec(date) == null||validy==false)//si la date ne ressemble pas à 0000-00-00 c'est que ce n'est pas correcte c'est se que retourne type date dans l'input
    {
        document.getElementById("ddate").innerHTML="<div class=\"alert alert-danger\" role=\"alert\">Veuillez entrer une date valide exemple 01/01/2020</div>";//si c'est null on affiche box alerte
        var controldate = false;//on retourne false au form pour évité l'envoie du formulaire
        document.getElementById("date").className = "form-control is-invalid";//on change la couleur de l'input en rouge
    }
    else
    {
        document.getElementById("date").className = "form-control is-valid";//on change la couleur de l'input en vert
        document.getElementById("ddate").innerHTML="";//si c'est null on affiche rien
        var controldate = true;//on retourne true pour cette variable
    }


    if (mescommandes == "")// si commande c'est vide c'est à dire rien n'a était séléctionné
    {
       
        document.getElementById("dmescommandes").innerHTML="<div class=\"alert alert-danger\" role=\"alert\">Vous devez séléctionner un sujet</div>";//si c'est null on affiche box alerte
        document.getElementById("mescommandes").className = "form-control is-invalid";//on change la couleur de l'input en rouge
        var controlmescommandes = false;//on retourne false au form pour évité l'envoie du formulaire
   
    }
    else
    {
        document.getElementById("mescommandes").className = "form-control is-valid";//on change la couleur de l'input en vert
        document.getElementById("dmescommandes").innerHTML="";//si c'est null on affiche rien
        var controlmescommandes = true; //on retourne true pour cette variable
    }


    if (ctrquestion.exec(question) == null)//si ya pas au moins 4 caractéres alpha numérique entré alors on refuse
    {
   
        document.getElementById("dquestion").innerHTML="<div class=\"alert alert-danger\" role=\"alert\">Vous devez nous indiquer votre question</div>";//si c'est null on affiche box alerte
        document.getElementById("question").className = "form-control is-invalid";//on change la couleur de l'input en rouge
        var controlquestion = false; //on retourne false au form pour évité l'envoie du formulaire

    }
    else
    {
        document.getElementById("question").className = "form-control is-valid";//on change la couleur de l'input en vert
        document.getElementById("dquestion").innerHTML="";//si c'est null on affiche rien
        var controlquestion= true;//on retourne true pour cette variable
    }


    if (cgu == null)//si cgu n'a pas était cocher alors on refuse
    {
  
        document.getElementById("dcgu").innerHTML="<div class=\"alert alert-danger\" role=\"alert\">Vous devez accepter nos conditionns</div>";//si c'est null on affiche box alerte
        document.getElementById("cgu").className = "custom-control-input is-invalid";//on change la couleur de l'input en rouge
        var controlcgu = false;//on retourne false au form pour évité l'envoie du formulaire

    }
    else
    {
        document.getElementById("cgu").className = "custom-control-input is-valid";//on change la couleur de l'input en vert
        document.getElementById("dcgu").innerHTML="";//si c'est null on affiche rien
        var controlcgu = true;//on retourne true pour cette variable
    }

        if(controlcp&&controlville&&controladresse&&controlnom&&controlprenom&&controlmail&&controldate&&controlmescommandes&&controlquestion&&controlcgu)//maintenant on s'assure que tout est valide 
        {
            return true;
        }
        else
        {
            //sinon on renvoi bien un false
            return false;
        }
}

function limitingData(oEvent) {
  if(isNaN(this.dataset.maxlength) == false)
  { 
    let oDiv =  document.getElementById(this.name+"Error");
        if(oDiv)
        {
            let oCnt =  oDiv.children[0], 
            iLongueur = this.value.length,
            iLimit = parseInt(this.dataset.maxlength);  

            if(iLimit - iLongueur < 0) 
            {
                oCnt.classList.add("warning");
                document.getElementById(this.name).className = "form-control is-invalid";
                document.getElementById(this.name).value =  document.getElementById(this.name).value.substring(0, iLimit);
                oCnt.textContent = iLimit - iLongueur ;
            }
            else
            {
                oCnt.classList.remove("warning");
                document.getElementById(this.name).className = "form-control is-valid";
                oCnt.textContent = iLongueur ;
            }

        }
  }
}

// pro_libelle et pro_couleur
document.addEventListener('DOMContentLoaded',function()
{
    let aTextarea = document.getElementsByTagName('input');
    for(let oTextarea of aTextarea)
    {
        if(oTextarea.maxLength == -1 && oTextarea.dataset.maxlength != null)
        {

            oTextarea.addEventListener('input',limitingData); //appel de la fonction limitingdata
        }
    }
});

  //fonction de contrôle du textera
document.addEventListener('DOMContentLoaded',function()
{
  let aTextarea = document.getElementsByTagName('textarea');
  for(let oTextarea of aTextarea)
  {

    if(oTextarea.maxLength == -1 && oTextarea.dataset.maxlength != null){
      oTextarea.addEventListener('input',limitingData); //appel de la fonction limitingdata
    }
    
  }
});