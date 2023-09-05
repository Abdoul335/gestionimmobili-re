<div class="card">
   <div class="card-body">
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-header text-center">
            <h1>Liste des Position</h1>
            <a href="<?php echo base_url("Position/ajouter")?>" class="md-trigger" data-toggle="modal" data-target="#modalFormulairePosition"><i class="fas fa-plus"></i>Ajouter</a>
            <div class="tools dropdown"><span class="icon mdi mdi-download"></span></div>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="number">ID</th>
                  <th style="width:30%;">Bien</th>
                  <th style="width:40%;">Etat du bien</th> 
                  <th class="actions">Action</th>
                </tr> 
              </thead>
              <tbody>
                <?php foreach ($position as $position) { ?>
                  <tr>
                    <td class="number"><?php echo $position['id_position']; ?></td>
                     <td>
                      <?php
                        $bien = $this->m_bien->getBienById($position['id_bien']);
                        if ($bien) {
                          echo '<img src="'.base_url('assets/img/gallery/'.$bien->image).'" height="60px" width="100px" alt="bien">';
                        } else {
                          echo 'Image non disponible';
                        }
                     ?> 
                     </td>
                    <td><?php echo $position['etat']; ?></td> 
                    <td>
                        <div class="btn-group btn-hspace">
                            <button class="btn btn-primary mr-1" type="button" data-toggle="modal" data-target="#modalModifierPosition<?= $position['id_position']?>">
                                 <i class="fas fa-edit"></i></button>
                                 <!-- Modal MODIFIER -->
                                    <div class="modal fade" id="modalModifierPosition<?=$position['id_position'];?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                                                <div class="col-md-8">
                                                    <div class="card card-table center">
                                                        <div class="card card-border-color card-border-color-primary">
                                                            <div class="card-body">
                                                                <?= form_open('Position/modifier/'.$position['id_position'], array('class' => 'modal-body form')); ?>
                                                                <div class="row">
                                                                            <div class="form-group col-sm-4">
                                                                                <!--label for="nom">Pays:</label-->
                                                                            
                                                                                 <?php
                                                                                    // Récupérer les données de la table "province" depuis le modèle
                                                                                     $bien = $this->m_bien->afficher(); 
                                                                                     $option=array();
                                                                                      foreach ($bien as $row){
                                                                                        $options[$row['id_bien']] = $row['id_bien'];
                                                                                      }
                                                                                     echo form_label('Bien', 'bien');
                                                                                     echo form_dropdown('bien', $options, $position['id_bien'], 'class="form-control"data-target="#bien-image"');
                                                                                 ?>
                                                                        
                                                                            </div> 
                                                                            <div class="form-group col-sm-4">
                                                                                <label for="position">Etat :</label>
                                                                                <input class="form-control form-control-sm" type="text" name="etat" 
                                                                                    id="etat"
                                                                                    autocomplete="off"
                                                                                    value="<?= $position['etat'];?>" required>
                                                                            </div> 
                                                                        </div>

                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                                                                    <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                                                                                </button>
                                                                                <input class="btn btn-primary md-trigger" type="submit" name="modifier" value="Modifier"> 
                                                                            </div>
                                                                </form>
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
                                <button class="btn btn-danger ml-1" type="button" data-toggle="modal" data-target="#modalSupprimerPosition<?=$position['id_position'] ?>"> <i class="fas fa-trash-alt"></i></a></button>
                                <div class="modal fade" id="modalSupprimerPosition<?= $position['id_position'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer cette position ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="<?= base_url("Position/delete/".$position['id_position']) ?>" class="btn btn-danger">Supprimer</a>
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

<!-- Modal -->
<div class="modal fade" id="modalFormulairePosition" tabindex="-1" role="dialog" aria-labelledby="modalFormulairePositionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modalAjouterLabel">Ajouter une Position</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
                <div class="row">
    <div class="col-md-8">
        <div class="card card-table center">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">
                    <?= form_open('Position/ajouter/', array('class' => 'modal-body form')); ?>
                    <div class="row">
                                <div class="form-group col-sm-4">
                                    <!--label for="nom">Pays:</label-->
                                
                                    <?php
                                        $bien = $this->m_bien->get_bien(); 
                                        $options = array(); 
                                        foreach ($bien as $row) {
                                            $options[$row['id_bien']] = $row['id_bien'];
                                        }
                                        echo form_label('Bien :', 'bien');
                                        echo form_dropdown('bien', $options, '', 'class="form-control"');
                                    ?>
                            
                                </div> 
                                <div class="form-group col-sm-4">
                                    <label for="position">Etat :</label>
                                    <input class="form-control form-control-sm" type="text" name="etat" 
                                        id="etat"
                                        autocomplete="off"
                                        placeholder="Entrer la Position du bien" required>
                                </div>
                            </div><br><br><br>
                            <div class="modal-footer">
                                    <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                        <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                                    </button>
                                    <input class="btn btn-success md-trigger" type="submit" name="valider" value="Valider">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
         </div>
    </div>
</div>