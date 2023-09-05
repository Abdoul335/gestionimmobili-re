<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quartier extends CI_Controller
{
    protected $property = array(
        'title' => 'Quartier',
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
        $this->property['quartier'] = $this->m_quartier->afficher();

        // Passer les données à votre vue pour les afficher
        $this->layout->view('_quartier/quartier_view', $this->property);
    }

    public function ajouter()
    {

        // Vérifier si le formulaire est soumis
        if ($this->input->method() === 'post')
        {
            // Récupérer les valeurs soumises par le formulaire
            $nom = $this->input->post('nom');
            $id_ville = $this->input->post('ville');

            // Créer un tableau avec les données à insérer dans la base de données
            $property = array(
                'nom' => $nom,
                'id_ville' => $id_ville
            );

            // Insérer les données dans la base de données
            $this->m_quartier->ajouter($property);

            // Rediriger vers la page appropriée après l'insertion
            redirect('Quartier/index');
        } else {
            // Le formulaire n'est pas soumis, afficher le formulaire
            $this->layout->view('_quartier/formulairequartier', $this->property);
        }
    }

    public function update($id_quartier)
  {
        // Récupérer les données existantes du quartier en fonction de l'ID
        $this->property['quartier'] = $this->m_quartier->getQuartierById($id_quartier);
        
        // Vérifier si le formulaire est soumis
        if ($this->input->method() === 'post')
        {
            // Récupérer les valeurs soumises par le formulaire
            $nom = $this->input->post('nom');
            $id_ville = $this->input->post('ville');

            // Créer un tableau avec les données à insérer dans la base de données
            $property = array(
                'nom' => $nom,
                'id_ville' => $id_ville
            );

            // Mettre à jour les données dans la base de données en utilisant l'ID du quartier
            $this->m_quartier->modifier($id_quartier, $property);

            // Rediriger vers la page appropriée après la modification
            redirect('Quartier/index');
        } else {
            // Le formulaire n'est pas soumis, afficher le formulaire de modification
            $this->layout->view('_quartier/Modifier', $this->property);
        }
    }
   public function delete($id_quartier)
    {
        // Supprimer le pays avec l'ID spécifié
        $this->m_quartier->supprimer($id_quartier);

        // Rediriger vers une page de confirmation ou une autre action
        redirect('Quartier/index');
    }

    public function create()
    {
        $ville = $this->m_ville->get_ville();

        // Récupérer les pays
        $this->property['ville'] = $this->m_quartier->get_ville();

        // Charger la vue avec les données
        $this->load->view('_quartier/formulairequartier', $this->property);
    }
}
