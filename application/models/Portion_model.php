<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Portion_model extends CI_Model
{
    protected $table = 'portion';
   public function __construct(){
        parent::__construct();
        
    }
    // Create - Ajouter un pays
    public function ajouter(array $property)
    {
       $this->db->insert('portion', $property);
      return $this->db->insert_id();
    }
    //Afficher 
    public function afficher()
    { 
       $query = $this->db->get('portion');
       return $query->result_array();

    }
    //modifier
    public function getPortionById($id_portion)
    {
        $this->db->where('id_portion',$id_portion);
        $query = $this->db->get('portion');
        return $query->row();
    }
    //Mise a jour 
    public function update($property, $id_portion) 
  {
       $this->db->where('id_portion', $id_portion);
       $this->db->update('portion', $property);
   }

   public function supprimer($id_portion)
  {
       $this->db->where('id_portion', $id_portion);
       $this->db->delete('portion');
   }

    public function get_portion() {
        $query = $this->db->get('portion');
        return $query->result_array();
    }
}