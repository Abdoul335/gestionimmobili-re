<div class="card">
       <div class="card-body">
    <div class="main-content container-fluid">
      <title>Quartier</title>
      <div class="row">
        <div class="col-sm-12">
          <div class="card-header text-center">
            <h1>Liste des Quartier</h1>
            <a href="<?php echo base_url("Quartier/ajouter")?>" class="md-trigger" data-toggle="modal" data-target="#modalFormulaireQuartier"><i class="fas fa-plus"></i>Ajouter</a>
            <div class="tools dropdown"><span class="icon mdi mdi-download"></span></div>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="number">ID</th>
                  <th style="width:40%;">Nom du quartier</th> 
                  <th style="width:30%;">Nom de la ville</th>
                  <th class="actions">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($quartier as $quartier) { ?>
                  <tr> 
                    <td class="number"><?php echo $quartier['id_quartier']; ?></td>
                    <td><?php echo $quartier['nom']; ?></td>
                    <td>
                      <?php
                        $ville = $this->m_ville->getVilleById($quartier['id_ville']);
                        echo $ville->nom ?? "N/A";
                      ?>
                    </td>
                    <td>
              <div class="btn-group btn-hspace">
                  <button class="btn btn-primary mr-1" type="button" data-toggle="modal" data-target="#modalModifierQuartier<?= $quartier['id_quartier']?>">
                        <i class="fas fa-edit"></i>
                    </button>
                    <!-- Modal MODIFIER -->
                        <div class="modal fade" id="modalModifierQuartier<?= $quartier['id_quartier']?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                                                        <?= form_open('Quartier/update/'. $quartier['id_quartier'], array('class' => 'modal-body form')); ?> 
                                                                
                                                                <div class="row">
                                                                    <div class="form-group col-sm-4">
                                                                        <label for="nom">Nom :</label>
                                                                        <input class="form-control form-control-sm" type="text" name="nom"
                                                                            id="nom"
                                                                            autocomplete="off"
                                                                            value="<?= $quartier['nom'] ?>" >
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
                                                                             echo form_dropdown('ville', $options, $quartier['id_ville'], 'class="form-control-sm"');
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
                      <button class="btn btn-danger ml-1" type="button" data-toggle="modal" data-target="#modalSupprimerQuartier<?= $quartier['id_quartier'] ?>"><i class="fas fa-trash-alt"></i></a></button>
                      <div class="modal fade" id="modalSupprimerQuartier<?= $quartier['id_quartier'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer ce quartier ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="<?= base_url("Quartier/delete/".$quartier['id_quartier']) ?>" class="btn btn-danger">Supprimer</a>
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
<div class="modal fade" id="modalFormulaireQuartier" tabindex="-1" role="dialog" aria-labelledby="modalFormulaireQuartierLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modalAjouterLabel">Ajouter un Quartier</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
              <div class="row">
    <div class="col-12">

        <div class="card card-table">


            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">   
                    <?= form_open('Quartier/ajouter' /*. $quartier->id_quartier*/, array('class' => 'modal-body form')); ?> 
                            
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <!--label for="nom">ville:</label-->
                                
                                     <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $ville = $this->m_ville->get_ville(); 
                                         $options=array(''=>'choisissez une ville');
                                          foreach ($ville as $row){
                                            $options[$row['id_ville']] = $row['nom'];
                                          }
                                         echo form_label('Ville :', 'ville');
                                         echo form_dropdown('ville', $options, '', 'class="form-control-sm"');
                                     ?>
                            
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="nom">Nom :</label>
                                    <input class="form-control form-control-sm" type="text" name="nom"
                                        id="nom"
                                        autocomplete="off"
                                        placeholder="Entrer le nom du quartier" required>
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