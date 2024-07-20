<?php 
    namespace projet;
    use journalSportif\controler\Ctrl_abon;

    require_once "/Applications/MAMP/htdocs/Projects/Journal_sportif_/vendor/autoload.php";
    // require_once "./vendor/autoload.php";

    //capture de l'URI
    $uri = $_SERVER["REQUEST_URI"]; 
    // extraction route sans paramètres
    $route = explode("?" , $uri)[0];
    // convertir en minuscule
    $method= strtolower($_SERVER["REQUEST_METHOD"]);
    // supprime index.php de la route
    $route = str_replace('/index.php', '', $route);
 

    $ctrl_abon= new Ctrl_abon();   
    if ($method === 'get' && $route === '/accueil') {
        // header('Location: src/view/abonnement/accueil.php');
        // exit;
        $ctrl_abon->typeAbonnement();
    }
    elseif ($method == "get"  && $route == "/liste-abonnements")             $ctrl_abon->typeAbonnement();
    elseif ($method == "get" && $route == "/liste-periodes")                $ctrl_abon->periodicites();
    elseif ($method == "post" && $route == "/liste-periodes")                $ctrl_abon->periodicites();
    elseif ($method == "post" && $route == "/mode-paiements")                $ctrl_abon->modePaiement();
    elseif ($method == "post" && $route == "/abonnement-cree")               $ctrl_abon->creerAbon();
    elseif ($method == "get" && $route == "/liste-paiement")                 $ctrl_abon->afficherMDP("");
    elseif ($method == "get" && $route == "/supprimer-paiement")            $ctrl_abon->DeleteMDP();
    elseif ($method == "post" && $route == "/commentaire")                   $ctrl_abon->ajoutCommentaire();
    else echo "not found";


    


