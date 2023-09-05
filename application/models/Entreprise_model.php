<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Entreprise_model extends CI_Model
{
    protected $table = 'entreprise';
   public function __construct(){
        parent::__construct();
        
    }
    // Create - Ajouter un pays
    public function insert($property)
    {
        $this->db->insert($this->table, $property);
        return $this->db->insert_id();
    }
    //Afficher 
    public function afficher()
    {
       $query = $this->db->get('entreprise');
       return $query->result_array();

    }
    //modifier
    public function update($id_en)
    {
        $this->db->where('id_en',$id_en);
        $query = $this->db->get('entreprise');
        return $query->row();
    }
    //Mise a jour 
    public function modifier($id_en, $property) 
    {
        $this->db->where('id_en', $id_en);
        $this->db->update('entreprise', $property); 
    }

    //Supprimer
   public function supprimer($id_en)
   {
        $this->db->where('id_en', $id_en);
        $this->db->delete('entreprise');
    }

    public function get_entreprise() {
        $query = $this->db->get('entreprise');
        return $query->result_array();
    }
}