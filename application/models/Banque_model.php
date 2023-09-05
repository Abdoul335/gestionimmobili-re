<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Banque_model extends CI_Model
{
    protected $table = 'banque';
   public function __construct(){
        parent::__construct();
        
    }
    // Create - Ajouter un pays
    public function insert($property)
    {
       $this->db->insert('banque', $property);
    }
    //Afficher 
    public function afficher()
    {
       $query = $this->db->get('banque');
       return $query->result_array();

    }
    //modifier
    public function modifier($id_banque, $property)
    {
        $this->db->where('id_banque', $id_banque);
        $this->db->update('banque', $property);
    }

    //Récupérer une banque par ID
    public function getBanqueById($id_banque)
    {
        $query = $this->db->get_where('banque', array('id_banque' => $id_banque));
        return $query->row();
    }

    //Supprimer
    public function supprimer($id)
    {
       $this->db->where('id_banque',$id);
        $query = $this->db->delete('banque'); 
    }
    public function get_banque() {
        $query = $this->db->get('banque');
        return $query->result_array();
    }
}