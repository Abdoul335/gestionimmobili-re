<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-12">
        <div class="card card-table">
            <div class="card card-border-color card-border-color-primary">    
                <div class="card-body">   
                    <?= form_open('Collaborateur/ajouter/' /*.$collaborateur->id*/, array('class' => 'modal-body form')); ?>    
                    <div class="row">
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
                                <label for="adresse">Adresse :</label>
                                <input class="form-control form-control-sm" type="text" name="Adresse"
                                    id="adresse"
                                    autocomplete="off"
                                    placeholder="Entrer votre Adresse" required>
                            </div>
                        </div>
                        <div class="col-sm-4"> 
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="email"
                                    id="email"
                                    autocomplete="off"
                                    placeholder="Entrer votre Email" >
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
                                    placeholder="N° telephone 1" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="telephone">Telephone 2:</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="telephone2"
                                    id="telephone2"
                                    autocomplete="off"
                                    placeholder="N° telephone 2" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="Reference">reference ou CNIB:</label>
                                <input class="form-control form-control-sm" type="text"
                                    name="reference"
                                    id="Reference"
                                    autocomplete="off"
                                    placeholder="Entrer les refernce" required>
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
                                         echo form_dropdown('entreprise', $options, '', 'class="form-control"');
                                     ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                     <div class="form-group col-sm-3">
                            <!--label for="nom">Pays:</label-->
                            <?php
                                // Récupérer les données de la table "pays" depuis le modèle
                                $pays = $this->m_pays->get_pays(); 
                                $options = array();
                                foreach ($pays as $row) {
                                    $options[$row['id_pays']] = $row['nom'];
                                }
                                echo form_label('Pays', 'pays-dropdown');
                                echo form_dropdown('pays', $options, '', 'class="form-control" id="pays-dropdown"');
                            ?>
                        </div>
                        <div class="form-group col-sm-3">
                            <!--label for="region">Region :</label-->
                            <?php
                                // Récupérer les données de la table "province" depuis le modèle
                                $region = $this->m_region->get_region(); 
                                $options = array();
                                foreach ($region as $row) {
                                    $options[$row['id_region']] = $row['nom'];
                                }
                                echo form_label('Region :', 'region-dropdown');
                                echo form_dropdown('region', $options, '', 'class="form-control" id="region-dropdown"');
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
                                    echo form_dropdown('province', $options, '', 'class="form-control" id="province-dropdown" disabled');
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
                                         echo form_dropdown('ville', $options, '', 'class="form-control" id="ville-dropdown" disabled');
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
                                         echo form_dropdown('quartier', $options, '', 'class="form-control" id="quartier-dropdown"');
                                     ?>
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

<script>
    // Récupérer les listes déroulantes
   const paysDropdown = document.getElementById('pays-dropdown');
    const regionDropdown = document.getElementById('region-dropdown');
    const provinceDropdown = document.getElementById('province-dropdown');
    const villeDropdown = document.getElementById('ville-dropdown');

    // Désactiver toutes les listes déroulantes sauf celle des pays au chargement de la page
    regionDropdown.disabled = true;
    provinceDropdown.disabled = true;
    villeDropdown.disabled = true;

    // Ajouter un écouteur d'événements pour détecter le changement de valeur dans le pays
    paysDropdown.addEventListener('change', function() {
        // Activer la liste déroulante des régions si un pays est sélectionné
        if (paysDropdown.value !== '') {
            regionDropdown.disabled = false;
        } else {
            // Désactiver et réinitialiser la liste déroulante des régions si aucun pays n'est sélectionné
            regionDropdown.disabled = true;
            regionDropdown.selectedIndex = 0;
            provinceDropdown.disabled = true;
            provinceDropdown.selectedIndex = 0;
            villeDropdown.disabled = true;
            villeDropdown.selectedIndex = 0;
        }
    });

    // Ajouter un écouteur d'événements pour détecter le changement de valeur dans la région
    regionDropdown.addEventListener('change', function() {
        // Activer la liste déroulante des provinces si une région est sélectionnée
        if (regionDropdown.value !== '') {
            provinceDropdown.disabled = false;
        } else {
            // Désactiver et réinitialiser la liste déroulante des provinces si aucune région n'est sélectionnée
            provinceDropdown.disabled = true;
            provinceDropdown.selectedIndex = 0;
            villeDropdown.disabled = true;
            villeDropdown.selectedIndex = 0;
        }
    });

    // Ajouter un écouteur d'événements pour détecter le changement de valeur dans la province
    provinceDropdown.addEventListener('change', function() {
        // Activer la liste déroulante des villes si une province est sélectionnée
        if (provinceDropdown.value !== '') {
            villeDropdown.disabled = false;
        } else {
            // Désactiver et réinitialiser la liste déroulante des villes si aucune province n'est sélectionnée
            villeDropdown.disabled = true;
            villeDropdown.selectedIndex = 0;
        }
    });
</script>
<script>/*
$(document).ready(function() {
    // Récupérer les listes déroulantes
    const paysDropdown = $('pays');
    const regionDropdown = $('region');
    const provinceDropdown = $('#province');
    const villeDropdown = $('#ville');

    // Désactiver toutes les listes déroulantes sauf celle des pays au chargement de la page
    regionDropdown.prop('disabled', true);
    provinceDropdown.prop('disabled', true);
    villeDropdown.prop('disabled', true);

    // Ajouter un écouteur d'événements pour détecter le changement de valeur dans le pays
    paysDropdown.change(function() {
        // Activer la liste déroulante des régions si un pays est sélectionné
        if (paysDropdown.val() !== '') {
            regionDropdown.prop('disabled', false);
        } else {
            // Désactiver et réinitialiser la liste déroulante des régions si aucun pays n'est sélectionné
            regionDropdown.prop('disabled', true).val('');
            provinceDropdown.prop('disabled', true).val('');
            villeDropdown.prop('disabled', true).val('');
        }
    });

    // Ajouter un écouteur d'événements pour détecter le changement de valeur dans la région
    regionDropdown.change(function() {
        // Activer la liste déroulante des provinces si une région est sélectionnée
        if (regionDropdown.val() !== '') {
            provinceDropdown.prop('disabled', false);
        } else {
            // Désactiver et réinitialiser la liste déroulante des provinces si aucune région n'est sélectionnée
            provinceDropdown.prop('disabled', true).val('');
            villeDropdown.prop('disabled', true).val('');
        }
    });

    // Ajouter un écouteur d'événements pour détecter le changement de valeur dans la province
    provinceDropdown.change(function() {
        // Activer la liste déroulante des villes si une province est sélectionnée
        if (provinceDropdown.val() !== '') {
            villeDropdown.prop('disabled', false);
        } else {
            // Désactiver et réinitialiser la liste déroulante des villes si aucune province n'est sélectionnée
            villeDropdown.prop('disabled', true).val('');
        }
    });
});*/
</script>
<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Écouteur d'événement pour la liste déroulante du pays
    $('#pays').change(function() {
        var selectedCountry = $(this).val();

        // Envoyer la requête AJAX pour récupérer les régions associées au pays sélectionné
        $.ajax({
            url: '<?= base_url("Collaborateur/get_regions_by_country") ?>',
            method: 'POST',
            dataType: 'json',
            data: { pays: selectedCountry },
            success: function(data) {
                // Mettre à jour la liste déroulante des régions avec les données JSON reçues
                var regionDropdown = $('#region');
                regionDropdown.empty();
                $.each(data, function(key, value) {
                    regionDropdown.append($('<option></option>').attr('value', key).text(value));
                });
            },
            error: function(xhr, textStatus, errorThrown) {
                // Gérer les erreurs éventuelles
                console.log('Erreur lors de la récupération des régions : ' + errorThrown);
            }
        });
    });
});
</script>

<!-- Code HTML pour les listes déroulantes -->
<select name="pays" id="pays">
    <!-- Options pour la liste des pays -->
</select>

<select name="region" id="region">
    <!-- Options pour la liste des régions (sera mise à jour par AJAX) -->
</select>


