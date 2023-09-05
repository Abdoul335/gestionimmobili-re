<div class="card">
   <div class="card-body">
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-header text-center">
            <h1>Liste des Régions</h1>
            <a href="<?php echo base_url("Region/ajouter")?>" class=" md-trigger" data-toggle="modal" data-target="#modalFormulaireRegion"><i class="fas fa-plus"></i>Ajouter</a>
            <div class="tools dropdown"><span class="icon mdi mdi-download"></span></div>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="number">ID</th>
                  <th style="width:40%;">Nom de la région</th> 
                  <th style="width:30%;">Nom du pays</th>
                  <th class="actions">Action</th>
                </tr>
              </thead>
              <tbody> 
                <?php foreach ($region as $region) { ?>
                  <tr>
                    <td class="number"><?php echo $region->id_region; ?></td>
                    <td><?php echo $region->nom; ?></td>
                    <td>
                      <?php
                        $pays = $this->m_pays->getPaysById($region->id_pays);
                        echo $pays->nom ?? "N/A";
                      ?>
                    </td>
                    <td>
    					<div class="btn-group btn-hspace">
    					    <button class="btn btn-primary mr-1" type="button" data-toggle="modal" data-target="#modalModifierRegion<?= $region->id_region;?>">
                      <i class="fas fa-edit"></i>
                  </button>
                  <!-- Modal MODIFIER -->
                        <div class="modal fade" id="modalModifierRegion<?= $region->id_region;?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalModifierLabel">Modification</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                                <div class="modal-body">
                                  <div class="col-12">
                                <div class="card card-table">
                                    <div class="card card-border-color card-border-color-primary">
                                        <div class="card-body">   
                                          <?= form_open('Region/modifier/' . $region->id_region, array('class' => 'modal-body form')); ?> 
                         
                                                    
                                                    <div class="row">
                                                        <div class="form-group col-sm-4">
                                                            <label for="nom">Nom :</label>
                                                            <input class="form-control form-control-sm" type="text" name="nom"
                                                                id="nom"
                                                                autocomplete="off" 
                                                                value="<?php echo $region->nom ?>" required>
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <!--label for="pays">Pays :</label-->
                                                            <?php
                                                                $pays = $this->m_pays->get_pays(); 
                                                                $options = array();
                                                                foreach ($pays as $row) {
                                                                    $options[$row['id_pays']] = $row['nom'];
                                                                }
                                                                echo form_label('Pays', 'pays');
                                                                echo form_dropdown('pays', $options, $region->id_pays, 'class="form-control-sm"');
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
    					    <button class="btn btn-danger ml-1" type="button" data-toggle="modal" data-target="#modalSupprimerRegion<?=$region->id_region ?>"><i class="fas fa-trash-alt"></i></a></button>
                            <div class="modal fade" id="modalSupprimerRegion<?= $region->id_region ?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer cette region ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="<?= base_url("Region/delete/".$region->id_region) ?>" class="btn btn-danger">Supprimer</a>
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
<div class="modal fade" id="modalFormulaireRegion" tabindex="-1" role="dialog" aria-labelledby="modalFormulaireRegionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modalAjouterLabel">Ajouter une Region</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
               <div class="row">
    <div class="col-12">

        <div class="card card-table">


            <div class="card card-border-color card-border-color-primary">
                   
                <div class="card-body">   
                    <?= form_open('Region/ajouter' /*.$region->id_region*/, array('class' => 'modal-body form')); ?> 
                             
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="pays">Pays :</label>
                                   <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $pays = $this->m_pays->get_pays(); 
                                         $options=array(''=>'choisissez un pays');
                                          foreach ($pays as $row){
                                            $options[$row['id_pays']] = $row['nom'];
                                          }
                                         echo form_label('Pays :', 'pays');
                                         echo form_dropdown('pays', $options, '', 'class="form-control-sm"');
                                     ?>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="nom">Nom :</label>
                                    <input class="form-control form-control-sm" type="text" name="nom"
                                        id="nom"
                                        autocomplete="off"
                                        placeholder="Entrer le nom" required>
                                </div>
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