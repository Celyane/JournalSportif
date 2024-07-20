<?php
namespace journalSportif\metier\utilisateur;

class Utilisateur {

    // propriétés

    private string   $id;
    private ?string $prenom;
    private ?string $nom;
    private ?string $dateNaiss;
    private ?string $email;
    private ?string $adr;
    private ?int    $tel;
    
    // construct
    public function __construct($id, $name, $lastname, $dateNaiss, $email, $adr, $tel)
    {
        $this->setId($id);
        $this->setPrenom($name);
        $this->setNom($lastname);
        $this->setdateNaiss($dateNaiss);
        $this->setEmail($email);
        $this->setAdr($adr);
        $this->setTel($tel);

    }
    

    // GETTERS & SETTERS
    // ID
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        return $this->id= $id;
    }

    //PRENOM
    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom($prenom){
        return $this->prenom=$prenom;
    }

    //NOM
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        return $this->nom=$nom;
    }

    //DATE NAISSANCE
    public function getdateNaiss(){
        return $this->dateNaiss; 
    }
    public function setdateNaiss($dateNaiss){
        return $this->dateNaiss=$dateNaiss;
    }

    //EMAIL
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        return $this->email=$email;
    }

    //ADRESSE
    public function getAdr(){
        return $this->adr;
    }
    public function setAdr($adr){
        return $this->adr=$adr;
    }
    //TELEPHONE
    public function getTel(){
        return $this->tel;
    }
    public function setTel($tel){
        return $this->tel=$tel;
    }

    //TOSTRING
    public function toString()
    {
        return $this->getId(). " . ".$this->getPrenom(). " . ". $this->getNom(). " . ".
               $this->getdateNaiss(). " . ". $this->getEmail(). " . ". $this->getAdr(). " . ". $this->getTel();
    }
}