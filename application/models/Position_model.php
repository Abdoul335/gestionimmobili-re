<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Position_model extends CI_Model
{
    protected $table = 'position';
   public function __construct(){
        parent::__construct();
        
    }
    // Create - Ajouter un pays
    public function insert($property)
    {
       $this->db->insert('position', $property);
      return $this->db->insert_id();
    }
    //Afficher 
    public function afficher()
    {
       $query = $this->db->get('position');
       return $query->result_array();

    } 
    //modifier
    public function getPositionById($id_position) 
    {
        $this->db->where('id_position', $id_position);
       $query = $this->db->get('position');
       return $query->row();
    }
    //Mise a jour 
    public function modifier($property,$id_position) 
    {
       $this->db->where('id_position',$id_position);
        $query = $this->db->update('position',$property); 
    } 
    //Supprimer
    public function supprimer($id_position)
    {
       $this->db->where('id_position',$id_position);
        $query = $this->db->delete('position'); 
    }
    public function get_position() {
        $query = $this->db->get('position');
        return $query->result_array();
    }
}