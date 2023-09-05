<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pays extends CI_Controller {
    protected $property = array(
        'title' => 'Pays',
        'UPDATE_SUCCESS' => FALSE,
        'INSERT_SUCCESS' => FALSE,
    );

    public function __construct() 
    {
        
        parent:: __construct();
        setlocale(LC_TIME, 'fr_FR', 'fra');
        $this->property['pagetitle'] = utf8_encode(strftime("%d %b %G", now()));
        $this->load->library('form_validation');
        $this->load->helper('url');

    }

    public function ajouter() 
    {

        // Vérifier si le formulaire a été soumis
        if ($this->input->post('valider')) {
            // Définir les règles de validation des champs
            $this->form_validation->set_rules('nom', 'Nom', 'required');
            $this->form_validation->set_rules('indicatif', 'Indicatif', 'required');

            // Vérifier si la validation a réussi
            if ($this->form_validation->run() == TRUE) {
                // Insérer les données dans la base de données
                $property = array(
                    'nom' => $this->input->post('nom'),
                    'indicatif' => $this->input->post('indicatif'),
                );
                $this->m_pays->insert($property);

                // Définir un message de succès
                $this->property['INSERT_SUCCESS'] = TRUE;
                  $this->session->set_flashdata('Sucess','Données transmis');
                redirect('Pays/index');
            }
        }

        $this->layout->view('_pay/formulairepays', $this->property);
    }

    public function index()
    {
        $this->property['pays'] = $this->m_pays->afficher_pays();

        // Passer les données à votre vue pour les afficher
        $this->layout->view('_pay/liste', $this->property);
    }

    public function update($id)
    {
        // récupérer les données existantes du pays
        $property['pays'] = $this->m_pays->getPaysById($id);

        // Vérifier si le formulaire a été soumis
        if ($this->input->post('Modifier')) {
            $this->form_validation->set_rules('nom', 'Nom', 'required');
            $this->form_validation->set_rules('indicatif', 'Indicatif', 'required');

            // Vérifier si la validation a réussi
            if ($this->form_validation->run() == TRUE) {
                // Insérer les données dans la base de données
                $property = array(
                    'nom' => $this->input->post('nom'),
                    'indicatif' => $this->input->post('indicatif'),
                );
                // Utiliser la méthode updatePays() dans le modèle pour effectuer la mise à jour
                $this->m_pays->update_pays($id, $property);

                // Définir un message de succès
                $this->property['UPDATE_SUCCESS'] = TRUE;

                redirect('Pays/index');
            }
        }

        $this->layout->view('_pay/modifier', $property);
    }

    public function delete($id_pays) {
        // supprimer le pays avec l'ID spécifié
        $this->m_pays->supprimer_pays($id_pays);

        // Rediriger vers une page de confirmation ou une autre action
        redirect(base_url('Pays/index'));

    }
}