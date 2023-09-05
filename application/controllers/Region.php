<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Region extends CI_Controller {
    protected $property = array(
        'title' => 'Region',
        'UPDATE_SUCCESS' => FALSE,
        'INSERT_SUCCESS' => FALSE,
    );

    public function __construct() 
    {
        parent:: __construct();
        setlocale(LC_TIME, 'fr_FR', 'fra');
        $this->property['pagetitle'] = utf8_encode(strftime("%d %b %G", now()));
        $this->load->library('form_validation');
    }
    public function index()
   { 

    // Récupérer la liste des pays
     //$property['pays'] = $this->m_pays->afficher_pays();
       $this->property['region'] = $this->m_region->afficher();

        // Passer les données à votre vue pour les afficher
        $this->layout->view('_region/region_view', $this->property);
    }
    public function ajouter() 
    {

        // Vérifier si le formulaire a été soumis
        if ($this->input->post('valider')) {
            // Définir les règles de validation des champs
            $this->form_validation->set_rules('nom', 'Nom', 'required');
            $this->form_validation->set_rules('pays', 'Pays');

            // Vérifier si la validation a réussi
            if ($this->form_validation->run() == TRUE) {
                // Insérer les données dans la base de données
                $property = array(
                    'nom' => $this->input->post('nom'),
                    'id_pays' => $this->input->post('pays'),
                );
                $this->m_region->insert($property);

                // Définir un message de succès
                $this->property['INSERT_SUCCESS'] = TRUE;
                redirect('Region/index');
            }
        }

        $this->layout->view('_region/formulaireregion', $this->property);
    }
   public function modifier($id)
  {
      // récupérer les données existantes du pays
        $this->property['region'] = $this->m_region->update($id);
            if ($this->input->post('modifier')) {
        $property = array(
            'nom' => $this->input->post('nom'),
            'id_pays' => $this->input->post('pays')
        );
        $this->m_region->modifier($id, $property);
        redirect('Region/index');
    }

    $this->layout->view('_region/Modifier', $this->property);

    }

    public function delete($id) {
       // supprimer le pays avec l'ID spécifié
        $this->m_region->supprimer($id);

        // Rediriger vers une page de confirmation ou une autre action
        redirect('Region/index');
    } 
    public function create() {
     $pays = $this->m_pays->get_pays();
        // Récupérer les pays
        $this->property['pays'] = $this->m_region->get_pays();
        
        // Charger la vue avec les données
        $this->load->view('_region/formulaireregion', $this->property);
    }
    /*public function verifisieges($pr, $n)
        {
            
            $outp = $this->m_tampon_siege->get($pr, $n);
            return $this->load->view('beagle/pages/_region/json', array('json' => $outp));
            
        }*/
}





