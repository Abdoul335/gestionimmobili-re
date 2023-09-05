<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {
    protected $property = array(
        'title' => 'Type',
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
      $this->property['type'] = $this->m_type->get_types();

        // Passer les données à votre vue pour les afficher
        $this->layout->view('_type/type_view', $this->property);
    }
    public function ajouter() {
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
        $this->m_type->insert($property);

        // Rediriger vers la page appropriée après l'insertion
        redirect('Type/index');
     } else {
        // Le formulaire n'est pas soumis, afficher le formulaire
        $this->layout->view('_type/formulairetype',$this->property);
     } 
    }
  public function modifier($id)
   {
        // Récupérer les données existantes du type
        $this->property['type'] = $this->m_type->getTypeById($id);
        
        // Vérifier si le formulaire est soumis
        if ($this->input->method() === 'post') {
            // Récupérer les valeurs soumises par le formulaire
            $nom = $this->input->post('nom');
            // Créer un tableau avec les données à insérer dans la base de données
            $property = array(
                'nom' => $nom,
            );

            // Insérer les données dans la base de données
            $this->m_type->update($property, $id);

            // Rediriger vers la page appropriée après la modification
            redirect('Type/index');
        } else {
            // Le formulaire n'est pas soumis, afficher le formulaire avec les données existantes
            $this->layout->view('_type/Modifier', $this->property);
        }
    }

   public function delete($id_type) {
        // supprimer le pays avec l'ID spécifié
        $this->m_type->supprimer($id_type);

        // Rediriger vers une page de confirmation ou une autre action
        redirect(base_url('Type/index'));
    }
}