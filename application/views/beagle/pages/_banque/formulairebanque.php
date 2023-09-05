<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
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
                                         $option=array();
                                          foreach ($pays as $row){
                                            $options[$row['id_pays']] = $row['nom'];
                                          }
                                         echo form_label('Pays', 'pays');
                                         echo form_dropdown('pays', $options, '', 'class="form-control"');
                                     ?>
                            
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="nom">Nom de la banque:</label>
                                    <input class="form-control form-control-sm" type="text" name="nom"
                                        id="nom"
                                        autocomplete="off"
                                        placeholder="Entrer le nom de la banque" required>
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
