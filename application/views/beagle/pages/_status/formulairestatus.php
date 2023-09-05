<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <div class="col-12">

        <div class="card card-table">


            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">   
                    <?= form_open('Status/ajouter' /*.$status->id-status*/, array('class' => 'modal-body form')); ?> 
                            
                            <div class="row">
                                
                                <div class="form-group col-sm-4">
                                    <label for="status">Status :</label> 
                                    <input class="form-control form-control-sm" type="text" name="nom" 
                                        id="nom"
                                        autocomplete="off"
                                        placeholder="Entrer le Status du collaborateur" required>
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