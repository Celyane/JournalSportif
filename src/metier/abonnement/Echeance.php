<?php
namespace journalSportif\metier\abonnement;
require_once "/Applications/MAMP/htdocs/Projects/Journal_sportif_/vendor/autoload.php";
// require_once "./vendor/autoload.php";

use journalSportif\metier\abonnement\Abonnement;

class Echeance{

    private string  $id_echeance;
    private string  $date_echeance;
    private int     $montant;
    private ? Abonnement $id_abonne;

    public function __construct($id_echeance,$date_echeance,$montant, ? Abonnement $id_abonne){
        $this->setIdEcheance($id_echeance);
        $this->setDateEcheance($date_echeance);
        $this->setMontant($montant);
        $this->id_abonne= $id_abonne;
    }

    // ID ECHEANCE
    public function getIdEcheance(){
        return $this->id_echeance;
    }
    public function setIdEcheance($id_echeance){
        return $this->$id_echeance;
    }

    // DATE ECHEANCE
    public function getDateEcheance(){
        return $this->date_echeance;
    }
    public function setDateEcheance($date_echeance){
        return $this->$date_echeance;
    }

    // MONTANT
    public function getMontant(){
        return $this->montant;
    }
    public function setMontant($montant){
        return $this->$montant;
    }
}