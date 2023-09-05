 $(document).ready(function () {
    // Lorsque la liste déroulante du pays change
    $('#pays-dropdown').change(function () {
        var selectedPaysId = $(this).val(); // Récupérer l'ID du pays sélectionné
        if (selectedPaysId !== '') {
            // Envoyer une requête AJAX pour récupérer les régions associées à ce pays
            var baseUrl = "http://localhost/gestionimo/"; // Correction ici
            console.log("Url de base: " + baseUrl); // Correction ici
            var requestURl = baseUrl + "Collaborateur/getRegionsByCountry/" + selectedPaysId;
            console.log("Url de la requete : " + requestURl);
            $.ajax({
                url: requestURl,
                type: 'POST',
                dataType: 'json',
                headers: { "content-type": "application/json" },

                success: function (response) {
                    var regionData = response.data;
                    console.log(response);
                    // Mettre à jour la liste déroulante des régions avec les données reçues
                    var regionDropdown = $('#region-dropdown');
                    regionDropdown.empty();
                    regionDropdown.append($('<options>', {
                        value: '',
                        text: 'Choisissez une région'
                    }));
                    $.each(regionData, function (index, region) {
                        regionDropdown.append($('<options>', {
                            value: region.id_region,
                            text: region.nom,
                        }));
                    });
                },
                error: function () {
                    console.log("une erreur c'est produite lors de la récupération des données : ");
                }

            });
        } else {
            // Si aucun pays n'est sélectionné, réinitialiser la liste déroulante des régions
            $('#region-dropdown').empty().append($('<options>', {
                value: '',
                text: 'Choisissez une région'
            }));
        }
    });
});
