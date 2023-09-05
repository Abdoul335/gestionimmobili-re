<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Banque extends CI_Controller {
    protected $property = array(
        'title' => 'Banque',
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
        $this->property['banque'] = $this->m_banque->afficher();

        // Passer les données à votre vue pour les afficher
        $this->layout->view('_banque/banque_view', $this->property);
    }
    public function ajouter() 
     {
        
            // Vérifier si le formulaire est soumis
     if ($this->input->method() === 'post') 
     {
        // Récupérer les valeurs soumises par le formulaire
        $nom = $this->input->post('nom');
        $id_pays = $this->input->post('pays');

        // Créer un tableau avec les données à insérer dans la base de données
        $property = array(
            'nom' => $nom,
            'id_pays' => $id_pays
        );

        // Insérer les données dans la base de données
        $this->m_banque->insert($property);

        // Rediriger vers la page appropriée après l'insertion
        redirect('Banque/index');
     } else {
        // Le formulaire n'est pas soumis, afficher le formulaire
        $this->layout->view('_banque/formulairebanque',$this->property);
     } 
    }
    public function update($id_banque)
    {
        // récupérer les données existantes de la banque
        $this->property['banque'] = $this->m_banque->getBanqueById($id_banque);

        // Vérifier si le formulaire a été soumis
        if ($this->input->post('modifier')) 
        {
            $property = array(
                'nom' => $this->input->post('nom'),
                'id_pays' => $this->input->post('pays'),
            );
            $this->m_banque->modifier($id_banque, $property);
            redirect('Banque/index');  
        }
        $this->layout->view('_banque/Modifier', $this->property);
    }

    public function delete($id_banque)
    {
        // supprimer la banque avec l'ID spécifié
        $this->m_banque->supprimer($id_banque);

        // Rediriger vers une page de confirmation ou une autre action
        redirect(base_url('Banque/index'));
    }

    public function create() {
     $pays = $this->m_pays->get_pays();
        // Récupérer les pays
        $property['pays'] = $this->m_banque->get_pays();
        
        // Charger la vue avec les données
        $this->load->view('_banque/formulairebanque', $this->property);
    }
}