<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Vue : pays/liste.php -->
<link rel="stylesheet" href="asserts/css/app.css">
<div class="col-lg-6">
              <div class="card card-table text-center">
                <div class="card-header"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><h1>Liste des Type</h1>
                  </font></font><div class="tools dropdown"><span class="icon mdi mdi-download"></span>
               </div>
                </div>
                <a href="<?php echo base_url("Type/ajouter")?>" class="md-trigger" data-toggle="modal" data-target="#modalFormulaireType"><i class="fas fa-plus"></i>Ajouter</a>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                         <th class="number"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
                        <th style="width:50%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Type du bien</font></font></th>
                        <th class="actions"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Action</font></font></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($type as $type) { ?>
                        <tr>
                          <td class="number"><?php echo $type['id_type']; ?></td>
                          <td><?php echo $type['nom']; ?></td>
                          <td>
                              <div class="btn-group btn-hspace">
                                <button class="btn btn-primary mr-1" type="button" data-toggle="modal" data-target="#modalModifierType<?=$type['id_type'];?>">
                                 <i class="fas fa-edit"></i>
                            </button> 
                            <!-- Modal MODIFIER -->
                                    <div class="modal fade" id="modalModifierType<?=$type['id_type'];?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                                                                    <?php echo form_open('Type/modifier/'.$type['id_type'], array('class' => 'modal-body form')); ?> 
                                                                            
                                                                            <div class="row">
                                                                                <div class="form-group col-sm-4">
                                                                                    <label for="type">Type :</label>
                                                                                    <input class="form-control form-control-sm" type="text" name="nom"
                                                                                        id="nom"
                                                                                        autocomplete="off"
                                                                                        value="<?= $type['nom'] ?>">
                                                                                </div>
                                                                            </div><br>
                                                                                <div class="modal-footer">
                                                                                    <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                                                                        <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                                                                                    </button>
                                                                                    <input class="btn btn-primary md-trigger" type="submit" name="Modifier" value="Modifier">
                                                                                </div>
                                                                    <?php echo form_close(); ?>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>                               
                                <button class="btn btn-danger ml-1" type="button"data-toggle="modal" data-target="#modalSupprimerType<?= $type['id_type'] ?>"> <i class="fas fa-trash-alt"></i>
                                </button>
                                <div class="modal fade" id="modalSupprimerType<?= $type['id_type'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer ce type ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="<?= base_url("Type/delete/".$type['id_type']) ?>" class="btn btn-danger">Supprimer</a>
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



            <!-- Modal -->
<div class="modal fade" id="modalFormulaireType" tabindex="-1" role="dialog" aria-labelledby="modalFormulaireTypeLabel" aria-hidden="true">
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
                    <?= form_open('Type/ajouter' /*.$type->id_type*/, array('class' => 'modal-body form')); ?> 
                            
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="type">Type :</label>
                                    <input class="form-control form-control-sm" type="text" name="nom"
                                        id="nom"
                                        autocomplete="off"
                                        placeholder="Entrer le type du bien" required>
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                        <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                                    </button>
                                    <input class="btn btn-success md-trigger" type="submit" name="valider" value="Valider">
                                </div>
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