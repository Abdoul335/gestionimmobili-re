<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="row">
    <div class="col-12">

        <div class="card card-table">


            <div class="card card-border-color card-border-color-primary">
                   
                <div class="card-body">   
                    <?= form_open('Nomcontroller/add(fonction)/' . (ce qui prend en paramette)
                            . '/', array('class' => 'modal-body form')); ?>
                                <div class="form-group col-sm-4">
                                    
                                    <select class="form-control form-control-sm" name="arrgaremob" id="arrsgaremob">
                                        <option value="">Choisissez l'arrivée</option>
                                        <? foreach ($garearrivees as $garearrivee): ?>
                                            <option value="<?= $garearrivee->code_gadest; ?>">
                                            <?= $garearrivee->nom_gadest; ?>
                                            </option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    
                                    <select name="quartconfirmemob" class="form-control form-control-sm" id="quartiermob">
                                        <option value="">Choisissez le quartier</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <input class="form-control form-control-sm" type="date" name="datedepartmob" id="date_depheuremob">
                                </div>
                                
                                
                                <div class="form-group col-sm-4">
                                    
                                    <select  class="form-control form-control-sm" name="heuredeptmob" id="hdepartmob">
                                        <option value="">Choisissez Heure</option>
                                        
                                    </select>
                                </div>                   
                                <div class="form-group col-sm-4">
                                    <select class="form-control form-control-sm" name="passagersiegesmob" id="psiegesmob">
                                        <option value="">Choisissez siège</option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-sm-4">
                                <input class="form-control form-control-sm" type="text"
                                    name="rclient_contactmob"
                                    id="rnclient_contactmob"
                                    autocomplete="off"
                                    placeholder="contact client">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <input class="form-control form-control-sm" type="text" name="rclientmob"
                                        id="rclientmob"
                                        autocomplete="off"
                                        placeholder="nom" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <input class="form-control form-control-sm" type="text" name="prclientmob"
                                        id="prnclientmob"
                                        autocomplete="off" 
                                        placeholder="prenom" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    
                                    <select class="form-control form-control-sm" name="depargaremob" id="depargaremob">
                                        <? foreach ($garedeparts as $garemob): ?>
                                            <option value="<?= $garemob->code_gaexp; ?>/<?= $garemob->idsousgare; ?>">
                                                <?= $garemob->nom_gaep; ?>/<?= $garemob->nomsousgare; ?>
                                            </option>
                                        <? endforeach; ?>
                                    </select>
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