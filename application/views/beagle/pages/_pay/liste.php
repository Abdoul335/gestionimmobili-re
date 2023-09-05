<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Vue : pays/liste.php -->
<link rel="stylesheet" href="asserts/css/app.css">
<div class="col-lg-6">
              <div class="card card-table text-center">
                <div class="card-header"><h1>Liste des pays</h1>
                   <div class="tools dropdown"><span class="icon mdi mdi-download"></span>
               </div>
                </div>
                  <a href="<?= base_url("Pays/Ajouter/");?>" class="md-trigger" data-toggle="modal" data-target="#modalAjouter"><i class="fas fa-plus"></i> Ajouter</a>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                         <th class="number">ID</th>
                        <th style="width:50%;">Nom</th>
                        <th style="width:10%;">Indicatif</th>
                        <th class="actions">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($pays as $pays) { ?>
                       <tr>
                        <td class="number"><?php echo $pays->id_pays; ?></td>
                        <td><?php echo $pays->nom; ?></td>
                        <td><?php echo $pays->indicatif; ?></td>
                       <td class="actions">
                          <div class="d-flex">
                              <button class="btn btn-primary mr-1" type="button" data-toggle="modal" data-target="#modalModifier<?= $pays->id_pays ?>">
                                  <i class="fas fa-edit"></i>
                              </button>
                              <!-- Modal MODIFIER -->
                                <div class="modal fade" id="modalModifier<?= $pays->id_pays ?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                                                <div class="col-12 content-center">

                                                    <div class="card card-table center">


                                                        <div class="card card-border-color card-border-color-primary">
                                                            <div class="card-body">   
                                                               <?= form_open('Pays/update/'. $pays->id_pays, array('class' => 'modal-body form')); ?>                             
                                                                        <div class="row">
                                                                            <div class="form-group col-sm-4">
                                                                              <label for="nom">Nom :</label>
                                                                                <input class="form-control form-control-sm" type="text" name="nom"
                                                                                    id="nom"
                                                                                    autocomplete="off"
                                                                                    value="<?php echo $pays->nom; ?>" required>
                                                                            </div>
                                                                           <div class="form-group col-sm-4">
                                                                                <label for="indicatif">Indicatif :</label>
                                                                                <input class="form-control form-control-sm" type="text" name="indicatif"
                                                                                    id="indicatif"
                                                                                    autocomplete="off"
                                                                                    value="<?php  echo $pays->indicatif; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <div class="form-group row">
                                                                                <div class="modal-footer">
                                                                                     <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                                                                        <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                                                                                     </button>
                                                                                     <input class="btn btn-primary md-trigger" type="submit" name="Modifier" value="Modifier">
                                                                                </div>
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
                                </div>
                              <!-- Modal de Confirmation de Suppression -->
                              <a href="#" class="btn btn-danger md-trigger" data-toggle="modal" data-target="#modalSupprimerPays<?= $pays->id_pays?>">
                                      <i class="fas fa-trash-alt"></i></a>
                                <div class="modal fade" id="modalSupprimerPays<?= $pays->id_pays ?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer ce pays ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="<?= base_url("Pays/delete/".$pays->id_pays) ?>" class="btn btn-danger">Supprimer</a>
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

    <!--le Modal-->
    <div class="modal fade" id="modalAjouter" tabindex="-1" role="dialog" aria-labelledby="modalAjouterLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAjouterLabel">Ajouter un Pays</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <div class="row">
                <div class="col-12 content-center">
                    <div class="card card-table center">
                        <div class="card card-border-color card-border-color-primary">
                            <div class="card-body">   
                               <?= form_open('Pays/ajouter/'/*. $pays->id_pays*/, array('class' => 'modal-body form')); ?>                             
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                              <label for="nom">Nom :</label>
                                                <input class="form-control form-control-sm" type="text" name="nom"
                                                    id="nom"
                                                    autocomplete="off"
                                                    placeholder="Entrer Pays" required>
                                            </div>
                                           <div class="form-group col-sm-4">
                                                <label for="indicatif">Indicatif :</label>
                                                <input class="form-control form-control-sm" type="text" name="indicatif"
                                                    id="indicatif"
                                                    autocomplete="off"
                                                    placeholder="Entrer l'indicatif du pays" required>
                                            </div>
                                        </div><br><br><br><br><br>
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
</div>