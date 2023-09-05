<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-12">
        <div class="card card-table">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">
                   <?= form_open('Province/update/'.$province->id_province, array('class' => 'modal-body form')); ?>

                        <div class="row">
                            <div class="form-group col-sm-4">
                                <!--label for="region">Region :</label-->
                                <?php
                                    $region = $this->m_region->get_region();
                                    $options = array();
                                    foreach ($region as $row) {
                                        $options[$row['id_region']] = $row['nom'];
                                    }
                                    echo form_label('Region :', 'region');
                                    echo form_dropdown('region', $options, $province->id_region, 'class="form-control"');
                                ?>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="nom">Nom :</label>
                                <input class="form-control form-control-sm" type="text" name="nom" id="nom"
                                    autocomplete="off" value="<?= $province->nom ?>">
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
