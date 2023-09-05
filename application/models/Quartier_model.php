<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Quartier_model extends CI_Model
{
    protected $table = 'quartier';
   public function __construct(){
        parent::__construct();
        
    }
    // Create - Ajouter un pays
    public function ajouter($property)
    {
       $this->db->insert('quartier', $property);
    }
    //Afficher 
    public function afficher()
    {
       $query = $this->db->get('quartier');
       return $query->result_array();

    }
    //modifier
    public function getQuartierById($id)
    {
        $query = $this->db->get_where('quartier', array('id_quartier' => $id));
        return $query->row();
    }
    //Mise a jour 
    public function modifier($id_quartier,$property) 
    {
       $this->db->where('id_quartier',$id_quartier);
        $query = $this->db->update('quartier',$property);
    } 
    //Supprimer
    public function supprimer($id)
    {
       $this->db->where('id_quartier',$id);
        $query = $this->db->delete('quartier'); 
    }
    public function get_quartier() {
        $query = $this->db->get('quartier');
        return $query->result_array();
    }
}