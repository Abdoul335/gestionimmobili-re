<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {
    protected $property = array(
        'title' => 'Status',
        'UPDATE_SUCCESS' => FALSE,
        'INSERT_SUCCESS' => FALSE,
    );

    public function __construct() 
    {
        parent:: __construct();
        setlocale(LC_TIME, 'fr_FR', 'fra');
        $this->property['pagetitle'] = utf8_encode(strftime("%d %b %G", now()));
        $this->load->model('Status_model');
    }

    public function index()
    {
        $this->load->model('Status_model', 'm_status');

        $this->property['status'] = $this->m_status->afficher();

        // Passer les données à votre vue pour les afficher
        $this->layout->view('_status/status_view', $this->property);
    } 

     public function ajouter()
    {
        $this->load->model('Status_model', 'm_status'); // Load status model

        // Vérifier si le formulaire est soumis
        if ($this->input->method() === 'post') 
        {
            // Récupérer les valeurs soumises par le formulaire
            $nom = $this->input->post('nom');

            // Créer un tableau avec les données à insérer dans la base de données
            $property = array(
                'nom' => $nom,
            );

            // Insérer les données dans la base de données
            $this->m_status->insert($property);

            // Rediriger vers la page appropriée après l'insertion
            redirect('Status/index');
        } else {
            // Le formulaire n'est pas soumis, afficher le formulaire
            $this->layout->view('_status/formulairestatus', $this->property);
        } 
    }

    public function modifier($id)
    {
      $this->load->model('Status_model', 'm_status');
        // Récupérer les données existantes du statut
        $this->property['status'] = $this->m_status->getStatusById($id);

        // Vérifier si le formulaire est soumis
        if ($this->input->method() === 'post') 
        {
            // Récupérer les valeurs soumises par le formulaire
            $nom = $this->input->post('nom');

            // Créer un tableau avec les données à modifier dans la base de données
            $property = array(
                'nom' => $nom,
            );

            // Modifier les données dans la base de données
            $this->m_status->modifier($id,$property);

            // Rediriger vers la page appropriée après la modification
            redirect('Status/index');
        } else {
            // Le formulaire n'est pas soumis, afficher le formulaire
            $this->layout->view('_status/Modifier', $this->property);
        } 
    }
    public function delete($id_status) 
    {
        $this->load->model('Status_model', 'm_status');
        // supprimer le pays avec l'ID spécifié
        $this->m_status->supprimer($id_status);

        // Rediriger vers une page de confirmation ou une autre action
        redirect('Status/index');
    }
    public function create() {
     $type = $this->m_type->get_type();
        // Récupérer les pays
        $this->property['type'] = $this->m_status->get_type();
        
        // Charger la vue avec les données
        $this->load->view('_status/formulairestatus', $property);
    }
}