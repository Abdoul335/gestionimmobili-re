<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ville extends CI_Controller
 {
    protected $property = array(
        'title' => 'Ville',
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
        $this->property['ville'] = $this->m_ville->afficher();
        $this->property['province'] = $this->m_province->afficher();

        // Passer les données à votre vue pour les afficher
        $this->layout->view('_ville/ville_view', $this->property);
    }
  
    public function ajouter() 
    {
        
            // Vérifier si le formulaire est soumis
     if ($this->input->method() === 'post') 
     {
        // Récupérer les valeurs soumises par le formulaire
        $nom = $this->input->post('nom');
        $id_province = $this->input->post('province');

        // Créer un tableau avec les données à insérer dans la base de données
        $property = array(
            'nom' => $nom,
            'id_province' => $id_province
        );

        // Insérer les données dans la base de données
        $this->m_ville->ajouter($property);

        // Rediriger vers la page appropriée après l'insertion
        redirect('Ville/index');
     } else {
        // Le formulaire n'est pas soumis, afficher le formulaire
        $this->layout->view('_ville/formulaireville',$this->property);
     } 
    }
     
    public function modifier($id)
{
    // Récupérer les données existantes de la ville
    $this->property['ville'] = $this->m_ville->getVilleById($id);

    if ($this->input->method() === 'post') {
        // Récupérer les valeurs soumises par le formulaire
        $nom = $this->input->post('nom');
        $id_province = $this->input->post('province');

        // Créer un tableau avec les données à insérer dans la base de données
        $property = array(
            'nom' => $nom,
            'id_province' => $id_province
        );

        // Modifier les données dans la base de données
        $this->m_ville->modifier($id, $property);

        // Rediriger vers la page appropriée après la modification
        redirect('Ville/index');
    } else {
        // Le formulaire n'est pas soumis, afficher le formulaire
        $this->layout->view('_ville/Modifier', $this->property);
    }
}

    public function delete($id_ville) {
        // supprimer le pays avec l'ID spécifié
        $this->m_ville->supprimer($id_ville);

        // Rediriger vers une page de confirmation ou une autre action
        redirect('Ville/index');

    }
    public function create() {
     $province = $this->m_province->get_province();
        // Récupérer les pays
        $property['province'] = $this->m_ville->get_province();
        
        // Charger la vue avec les données
        $this->load->view('_ville/formulaireville', $this->property);
    }
}