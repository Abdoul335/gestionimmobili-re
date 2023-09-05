<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Compte_model extends CI_Model
{
    protected $table = 'compte';
   public function __construct(){
        parent::__construct();
        
    }
    // Create - Ajouter un pays
    public function insert($property)
    {
       $this->db->insert('compte', $property);
    }
    //Afficher 
    public function afficher()
    {
       $query = $this->db->get('compte');
       return $query->result_array();

    }
    //modifier
    public function getCompteById($id_compte)
    {
        $this->db->where('id_compte',$id_compte);
        $query = $this->db->get('compte');
        return $query->row();
    }
    //Mise a jour 
    public function modifier($id_compte, $property)
  {
       $this->db->where('id_compte', $id_compte);
       $this->db->update('compte', $property);
   }

    //Supprimer
    public function supprimer($id_compte)
    {
       $this->db->where('id_compte',$id_compte);
        $query = $this->db->delete('compte'); 
    }
    public function get_compte() {
        $query = $this->db->get('compte');
        return $query->result_array();
    }
}