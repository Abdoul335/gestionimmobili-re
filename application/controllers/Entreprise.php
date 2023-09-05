<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entreprise extends CI_Controller {
    protected $property = array(
        'title' => 'Entreprise',
        'UPDATE_SUCCESS' => FALSE,
        'INSERT_SUCCESS' => FALSE,
    );

    public function __construct() 
    {
        parent:: __construct();
        setlocale(LC_TIME, 'fr_FR', 'fra');
        $this->property['pagetitle'] = utf8_encode(strftime("%d %b %G", now()));
        $this->load->library('upload');
    }
    public function index()
    {
        $this->property['entreprise'] = $this->m_entreprise->afficher();

        // Passer les données à votre vue pour les afficher
        $this->layout->view('_entreprise/entreprise_view', $this->property);
    }
 public function ajouter()
{

    // Vérifier si les données du formulaire ont été soumises
    if ($this->input->post()) {
        // Récupérer les valeurs du formulaire
        $nom = $this->input->post('nom');
        $email = $this->input->post('email');
        $telephone = $this->input->post('telephone');
        $adresse = $this->input->post('adresse');
        $ifu = $this->input->post('N°IFU');
        $id_quartier = $this->input->post('quartier');

        // Traiter le fichier logo
        $uploadPath = './assets/img/gallery/'; // Chemin du dossier de destination
        $logo = $_FILES['logo']['name'];
        $logoPath = $uploadPath . $logo;

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $logoPath)) {
            // Insérer les données dans la base de données
            $logoFileName = basename($logoPath); // Obtient le nom du fichier à partir du chemin complet
            $property = array(
                'nom' => $nom,
                'email' => $email,
                'telephone' => $telephone,
                'adresse' => $adresse,
                'N°IFU' => $ifu,
                'logo' => $logoFileName, // Utilisez le nom du fichier extrait
                'id_quartier' => $id_quartier,
            );
            $this->m_entreprise->insert($property);

            echo 'Données insérées avec succès.';
            redirect('Entreprise/index');
        } else {
            echo 'Erreur lors du chargement du logo.';
        }
    }

    $this->layout->view('_entreprise/formulairentreprise', $this->property);
}
   public function modifier($id_en)
   {
        $this->property['entreprise'] = $this->m_entreprise->update($id_en);

        // Vérifier si les données du formulaire ont été soumises
        if ($this->input->post()) {
            // Récupérer les valeurs du formulaire
            $nom = $this->input->post('nom');
            $email = $this->input->post('email');
            $telephone = $this->input->post('telephone');
            $adresse = $this->input->post('adresse');
            $ifu = $this->input->post('N°IFU');
            $id_quartier = $this->input->post('quartier');

            // Vérifier s'il y a un nouveau logo
            if ($_FILES['logo']['name']) {
                // Traiter le fichier logo
                $uploadPath = './assets/img/gallery/'; // Chemin du dossier de destination
                $logo = $_FILES['logo']['name'];
                $logoPath = $uploadPath . $logo;

                if (move_uploaded_file($_FILES['logo']['tmp_name'], $logoPath)) {
                    // Mettre à jour les données dans la base de données
                    $property = array(
                        'nom' => $nom,
                        'email' => $email,
                        'telephone' => $telephone,
                        'adresse' => $adresse,
                        'N°IFU' => $ifu,
                        'logo' => $logo,
                        'id_quartier' => $id_quartier,
                    );
                    $this->m_entreprise->modifier($id_en, $property);
                    echo 'Données mises à jour avec succès.';
                    redirect('Entreprise/index');
                } else {
                    echo 'Erreur lors du chargement du logo.';
                }
            } else {
                // Pas de nouveau logo, mettre à jour les autres données
                $property = array(
                    'nom' => $nom,
                    'email' => $email,
                    'telephone' => $telephone,
                    'adresse' => $adresse,
                    'N°IFU' => $ifu,
                    'id_quartier' => $id_quartier,
                );
                $this->m_entreprise->modifier($id_en, $property);
                echo 'Données mises à jour avec succès.';
                redirect('Entreprise/index');
            }
        }

        $this->layout->view('_entreprise/Modifier', $this->property);
    }

    public function delete($id_en)
{
    // Obtenir les informations de l'entreprise à partir de l'ID
    $entreprise = $this->m_entreprise->update($id_en);

    if ($entreprise) {
        // Chemin complet du fichier logo à supprimer
        $logoPath = './assets/img/gallery/' . $entreprise->logo;

        // Vérifier si le fichier existe
        if (file_exists($logoPath)) {
            // Supprimer le fichier du dossier
            if (unlink($logoPath)) {
                // Supprimer l'entreprise de la base de données
                $this->m_entreprise->supprimer($id_en);
        
                echo 'Entreprise supprimée avec succès.';
                redirect('Entreprise/index');
            } else {
                echo 'Erreur lors de la suppression du logo.';
            }
        } else {
            echo 'Le fichier du logo n\'existe pas.';
        }
    } else {
        echo 'Entreprise introuvable.';
    }
}


    public function create() {
     $quartier = $this->m_quartier->get_quartier();
        // Récupérer les quartier
        $property['quertier'] = $this->m_entreprise->get_quartier();
        
        // Charger la vue avec les données
        $this->load->view('_entreprise/formulairentreprise', $this->property);
    }
}
