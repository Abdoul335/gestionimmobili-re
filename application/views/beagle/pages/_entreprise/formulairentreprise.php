<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-12">
        <div class="card card-table">
            <div class="card card-border-color card-border-color-primary">
                   
                <div class="card-body">   
                    <?= form_open('Entreprise/ajouter/'/* . $entreprise->id_en*/, array('class' => 'modal-body form', 'enctype' => 'multipart/form-data')); ?>
                     <div class="row">
                               <div class="form-group col-sm-4">
                                   <label for="nom">Nom :</label>
                                    <input class="form-control form-control-sm" type="text" name="nom"
                                        id="nom"
                                        autocomplete="off" 
                                        placeholder="Nom entreprise" required>
                                </div>
                               <div class="form-group col-sm-4">
                                   <label for="email">Email :</label>
                                    <input class="form-control form-control-sm" type="email" name="email"
                                        id="email"
                                        autocomplete="off" 
                                        placeholder="Entrer un email" required>
                                </div>
                                <div class="form-group col-sm-4">
                                 <label for="telephone">Telephone :</label>
                                 <input class="form-control form-control-sm" type="number"
                                    name="telephone"
                                    id="telephone"
                                    autocomplete="off"
                                    placeholder="N° telephone">
                                </div>
                            </div>
                            <div class="row">
                                 <div class="form-group col-sm-4">
                                    <label for="nom">Adresse :</label>
                                    <input class="form-control form-control-sm" type="text" name="adresse"
                                        id="adresse"
                                        autocomplete="off"
                                        placeholder="Entrer votre Adresse" required>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="nom">N°IFU :</label>
                                    <input class="form-control form-control-sm" type="text" name="N°IFU"
                                        id="N°IFU"
                                        autocomplete="off"
                                        placeholder="Entrer le N°IFU" required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="nom">Logo :</label>
                                    <input class="form-control form-control-sm" type="file" name="logo"
                                        id="logo" required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="nom">Quartier :</label>
                                     <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $quartier = $this->m_quartier->get_quartier(); 
                                         $option=array();
                                          foreach ($quartier as $row){
                                            $options[$row['id_quartier']] = $row['nom'];
                                          }
                                         echo form_label('Quartier :', 'quartier');
                                         echo form_dropdown('quartier', $options, '', 'class="form-control"');
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