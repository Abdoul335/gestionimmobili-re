<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <div class="col-12 content-center">
        <div class="card card-table center">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">   
                   <?= form_open('Ville/modifier/'. $ville->id_ville, array('class' => 'modal-body form')); ?>                             
                            <div class="row">
                                <div class="form-group col-sm-4"> 
                                  <label for="nom">Nom :</label>
                                    <input class="form-control form-control-sm" type="text" name="nom"
                                        id="nom"
                                        autocomplete="off"
                                        value="<?= $ville->nom ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">Province :</label>
                                    <?php
                                    // Récupérer les données de la table "province" depuis le modèle
                                    $province = $this->m_province->get_province(); // Remplacez "nom_du_modele" par le nom réel de votre modèle

                                    $options = array();
                                    foreach ($province as $row) {
                                        $options[$row['id_province']] = $row['nom'];
                                    }

                                    echo form_label('Province', 'province');
                                    echo form_dropdown('province', $options, $ville->id_province, 'class="form-control"');
                                    ?>
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
            