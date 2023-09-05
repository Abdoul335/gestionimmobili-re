<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Collaborateur_model extends CI_Model
{
    protected $table = 'collaborateur';
   public function __construct(){
        parent::__construct();
        
    }
    // Create - Ajouter un pays
    public function insert(array $property)
    {
       $query = $this->db->insert('collaborateur', $property);
      return $query;
    }
    //Afficher 
    public function afficher()
    {
       $query = $this->db->get('collaborateur');
       return $query->result(); 
 
    }
    //modifier
    public function getById($id_col)
    {
        $this->db->where('id_col',$id_col);
        $query = $this->db->get('collaborateur');
        return $query->row();
    }
    //Mise a jour 
  public function modifier($id, $property)
  { 
       $this->db->where('id_col', $id);
       $this->db->update('collaborateur', $property);
   }

    //Supprimer
    public function supprimer($id_col)
    {
       $this->db->where('id_col',$id_col);
        $query = $this->db->delete('collaborateur'); 
    }

    public function get_collaborateur() {
        $query = $this->db->get('collaborateur');
        return $query->result_array();
    }

    public function fetch_region($id_pays) 
    {
            $this->db->where('id_pays', $id_pays);
            $query = $this->db->get('region');
            $output = '<option value="">choisissez region</option>';
            foreach ($query->result() as $row) { // Correction : Utilisation de result() pour obtenir les résultats
                $output .= '<option value="' . $row->id_region . '">' . $row->nom . '</option>'; // Correction : Utilisation de .= pour ajouter au lieu de =
            }
            return $output; // Correction : Retourner $output sans le signe =
    }

}