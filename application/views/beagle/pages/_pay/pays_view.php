<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="d-flex justify-content-center">
<div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="number" style="width:5%;">N° pays</th>
                    <th style="width:10%;">Nom du pays</th>
                    <th style="width:10%;">Indicatif du pays</th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($pays as $row) { ?>
                <tr>
                    <td class="number" style="width:10%;"><?=$i++?></td>
                    <td style="width:10%;"><?=$row['nom']?></td>
                    <td style="width:10%;"><?=$row['indicatif']?></td>
                    <td class="actions"><a class="icon" href="#"><i class="mdi mdi-delete"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
