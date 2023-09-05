<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends CI_Controller {
    protected $property = array(
        'title' => 'Position',
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
        // Votre code existant pour afficher les position
        $this->property['position'] = $this->m_position->afficher();  

        // Passer les données à votre vue pour les afficher
        $this->layout->view('_position/position_view', $this->property);
    }
   public function ajouter() {

                // Vérifier si le formulaire a été soumis
        if ($this->input->post('valider')) {
            $this->load->library('form_validation');

            // Définir les règles de validation des champs
            $this->form_validation->set_rules('etat', 'Etat', 'required');
            $this->form_validation->set_rules('bien', 'Bien', 'required');

            // Vérifier si la validation a réussi
            if ($this->form_validation->run() === TRUE) {

                // Insérer les données dans la base de données
                $property = array(
                    'etat' => $this->input->post('etat'),
                    'id_bien' => $this->input->post('bien'),
                );
                $this->m_position->insert($property);
                redirect('Position/index');

                // Définir un message de succès
                $this->property['INSERT_SUCCESS'] = TRUE;
            }
        }
        $this->layout->view('_position/formulaireposition', $this->property);
    }
   public function modifier($id_position)
   {
            $this->property['position'] = $this->m_position->getPositionById($id_position);

            // Vérifiez si les données du formulaire ont été soumises
            if ($this->input->post()) {
                // Récupérez les valeurs du formulaire
                $etat = $this->input->post('etat');
                $id_bien = $this->input->post('bien');

                // Mettez à jour les données dans la base de données
                $property = array(
                    'etat' => $etat,
                    'id_bien' => $id_bien
                );
                $this->m_position->modifier($property, $id_position);

                echo 'Données mises à jour avec succès.';
                redirect('Position/index');
            }

            $this->layout->view('_position/modifier', $this->property);
    }
    public function delete($id_position)
    {
        // supprimer la banque avec l'ID spécifié
        $this->m_position->supprimer($id_position);

        // Rediriger vers une page de confirmation ou une autre action
        redirect(base_url('Position/index'));
    }


}