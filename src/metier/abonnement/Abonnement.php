<?php
namespace journalSportif\metier\Abonnement;
require_once "/Applications/MAMP/htdocs/Projects/Journal_sportif_/vendor/autoload.php";
// require_once "./vendor/autoload.php";

use journalSportif\metier\abonnement\ModePaiement;
use journalSportif\metier\abonnement\Type_ab;
use journalSportif\metier\utilisateur\Utilisateur;

class Abonnement{
    private ?int               $id_abonne;
    private string             $date_souscrit;
    private ?string            $question_ab;
    private ?ModePaiement      $id_mdp;
    private Type_ab            $id_tab;
    private Utilisateur        $id_utilisateur;

    public function __construct($id_abonne,$question_ab,? ModePaiement $id_mdp, Type_ab $id_tab, Utilisateur $id_utilisateur){
        $this->id_abonne= null;
        $this->setDateSouscrit();
        $this->setQuestionAb($question_ab);
        $this->id_mdp=$id_mdp;
        $this->id_tab=$id_tab;
        $this->id_utilisateur=$id_utilisateur;
    }

    // ID ABONNE
    public function getIdAbon(){
        return $this->id_abonne;
    }
    public function setIdAbon($id_abonne){
        return $this->id_abonne;
    }
    // DATE SOUSCRIT
    public function getDateSouscrit(){
        return $this->date_souscrit;
    }
    // SET DATE SOUSCRIT = DATE DU JOUR
    public function setDateSouscrit() {
        $this->date_souscrit = date('Y-m-d');
    }    
    // QUESTION AB
    public function getQuestionAb(){
        return $this->question_ab;
    }
    public function setQuestionAb($question_ab){
        $this->question_ab=$question_ab;
    }
    // UTILISATEUR

    public function getIdUtilisateur(){
         return $this->id_utilisateur;
     }
    public function setIdUtilisateur($id_utilisateur){
        return $this->id_utilisateur;
    }
    // MODE PAIEMENT
    public function getMdp(){
        return $this->id_mdp;
    }
    // TYPE ABONNEMENT
    public function getTab(){
        return $this->id_tab;
    }
    // UTILISATEUR
    public function getUtilisateur(){
        return $this->id_utilisateur;
    }

    // TO STRING
    public function __toString()
        {
            return $this->getIdAbon()." - ".$this->getDateSouscrit()." - ".$this->getQuestionAb() . " - ";
        }
}


