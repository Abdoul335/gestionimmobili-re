<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Region_model extends CI_Model
{
    protected $table = 'region';
   public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    // Create - Ajouter la region
    public function insert($property)
    {
        $this->db->insert('region', $property);
        return $this->db->insert_id();
    }
    //Afficher  
    public function afficher()
    {

       $query = $this->db->get('region');
       return $query->result();
      }
    //modifier
    public function update($id) 
    { 
       $query = $this->db->get_where('region', array('id_region' => $id))->row();
        return $query;
    }
    //Mise a jour 
    public function modifier($id,$property) 
    {
       $this->db->where('id_region',$id);
        $query = $this->db->update('region',$property); 
    } 
    //Supprimer
    public function supprimer($id)
    {
       $this->db->where('id_region',$id);
        $query = $this->db->delete('region'); 
    }
    public function get_region() {
        $query = $this->db->get('region');
        return $query->result_array();
    }
    
    public function getRegionsByCountry($id_pays) {
        $this->db->where('id_pays', $id_pays);
        $query = $this->db->get('region');
        return $query->result_array();
    }

        public function get_regions_by_country($id_pays) {
        // Utilisez $id_pays pour obtenir les régions associées à ce pays depuis la base de données
        // ...
        // Simulons des données pour cet exemple
        $regions = array(
            array('id' => 1, 'nom' => 'Region A'),
            array('id' => 2, 'nom' => 'Region B'),
            // ...
        );
        return $regions;
    }

}