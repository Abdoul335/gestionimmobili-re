<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-12">
        <div class="card card-table">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">
                    <?= form_open('Bien/modifier/' .$bien->id_bien, array('class' => 'modal-body form', 'enctype' => 'multipart/form-data')); ?>
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="status">Statut :</label>
                            <?php
                                // Récupérer les données de la table "status" depuis le modèle
                                $status = $this->m_status->get_status(); 
                                $options = array();
                                foreach ($status as $row) {
                                    $options[$row['id_status']] = $row['nom'];
                                }
                                echo form_label('Statut :', 'status');
                                echo form_dropdown('status', $options, $bien->id_status, 'class="form-control"');
                            ?>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="image">Image :</label>
                            <input class="form-control form-control-sm" type="file" name="image" id="image">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="description">Description :</label>
                            <div class="col-12 col-sm-7 col-lg-12">
                                <textarea class="form-control" id="description" name="description" ><?= $bien->description ?></textarea>

                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                                    <label for="numero">Prix:</label>
                                    <input class="form-control form-control-sm" type="number" name="prix"
                                        id="prix"
                                        autocomplete="off"
                                        value="<?= $bien->prix?>">
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
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <img src="<?= base_url('assets/img/gallery/'.$bien->image) ?>" class="w-100" alt="Image">
            </div>
        </div>
    </div>
</div>
<script>
    function confirmerSuppression(id_ien) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ?')) {
            window.location.href = '<?= base_url("Bien/supprimer/") ?>' + id_bien;
        }
    }
</script>

