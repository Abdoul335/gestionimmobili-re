<div class="card">
   <div class="card-body">
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-header text-center">
            <h1>Liste des Compte</h1>
            <a href="<?php echo base_url("Compte/ajouter");?>" class="md-trigger" data-toggle="modal" data-target="#modalFormulaireCompte"><i class="fas fa-plus"></i>Ajouter</a>
            <div class="tools dropdown"><span class="icon mdi mdi-download"></span></div>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="number">ID</th>
                  <th style="width:20%;">Code Banque</th> 
                  <th class="number">Code guichet</th>
                  <th class="number">Numero compte</th>
                  <th class="number">Cle RIB</th>
                  <th style="width:20%;">Nom de la Banque</th> 
                  <th style="width:10%;">Nom de l'entreprise</th>  
                  <th class="actions">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($compte as $compte) { ?>
                  <tr>
                    <td class="number"><?php  echo $compte['id_compte']; ?></td>
                    <td><?php echo $compte['codebanque']; ?></td>
                    <td class="number"><?php echo $compte['codeguichet']; ?></td>
                    <td class="number"><?php echo $compte['numero_compte']; ?></td>
                    <td class="number"><?php echo $compte['cle_rib']; ?></td>
                    <td> 
                      <?php
                        $banque = $this->m_banque->getBanqueById($compte['id_banque']);
                        echo $banque->nom ?? "N/A";
                      ?>
                    </td>
                    <td>
                      <?php
                        $entreprise = $this->m_entreprise->update($compte['id_en']);
                        echo $entreprise->nom ?? "N/A";
                      ?>
                    </td>
                    <td>
                        <div class="btn-group btn-hspace">
                            <button class="btn btn-primary mr-1" type="button" data-toggle="modal" data-target="#modalModifierCompte<?= $compte['id_compte'] ?>">
                                 <i class="fas fa-edit"></i>
                            </button>
                            <div class="modal fade" id="modalModifierCompte<?= $compte['id_compte'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                                                   <?= form_open('Compte/modifier/'.$compte['id_compte'], array('class' => 'modal-body form')); ?>                             
                                                            <div class="row">
                                                                <div class="form-group col-sm-4">
                                                                    <label for="codebanque">Code Banque :</label>
                                                                    <input class="form-control form-control-sm" type="text" name="codebanque"
                                                                        id="codebanque"
                                                                        autocomplete="off"
                                                                        value="<?=$compte['codebanque']; ?>" required>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label for="numero">Code guichet :</label>
                                                                    <input class="form-control form-control-sm" type="number" name="codeguichet"
                                                                        id="codeguichet"
                                                                        autocomplete="off"
                                                                        value="<?= $compte['codeguichet'] ?>" required>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label for="numero">Numero du compte :</label>
                                                                    <input class="form-control form-control-sm" type="number" name="numero_compte"
                                                                        id="numero"
                                                                        autocomplete="off"
                                                                        value="<?=$compte['numero_compte']?>">
                                                                </div>
                                                            </div><br>
                                                                <div class="row"> 
                                                                    <div class="form-group col-sm-4">
                                                                    <label for="numero">Cle RIB :</label>
                                                                    <input class="form-control form-control-sm" type="number" name="cle_rib"
                                                                        id="cle_rib"
                                                                        autocomplete="off"
                                                                        value="<?= $compte['cle_rib'] ?>">
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label for="banque">Banque :</label>
                                                                     <?php
                                                                        // Récupérer les données de la table "province" depuis le modèle
                                                                         $banque = $this->m_banque->get_banque(); 
                                                                         $option=array();
                                                                          foreach ($banque as $row){
                                                                            $options[$row['id_banque']] = $row['nom'];
                                                                          }
                                                                         echo form_label('Banque :', 'banque');
                                                                         echo form_dropdown('banque', $options,$compte['id_banque'] , 'class="form-control-sm"');
                                                                     ?>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <!--label for="entreprise">Entreprise :</label-->
                                                                     <?php
                                                                        // Récupérer les données de la table "province" depuis le modèle
                                                                         $entreprise = $this->m_entreprise->get_entreprise(); 
                                                                         $option=array();
                                                                          foreach ($entreprise as $row){
                                                                            $option[$row['id_en']] = $row['nom'];
                                                                          }
                                                                         echo form_label('Entreprise :', 'entreprise');
                                                                         echo form_dropdown('entreprise', $option, $compte['id_en'], 'class="form-control-sm"');
                                                                     ?>
                                                                </div>
                                                            </div><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
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
                            <button class="btn btn-danger ml-1" type="button" data-toggle="modal" data-target="#modalSupprimerCompte<?= $compte['id_compte'];?>"><i class="fas fa-trash-alt"></i></button>
                            <div class="modal fade" id="modalSupprimerCompte<?= $compte['id_compte']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer ce compte ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="<?= base_url("Compte/delete/".$compte['id_compte']) ?>" class="btn btn-danger">Supprimer</a>
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
<div class="modal fade" id="modalFormulaireCompte" tabindex="-1" role="dialog" aria-labelledby="modalFormulaireCompteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modalAjouterLabel">Ajouter un Compte</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
          <div class="row">
    <div class="col-12 content-center">

        <div class="card card-table center">


            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">   
                   <?= form_open('Compte/ajouter/'/*. $compte->id_compte*/, array('class' => 'modal-body form')); ?>                             
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="banque">Banque :</label>
                                     <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $banque = $this->m_banque->get_banque(); 
                                         $options=array(''=>'choisissez une banque');
                                          foreach ($banque as $row){
                                            $options[$row['id_banque']] = $row['nom'];
                                          }
                                         echo form_label('Banque :', 'banque');
                                         echo form_dropdown('banque', $options, '', 'class="form-control-sm"'); 
                                     ?>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="codebanque">Code Banque :</label>
                                    <input class="form-control form-control-sm" type="text" name="codebanque"
                                        id="codebanque"
                                        autocomplete="off"
                                        placeholder="Entrer le Code de la Banque" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="numero">Code guichet :</label>
                                    <input class="form-control form-control-sm" type="number" name="codeguichet"
                                        id="codeguichet"
                                        autocomplete="off"
                                        placeholder="Entrer le Code guichet" required>
                                </div>
                            </div><br/>
                           <div class="row">
                                 <div class="form-group col-sm-4">
                                    <label for="numero_compte">Numero du compte :</label>
                                    <input class="form-control form-control-sm" type="number" name="numero_compte"
                                    id="numero_compte"
                                    autocomplete="off"
                                    placeholder="Entrer N° du compte" required>
                                 </div>
                                 <div class="form-group col-sm-4">
                                    <label for="numero">Cle RIB :</label>
                                    <input class="form-control form-control-sm" type="number" name="cle_rib"
                                        id="cle_rib"
                                        autocomplete="off"
                                        placeholder="Entrer votre Cle RIB" required>
                                </div>
                                
                                <div class="form-group col-sm-4">
                                    <!--label for="entreprise">Entreprise :</label-->
                                     <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $entreprise = $this->m_entreprise->get_entreprise(); 
                                         $option=array(''=>'choisissez une entreprise');
                                          foreach ($entreprise as $rows){
                                            $option[$rows['id_en']] = $rows['nom'];
                                          }
                                         echo form_label('Entreprise :', 'entreprise');
                                         echo form_dropdown('entreprise', $option, '', 'class="form-control-sm"');
                                     ?>
                                </div>
                            </div><br><br><br>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <!--button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                        <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                                    </button-->
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


<!-- Modal Modifier-->
<!--div class="modal fade" id="modalModifierCompte" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
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
                   <?= form_open('Compte/modifier/'.$compte['id_compte'], array('class' => 'modal-body form')); ?>                             
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="codebanque">Code Banque :</label>
                                    <input class="form-control form-control-sm" type="text" name="codebanque"
                                        id="codebanque"
                                        autocomplete="off"
                                        value="<?=$compte['codebanque']; ?>" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="numero">Code guichet :</label>
                                    <input class="form-control form-control-sm" type="number" name="codeguichet"
                                        id="codeguichet"
                                        autocomplete="off"
                                        value="<?= $compte['codeguichet'] ?>" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="numero">Numero du compte :</label>
                                    <input class="form-control form-control-sm" type="number" name="numero_compte"
                                        id="numero"
                                        autocomplete="off"
                                        value="<?=$compte['numero_compte']?>">
                                </div>
                            </div>
                                <div class="row"> 
                                    <div class="form-group col-sm-4">
                                    <label for="numero">Cle RIB :</label>
                                    <input class="form-control form-control-sm" type="number" name="cle_rib"
                                        id="cle_rib"
                                        autocomplete="off"
                                        value="<?= $compte['cle_rib'] ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="banque">Banque :</label>
                                     <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $banque = $this->m_banque->get_banque(); 
                                         $option=array();
                                          foreach ($banque as $row){
                                            $options[$row['id_banque']] = $row['nom'];
                                          }
                                         echo form_label('Banque :', 'banque');
                                         echo form_dropdown('banque', $options,$compte['id_banque'] , 'class="form-control"');
                                     ?>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="entreprise">Entreprise :</label>
                                     <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $entreprise = $this->m_entreprise->get_entreprise(); 
                                         $option=array();
                                          foreach ($entreprise as $row){
                                            $option[$row['id_en']] = $row['nom'];
                                          }
                                         echo form_label('Entreprise :', 'entreprise');
                                         echo form_dropdown('entreprise', $option, $compte['id_en'], 'class="form-control"');
                                     ?>
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