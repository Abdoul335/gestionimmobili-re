<div class="card">
   <div class="card-body">
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-header text-center">
            <h1>Liste des Banques</h1>
            <a href="<?php echo base_url("Banque/ajouter")?>" class="md-trigger" data-toggle="modal" data-target="#modalAjouter">
                  <i class="fas fa-plus"></i>Ajouter</a>
            <div class="tools dropdown"><span class="icon mdi mdi-download"></span></div>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="number">ID</th>
                  <th style="width:40%;">Nom de la Banque</th> 
                  <th style="width:30%;">Nom du pays</th>
                  <th class="actions">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($banque as $rows) { ?>
                  <tr>
                    <td class="number"><?php echo $rows['id_banque']; ?></td>
                    <td><?php echo $rows['nom']; ?></td>
                    <td>
                      <?php
                        $pays = $this->m_pays->getPaysById($rows['id_pays']);
                        echo $pays->nom ?? "N/A";
                      ?>
                    </td>
                    <td>
                      <div class="btn-group btn-hspace">
                          <button class="btn btn-primary mr-1" type="button" data-toggle="modal"data-toggle="modal" data-target="#modalModifierBanque<?= $rows['id_banque']; ?>"><i class="fas fa-edit">   </i>
                          </button>
                          <!-- Modal MODIFIER -->
                                <div class="modal fade" id="modalModifierBanque<?= $rows['id_banque'];?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                                                              <?= form_open('Banque/update/'.$rows['id_banque'], array('class' => 'modal-body form')); ?>
                                                              <div class="row">
                                                                  <div class="form-group col-sm-4">
                                                                      <?php
                                                                          $pays = $this->m_pays->get_pays(); 
                                                                          $options = array();
                                                                          foreach ($pays as $row) {
                                                                              $options[$row['id_pays']] = $row['nom'];
                                                                          }
                                                                          echo form_label('Pays', 'pays');
                                                                          echo form_dropdown('pays', $options, $rows['id_pays'], 'class="form-control form-control-sm"');
                                                                      ?>
                                                                  </div>
                                                                  <div class="form-group col-sm-4">
                                                                      <label for="nom">Nom de la banque:</label>
                                                                      <input class="form-control form-control-sm" type="text" name="nom" id="nom"
                                                                          autocomplete="off" placeholder="Entrer le nom de la banque" required
                                                                          value="<?= $rows['nom'] ?>">
                                                                  </div>
                                                              </div>
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
                        <button class="btn btn-danger ml-1" type="button" data-toggle="modal" data-target="#modalSupprimerBanque<?= $rows['id_banque'];?>"><i class="fas fa-trash-alt"></i></button>
                        <div class="modal fade" id="modalSupprimerBanque<?= $rows['id_banque']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer cette banque ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="<?= base_url("Banque/delete/".$rows['id_banque'] )?>" class="btn btn-danger">Supprimer</a>
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
        <h5 class="modal-title" id="modalAjouterLabel">Ajouter un élément</h5>
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
                   <?= form_open('Banque/ajouter/'/*. $banque->id_banque*/, array('class' => 'modal-body form')); ?>                             
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <!--label for="nom">Pays:</label-->
                                
                                     <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $pays = $this->m_pays->get_pays(); 
                                         $options=array(''=>'choisissez un pays');
                                          foreach ($pays as $row){
                                            $options[$row['id_pays']] = $row['nom'];
                                          }
                                         echo form_label('Pays', 'pays');
                                         echo form_dropdown('pays', $options, '', 'class="form-control form-control-sm"');
                                     ?>
                            
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="nom">Nom de la banque:</label>
                                    <input class="form-control form-control-sm" type="text" name="nom"
                                        id="nom"
                                        autocomplete="off"
                                        placeholder="Entrer le nom de la banque" required>
                                </div>
                            </div><br><br><br>
                            <div class="modal-footer">
                               <div class="form-group row">
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                      <input class="btn btn-success md-trigger" type="submit" name="valider" value="Valider">
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

<!-- Modal MODIFIER -->
<!--div class="modal fade" id="modalModifier" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalModifierLabel">Modification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('Banque/update/'.$banque->id_banque, array('class' => 'modal-body form')); ?>
        <div class="row">
          <div class="form-group col-sm-4">
            <?php
              $pays = $this->m_pays->get_pays(); 
              $options = array();
              foreach ($pays as $row) {
                $options[$row['id_pays']] = $row['nom'];
              }
              echo form_label('Pays', 'pays');
              echo form_dropdown('pays', $options, $banque->id_pays, 'class="form-control"');
            ?>
          </div>
          <div class="form-group col-sm-4">
            <label for="nom">Nom de la banque:</label>
            <input class="form-control form-control-sm" type="text" name="nom" id="nom"
              autocomplete="off" placeholder="Entrer le nom de la banque" required
              value="<?= $banque->nom ?>">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
          <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
        </button>
        <input class="btn btn-primary md-trigger" type="submit" name="Modifier" value="Modifier">
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>
