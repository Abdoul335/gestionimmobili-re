<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Vue : pays/supprimer.php -->
<h1>Supprimer un pays</h1>
<p>Êtes-vous sûr de vouloir supprimer le pays "<?php echo $pays->nom; ?>" ?</p>
<form method="post" action="<?php echo site_url('Pays/supprimer/'.$pays->id_pays); ?>">
    <input type="submit" value="Supprimer">
</form> 