<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Collaborateur extends CI_Controller {
    protected $property = array(
        'title' => 'Collaborateur',
        'UPDATE_SUCCESS' => FALSE,
        'INSERT_SUCCESS' => FALSE,
    );

    public function __construct() 
    {
        parent:: __construct();
        setlocale(LC_TIME, 'fr_FR', 'fra');
        $this->property['pagetitle'] = utf8_encode(strftime("%d %b %G", now()));
    }
   public function index()
    {
        $this->property['collaborateur'] = $this->m_collaborateur->afficher(); 
        $this->layout->view('_collaborateur/collaborateur_view',$this->property);
    }

    public function ajouter()
    {  

        if ($this->input->post('valider')) 
        {
            $property = array(
                'nom'=> $this->input->post('nom'),
                'Adresse'=> $this->input->post('Adresse'),
                'email'=> $this->input->post('email'),
                'telephone1'=> $this->input->post('telephone1'),
                'telephone2'=> $this->input->post('telephone2'),
                'reference'=> $this->input->post('reference'), 
                'id_en'=> $this->input->post('entreprise'),
                'id_pays'=> $this->input->post('pays'),
                'id_region'=> $this->input->post('region'),
                'id_province'=> $this->input->post('province'),
                'id_ville'=> $this->input->post('ville'),
                'id_quartier'=> $this->input->post('quartier')
            );
            $this->m_collaborateur->insert($property);
            redirect('Collaborateur/index');
        }
        $this->layout->view('_collaborateur/formulairecollaborateur', $this->property);
    }

    public function update($id)
{
    if ($this->input->post('modifier'))
    {
        // Récupérer les données existantes du collaborateur
        $property = array(
            'nom'=> $this->input->post('nom'),
                'Adresse'=> $this->input->post('Adresse'),
                'email'=> $this->input->post('email'),
                'telephone1'=> $this->input->post('telephone1'),
                'telephone2'=> $this->input->post('telephone2'),
                'reference'=> $this->input->post('reference'),
                'id_en'=> $this->input->post('entreprise'),
                'id_pays'=> $this->input->post('pays'),
                'id_region'=> $this->input->post('region'),
                'id_province'=> $this->input->post('province'),
                'id_ville'=> $this->input->post('ville'),
                'id_quartier'=> $this->input->post('quartier')

                    );
        $this->m_collaborateur->modifier($id, $property);
        redirect('Collaborateur/index');
    }

    // Récupérer les données existantes du collaborateur
    $this->property['collaborateur'] = $this->m_collaborateur->getById($id);

    $this->layout->view('_collaborateur/Modifier', $this->property);
}

    public function delete($id_col) {
        // Supprimer le collaborateur avec l'ID spécifié
        $this->m_collaborateur->supprimer($id_col);

        // Rediriger vers une page de confirmation ou une autre action
        redirect('Collaborateur/index');
    }

    public function create() 
    {
        $this->property['entreprise'] = $this->m_entreprise->get_entreprise();

        // Charger la vue avec les données
        $this->load->view('_collaborateur/formulairecollaborateur', $this->property);
    }
    /*public function get_regions_by_country($id_pays)
        {
            
            $outp = $this->m_region->get_regions_by_country($id_pays);
            return $this->load->view('beagle/pages/_region/json', array('json' => $outp));
            
        }*/
    public function get_regions_by_country($pays_id) 
    {
        // Récupérez les régions en fonction de l'ID du pays ($pays_id) depuis votre modèle
        $regions = $this->m_region->get_regions_by_country($pays_id);
        
        // Convertissez les régions en format JSON et renvoyez-les
        echo json_encode($regions);
    }
    public function getRegionsByCountry($id_pays) 
    {
        try {
            // Récupérez les régions en fonction de l'ID du pays ($id_pays) depuis votre modèle
            $regions = $this->m_region->getRegionsByCountry($id_pays);
            
            // Convertissez les régions en format JSON et renvoyez-les
            echo json_encode(array("data" => $regions));
        } catch (Exception $e) {
            echo json_encode(array("error" => $e->getMessage()));
        }
    }



    public function get_regions() {
        if($this->input->post('id_pays'))
        {
            echo $this->m_collaborateur->fetch_region($this->input->post(id_pays));
        }
        }

}
