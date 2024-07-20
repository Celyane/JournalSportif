<?php

namespace journalSportif\dao;
use PDO;
use PDOException;

    class DB {
  
        private $host = "127.0.0.1";
        private $db_name = "journal";
        private $userName = "root";
        private $port = "3306";
        private $password = "";

        public function getConnection() {
            $db = null;
            try {
                $db = new PDO(
                    "mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->db_name.";charset=utf8",
                    $this->userName,
                    $this->password
                );
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }
            return $db;
        }


    }