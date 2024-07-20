<?php
namespace journalSportif\metier\abonnement;
require_once "/Applications/MAMP/htdocs/Projects/Journal_sportif_/vendor/autoload.php";
// require_once "./vendor/autoload.php";

use journalSportif\metier\abonnement\Echeance;

class Paiement{
    private string $id_paiement;
    private int    $montant_p;
    private string $date_p;
    private ? Echeance $id_echeance;
    
    public function __construct($id_paiement,$montant_p,$date_p, ? Echeance $id_echeance){
        $this->setIdPaiement($id_paiement);
        $this->setMontantP($montant_p);
        $this->setDateP($date_p);
        $this->id_echeance = $id_echeance;
    }

    // ID PAIEMENT
    public function getIdPaiement(){
        return $this->id_paiement;
    }
    public function setIdPaiement($id_paiement){
        return $this->$id_paiement;
    }

    // MONTANT P
    public function getMontantP(){
        return $this->montant_p;
    }
    public function setMontantP($montant_p){
        return $this->$montant_p;
    }

    // DATE P
    public function getDateP(){
        return $this->date_p;
    }
    public function setDateP($date_p){
        return $this->$date_p;
    }
}