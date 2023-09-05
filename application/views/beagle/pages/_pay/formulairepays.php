<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <div class="col-12 content-center">

        <div class="card card-table center">


            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">   
                   <?= form_open('Pays/ajouter/'/*. $pays->id_pays*/, array('class' => 'modal-body form')); ?>                             
                            <div class="row">
                                <div class="form-group col-sm-4">
                                  <label for="nom">Nom :</label>
                                    <input class="form-control form-control-sm" type="text" name="nom"
                                        id="nom"
                                        autocomplete="off"
                                        placeholder="Entrer Pays" required>
                                </div>
                               <div class="form-group col-sm-4">
                                    <label for="indicatif">Indicatif :</label>
                                    <input class="form-control form-control-sm" type="text" name="indicatif"
                                        id="indicatif"
                                        autocomplete="off"
                                        placeholder="Entrer l'indicatif du pays" required>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Titre du modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Sauvegarder les modifications</button>
      </div>
    </div>
  </div>
</div>
            
