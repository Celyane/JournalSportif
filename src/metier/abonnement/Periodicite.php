<?php
namespace journalSportif\metier\abonnement;

class Periodicite{

    private string $id_period;
    private string $libelle_per;

    public function __construct($id_period,$libelle_per){
        $this->id_period= $id_period;
        $this->libelle_per = $libelle_per;
    }

    // ID PERIOD
    public function getIdPeriod(){
        return $this->id_period;
    }
    public function setIdPeriod($id_period){
        return $this->id_period;
    }

    // LIBELLE PER
    public function getLibellePer(){
        return $this->libelle_per;
    }
    public function setLibellePer($libelle_per){
        return $this->libelle_per;
    }
}
