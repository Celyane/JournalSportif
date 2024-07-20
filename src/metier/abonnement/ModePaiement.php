<?php
namespace journalSportif\metier\abonnement;

class ModePaiement{
    private string $id_mdp;
    private string $libelle_mdp;

    public function __construct($id_mdp,$libelle_mdp){
        $this->id_mdp=$id_mdp;
        $this->libelle_mdp=$libelle_mdp;
    }

    // ID MDP
    public function getIdMdp(){
        return $this->id_mdp;
    }
    public function setIdmdp($id_mdp){
        return $this->id_mdp;
    }

    // LIBELLE MDP
    public function getLibellemdp(){
        return $this->libelle_mdp;
    }
    public function setLibellemdp($libelle_mdp){
        return $this->libelle_mdp;
    }
      // TOSTRING
      public function __toString(){
        return $this->getIdmdp() . $this->getLibellemdp();
      }
}