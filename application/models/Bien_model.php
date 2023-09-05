<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bien_model extends CI_Model
{
    protected $table = 'bien';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function insert($property)
    {
        $this->db->insert('bien', $property);
        return $this->db->insert_id();
    }

    public function afficher()
    { 
        $query = $this->db->get('bien');
        return $query->result_array();
    }

    public function getBienById($id_bien)
    {
        $this->db->where('id_bien', $id_bien);
        $query = $this->db->get('bien');
        return $query->row();
    }
    public function modifier($id_bien, $property)
   {
        $this->db->where('id_bien', $id_bien);
        $this->db->update('bien', $property);
    }

    public function supprimer($id_bien)
    {
        $this->db->where('id_bien', $id_bien);
        $this->db->delete('bien');
    }

    public function get_bien()
    {
        $query = $this->db->get('bien');
        return $query->result_array();
    }
    public function getCollaborateur()
    {
        $this->db->like(telephone1,$id_col);
        $this->db->limit(10);
        return $this->db->get('collaborateur')->result();
    }
}
