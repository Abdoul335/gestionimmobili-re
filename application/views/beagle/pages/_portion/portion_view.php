<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="card">
   <div class="card-body">
    <div class="row">
      <div class="col-sm-12">
        <div class="card-header text-center">
          <h1>Liste des Portions</h1>
          <a href="<?php echo base_url("Portion/ajouter")?>" class="md-trigger" data-toggle="modal" data-target="#modalFormulairePortion"><i class="fas fa-plus"></i>Ajouter</a>
          <div class="tools dropdown"><span class="icon mdi mdi-download"></span></div>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th class="number">ID</th>
                <th style="width:30%;">Bien</th>
                <th style="width:40%;">Description</th> 
                <th class="actions">Action</th> 
              </tr>
            </thead>
            <tbody>
              <?php foreach ($portion as $portion) { ?>
                <tr>
                  <td class="number"><?php echo $portion['id_portion']; ?></td> 
                  <td>
                    <?php
                    $bien = $this->m_bien->getBienById($portion['id_bien']);
                    if ($bien) {
                      echo '<img src="'.base_url('assets/img/gallery/'.$bien->image).'" height="60px" width="100px" alt="bien">';
                    } else {
                      echo 'Image non disponible';
                    }
                    ?>
                  </td>
                  <td><?php echo $portion['description']; ?></td>
                  <td>
                    <div class="btn-group btn-hspace">
                      <a href="<?= base_url("Portion/modifier/".$portion['id_portion']); ?>" class="btn btn-primary md-trigger" data-toggle="modal" data-target="#modalModifierPortion<?= $portion['id_portion'];?>"><i class="fas fa-edit"></i></a>
                      <!-- Modal MODIFIER -->
                            <div class="modal fade" id="modalModifierPortion<?= $portion['id_portion'];?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                                                <?= form_open('Portion/modifier/'.$portion['id_portion'], array('class' => 'modal-body form')); ?>
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <?php
                                                            $bien = $this->m_bien->get_bien(); 
                                                            $options = array(); 
                                                            foreach ($bien as $row) {
                                                                $options[$row['id_bien']] = $row['id_bien'];
                                                            }
                                                            echo form_label('Bien :', 'bien');
                                                            echo form_dropdown('bien', $options, $portion['id_bien'], 'class="form-control"');
                                                        ?>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label for="description">Description :</label>
                                                        <div class="col-12 col-sm-7 col-lg-12">
                                                            <textarea class="form-control" id="description" name="description" ><?= $portion['description'] ?></textarea>

                                                        </div>
                                                    </div>
                                                </div><br><br>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                                            <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                                                        </button>
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
                      <button class="btn btn-danger ml-1" type="button" data-toggle="modal" data-target="#modalSupprimerPortion<?=$portion['id_portion']?>"><i class="fas fa-trash-alt"></i></a></button>
                      <div class="modal fade" id="modalSupprimerPortion<?= $portion['id_portion'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer cette portion ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="<?= base_url("Portion/delete/".$portion['id_portion']) ?>" class="btn btn-danger">Supprimer</a>
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
<div class="modal fade" id="modalFormulairePortion" tabindex="-1" role="dialog" aria-labelledby="modalFormulairePortionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modalAjouterLabel">Ajouter une Entreprise</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
             <div class="row">
    <div class="col-12 content-center">
        <div class="card card-table center">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">
                    <?= form_open('Portion/ajouter/', array('class' => 'modal-body form')); ?>
                    <div class="row">
                        <div class="form-group col-sm-4">
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
                            <label for="description">Description :</label>
                            <div class="col-12 col-sm-7 col-lg-12"> 
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                        </div>
                    </div><br><br><br>
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

<!-- Modal MODIFIER -->
<!--div class="modal fade" id="modalModifierPortion" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                    <?= form_open('Portion/modifier/'.$portion['id_portion'], array('class' => 'modal-body form')); ?>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <?php
                                $bien = $this->m_bien->get_bien(); 
                                $options = array(); 
                                foreach ($bien as $row) {
                                    $options[$row['id_bien']] = $row['id_bien'];
                                }
                                echo form_label('Bien :', 'bien');
                                echo form_dropdown('bien', $options, $portion['id_bien'], 'class="form-control"');
                            ?>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="description">Description :</label>
                            <div class="col-12 col-sm-7 col-lg-12">
                                <textarea class="form-control" id="description" name="description" ><?= $portion['description'] ?></textarea>

                            </div>
                        </div>
                    </div><br><br>
                        <div class="modal-footer">
                            <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                            </button>
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