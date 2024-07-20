<?php
namespace journalSportif\metier\abonnement;

class Type_ab{
    private int         $id_tab;
    private string      $lib_tab;
    private int         $prix;

    public function __construct($id_tab,$lib_tab,$prix){
        $this->setIdTab($id_tab);
        $this->setLibTab($lib_tab);
        $this->setPrix($prix);
    }

    // ID TAB
    public function getIdTab(){
        return $this->id_tab;
    }
    public function setIdTab($id_tab){
        return $this->id_tab= $id_tab;
    }

    // LIB TAB
    public function getLibTab(){
        return $this->lib_tab;
    }
    public function setLibTab($lib_tab){
        return $this->lib_tab= $lib_tab;
    }

    //PRIX
    public function getPrix(){
        return $this->prix;
    }
    public function setPrix($prix){
        return $this->prix= $prix;
    }

    // TOSTRING
    public function __toString(){
        return $this->getIdTab() . $this->getLibTab() . $this->getPrix();
    }

}