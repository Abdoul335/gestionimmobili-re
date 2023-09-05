/*$(document).ready(function(){
	$('#telephone1').autocomplete({
    source: "<?= base_url('Bien/autocomplete'); ?>",
    select: function(event, ui) {
    	   console.log(ui);
       $('[name="telephone"]').val(ui.item.label);
        $('[name="nom"]').val(ui.item.nom);
        $('[name="Adresse"]').val(ui.item.Adresse);
        $('[name="email"]').val(ui.item.email);
        $('[name="reference"]').val(ui.item.reference);
    }
});
 });*/
$(document).ready(function() {
    $('#telephone1').on('input', function() {
        var inputValue = $(this).val();
        var apiUrl = $(this).data('api-url');
        
        $.ajax({
            url: apiUrl,
            data: { term: inputValue },
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    var selectedData = data[0]; // Prend la première entrée (si plusieurs trouvées)
                    $('#nom').val(selectedData.nom);
                    $('#adresse').val(selectedData.Adresse);
                    $('#email').val(selectedData.email);
                    $('#reference').val(selectedData.reference);
                }
            }
        });
    });
});


