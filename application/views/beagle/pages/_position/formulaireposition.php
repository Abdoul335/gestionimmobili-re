<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <div class="col-md-8">
        <div class="card card-table center">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">
                    <?= form_open('Position/ajouter/', array('class' => 'modal-body form')); ?>
                    <div class="row">
                                <div class="form-group col-sm-4">
                                    <!--label for="nom">Pays:</label-->
                                
                                    <?php
                                        $bien = $this->m_bien->get_bien(); 
                                        $options = array(); 
                                        foreach ($bien as $row) {
                                            $options[$row['id_bien']] = $row['id_bien'];
                                        }
                                        echo form_label('Bien :', 'bien');
                                        echo form_dropdown('bien', $options, '', 'class="form-control"');
                                    ?>
                            
                                </div> 
                                <div class="form-group col-sm-4">
                                    <label for="position">Etat :</label>
                                    <input class="form-control form-control-sm" type="text" name="etat" 
                                        id="etat"
                                        autocomplete="off"
                                        placeholder="Entrer la Position du bien" required>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>