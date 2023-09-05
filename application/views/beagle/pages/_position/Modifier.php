<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <div class="col-md-8">
        <div class="card card-table center">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">
                    <?= form_open('Position/modifier/'.$position->id_position, array('class' => 'modal-body form')); ?>
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
                                         echo form_dropdown('bien', $options, $position->id_bien, 'class="form-control"data-target="#bien-image"');
                                     ?>
                            
                                </div> 
                                <div class="form-group col-sm-4">
                                    <label for="position">Etat :</label>
                                    <input class="form-control form-control-sm" type="text" name="etat" 
                                        id="etat"
                                        autocomplete="off"
                                        value="<?= $position->etat?>" required>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>