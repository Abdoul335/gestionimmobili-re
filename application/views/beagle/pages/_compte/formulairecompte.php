<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
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
                                         $option=array();
                                          foreach ($banque as $row){
                                            $options[$row['id_banque']] = $row['nom'];
                                          }
                                         echo form_label('Banque :', 'banque');
                                         echo form_dropdown('banque', $options, '', 'class="form-control"'); 
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
                            </div>
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
                                         $option=array();
                                          foreach ($entreprise as $rows){
                                            $option[$rows['id_en']] = $rows['nom'];
                                          }
                                         echo form_label('Entreprise :', 'entreprise');
                                         echo form_dropdown('entreprise', $option, '', 'class="form-control"');
                                     ?>
                                </div>
                            </div>
                            <div class="form-group row">
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