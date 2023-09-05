<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Portion extends CI_Controller {
    protected $property = array(
        'title' => 'Portion',
        'UPDATE_SUCCESS' => FALSE,
        'INSERT_SUCCESS' => FALSE,
    );

    public function __construct() 
    {
        parent:: __construct();
        setlocale(LC_TIME, 'fr_FR', 'fra');
        $this->property['pagetitle'] = utf8_encode(strftime("%d %b %G", now()));

    }
    public function index() {
        $this->property['portion'] = $this->m_portion->afficher();
        $this->layout->view('_portion/portion_view', $this->property);
    }
   public function ajouter()
   { 
        // Vérifier si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $id_bien = $this->input->post('bien');
            $description = $this->input->post('description');
            
            // Insérer les données dans la base de données
            $property = array(
                'id_bien' => $id_bien,
                'description' => $description
            );
            $this->m_portion->ajouter($property);

            // Rediriger vers une autre page ou afficher un message de succès
            redirect('Portion/index');
        } else {
            // Afficher le formulaire
            $this->layout->view('_portion/formulaireportion',$this->property);
        }
    }
    public function modifier($id_portion)
   {
        // Récupérer la portion à modifier depuis la base de données
        $this->portion = $this->m_portion->getPortionById($id_portion);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $id_bien = $this->input->post('bien');
            $description = $this->input->post('description');

            // Insérer les données dans le tableau $property
            $property = array(
                'id_bien' => $id_bien,
                'description' => $description
            );

            // Appeler la méthode update() du modèle pour modifier les données dans la base de données
            $this->m_portion->update($property, $id_portion);

            // Rediriger vers une autre page ou afficher un message de succès
            redirect('Portion/index');
        } else {
            // Charger la vue du formulaire de modification
            $this->layout->view('_portion/Modifier', array('portion' => $this->portion));
        }
   }

  public function delete($id_portion)
    {
        // supprimer la banque avec l'ID spécifié
        $this->m_portion->supprimer($id_portion);

        // Rediriger vers une page de confirmation ou une autre action
        redirect(base_url('Portion/index'));
    }
    public function create() {
     $bien = $this->m_bien->get_bien();
        // Récupérer les bien
        $this->property['bien'] = $this->m_portion->get_bien();
        
        // Charger la vue avec les données
        $this->load->view('_portion/formulaireportion', $this->property);
    } 
}