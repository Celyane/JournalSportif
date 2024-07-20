<?php
namespace journalSportif\dao;
use PDO;
use journalSportif\dao\requete;
use journalSportif\metier\Abonnement\Abonnement;
use journalSportif\metier\abonnement\ModePaiement;
use journalSportif\metier\abonnement\Periodicite;
use journalSportif\metier\abonnement\Type_ab;


class Dao_Abon{
    private ? PDO $db;

    public function __construct(){
        $database= new DB();
        $this->db = $database->getConnection();
    }

    // RECUPERE TYPE D ABONNEMENTS
    public function getTypeAb(){
        $type_abo=[];
        try {
            if ($this->db !=null) {
                $query=requete::SQL_TAB;
                try {
                    $statement =$this->db->query($query);
                foreach ($statement as $row) {
                    $id_tab =         $row['id_tab'];
                    $lib_tab =        $row['lib_tab'];
                    $prix=            $row['prix'];
                    $type_ab = new Type_ab($id_tab,$lib_tab,$prix);
                    array_push($type_abo,$type_ab);
                }
            } catch (\Exception $e) {
                echo(requete::ERREUR_BD.  $e->getCode() . ' - ' . $e->getMessage());
            }
        }} catch (\Exception $e) {
            echo(requete::ERREUR_CONNEXION .  $e->getCode() . ' - ' . $e->getMessage());
        } 
                
        return $type_abo;
    }

    // RECUPERE PERIODICITES
    public function getPeriod($id_tab){
        $period=[];
        try {
            if ($this->db !=null) {
                $query=requete::SQL_PERIOD;
                try {
                    $stmt = $this->db->prepare($query);
                    $stmt->bindValue(1,$id_tab);
                    $stmt->execute();
                    foreach ($stmt as $row) {
                        $id_period =        $row['id_period'];
                        $libelle_per =        $row['libelle_per'];

                        $periodicite = new Periodicite($id_period, $libelle_per);
                        array_push($period,$periodicite);
                    }
            } catch (\Exception $e) {
                echo(requete::ERREUR_BD.  $e->getCode() . ' - ' . $e->getMessage());
            }
        }} catch (\Exception $e) {
            echo(requete::ERREUR_CONNEXION .  $e->getCode() . ' - ' . $e->getMessage());
        } 
                
        return $period;
    }
    
    // RECUPERE MODE DE PAIEMENTS
    public function getModePaiement(){
        $mode_paiements=[];
        try {
            if ($this->db !=null) {
                $query=requete::SQL_MODE_PAIEMENTS;
                try {
                    $statement =$this->db->query($query);
                foreach ($statement as $row) {
                    $id_mdp = $row["id_mdp"];
                    $lib_mdp= $row['libelle_mdp'];

                    $mdp = new ModePaiement($id_mdp,$lib_mdp);
                    array_push($mode_paiements,$mdp);
                }
            } catch (\Exception $e) {
                echo(requete::ERREUR_BD.  $e->getCode() . ' - ' . $e->getMessage());
            }
        }} catch (\Exception $e) {
            echo(requete::ERREUR_CONNEXION .  $e->getCode() . ' - ' . $e->getMessage());
        } 
                
        return $mode_paiements;
    }

    // TYPES ABONNEMENTS BY ID
    public function getTabById($id_tab){
            try {
                if ($this->db !=null) {
                    $query=requete::SQL_GET_TAB_BY_ID;
                    try {
                        $stmt = $this->db->prepare($query);
                        $stmt->bindValue(1,$id_tab);
                        $stmt->execute();
                        $row = $stmt->fetch();

                        $id_tab =         $row['id_tab'];
                        $lib_tab =        $row['lib_tab'];
                        $prix=            $row['prix'];

                        $type_ab = new Type_ab($id_tab,$lib_tab,$prix);
                    }
                 catch (\Exception $e) {
                    echo(requete::ERREUR_BD.  $e->getCode() . ' - ' . $e->getMessage());
                }
            }} catch (\Exception $e) {
                echo(requete::ERREUR_CONNEXION .  $e->getCode() . ' - ' . $e->getMessage());
            } 
                    
            return $type_ab;
    }

    // MODES PAIEMENTS BY ID
    public function getMdpById($id_mdp){
        try {
            if ($this->db !=null) {
                $query=requete::SQL_MDP_BY_ID;
                try {
                    $stmt = $this->db->prepare($query);
                    $stmt->bindValue(1,$id_mdp);
                    $stmt->execute();
                    $row = $stmt->fetch();

                    $id_mdp =         $row['id_mdp'];
                    $lib_mdp =        $row['libelle_mdp'];
       
                    $type_ab = new ModePaiement($id_mdp,$lib_mdp);
                }
             catch (\Exception $e) {
                echo(requete::ERREUR_BD.  $e->getCode() . ' - ' . $e->getMessage());
            }
        }} catch (\Exception $e) {
            echo(requete::ERREUR_CONNEXION .  $e->getCode() . ' - ' . $e->getMessage());
        } 
                
        return $type_ab;
    }

    // CREER ABONNEMENT
     public function newAbonnement(Abonnement $newAbonnement){
         try{
             if ($this->db !=null) {
                 $query=requete::SQL_INSERT_ABON;
                 try{
                     $stmt =$this->db->prepare($query);
                     $stmt->bindValue(1,$newAbonnement->getIdAbon());
                     $stmt->bindValue(2,$newAbonnement->getQuestionAb());
                     $stmt->bindValue(3,$newAbonnement->getDateSouscrit());
                     $stmt->bindValue(4,$newAbonnement->getMdp()->getIdMdp());
                     $stmt->bindValue(5,$newAbonnement->getTab()->getIdTab());
                     $stmt->bindValue(6,$newAbonnement->getUtilisateur()->getId());

                     $stmt->execute();

                 }
                 catch(\Exception $e){
                    echo(requete::ERREUR_BD.  $e->getCode() . ' - ' . $e->getMessage());
                 }
             }

         }  
         catch (\Exception $e){
            echo(requete::ERREUR_CONNEXION .  $e->getCode() . ' - ' . $e->getMessage());
         }}

     // INSERER COMMENTAIRE (UPDATE)
    public function insertCom($commentaire){
        try{
            if ($this->db !=null) {
            $query=requete::SQL_INSERT_COMMENTAIRE;
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1,$commentaire);
            $stmt->execute();
            }
        }
        catch(\Exception $e){
            echo(requete::ERREUR_BD.  $e->getCode() . ' - ' . $e->getMessage());
        }
    }

    // SUPPRIMER MODE DE PAIEMENT
    public function deleteModeP($id_mdp){
        $message="";
        try{
            if ($this->db !=null) {
                // echo "ID:" . $id_mdp; //debug statement
                $query=requete::SQL_DELETE_MDP;
                $stmt= $this->db->prepare($query);
                $stmt->bindValue(1,$id_mdp);
                $stmt->execute();
                // echo "Rows deleted: " . $stmt->rowCount(); // Debug statement
            }
        }
        catch(\Exception $e){
            $message=requete::ERREUR_BD.  $e->getCode() . ' - ' . $e->getMessage();

        }
        return $message;
    }

}

