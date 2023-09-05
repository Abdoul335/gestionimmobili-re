<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Province extends CI_Controller {
    protected $property = array(
        'title' => 'Province',
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
        $this->property['province'] = $this->m_province->afficher(); 

        // Passer les données à votre vue pour les afficher
        $this->layout->view('_province/province_view', $this->property);
    }

    public function ajouter() 
    {
        

        // Vérifier si le formulaire a été soumis
        if ($this->input->post('valider')) {
            // Définir les règles de validation des champs
            $this->form_validation->set_rules('nom', 'Nom', 'required');
            $this->form_validation->set_rules('region', 'Region');

            // Vérifier si la validation a réussi
            if ($this->form_validation->run() == TRUE) {
                // Insérer les données dans la base de données
                $property = array(
                    'nom' => $this->input->post('nom'),
                    'id_region' => $this->input->post('region'),
                );
                $this->m_province->insert($property);

                // Définir un message de succès
                $this->property['INSERT_SUCCESS'] = TRUE;
                redirect('Province/index');
            }
        }

        $this->layout->view('_province/formulaireprovince', $this->property);
    }
    public function update($id)
    {
        $this->property['province'] = $this->m_province->getProvinceById($id);
        if ($this->input->post('modifier')) {
            // Définir les règles de validation des champs
            $this->form_validation->set_rules('nom', 'Nom', 'required');
            $this->form_validation->set_rules('region', 'Region');

            // Vérifier si la validation a réussi
            if ($this->form_validation->run() == TRUE) {
                // Insérer les données dans la base de données
                $property = array(
                    'nom' => $this->input->post('nom'),
                    'id_region' => $this->input->post('region'),
                );
                $this->m_province->modifier($id, $property);

                // Définir un message de succès
                $this->property['INSERT_SUCCESS'] = TRUE;
                redirect('Province/index');
            }
        }

        $this->layout->view('_province/Modifier', $this->property);
    }

   public function delete($id_province)
   {
        // supprimer la province avec l'ID spécifié
        $this->m_province->supprimer($id_province);

        // Rediriger vers une page de confirmation ou une autre action
        redirect(base_url('Province/index'));
    }
    public function create() {
     $region = $this->m_region->get_region();
        // Récupérer les pays
        $this->property['region'] = $this->m_province->get_region();
        
        // Charger la vue avec les données
        $this->load->view('_province/formulaireprovince', $this->property);
    }
}