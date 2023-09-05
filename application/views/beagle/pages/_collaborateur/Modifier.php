<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-12">
        <div class="card card-table">
            <div class="card card-border-color card-border-color-primary">    
                <div class="card-body">   
                    < <?= form_open('Collaborateur/update/' .$collaborateur->id_col, array('class' => 'modal-body form')); ?> >
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="nom"
                                    id="nom"
                                    autocomplete="off"
                                    value="<?= isset($collaborateur) ? $collaborateur->nom : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="adresse">Adresse :</label>
                                <input class="form-control form-control-sm" type="text" name="Adresse"
                                    id="adresse"
                                    autocomplete="off"
                                    value="<?= isset($collaborateur) ? $collaborateur->Adresse : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-4"> 
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="email"
                                    id="email"
                                    autocomplete="off"
                                    value="<?= isset($collaborateur) ? $collaborateur->email : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"> 
                            <div class="form-group">
                                <label for="telephone">Telephone 1:</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="telephone1"
                                    id="telephone1"
                                    autocomplete="off"
                                    value="<?= isset($collaborateur) ? $collaborateur->telephone1 : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="telephone">Telephone 2:</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="telephone2"
                                    id="telephone2"
                                    autocomplete="off"
                                    value="<?= isset($collaborateur) ? $collaborateur->telephone2 : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="reference">reference ou CNIB:</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="reference"
                                    id="reference"
                                    autocomplete="off"
                                    value="<?= isset($collaborateur) ? $collaborateur->reference : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="entreprise">Entreprise :</label>
                                     <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $entreprise = $this->m_entreprise->get_entreprise(); 
                                         $option=array();
                                          foreach ($entreprise as $row){
                                            $options[$row['id_en']] = $row['nom'];
                                          }
                                         echo form_label('Entreprise :', 'entreprise');
                                         echo form_dropdown('entreprise', $options, isset($collaborateur) ? $collaborateur->id_en :'', 'class="form-control"');
                                     ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-sm-3">
                                    <!--label for="nom">Pays:</label-->
                                
                                     <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $pays = $this->m_pays->get_pays(); 
                                         $options=array();
                                          foreach ($pays as $row){
                                            $options[$row['id_pays']] = $row['nom'];
                                          }
                                         echo form_label('Pays', 'pays');
                                         echo form_dropdown('pays', $options, isset($collaborateur) ? $collaborateur->id_pays :'', 'class="form-control"');
                                     ?>
                        </div>
                        <div class="form-group col-sm-3">
                                    <!--label for="region">Region :</label-->
                                    <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $region = $this->m_region->get_region(); 
                                         $option=array();
                                          foreach ($region as $row){
                                            $options[$row['id_region']] = $row['nom'];
                                          }
                                         echo form_label('Region :', 'region');
                                         echo form_dropdown('region', $options,isset($collaborateur) ? $collaborateur->id_region :'', 'class="form-control"');
                                     ?>
                        </div>
                        <div class="form-group col-sm-3">
                                    <!--label for="">Province :</label-->
                                    <?php
                                    // Récupérer les données de la table "province" depuis le modèle
                                    $province = $this->m_province->get_province(); // Remplacez "nom_du_modele" par le nom réel de votre modèle

                                    $options = array();
                                    foreach ($province as $row) {
                                        $options[$row['id_province']] = $row['nom'];
                                    }

                                    echo form_label('Province', 'province');
                                    echo form_dropdown('province', $options, isset($collaborateur) ? $collaborateur->id_province :'', 'class="form-control"');
                                    ?>
                                </div>
                                <div class="form-group col-sm-3">
                                    <!--label for="nom">ville:</label-->
                                
                                     <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $ville = $this->m_ville->get_ville(); 
                                         $option=array();
                                          foreach ($ville as $row){
                                            $options[$row['id_ville']] = $row['nom'];
                                          }
                                         echo form_label('Ville :', 'ville');
                                         echo form_dropdown('ville', $options, isset($collaborateur) ? $collaborateur->id_ville :'', 'class="form-control"');
                                     ?>
                            
                                </div>
                                <div class="form-group col-sm-3">
                                     <?php
                                        // Récupérer les données de la table "province" depuis le modèle
                                         $quartier = $this->m_quartier->get_quartier(); 
                                         $options=array();
                                          foreach ($quartier as $row){
                                            $options[$row['id_quartier']] = $row['nom'];
                                          }
                                         echo form_label('Quartier :', 'quartier');
                                         echo form_dropdown('quartier', $options, isset($collaborateur) ? $collaborateur->id_quartier:'', 'class="form-control"');
                                     ?>
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