<?php

require_once __DIR__ . '/../../config/database.php';

class Activite {
    private $db;

    public function __construct() {
        $db = new Database();
        $this->db = $db->connect();
    }

    public function getAllActivite() {
        $sql = "SELECT a.*, s.lib_section, l.lib_lieu, l.ad_lieu, l.capacite 
                FROM activite a
                JOIN section s ON a.cd_section_activ = s.cd_section
                JOIN lieu l ON a.id_lieu_activ = l.id_lieu";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}