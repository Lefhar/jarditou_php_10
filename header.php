<?php if(file_exists("function.php")){include("function.php");}
 if(file_exists("db.php")){include("db.php");}
 if(file_exists("connect.php")){include("connect.php");}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css?id=<?php echo date('sih');?>">
    <title><?php echo title;?></title>
<meta name="description" content="<?php echo description;?>" />
</head>
<body>
    <header>
   <!--
        header

    -->   
        <!--

            logo du site avec le titre à droite
        -->
        <div class="container-fluid">
            <div class="row">
                <div class="col 12 col-lg-2 pt-2">
         
                <img src="src/img/jarditou_logo.jpg"  class="img-fluid" alt="Jarditou" title="Jarditou">   
              </div>
            
              <div class="col 12 col-lg-10 pt-2">
                <div class="text-right h1">Tout le jardin</div>
            </div>
            </div>
    </div>
    <!--
        barre du menu
    -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!--bouton sur mobile-->
            <a class="nav-brand navbar-text" href="index.php">Jarditou</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste.php">Nos produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="accueil.php">A propos</a>
                </li>
                <?php if (empty($_SESSION["login"])&&empty($_SESSION["jeton"])) {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="login.php">Mon compte</a>
                    </li>';
                    
                }else{
                    echo '<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    '.$connect['u_nom'].' '.$connect['u_prenom'].'
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link" href="account.php">Mon compte</a>
                            <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                    </div>
                  </li>';
                }
                    ?>
            </ul>
            <!--
                barre de recherche dans la nav bar
            -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form class="form-inline ml-auto">
                  <div class="md-form my-0">
                    <input class="form-control" id="search"  name="search" type="text" placeholder="Votre promotion" aria-label="Search">
                  </div>
                  <button class="btn btn-outline-success btn-md my-0 ml-sm-2" type="submit">Rechercher</button>
                </form>
            
              </div>
        </div>
    </nav>
    <div class="container-fluid"><div class="row"><img src="src/img/promotion.jpg" class="w-100" alt="Jarditou" title="Jarditou"></div></div>
    </header> 
