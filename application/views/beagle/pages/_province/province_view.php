<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card">
  <div class="card-body">
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-header text-center">
            <h1>Liste des Province</h1>
              <a href="<?php echo base_url("Province/ajouter")?>"class="md-trigger" data-toggle="modal" data-target="#modalFormulaireProvince"><i class="fas fa-plus"></i>Ajouter</a></div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="number">ID</th>
                  <th style="width:40%;">Nom de la province</th>  
                  <th style="width:30%;">Nom de la region</th>
                  <th class="actions">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($province as $province) { ?>
                  <tr>
                    <td class="number"><?php echo $province->id_province; ?></td>
                    <td><?php echo $province->nom; ?></td>
                    <td><?php
                        $region = $this->m_region->update($province->id_region);
                        echo $region->nom ?? "N/A";
                      ?></td>
                    <td>
    					<div class="btn-group btn-hspace">
    					    <button class="btn btn-primary mr-1" type="button" data-toggle="modal" data-target="#modalModifierProvince<?= $province->id_province;?>">
                                 <i class="fas fa-edit"></i>
                            </button>
                            <!-- Modal MODIFIER -->
                                <div class="modal fade" id="modalModifierProvince<?= $province->id_province;?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                                                                   <?= form_open('Province/update/'.$province->id_province, array('class' => 'modal-body form')); ?>

                                                                        <div class="row">
                                                                            <div class="form-group col-sm-4">
                                                                                <!--label for="region">Region :</label-->
                                                                                <?php
                                                                                    $region = $this->m_region->get_region();
                                                                                    $options = array();
                                                                                    foreach ($region as $row) {
                                                                                        $options[$row['id_region']] = $row['nom'];
                                                                                    }
                                                                                    echo form_label('Region :', 'region');
                                                                                    echo form_dropdown('region', $options, $province->id_region, 'class="form-control-sm"');
                                                                                ?>
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <label for="nom">Nom :</label>
                                                                                <input class="form-control form-control-sm" type="text" name="nom" id="nom"
                                                                                    autocomplete="off" value="<?= $province->nom ?>">
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
        					    <button class="btn btn-danger ml-1" type="button" data-toggle="modal" data-target="#modalSupprimerProvince<?= $province->id_province;?>"><i class="fas fa-trash-alt"></i></a></button>
                                <div class="modal fade" id="modalSupprimerProvince<?= $province->id_province?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer ce province ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="<?= base_url("Province/delete/".$province->id_province) ?>" class="btn btn-danger">Supprimer</a>
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
<div class="modal fade" id="modalFormulaireProvince" tabindex="-1" role="dialog" aria-labelledby="modalFormulaireProvinceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modalAjouterLabel">Ajouter un Province</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
               <span aria-hidden="true">&times;</span>
            </button>
                         </div>
                <div class="row">
                    <div class="col-12">

                        <div class="card card-table">
                            <div class="card card-border-color card-border-color-primary">                                  
                                <div class="card-body">   
                                    <?= form_open('Province/ajouter'/* .$province->id_province*/, array('class' => 'modal-body form')); ?> 
                                            
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="region">Region :</label>
                                                    <?php
                                                        // Récupérer les données de la table "province" depuis le modèle
                                                         $region = $this->m_region->get_region(); 
                                                         $option=array(''=>'choisissez une region');
                                                          foreach ($region as $row){
                                                            $options[$row['id_region']] = $row['nom'];
                                                          }
                                                         echo form_label('Region :', 'region');
                                                         echo form_dropdown('region', $options, '', 'class="form-control-sm"');
                                                     ?>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="nom">Nom :</label> 
                                                    <input class="form-control form-control-sm" type="text" name="nom"
                                                        id="nom"
                                                        autocomplete="off"
                                                        placeholder="Entrer le nom" required>
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