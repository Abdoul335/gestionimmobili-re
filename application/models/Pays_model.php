<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pays_model extends CI_Model {
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function insert($property) {
        $this->db->insert('pays', $property);
        return $this->db->insert_id();
    }
    
    public function afficher_pays() {
        return $this->db->get('pays')->result();
    }
    
    public function getPaysById($id) {
        // Récupérer les informations d'un pays spécifique en fonction de l'ID
        $query = $this->db->get_where('pays', array('id_pays' => $id));
        return $query->row();
    }
    
    public function update_pays($id, $property) {
        $this->db->where('id_pays', $id);
        return $this->db->update('pays', $property);
    }
    
    public function supprimer_pays($id) {
        $this->db->where('id_pays', $id);
        $this->db->delete('pays');
    }
    public function get_pays() {
        $query = $this->db->get('pays');
        return $query->result_array();
    }
}