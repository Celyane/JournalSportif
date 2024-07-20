<?php
namespace journalSportif\controler;
require_once "/Applications/MAMP/htdocs/Projects/Journal_sportif_/vendor/autoload.php";
// require_once "./vendor/autoload.php";

use journalSportif\dao\Dao_Abon;
use journalSportif\metier\Abonnement\Abonnement;
use journalSportif\metier\abonnement\ModePaiement;
use journalSportif\metier\abonnement\Type_ab;
use journalSportif\metier\utilisateur\Utilisateur;

class Ctrl_abon{

    // AFFICHER TYPE AB
    public function typeAbonnement(){
        $dao= new Dao_Abon();
        $liste= $dao->getTypeAb();
        $tab=[];
            foreach ($liste as $abon ) {
                $abon = $dao->getTypeAb();
                array_push($tab, $abon);
            }
            require_once './src/view/abonnement/vabonnement.php';
    }

    // AFFICHER PERIODICITES POSSIBLES
    public function periodicites(){
        $dao= new Dao_Abon();
        $liste= $dao->getTypeAb();
        $id_tab= $_POST['type_ab'];
        // echo $id_tab;
        $dao= new Dao_Abon();
        $listeper= $dao->getPeriod($id_tab);

        require_once './src/view/abonnement/vabonnement.php';
    }   

    // AFFICHER LES MDP
    public function modePaiement(){
        
        $id_tab= $_POST['type_ab'];
        $id_per= $_POST['periodicite'];
        $dao= new Dao_Abon();
        $liste= $dao->getTypeAb();
        $listeper= $dao->getPeriod($id_tab);
        $modeP= $dao->getModePaiement();
        $tab=[];
            foreach ($modeP as $mdp ) {
                $mdp = $dao->getModePaiement();
                array_push($tab, $mdp);
            }
            require_once './src/view/abonnement/vabonnement.php';
            
    }

    // CREER UN ABONNEMENT
    public function creerAbon(){
        $id_tab= $_POST['type_ab'];
        $id_mdp= $_POST['idmdp'];
        // echo $id_mdp, $id_tab;
        
        if(isset($id_tab) && isset($id_mdp)){
            $dao= new Dao_Abon();
            $utilisateur = new Utilisateur(1,null,null,null,null,null,null);

            // recupere prix, libelle et instancier l'objet 
            $tab= $dao->getTabById($id_tab);
            $prix= $tab->getPrix();
            $libelle= $tab->getLibTab();
            $typeAb= new Type_ab($id_tab,$libelle,$prix);

            // recupere libelle et instancier l'objet
            $mdp= $dao->getMdpById($id_mdp);
            $lib_mdp= $mdp->getLibellemdp();
            $modePaiement = new ModePaiement($id_mdp,$lib_mdp);

            $abonnement = new Abonnement(null,null, $modePaiement, $typeAb, $utilisateur);
            $dao->newAbonnement($abonnement);
        }
        
        require_once './src/view/abonnement/abon_cree.php';
    }

    // METHODE AJOUT COMMENTAIRE
    public function ajoutCommentaire(){
        $commentaire=$_POST['commentaire'];

        if(empty($commentaire)){
            $erreur= "Le commentaire ne peut pas être ajouté s'il est vide";
        }
        elseif(strlen($commentaire) > 200){
            $erreur="Le commentaire dépasse la limite de 200 caractères";
        }
        else{
            $dao= new Dao_Abon();
            $dao->insertCom($commentaire);
        }
        if(isset($erreur)){
            echo $erreur;
        }
        require_once './src/view/abonnement/abon_cree.php';

    }

    // MODE DE PAIEMENT A AFFICHER
    public function afficherMDP(? string $message) {
        $dao = new Dao_Abon();
        $modeP = $dao->getModePaiement();
        $tab = [];
        foreach ($modeP as $mdp) {
            array_push($tab, $mdp);
        }
        require_once './src/view/abonnement/mode_paiements.php';
    }

    // SUPPRIMER UN MODE DE PAIEMENT
    public function DeleteMDP(){
        try{
            $mdp= $_GET['id_mdp'];
            $dao = new Dao_Abon();
            $message=$dao->deleteModeP($mdp);
            if(empty($message)) $message="Le mode de paiement à été supprimé avec succès";
        }
        catch (\Exception $e) {
        $message = "Une erreur est survenue lors de la suppression du mode de paiement" . $e->getCode() . $e->getMessage();
        // echo $message;
        }
        $this->afficherMDP($message);
        // require_once './src/view/abonnement/mode_paiements.php';

    }


}

