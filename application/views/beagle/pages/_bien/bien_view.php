<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="card">
   <div class="card-body">
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-header text-center">
            <h1>Liste des Bien</h1>
            <a href="<?php echo base_url("Bien/ajouter")?>" class="md-trigger"  data-toggle="modal" data-target="#modalAjouter"><i class="fas fa-plus"></i>Ajouter</a>
            <div class="tools dropdown"><span class="icon mdi mdi-download"></span></div>
          </div>
          <div class="card-body">
            <table class="table ">
              <thead>
                <tr>
                  <th class="number">N° du collaborateur</th>
                  <th style="width: 30%;">Nom</th>
                  <th style="width: 30%;">Adresse</th>
                  <th style="width: 30%;">Email</th>
                  <th style="width: 30%;">Reference</th>
                  <th style="width: 30%;">Status</th>
                  <th style="width: 30%;">Type de bien</th> 
                  <th style="width: 30%;">Code du bien</th>
                  <th style="width: 30%;">Image</th>
                  <th style="width: 30%;">Description</th>
                  <th class="number">Prix</th>
                  <th class="actions">Action</th>
                </tr>
              </thead>
              <tbody>
                 <?php foreach ($bien as $bien) { ?>
                  <tr>
                    <td><?php echo  $bien['id_bien']?></td> 
                    <td>
                      <?php
                        $status = $this->m_status->getStatusById($bien['id_status']);
                        echo $status->nom ?? "N/A";
                      ?>
                    </td>
                    <td>
                      <img src="<?php echo base_url('assets/img/gallery/'.$bien['image'])?>" height="70px" width="100px" alt="bien">
                    </td>
                    <td><?php echo  $bien['description']?></td>
                    <td><?php echo  $bien['prix']?></td>
                    <td>
                      <div class="btn-group btn-hspace">
                        <button class="btn btn-primary mr-1" type="button"><a href="<?= base_url("Bien/modifier/".$bien['id_bien']) ?>" class="text-white"data-toggle="modal" data-target="#modalModifierBien<?= $bien['id_bien'];?>">
                            <i class="fas fa-edit"></i> 
                        </a>
                        </button>
                          <!-- Modal MODIFIER -->
                            <div class="modal fade" id="modalModifierBien<?= $bien['id_bien'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                                                          <?= form_open('Bien/modifier/' .$bien['id_bien'], array('class' => 'modal-body form', 'enctype' => 'multipart/form-data')); ?>
                                                          <div class="row">
                                                              <div class="form-group col-sm-4">
                                                                  <label for="status">Statut :</label>
                                                                  <?php
                                                                      // Récupérer les données de la table "status" depuis le modèle
                                                                      $status = $this->m_status->get_status(); 
                                                                      $options = array();
                                                                      foreach ($status as $row) {
                                                                          $options[$row['id_status']] = $row['nom'];
                                                                      }
                                                                      echo form_label('Statut :', 'status');
                                                                      echo form_dropdown('status', $options, $bien['id_status'], 'class="form-control-sm"');
                                                                  ?>
                                                              </div>
                                                              <div class="form-group col-sm-3">
                                                                  <label for="image">Image :</label>
                                                                  <input class="form-control form-control-sm" type="file" name="image" id="image">
                                                              </div>
                                                              <div class="form-group col-sm-4">
                                                                  <label for="description">Description :</label>
                                                                  <div class="col-12 col-sm-7 col-lg-12">
                                                                      <textarea class="form-control" id="description" name="description" ><?= $bien['description'] ?></textarea>

                                                                  </div>
                                                              </div>
                                                              <div class="form-group col-sm-2">
                                                                <label for="numero">Prix:</label>
                                                                <input class="form-control form-control-sm" type="number" name="prix"
                                                                    id="prix"
                                                                    autocomplete="off"
                                                                    value="<?= $bien['prix']?>">
                                                            </div>
                                                          </div><br><br>
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
                                          <div class="col-4">
                                              <div class="card">
                                                  <div class="card-body">
                                                    <img src="<?= base_url('assets/img/gallery/'.$bien['image']) ?>" class="w-100" alt="Image">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                   </div>
                                </div>
                              </div>
                            </div>
                        <button class="btn btn-danger ml-1" type="button" data-toggle="modal" data-target="#modalSupprimerBien<?= $bien['id_bien'];?>">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <div class="modal fade" id="modalSupprimerBien<?= $bien['id_bien'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer ce bien ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="<?= base_url("Bien/supprimer/".$bien['id_bien']) ?>" class="btn btn-danger">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                      </div>
                      </td>
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

<div class="modal fade" id="modalAjouter" tabindex="-1" role="dialog" aria-labelledby="modalAjouterLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAjouterLabel">Ajouter un Bien</h5>
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
                    <?= form_open('Bien/ajouter' /*. $bien->bien*/, array('class' => 'modal-body form', 'enctype' => 'multipart/form-data')); ?>
                            
                            <div class="row">
                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="telephone">Telephone :</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="telephone1"
                                    id="telephone1" 
                                    autocomplete="off"
                                    placeholder="N° telephone" data-api-url="<?= base_url('Bien/autocomplete') ?>"required>
                            </div>
                            
                        </div>
                                <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="nom"
                                    id="nom"
                                    autocomplete="off"
                                    placeholder="Entrer le nom">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="adresse">Adresse :</label>
                                <input class="form-control form-control-sm" type="text" name="Adresse"
                                    id="adresse"
                                    autocomplete="off"
                                    placeholder="Entrer votre Adresse" >
                            </div>
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-sm-4"> 
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="email"
                                    id="email"
                                    autocomplete="off"
                                    placeholder="Entrer votre Email" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="reference">reference:</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="reference"
                                    id="reference"
                                    autocomplete="off"
                                    placeholder="Entrer les refernce" >
                            </div>
                        </div>
                        
                                <div class="form-group col-sm-4">
                                    <!--label for="banque">Status :</label-->
                                    <?php 
                                        // Récupérer les données de la table "province" depuis le modèle
                                        $status = $this->m_status->get_status(); 
                                        $options = array(''=>'-----');
                                        foreach ($status as $row){
                                            $options[$row['id_status']] = $row['nom'];
                                        }
                                        echo form_label('Status :', 'Status');
                                        echo form_dropdown('status', $options, '', 'class="form-control-sm ');
                                    ?>
                                </div>
                            </div><br/>
                                <div class="row">
                                        <div class="form-group col-sm-4">
                                            
                                            <?php 
                                                // Récupérer les données de la table "province" depuis le modèle
                                                $type = $this->m_type->get_type(); 
                                                $options = array(''=>'-----');
                                                foreach ($type as $row){
                                                    $options[$row['id_type']] = $row['nom'];
                                                }
                                                echo form_label('type du bien :', 'Type');
                                                echo form_dropdown('type', $options, '', 'class="form-control-sm"');
                                            ?>
                                        </div>
                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="codebien">Code bien:</label>
                                            <input class="form-control form-control-sm" type="text"
                                                name="codebien"
                                                id="codebien"
                                                autocomplete="off"
                                                placeholder="Code du bien" required>
                                        </div>
                                     </div>
                                        <div class="form-group col-sm-4">
                                            <label for="image">Bien :</label>
                                            <input class="form-control form-control-sm" type="file" name="image"
                                                id="image"
                                                autocomplete="off"
                                                placeholder="Entrer le type du bien" required>
                                                <small><?php if (isset($error)){echo $error;} ?></small>
                                        </div> 
                            </div><br/>
                            <div class="row">
                                        <div class="form-group col-sm-4">
                                    <label for="description">Description :</label>
                                    <div class="col-12 col-sm-7 col-lg-12"> 
                                        <textarea class="form-control" id="description" name="description"></textarea> 
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                            <label for="prix">Prix:</label>
                                            <input class="form-control form-control-sm" type="number" name="prix"
                                                id="prix"
                                                autocomplete="off"
                                                placeholder="" required>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group row"> 
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">&nbsp;Fermer&nbsp;</button>
                                    <!--button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                        <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                                    </button-->
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
</div>