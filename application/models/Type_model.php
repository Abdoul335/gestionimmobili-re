compte<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Type_model extends CI_Model
{
    protected $table = 'type';
   public function __construct(){
        parent::__construct();
        
    }
    // Create - Ajouter un Type
    public function insert(array $property)
    {
       $this->db->insert('type', $property);
      return $this->db->insert_id();
    }
    //Afficher 
    public function get_types()
    {
       $query = $this->db->get('type');
       return $query->result_array();

    }
    //modifier
    public function getTypeById($id)
    {
        // Récupérer les informations de type spécifique en fonction de l'ID
         $query = $this->db->get_where('type', array('id_type' => $id));
         return $query->row();
    }
    //Mise a jour 
    public function update($property,$id) 
    {
       $this->db->where('id_type', $id);
       $this->db->update('type', $property);
    } 
    //Supprimer
    public function supprimer($id)
    {
       $this->db->where('id_type', $id);
       $this->db->delete('type');

    }
    public function get_type() {
        $query = $this->db->get('type');
        return $query->result_array();
    }
}