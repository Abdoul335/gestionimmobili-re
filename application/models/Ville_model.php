<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Ville_model extends CI_Model
{
   public function __construct()
   {
        parent::__construct();
        $this->load->database();
        
    }
    // Create - Ajouter une ville
    public function ajouter($property)
    {
       $this->db->insert('ville', $property);
    }
    //Afficher 
    public function afficher()
    {
       $query = $this->db->get('ville');
       return $query->result_array();

    }
    //modifier
    public function getVilleById($id)
    {
        $query = $this->db->get_where('ville', array('id_ville' => $id));
        return $query->row();
    }
    //Mise a jour 
    public function modifier($id_ville, $property) 
    {
       $this->db->where('id_ville', $id_ville);
       $this->db->update('ville', $property); 
    } 
    //Supprimer
        public function supprimer($id) {
        $this->db->where('id_ville', $id);
        $this->db->delete('ville'); 
    }
     public function get_ville() {
        $query = $this->db->get('ville');
        return $query->result_array();
    }
}