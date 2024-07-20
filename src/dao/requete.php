<?php 

    namespace journalSportif\dao;


    class requete {

        //SELECT
        public const SQL_ABON="select id_abonne, question_ab, date_souscrit, id_mdp, id_tab, id_utilisateur from Abonnement";
        public const SQL_TAB="select id_tab, lib_tab, prix from Type_Abonnement order by id_tab";
        public const SQL_PERIOD="select a.id_period, p.libelle_per from Avoir as a, Periodicite as p where a.id_period = p.id_period and id_tab=?";
        public const SQL_MODE_PAIEMENTS="select libelle_mdp, id_mdp from Mode_paiement order by id_mdp";
        public const SQL_GET_TAB_BY_ID="select id_tab, lib_tab, prix from Type_Abonnement where id_tab= ?";
        public const SQL_MDP_BY_ID= "select libelle_mdp, id_mdp from Mode_paiement where id_mdp= ?";
        public const SQL_GET_ABON_BY_ID ="select id_abonne, question_ab, date_souscrit, id_mdp, id_tab, id_utilisateur from Abonnement where date_souscrit =?";
        
        //ERREUR
        public const ERREUR_BD="erreur dans la requête SQL";
        public const ERREUR_CONNEXION="Erreur connexion à la BD";

        //INSERT
        const SQL_INSERT_ABON = "insert into Abonnement
              (id_abonne, question_ab, date_souscrit, id_mdp, id_tab, id_utilisateur) values(?,?,?,?,?,?)";
        
        //UPDATE
         const SQL_INSERT_COMMENTAIRE= "update Abonnement set question_ab = ? where id_abonne = (
                select id_abonne FROM (select MAX(id_abonne) AS id_abonne FROM Abonnement) as subquery)";

        // const SQL_INSERT_COMMENTAIRE= "update Abonnement set question_ab = ? where id_abonne = 
        // (SELECT MAX(id_abonne) FROM Abonnement)";
        
        //DELETE
        const SQL_DELETE_MDP= "delete from Mode_paiement where id_mdp= ?";
        const SQL_DELETE_COM= "delete from Abonnement where question_ab = ?";

    }