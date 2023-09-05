<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Controller {
    protected $property = array(
        'title' => 'Compte',
        'UPDATE_SUCCESS' => FALSE,
        'INSERT_SUCCESS' => FALSE,
    );

    public function __construct() 
    {
        parent:: __construct();
        setlocale(LC_TIME, 'fr_FR', 'fra');
        $this->property['pagetitle'] = utf8_encode(strftime("%d %b %G", now()));
        $this->load->library('layout');
    }
    public function index()
    {
        $this->property['compte'] = $this->m_compte->afficher(); 

        // Passer les données à votre vue pour les afficher
        $this->layout->view('_compte/compte_view', $this->property);
    }
    public function ajouter() {
                if ($this->input->method() === 'post') 
                    {// Récupérer les valeurs soumises par le formulaire
                        $codeBanque = $this->input->post('codebanque');
                        $codeGuichet = $this->input->post('codeguichet');
                        $numero_compte = $this->input->post('numero_compte');
                        $cleRib = $this->input->post('cle_rib');
                        $id_banque = $this->input->post('banque');
                        $id_en = $this->input->post('entreprise');

                        // Créer un tableau de données à insérer dans la base de données
                        $property = array(
                            'codebanque' => $codeBanque,
                            'codeguichet' => $codeGuichet,
                            'numero_compte' => $numero_compte,
                            'cle_rib' => $cleRib,
                            'id_banque' => $id_banque,
                            'id_en' => $id_en
                        );

                        // Appeler la méthode du modèle pour insérer les données
                        $this->m_compte->insert($property);

                        // Rediriger vers la page appropriée après l'insertion
                        redirect('Compte/index');
                    } else {
                        // Le formulaire n'est pas soumis, afficher le formulaire
                        $this->layout->view('_compte/formulairecompte',$this->property);
                     } 
    }
   public function modifier($id_compte)
   {
        $this->property['compte'] = $this->m_compte->getCompteById($id_compte);
        if ($this->input->method() === 'post') 
        {
            // Récupérer les valeurs soumises par le formulaire
            $codeBanque = $this->input->post('codebanque');
            $codeGuichet = $this->input->post('codeguichet');
            $numero_compte = $this->input->post('numero_compte');
            $cleRib = $this->input->post('cle_rib');
            $banqueId = $this->input->post('banque');
            $entrepriseId = $this->input->post('entreprise');

            // Créer un tableau de données à insérer dans la base de données
            $property = array(
                'codebanque' => $codeBanque,
                'codeguichet' => $codeGuichet,
                'numero_compte' => $numero_compte,
                'cle_rib' => $cleRib,
                'id_banque' => $banqueId,
                'id_en' => $entrepriseId
            );

            // Appeler la méthode du modèle pour modifier les données
            $this->m_compte->modifier($id_compte, $property);


            // Rediriger vers la page appropriée après la modification
            redirect('Compte/index');
        } else {
            // Le formulaire n'est pas soumis, afficher le formulaire
            $this->layout->view('_compte/Modifier', $this->property);
        } 
    }

    public function delete($id_compte) {
        // supprimer le pays avec l'ID spécifié
        $this->m_compte->supprimer($id_compte);

        // Rediriger vers une page de confirmation ou une autre action
        redirect('Compte/index');

    }
    public function create() {
     $banque = $this->m_banque->get_banque();
        // Récupérer les pays
        $property['banque'] = $this->m_compte->get_banque();
        
        // Charger la vue avec les données
        $this->load->view('_compte/formulairecompte', $this->property);
    }
    public function creat() {
     $entreprise = $this->m_entreprise->get_entreprise();
        // Récupérer les pays
        $property['entreprise'] = $this->m_compte->get_entreprise();
        
        // Charger la vue avec les données
        $this->load->view('_compte/formulairecompte', $this->property);
    }
} 