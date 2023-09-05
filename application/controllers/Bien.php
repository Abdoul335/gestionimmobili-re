<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bien extends CI_Controller {
    protected $property = array(
        'title' => 'Bien',
        'UPDATE_SUCCESS' => FALSE,
        'INSERT_SUCCESS' => FALSE,
    );

    public function __construct() 
    {
        parent:: __construct();
        setlocale(LC_TIME, 'fr_FR', 'fra');
        $this->property['pagetitle'] = utf8_encode(strftime("%d %b %G", now()));
        $this->load->library('upload');
        $this->load->library('form_validation');
    }
    public function index() {
        $this->load->model('Status_model', 'm_status'); // Load status model
        $this->property['bien'] = $this->m_bien->afficher();
        $this->layout->view('_bien/bien_view', $this->property);
    }
    public function ajouter()
   {
       $this->load->model('Status_model', 'm_status'); // Load status model
        // Vérifier si les données du formulaire ont été soumises
        if ($this->input->post()) {
            // Récupérer les valeurs du formulaire
                $nom= $this->input->post('nom');
                $Adresse= $this->input->post('Adresse');
                $email= $this->input->post('email'); 
                $telephone1= $this->input->post('telephone1');
                $Email= $this->input->post('email');
                $reference= $this->input->post('reference');
               $id_status = $this->input->post('status');
               $description = $this->input->post('description');
               $prix = $this->input->post('prix');
            // Traiter le fichier image 
            $uploadPath = './assets/img/gallery/'; // Chemin du dossier de destination
            $image = $_FILES['image']['name'];
            $imagePath = $uploadPath . $image;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                // Insérer les données dans la base de données
                $imageFileName = basename($imagePath); // Obtient le nom du fichier à partir du chemin complet
                $property = array(
                    'image' => $imageFileName, // Utilisez le nom du fichier extrait
                    'id_status' => $id_status,
                    'description'=>$description,
                    'prix'=>$prix,
                    'nom'=>$nom,
                    'Adresse'=> $Adresse,
                    'email'=>$email,
                    'telephone1'=>$telephone1,  
                    'email'=>$Email,
                    'reference'=>$reference, 
                );
                $this->m_bien->insert($property);

                echo 'Données insérées avec succès.';
                redirect('Bien/index');
            } else {
                echo 'Erreur lors du chargement de l\'image.';
            }
        }

        $this->property['status'] = $this->m_status->get_status();

        $this->layout->view('_bien/formulairebien', $this->property);
    }
  public function modifier($id_bien)
   {
       $this->load->model('Status_model', 'm_status'); // Load status model
            $property['bien'] = $this->m_bien->getBienById($id_bien);

            // Vérifier si les données du formulaire ont été soumises
            if ($this->input->post()) {
                // Récupérer les valeurs du formulaire
                $nom= $this->input->post('nom');
                $Adresse= $this->input->post('Adresse');
                $email= $this->input->post('email');
                $telephone1= $this->input->post('telephone1');
                $Email= $this->input->post('email');
                $reference= $this->input->post('reference');
                $id_status = $this->input->post('status');
                $description = $this->input->post('description');
                 $prix = $this->input->post('prix');
                // Mettre à jour les autres données du formulaire
                $property= array(
                    'id_status' => $id_status,
                    'description' => $description,
                    'prix' =>$prix,
                    'nom'=> $nom,
                    'Adresse'=> $Adresse,
                    'email'=>$email,
                    'telephone1'=>$telephone1,  
                    'email'=>$Email,
                    'reference'=>$reference
              );
                // Traiter le fichier image
                $uploadPath = './assets/img/gallery/'; // Chemin du dossier de destination
                $image = $_FILES['image']['name'];

                // Vérifier si une nouvelle image est sélectionnée
                if (!empty($image)) {
                    $imagePath = $uploadPath . $image;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                        // Nouvelle image sélectionnée, mettre à jour les données avec le nom du nouveau fichier
                        $imageFileName = basename($imagePath);
                        $property['image'] = $imageFileName;
                    } else {
                        echo 'Erreur lors du chargement de l\'image.';
                        return;
                    }
                }

                // Effectuer la mise à jour dans la base de données
                $this->m_bien->modifier($id_bien, $property);

                echo 'Données modifiées avec succès.';
                redirect('Bien/index');
            }

            $this->layout->view('_bien/modifier', $this->property);
    }

    public function supprimer($id_bien)
   {
    // Obtenir les informations du bien à partir de l'ID
    $bien = $this->m_bien->getBienById($id_bien);

    if ($bien) {
        // Chemin complet du fichier logo à supprimer
        $logoPath = './assets/img/gallery/' . $bien->image;

        // Vérifier si le fichier existe
        if (file_exists($logoPath)) {
            // Supprimer le fichier du dossier
            if (unlink($logoPath)) {
                // Mettre à jour la base de données pour supprimer le nom du logo
                $property = array(
                    'image' => ''
                );
                $this->m_bien->supprimer($id_bien, $property);
    
                echo 'Logo supprimé avec succès.';
                redirect('Bien/index');
            } else {
                echo 'Erreur lors de la suppression du logo.';
            }
        } else {
            echo 'Le fichier du logo n\'existe pas.';
        }
    } else {
        echo 'Bien introuvable.';
    }
  }



    public function create()
       { 
         $status = $this->m_status->get_status();
            // Récupérer les pays
            $this->property['status'] = $this->m_status->get_status();
            
            // Charger la vue avec les données
            $this->load->view('_bien/formulairebien', $this->property);
        }
   /* public function autocomplete()
    {
        if(isset($_GET['term'])){
            $result = $this->m_bien->getCollaborateur($_GET['term']);
            if(count($result)>0){
                foreach($result as $row){
                    $result_array[]= array(
                        'label'=>$row->telephone1,
                        'nom'=> $row->nom,
                        'Adresse'=>$row->Adresse,
                        'email'=>$row->email,  
                        'reference'=>$row->reference

                    );
                }
                echo json_encode($result_array);
            }
        }
    } */ 
    public function autocomplete()
{
    if ($this->input->get('term')) {
        $term = $this->input->get('term');
        $result = $this->m_bien->getCollaborateur($term);
        if (count($result) > 0) {
            $result_array = array();
            foreach ($result as $row) {
                $result_array[] = array(
                    'nom' => $row->nom,
                    'Adresse' => $row->Adresse,
                    'email' => $row->email,
                    'reference' => $row->reference
                );
            }
            echo json_encode($result_array);
        }
    }
}
  
}