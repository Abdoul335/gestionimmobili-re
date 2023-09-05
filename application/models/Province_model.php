<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Province_model extends CI_Model
{
    protected $table = 'province';
   public function __construct(){
        parent::__construct();

        
    }
    // Create - Ajouter la province 
    public function insert($property)
    {
       $this->db->insert('province', $property);
      return $this->db->insert_id();
    }
    //Afficher 
    public function afficher()
    {
       return $this->db->get('province')->result(); 
    }
     //Mise a jour
    public function getProvinceById($id)
    {
      $query = $this->db->get_where('province', array('id_province' => $id))->row();
        return $query;

    }
       //modifier
    public function modifier($id,$property) 
    {
       $this->db->where('id_province',$id);
        $query = $this->db->update('province',$property); 
    } 
    //Supprimer
    public function supprimer($id)
    {
        $this->db->where('id_province',$id);
        $query = $this->db->delete('province'); 
    }
    public function get_province() {
        $query = $this->db->get('province');
        return $query->result_array();
    }
}