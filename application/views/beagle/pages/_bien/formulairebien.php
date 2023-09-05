<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <div class="col-12">
        <div class="card card-table">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">   
                    <?= form_open('Bien/ajouter' /*. $bien->bien*/, array('class' => 'modal-body form', 'enctype' => 'multipart/form-data')); ?>
                            
                            <div class="row">
                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="telephone">Telephone :</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="telephone1"
                                    id="telephone"
                                    autocomplete="off"
                                    placeholder="N° telephone" required>
                            </div>
                        </div>
                                <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="nom"
                                    id="nom"
                                    autocomplete="off"
                                    placeholder="Entrer le nom" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="prenom">Adresse :</label>
                                <input class="form-control form-control-sm" type="text" name="Adresse"
                                    id="adresse"
                                    autocomplete="off"
                                    placeholder="Entrer votre Adresse" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"> 
                            <div class="form-group">
                                <label for="sexe">Email :</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="email"
                                    id="email"
                                    autocomplete="off"
                                    placeholder="Entrer votre Email" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="secteur">reference:</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="reference"
                                    id="reference"
                                    autocomplete="off"
                                    placeholder="Entrer les refernce" required>
                            </div>
                        </div>
                        
                                <div class="form-group col-sm-3">
                                    <!--label for="banque">Status :</label-->
                                    <?php 
                                        // Récupérer les données de la table "province" depuis le modèle
                                        $status = $this->m_status->get_status(); 
                                        $options = array();
                                        foreach ($status as $row){
                                            $options[$row['id_status']] = $row['nom'];
                                        }
                                        echo form_label('Status :', 'status');
                                        echo form_dropdown('status', $options, '', 'class="form-control"');
                                    ?>
                                </div>
                                <div class="form-group col-sm-3">
                                    
                                    <?php 
                                        // Récupérer les données de la table "province" depuis le modèle
                                        $type = $this->m_type->get_type(); 
                                        $options = array();
                                        foreach ($type as $row){
                                            $options[$row['id_type']] = $row['nom'];
                                        }
                                        echo form_label('Type de bien :', 'type');
                                        echo form_dropdown('type', $options, '', 'class="form-control"');
                                    ?>
                                </div>
                                <div class="col-sm-3">
                            <div class="form-group">
                                <label for="telephone">Code bien:</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="codebien"
                                    id="codebien"
                                    autocomplete="off"
                                    placeholder="Code du bien" required>
                            </div>
                        </div>
                                <div class="form-group col-sm-3">
                                    <label for="type">Bien :</label>
                                    <input class="form-control form-control-sm" type="file" name="image"
                                        id="image"
                                        autocomplete="off"
                                        placeholder="Entrer le type du bien" required>
                                        <small><?php if (isset($error)){echo $error;} ?></small>
                                </div> 
                                <div class="form-group col-sm-4">
                            <label for="description">Description :</label>
                            <div class="col-12 col-sm-7 col-lg-12"> 
                                <textarea class="form-control" id="description" name="description"></textarea> 
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                                    <label for="numero">Prix:</label>
                                    <input class="form-control form-control-sm" type="number" name="prix"
                                        id="prix"
                                        autocomplete="off"
                                        placeholder="" required>
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
