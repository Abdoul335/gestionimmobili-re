<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-8">
        <div class="card card-table">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">
                    <?= form_open('Entreprise/modifier/'. $entreprise->id_en, array('class' => 'modal-body form', 'enctype' => 'multipart/form-data')); ?>
                    <!-- Le code du formulaire ici -->
                                        <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="nom">Nom :</label>
                            <input class="form-control form-control-sm" type="text" name="nom" id="nom"
                                autocomplete="off" value="<?= $entreprise->nom; ?>"required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="email">Email :</label>
                            <input class="form-control form-control-sm" type="email" name="email" id="email"
                                autocomplete="off" placeholder="Entrer un email" required value="<?= $entreprise->email; ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="telephone">Telephone :</label>
                            <input class="form-control form-control-sm" type="text" name="telephone" id="telephone"
                                autocomplete="off" value="<?= $entreprise->telephone; ?>">
                        </div>
                    </div><div class="row">
                        <div class="form-group col-sm-4">
                            <label for="adresse">Adresse :</label>
                            <input class="form-control form-control-sm" type="text" name="adresse" id="adresse"
                                autocomplete="off"  value="<?= $entreprise->adresse; ?>" required>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="N°IFU">N°IFU :</label>
                            <input class="form-control form-control-sm" type="text" name="N°IFU" id="N°IFU"
                                autocomplete="off"  value="<?= $entreprise-> N°IFU ; ?>" required>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="logo">Logo :</label>
                            <input class="form-control form-control-sm" type="file" name="logo" id="logo">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="quartier">Quartier :</label>
                            <?php
                                // Récupérer les données de la table "province" depuis le modèle
                                $quartier = $this->m_quartier->get_quartier(); 
                                $options = array();
                                foreach ($quartier as $row) {
                                    $options[$row['id_quartier']] = $row['nom'];
                                }
                                echo form_label('Quartier :', 'quartier');
                                echo form_dropdown('quartier', $options, $entreprise->id_quartier, 'class="form-control"');
                            ?>
                        </div>
                    </div><div class="form-group row">
                        <div class="modal-footer">
                            <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                            </button>
                            <input class="btn btn-primary md-trigger" type="submit" name="valider" value="Valider">
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
                <img src="<?= base_url('assets/img/gallery/'.$entreprise->logo) ?>" class="w-100" alt="Image">
            </div>
        </div>
    </div>
</div>
