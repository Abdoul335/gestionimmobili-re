<?php defined('BASEPATH') OR exit('No direct script access allowed')?>

<div class="card">
    <div class="card-body">
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header text-center">
                        <h1>Liste des Entreprises</h1>
                        <a href="<?php echo base_url("Entreprise/ajouter")?>" class="md-trigger" data-toggle="modal" data-target="#modalFormulaireEntreprise"><i class="fas fa-plus"></i>Ajouter</a>
                        <div class="tools dropdown"><span class="icon mdi mdi-download"></span></div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="number">ID</th>
                                    <th style="width:20%;">Nom</th> 
                                    <th style="width:10%;">Email</th>
                                    <th class="number">Telephone</th>
                                    <th style="width:10%;">Adresse</th>
                                    <th class="number">N° IFU</th>  
                                    <th style="width:10%;">Logo</th>
                                    <th style="width:10%;">Quartier</th>
                                    <th class="actions">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($entreprise as $entreprise) { ?>
                                    <tr>
                                        <td class="number"><?php echo $entreprise['id_en']; ?></td>
                                        <td><?php echo $entreprise['nom']; ?></td>
                                        <td><?php echo $entreprise['email']; ?></td>
                                        <td class="number"><?php echo $entreprise['telephone']; ?></td>
                                        <td><?php echo $entreprise['adresse']; ?></td>
                                        <td class="number"><?php echo $entreprise['N°IFU']; ?></td>
                                        <td><img src="<?= base_url('assets/img/gallery/'.$entreprise['logo']) ?>" height="50px" width="50px" alt="logo"></td>
                                        <td>
                                            <?php
                                            $quartier = $this->m_quartier->getQuartierById($entreprise['id_quartier']);
                                            echo $quartier->nom ?? "N/A";
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-hspace">
                                                <div>
                                                <button class="btn btn-primary mr-1" type="button" data-toggle="modal" data-target="#modalModifierEntreprise<?= $entreprise['id_en']; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                                                                    <!-- Modal MODIFIER -->
                                                    <div class="modal fade" id="modalModifierEntreprise<?= $entreprise['id_en']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                                                                                    <?= form_open('Entreprise/modifier/'. $entreprise['id_en'], array('class' => 'modal-body form', 'enctype' => 'multipart/form-data')); ?>
                                                                                    <!-- Le code du formulaire ici -->
                                                                                   <div class="row">
                                                                                        <div class="form-group col-sm-4">
                                                                                            <label for="nom">Nom :</label>
                                                                                            <input class="form-control form-control-sm" type="text" name="nom" id="nom"
                                                                                                autocomplete="off" value="<?= $entreprise['nom']; ?>"required>
                                                                                        </div>
                                                                                        <div class="form-group col-sm-4">
                                                                                            <label for="email">Email :</label>
                                                                                            <input class="form-control form-control-sm" type="email" name="email" id="email"
                                                                                                autocomplete="off" placeholder="Entrer un email" required value="<?= $entreprise['email']; ?>">
                                                                                        </div>
                                                                                        <div class="form-group col-sm-4">
                                                                                            <label for="telephone">Telephone :</label>
                                                                                            <input class="form-control form-control-sm" type="text" name="telephone" id="telephone"
                                                                                                autocomplete="off" value="<?= $entreprise['telephone']; ?>">
                                                                                        </div>
                                                                                    </div><br/>
                                                                                    <div class="row">
                                                                                        <div class="form-group col-sm-4">
                                                                                            <label for="adresse">Adresse :</label>
                                                                                            <input class="form-control form-control-sm" type="text" name="adresse" id="adresse"
                                                                                                autocomplete="off"  value="<?= $entreprise['adresse']; ?>" required>
                                                                                        </div>
                                                                                        <div class="form-group col-sm-4">
                                                                                            <label for="N°IFU">N°IFU :</label>
                                                                                            <input class="form-control form-control-sm" type="text" name="N°IFU" id="N°IFU"
                                                                                                autocomplete="off"  value="<?= $entreprise['N°IFU'] ; ?>" required>
                                                                                        </div>
                                                                                        <div class="form-group col-sm-4">
                                                                                            <label for="logo">Logo :</label>
                                                                                            <input class="form-control form-control-sm" type="file" name="logo" id="logo">
                                                                                        </div>
                                                                                    </div><br/>
                                                                                        <div class="row">
                                                                                        <div class="form-group col-sm-4">
                                                                                            <!--label for="quartier">Quartier :</label-->
                                                                                            <?php
                                                                                                // Récupérer les données de la table "province" depuis le modèle
                                                                                                $quartier = $this->m_quartier->get_quartier(); 
                                                                                                $options = array();
                                                                                                foreach ($quartier as $row) {
                                                                                                    $options[$row['id_quartier']] = $row['nom'];
                                                                                                }
                                                                                                echo form_label('Quartier :', 'quartier');
                                                                                                echo form_dropdown('quartier', $options, $entreprise['id_quartier'], 'class="form-control-sm"');
                                                                                            ?>
                                                                                        </div>
                                                                                        </div><br>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                                            <input class="btn btn-primary md-trigger" type="submit" name="modifier" value="Modifier">
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <img src="<?= base_url('assets/img/gallery/'.$entreprise['logo']) ?>" class="w-100" alt="Image">
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
                                                  <button class="btn btn-danger ml-1" type="button"data-toggle="modal" data-target="#modalSupprimerBien<?= $entreprise['id_en'];?>"><i class="fas fa-trash-alt"></i></a></button>
                                                <div class="modal fade" id="modalSupprimerBien<?= $entreprise['id_en'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Êtes-vous sûr de vouloir supprimer cet entreprise ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                <a href="<?= base_url("Entreprise/delete/".$entreprise['id_en']) ?>" class="btn btn-danger">Supprimer</a>
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
<div class="modal fade" id="modalFormulaireEntreprise" tabindex="-1" role="dialog" aria-labelledby="modalFormulaireEntrepriseLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modalAjouterLabel">Ajouter une Entreprise</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-table">
                            <div class="card card-border-color card-border-color-primary">
                                   
                                <div class="card-body">   
                                    <?= form_open('Entreprise/ajouter/'/* . $entreprise->id_en*/, array('class' => 'modal-body form', 'enctype' => 'multipart/form-data')); ?>
                                     <div class="row">
                                               <div class="form-group col-sm-4">
                                                   <label for="nom">Nom :</label>
                                                    <input class="form-control form-control-sm" type="text" name="nom"
                                                        id="nom"
                                                        autocomplete="off" 
                                                        placeholder="Nom entreprise" required>
                                                </div>
                                               <div class="form-group col-sm-4">
                                                   <label for="email">Email :</label>
                                                    <input class="form-control form-control-sm" type="email" name="email"
                                                        id="email"
                                                        autocomplete="off" 
                                                        placeholder="Entrer un email" required>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                 <label for="telephone">Telephone :</label>
                                                 <input class="form-control form-control-sm" type="number"
                                                    name="telephone"
                                                    id="telephone"
                                                    autocomplete="off"
                                                    placeholder="N° telephone">
                                                </div>
                                            </div><br/>
                                            <div class="row">
                                                 <div class="form-group col-sm-4">
                                                    <label for="nom">Adresse :</label>
                                                    <input class="form-control form-control-sm" type="text" name="adresse"
                                                        id="adresse"
                                                        autocomplete="off"
                                                        placeholder="Entrer votre Adresse" required>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="nom">N°IFU :</label>
                                                    <input class="form-control form-control-sm" type="text" name="N°IFU"
                                                        id="N°IFU"
                                                        autocomplete="off"
                                                        placeholder="Entrer le N°IFU" required>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="nom">Logo :</label>
                                                    <input class="form-control form-control-sm" type="file" name="logo"
                                                        id="logo" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <!--label for="nom">Quartier :</label-->
                                                     <?php
                                                        // Récupérer les données de la table "province" depuis le modèle
                                                         $quartier = $this->m_quartier->get_quartier(); 
                                                         $options=array(''=>'choisissez un quartier');
                                                          foreach ($quartier as $row){
                                                            $options[$row['id_quartier']] = $row['nom'];
                                                          }
                                                         echo form_label('Quartier :', 'quartier');
                                                         echo form_dropdown('quartier', $options, '', 'class="form-control"');
                                                     ?>
                                                </div>
                                            </div><br><br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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