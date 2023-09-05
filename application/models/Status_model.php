compte<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Status_model extends CI_Model
{
    protected $table = 'status';
   public function __construct(){
        parent::__construct();
        
    }
    // Create - Ajouter un Status
    public function insert($property)
    {
       $this->db->insert('status', $property);
       return $this->db->insert_id();
    }
    //Afficher 
    public function afficher()
    {
       $query = $this->db->get('status');
       return $query->result_array();

    }
    //modifier 
    public function getStatusById($id)
    {
        $query = $this->db->get_where('status', array('id_status' => $id));
        return $query->row();
    }
    //Mise a jour 
   public function modifier($id, $property) 
  {
       $this->db->where('id_status', $id);
       $this->db->update('status', $property);
   }

    //Supprimer
   public function supprimer($id) {
        $this->db->where('id_status', $id);
        $this->db->delete('status'); 
    }
    public function get_status() {
        $query = $this->db->get('status');
        return $query->result_array();
    }
}