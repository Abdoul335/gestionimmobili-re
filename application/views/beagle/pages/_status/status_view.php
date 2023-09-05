<div class="card">
   <div class="card-body">
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-header text-center">
            <h1>Liste des Status</h1>
            <a href="<?php echo base_url("Status/ajouter")?>" class="md-trigger" data-toggle="modal" data-target="#modalFormulaireStatus"><i class="fas fa-plus"></i>Ajouter</a>
            <div class="tools dropdown"><span class="icon mdi mdi-download"></span></div>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="number">ID</th>
                  <th style="width:30%;">Status du collaborateur</th>
                  <th class="actions">Action</th>
                </tr>
              </thead> 
              <tbody>
                <?php foreach ($status as $status) { ?>
                  <tr> 
                    <td class="number"><?php echo $status['id_status']; ?></td> 
                    <td><?php echo $status['nom']; ?></td>
                    <td>
                        <div class="btn-group btn-hspace">
                            <button class="btn btn-primary mr-1" type="button" data-toggle="modal" data-target="#modalModifierStatus<?= $status['id_status']?>">
                                 <i class="fas fa-edit"></i>
                            </button>
                            <!-- Modal MODIFIER -->
                                    <div class="modal fade" id="modalModifierStatus<?= $status['id_status']?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                                                                    <?= form_open('Status/modifier/'.$status['id_status'], array('class' => 'modal-body form')); ?> 
                                                                            
                                                                            <div class="row">
                                                                                <div class="form-group col-sm-4">
                                                                                    <label for="status">Status :</label> 
                                                                                    <input class="form-control form-control-sm" type="text" name="nom"
                                                                                        id="nom"
                                                                                        autocomplete="off"
                                                                                        value="<?= $status['nom'] ?>" required>
                                                                                </div>                             
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="modal-footer">
                                                                                    <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                                                                        <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                                                                                    </button>
                                                                                    <input class="btn btn-primary md-trigger" type="submit" name="modifier" value="Modifier">                                
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
                                <button class="btn btn-danger ml-1" type="button" data-toggle="modal" data-target="#modalSupprimerStatus<?= $status['id_status']?>"><i class="fas fa-trash-alt"></i></button>
                                <div class="modal fade" id="modalSupprimerStatus<?= $status['id_status'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer ce status ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="<?= base_url("Status/delete/".$status['id_status']) ?>" class="btn btn-danger">Supprimer</a>
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
<div class="modal fade" id="modalFormulaireStatus" tabindex="-1" role="dialog" aria-labelledby="modalFormulaireStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modalAjouterLabel">Ajouter un Status</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="row">
    <div class="col-12">

        <div class="card card-table">


            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">   
                    <?= form_open('Status/ajouter' /*.$status->id-status*/, array('class' => 'modal-body form')); ?> 
                            
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="status">Status :</label> 
                                    <input class="form-control form-control-sm" type="text" name="nom" 
                                        id="nom"
                                        autocomplete="off"
                                        placeholder="Entrer le Status du collaborateur" required>
                                </div>
                            </div><br><br>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                        <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                                    </button>
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