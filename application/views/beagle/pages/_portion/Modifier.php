<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <div class="col-12 content-center">
        <div class="card card-table center">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">
                    <?= form_open('Portion/modifier/'.$portion->id_portion, array('class' => 'modal-body form')); ?>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <?php
                                $bien = $this->m_bien->get_bien(); 
                                $options = array(); 
                                foreach ($bien as $row) {
                                    $options[$row['id_bien']] = $row['id_bien'];
                                }
                                echo form_label('Bien :', 'bien');
                                echo form_dropdown('bien', $options, $portion->id_bien, 'class="form-control"');
                            ?>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="description">Description :</label>
                            <div class="col-12 col-sm-7 col-lg-12">
                                <textarea class="form-control" id="description" name="description" ><?= $portion->description ?></textarea>

                            </div>
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

