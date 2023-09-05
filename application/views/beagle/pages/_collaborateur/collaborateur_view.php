<?php
defined('BASEPATH') OR exit('No direct script access allowed')?>
<div class="card">
   <div class="card-body">
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-header text-center">
            <h1>Liste des Collaborateurs</h1>
              <a href="#" class="md-trigger file_java" data-toggle="modal" data-target="#modalAjouter"><i class="fas fa-plus"></i> Ajouter
              </a>
            <div class="tools dropdown"><span class="icon mdi mdi-download"></span></div>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead> 
                <tr>
                  <!--th class="number">ID</th-->
                  <th style="width:;">Nom</th> 
                  <th style="width:;">Adresse</th>
                  <th style="width:;">Email</th>
                  <th class="number">Telephone1</th> 
                  <th style="width:;">Telephone2</th>
                  <th class="number">Reference</th> 
                  <th class="">Entreprise</th>
                  <th class="">Pays</th>
                  <th class="">Region</th>
                  <th class="">Province</th>
                  <th class="">Ville</th>
                  <th class="">Quartier</th>
                  <th class="actions">Action</th> 
                </tr>
              </thead>
              <tbody>
                <?php foreach ($collaborateur as $collaborateur) { ?>
                  <tr>
                      <!--td class="number"><?//php echo $row->id_col; ?></td-->
                      <td><?php echo $collaborateur->nom; ?></td>
                      <td><?php echo $collaborateur->Adresse; ?></td>
                      <td><?php echo $collaborateur->email; ?></td>
                      <td><?php echo $collaborateur->telephone1; ?></td>
                      <td><?php echo $collaborateur->telephone2; ?></td>
                      <td><?php echo $collaborateur->reference; ?></td>
                      <td>
                        <?php
                        $entreprise = $this->m_entreprise->update($collaborateur->id_en);
                        echo $entreprise->nom ?? "N/A";
                      ?>
                      </td>
                      <td>
                      <?php
                        $pays = $this->m_pays->getPaysById($collaborateur->id_pays);
                        echo $pays->nom ?? "N/A";
                      ?>
                    </td>
                    <td><?php
                        $region = $this->m_region->update($collaborateur->id_region);
                        echo $region->nom ?? "N/A";
                      ?></td>
                      <td>
                      <?php
                        $province = $this->m_province->getProvinceById($collaborateur->id_province);
                        echo $province->nom ?? "N/A";
                      ?>
                    </td>
                    <td>
                      <?php
                        $ville = $this->m_ville->getVilleById($collaborateur->id_ville);
                        echo $ville->nom ?? "N/A";
                      ?>
                    </td>
                    <td>
                      <?php
                         $quartier = $this->m_quartier->getQuartierById($collaborateur->id_quartier);
                         echo $quartier->nom ?? "N/A";
                      ?>
                    </td>
                    <td>
                        <div class="btn-group d-flex" role="group">
                            <div>                           
                                <button class="btn btn-primary mr-1" type="button" data-toggle="modal" data-target="#modalModifierColla<?= $collaborateur->id_col;?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <!-- Modal MODIFIER -->
                                <!-- Votre code de modal de modification ici -->
                                <div class="modal fade" id="modalModifierColla<?= $collaborateur->id_col;?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalModifierLabel">Modification</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                           <div class="row">
                                                <div class="col-12">
                                                    <div class="card card-table">
                                                        <div class="card card-border-color card-border-color-primary">    
                                                            <div class="card-body">   
                                                              <?= form_open('Collaborateur/update/' .$collaborateur->id_col, array('class' => 'modal-body form')); ?> 
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="nom">Nom :</label>
                                                                            <input class="form-control form-control-sm" type="text"
                                                                                name="nom"
                                                                                id="nom"
                                                                                autocomplete="off"
                                                                                value="<?= isset($collaborateur) ? $collaborateur->nom : '' ?>"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="prenom">Adresse :</label>
                                                                            <input class="form-control form-control-sm" type="text" name="Adresse"
                                                                                id="adresse"
                                                                                autocomplete="off"
                                                                                value="<?= isset($collaborateur) ? $collaborateur->Adresse : '' ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4"> 
                                                                        <div class="form-group">
                                                                            <label for="sexe">Email :</label>
                                                                            <input class="form-control form-control-sm" type="text"
                                                                                name="email"
                                                                                id="email"
                                                                                autocomplete="off"
                                                                                value="<?= isset($collaborateur) ? $collaborateur->email : '' ?>">
                                                                        </div>
                                                                    </div>
                                                                </div><br/>
                                                                <div class="row">
                                                                    <div class="col-sm-4"> 
                                                                        <div class="form-group">
                                                                            <label for="telephone">Telephone 1:</label>
                                                                            <input class="form-control form-control-sm" type="text"
                                                                                name="telephone1"
                                                                                id="telephone1"
                                                                                autocomplete="off"
                                                                                value="<?= isset($collaborateur) ? $collaborateur->telephone1 : '' ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="telephone">Telephone 2:</label>
                                                                            <input class="form-control form-control-sm" type="text"
                                                                                name="telephone2"
                                                                                id="telephone2"
                                                                                autocomplete="off"
                                                                                value="<?= isset($collaborateur) ? $collaborateur->telephone2: '' ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="secteur">reference:</label>
                                                                            <input class="form-control form-control-sm" type="text"
                                                                                name="reference"
                                                                                id="reference"
                                                                                autocomplete="off"
                                                                                value="<?= isset($collaborateur) ? $collaborateur->reference : '' ?>">
                                                                        </div>
                                                                    </div>
                                                                </div><br/>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <!--label for="entreprise">Entreprise :</label-->
                                                                                 <?php
                                                                                    // Récupérer les données de la table "province" depuis le modèle
                                                                                     $entreprise = $this->m_entreprise->get_entreprise(); 
                                                                                     $option=array();
                                                                                      foreach ($entreprise as $row){
                                                                                        $options[$row['id_en']] = $row['nom'];
                                                                                      }
                                                                                     echo form_label('Entreprise :', 'entreprise');
                                                                                     echo form_dropdown('entreprise', $options, isset($collaborateur) ? $collaborateur->id_en :'', 'class="form-control form-control-sm"');
                                                                                 ?>
                                                                        </div>
                                                                    </div>
                                                                     <div class="form-group col-sm-4">
                                                                                <!--label for="nom">Pays:</label-->
                                                                            
                                                                                 <?php
                                                                                    // Récupérer les données de la table "province" depuis le modèle
                                                                                     $pays = $this->m_pays->get_pays(); 
                                                                                     $options=array();
                                                                                      foreach ($pays as $row){
                                                                                        $options[$row['id_pays']] = $row['nom'];
                                                                                      }
                                                                                     echo form_label('Pays', 'pays');
                                                                                     echo form_dropdown('pays', $options, isset($collaborateur) ? $collaborateur->id_pays :'', 'class="form-control form-control-sm"');
                                                                                 ?>
                                                                    </div>
                                                                    <div class="form-group col-sm-4">
                                                                                <!--label for="region">Region :</label-->
                                                                                <?php
                                                                                    // Récupérer les données de la table "province" depuis le modèle
                                                                                     $region = $this->m_region->get_region(); 
                                                                                     $option=array();
                                                                                      foreach ($region as $row){
                                                                                        $options[$row['id_region']] = $row['nom'];
                                                                                      }
                                                                                     echo form_label('Region :', 'region');
                                                                                     echo form_dropdown('region', $options,isset($collaborateur) ? $collaborateur->id_region :'', 'class="form-control form-control-sm"');
                                                                                 ?>
                                                                    </div>
                                                                </div><br/>
                                                                    <div class="row">
                                                                    <div class="form-group col-sm-4">
                                                                                <!--label for="">Province :</label-->
                                                                                <?php
                                                                                // Récupérer les données de la table "province" depuis le modèle
                                                                                $province = $this->m_province->get_province(); // Remplacez "nom_du_modele" par le nom réel de votre modèle

                                                                                $options = array();
                                                                                foreach ($province as $row) {
                                                                                    $options[$row['id_province']] = $row['nom'];
                                                                                }

                                                                                echo form_label('Province', 'province');
                                                                                echo form_dropdown('province', $options, isset($collaborateur) ? $collaborateur->id_province :'', 'class="form-control form-control-sm"');
                                                                                ?>
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <!--label for="nom">ville:</label-->
                                                                            
                                                                                 <?php
                                                                                    // Récupérer les données de la table "province" depuis le modèle
                                                                                     $ville = $this->m_ville->get_ville(); 
                                                                                     $option=array();
                                                                                      foreach ($ville as $row){
                                                                                        $options[$row['id_ville']] = $row['nom'];
                                                                                      }
                                                                                     echo form_label('Ville :', 'ville');
                                                                                     echo form_dropdown('ville', $options, isset($collaborateur) ? $collaborateur->id_ville :'', 'class="form-control form-control-sm"');
                                                                                 ?>
                                                                        
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                 <?php
                                                                                    // Récupérer les données de la table "province" depuis le modèle
                                                                                     $quartier = $this->m_quartier->get_quartier(); 
                                                                                     $options=array();
                                                                                      foreach ($quartier as $row){
                                                                                        $options[$row['id_quartier']] = $row['nom'];
                                                                                      }
                                                                                     echo form_label('Quartier :', 'quartier');
                                                                                     echo form_dropdown('quartier', $options, isset($collaborateur) ? $collaborateur->id_quartier:'', 'class="form-control form-control-sm"');
                                                                                 ?>
                                                                            </div>
                                                               </div><br><br>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                        <input class="btn btn-primary md-trigger" type="submit" name="modifier" value="Modifier">
                                                                    </div>
                                                                <?= form_close(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                            <div>                           
   
    <button class="btn btn-danger ml-1" type="button" data-toggle="modal" data-target="#confirmDeleteModal<?= $collaborateur->id_col ?>">
        <i class="fas fa-trash-alt"></i>
    </button>

    <!-- Modal Modifier-->
    <div class="modal fade" id="confirmDeleteModal<?= $collaborateur->id_col ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Confirmation de Suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cet élément ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-danger" href="<?= base_url("Collaborateur/delete/".$collaborateur->id_col) ?>">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
</div>

                        </div>
                    </td>
                  </tr>
                      
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalAjouter" tabindex="-1" role="dialog" aria-labelledby="modalAjouterLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAjouterLabel">Ajouter un Collaborateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
       <div class="row">
    <div class="col-12">
        <div class="card card-table">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body form-inline">
                   <?= form_open('Collaborateur/ajouter/', array('id' => 'AjouterForm', 'class' => 'modal-body form')); ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group small">
                                <label for="Nom">Nom :</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="nom"
                                    id="Nom"
                                    autocomplete="off"
                                    placeholder="Entrer le nom" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group small">
                                <label for="Adresse">Adresse :</label>
                                <input class="form-control form-control-sm" type="text" name="Adresse"
                                    id="Adresse"
                                    autocomplete="off"
                                    placeholder="Entrer votre Adresse" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group small">
                                <label for="Email">Email :</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="email"
                                    id="Email"
                                    autocomplete="off"
                                    placeholder="Entrer votre Email">
                            </div>
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-inline">
                                <label for="Telephone 1">Telephone 1:</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="telephone1"
                                    id="Telephone 1"
                                    autocomplete="off"
                                    placeholder="N° telephone 1" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-inline">
                                <label for="Telephone 2">Telephone 2:</label>
                                <input class="form-control form-control-sm small" type="text"
                                    name="telephone2"
                                    id="Telephone 2"
                                    autocomplete="off"
                                    placeholder="N° telephone 2" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group small">
                                <label for="Reference">Reference :</label>
                                <input class="form-control form-control-sm " type="text"
                                    name="reference"
                                    id="Reference"
                                    autocomplete="off"
                                    placeholder="Entrer les refernce" required>
                            </div>
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group ">
                                <?php
                                    // Récupérer les données de la table "province" depuis le modèle
                                    $entreprise = $this->m_entreprise->get_entreprise();
                                    $options = array('' => 'Choisissez entreprise');
                                    foreach ($entreprise as $row) {
                                        $options[$row['id_en']] = $row['nom'];
                                    }
                                    echo form_label('Entreprise :', 'entreprise');
                                    echo form_dropdown('entreprise', $options, '', 'class="form-control form-control-sm"');
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-4 ">
                            <?php
                                // Récupérer les données de la table "pays" depuis le modèle
                                $pays = $this->m_pays->get_pays();
                                // Ajouter une option vide avec le libellé "Choisissez un pays"
                                  $options = array('' => 'Choisissez un pays');
                                foreach ($pays as $row) {
                                    $options[$row['id_pays']] = $row['nom'];
                                }
                                echo form_label('Pays', 'pays-dropdown');
                                echo form_dropdown('pays', $options, '', 'id="pays-dropdown" class="form-control form-control-sm"');
                            ?>
                        </div>
                        <div class="form-group col-sm-4">
                            <?php
                                 /*Récupérer les données de la table "province" depuis le modèle
                                    echo form_label('Region :', 'region-dropdown');
                                    echo form_dropdown('region', array('' => 'Choisissez une région'), '', 'class="form-control form-control-sm" id="region-dropdown"');*/

                                
                                $region = $this->m_region->getRegionsByCountry('id_pays');
                                $options = array('' => 'Choisissez une region');
                                foreach ($region as $row) {
                                    $options[$row['id_region']] = $row['nom'];
                                }
                                echo form_label('Region :', 'region-dropdown');
                                echo form_dropdown('region', $options, '', 'class="form-control form-control-sm" id="region-dropdown"');
                            ?>
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <?php
                                // Récupérer les données de la table "province" depuis le modèle
                                $province = $this->m_province->get_province();

                                $options_province = array('' => 'Choisissez province');
                                foreach ($province as $row) {
                                    $options_province[$row['id_province']] = $row['nom'];
                                }
                                echo form_label('Province :', 'province-dropdown');
                                echo form_dropdown('province', $options_province, '', 'class="form-control form-control-sm" id="province-dropdown" ');
                            ?>
                        </div>
                        <div class="form-group col-sm-4">
                            <?php
                                // Récupérer les données de la table "province" depuis le modèle
                                $ville = $this->m_ville->get_ville();
                                $option = array('' => 'Choisissez un ville');
                                foreach ($ville as $row) {
                                    $options[$row['id_ville']] = $row['nom'];
                                }
                                echo form_label('Ville :', 'ville-dropdown');
                                echo form_dropdown('ville', $options, '', 'class="form-control form-control-sm" id="ville-dropdown"');
                            ?>
                        </div>
                        <div class="form-group col-sm-4">
                            <?php
                                // Récupérer les données de la table "province" depuis le modèle
                                $quartier = $this->m_quartier->get_quartier();
                                $options = array('' => 'Choisissez un quartier');
                                foreach ($quartier as $row) {
                                    $options[$row['id_quartier']] = $row['nom'];
                                }
                                echo form_label('Quartier :', 'quartier-dropdown');
                                echo form_dropdown('quartier', $options, '', 'class="form-control-sm" id="quartier-dropdown"');
                            ?>
                        </div>
                    </div><br/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <!--button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                            <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                        </button-->
                        <input class="btn btn-success md-trigger" type="submit" name="valider" value="Valider">
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

      </div>
    </div>
  </div>
</div>

