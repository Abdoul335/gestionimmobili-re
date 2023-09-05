<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <div class="col-12 content-center">

        <div class="card card-table center">


            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">   
                   <?= form_open('Pays/update/'. $pays->id_pays, array('class' => 'modal-body form')); ?>                             
                            <div class="row">
                                <div class="form-group col-sm-4">
                                  <label for="nom">Nom :</label>
                                    <input class="form-control form-control-sm" type="text" name="nom"
                                        id="nom"
                                        autocomplete="off"
                                        value="<?php echo $pays->nom; ?>" required>
                                </div>
                               <div class="form-group col-sm-4">
                                    <label for="indicatif">Indicatif :</label>
                                    <input class="form-control form-control-sm" type="text" name="indicatif"
                                        id="indicatif"
                                        autocomplete="off"
                                        value="<?php  echo $pays->indicatif; ?>" required>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="modal-footer">
                                    <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                        <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                                    </button>
                                    <input class="btn btn-primary md-trigger" type="submit" name="Modifier" value="Modifier">
                                
                                </div>
                            </div>
                        
                    <?= form_close(); ?>
                    
                </div>

            </div>

        </div>

    </div>
</div>
