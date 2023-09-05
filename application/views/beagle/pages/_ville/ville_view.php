<div class="card">
   <div class="card-body">
     <div class="main-content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-header text-center">
            <h1>Liste des Villes</h1>
            <a href="<?php echo base_url("Ville/ajouter")?>" class="md-trigger" data-toggle="modal" data-target="#modalFormulaireVille"><i class="fas fa-plus"></i>Ajouter</a>
            <div class="tools dropdown"><span class="icon mdi mdi-download"></span></div>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="number">ID</th>
                  <th style="width:40%;">Nom de la ville</th> 
                  <th style="width:30%;">Nom du province</th>
                  <th class="actions">Action</th> 
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ville as $ville) { ?>
                  <tr>
                    <td class="number"><?php echo $ville['id_ville']; ?></td>
                    <td><?php echo $ville['nom']; ?></td>
                    <td>
                      <?php
                        $province = $this->m_province->getProvinceById($ville['id_province']);
                        echo $province->nom ?? "N/A";
                      ?>
                    </td>
                    <td>
                    	<div class="btn-group btn-hspace">
                        <button class="btn btn-primary mr-1" type="button" data-toggle="modal" data-target="#modalModifierVille<?=$ville['id_ville'];?>">
                                 <i class="fas fa-edit"></i>
                        </button>
                        <!-- Modal MODIFIER -->
                            <div class="modal fade" id="modalModifierVille<?=$ville['id_ville'];?>" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="modalModifierLabel">Modification</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                    <div class="modal-body">
                                      <div class="row">
                                            <div class="col-12 content-center">
                                                <div class="card card-table center">
                                                    <div class="card card-border-color card-border-color-primary">
                                                        <div class="card-body">   
                                                           <?= form_open('Ville/modifier/'. $ville['id_ville'], array('class' => 'modal-body form')); ?>                             
                                                                    <div class="row">
                                                                        <div class="form-group col-sm-4"> 
                                                                          <label for="nom">Nom :</label>
                                                                            <input class="form-control form-control-sm" type="text" name="nom"
                                                                                id="nom"
                                                                                autocomplete="off"
                                                                                value="<?= $ville['nom'] ?>">
                                                                        </div>
                                                                        <div class="form-group col-sm-4">
                                                                            <!--label for="">Province :</label-->
                                                                            <?php
                                                                            // Récupérer les données de la table "province" depuis le modèle
                                                                            $province = $this->m_province->get_province(); // Remplacez "nom_du_modele" par le nom réel de votre modèle

                                                                            $options = array();
                                                                            foreach ($province as $row) {
                                                                                $options[$row['id_province']] = $row['nom'];
                                                                            }

                                                                            echo form_label('Province', 'province');
                                                                            echo form_dropdown('province', $options, $ville['id_province'], 'class="form-control-sm"');
                                                                            ?>
                                                                        </div>
                                                                    </div><br><br>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                            <input class="btn btn-primary md-trigger" type="submit" name="modifier" value="Modifier">                                
                                                                        </div>
                                                            <?= form_close(); ?>                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                        <button class="btn btn-danger ml-1" type="button" data-toggle="modal" data-target="#modalSupprimerVille<?= $ville['id_ville']?>">
                                <i class="fas fa-trash-alt"></i>
                        </button>
                        <div class="modal fade" id="modalSupprimerVille<?= $ville['id_ville'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalSupprimerStatusLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalSupprimerLabel">Confirmer la Suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer cette ville ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="<?= base_url("Ville/delete/".$ville['id_ville']) ?>" class="btn btn-danger">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalFormulaireVille" tabindex="-1" role="dialog" aria-labelledby="modalFormulaireVilleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modalAjouterLabel">Ajouter une Ville</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="row">
    <div class="col-12 content-center">
        <div class="card card-table center">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">   
                   <?= form_open('Ville/ajouter/'/*. $ville->id_ville*/, array('class' => 'modal-body form')); ?>                             
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <!--label for="">Province :</label-->
                                    <?php
                                    // Récupérer les données de la table "province" depuis le modèle
                                    $province = $this->m_province->get_province(); // Remplacez "nom_du_modele" par le nom réel de votre modèle

                                    $options = array(''=>'choisissez un province');
                                    foreach ($province as $row) {
                                        $options[$row['id_province']] = $row['nom'];
                                    }

                                    echo form_label('Province', 'province');
                                    echo form_dropdown('province', $options, '', 'class="form-control-sm"');
                                    ?>
                                </div>
                                <div class="form-group col-sm-4"> 
                                  <label for="nom">Nom :</label>
                                    <input class="form-control form-control-sm" type="text" name="nom"
                                        id="nom"
                                        autocomplete="off"
                                        placeholder="Entrer le nom" required>
                                </div>
                            </div><br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <input class="btn btn-success md-trigger" type="submit" name="valider" value="Valider">
                                
                                </div>

                    <?= form_close(); ?>
                    
                </div>

            </div>

        </div>

    </div>
</div>
         </div>
    </div>
</div>

<!-- Modal MODIFIER -->
<div class="modal fade" id="modalModifierVille" tabindex="-1" role="dialog" aria-labelledby="modalModifierLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalModifierLabel">Modification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="row">
    <div class="col-12 content-center">
        <div class="card card-table center">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-body">   
                   <?= form_open('Ville/modifier/'. $ville['id_ville'], array('class' => 'modal-body form')); ?>                             
                            <div class="row">
                                <div class="form-group col-sm-4"> 
                                  <label for="nom">Nom :</label>
                                    <input class="form-control form-control-sm" type="text" name="nom"
                                        id="nom"
                                        autocomplete="off"
                                        value="<?= $ville['nom'] ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">Province :</label>
                                    <?php
                                    // Récupérer les données de la table "province" depuis le modèle
                                    $province = $this->m_province->get_province(); // Remplacez "nom_du_modele" par le nom réel de votre modèle

                                    $options = array();
                                    foreach ($province as $row) {
                                        $options[$row['id_province']] = $row['nom'];
                                    }

                                    echo form_label('Province', 'province');
                                    echo form_dropdown('province', $options, $ville['id_province'], 'class="form-control"');
                                    ?>
                                </div>
                            </div><br><br>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary modal-close" type="reset" id="idresetmob">
                                        <i class="icon icon-left mdi mdi-undo"></i>&nbsp;ANNULER&nbsp;
                                    </button>
                                    <input class="btn btn-primary md-trigger" type="submit" name="modifier" value="Modifier">                                
                                </div>
                    <?= form_close(); ?>                    
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
  </div>
</div>
