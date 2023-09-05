<?php defined('BASEPATH') OR exit('No direct script access allowed');
    
    /*
    | -------------------------------------------------------------------------
    | URI ROUTING
    | -------------------------------------------------------------------------
    | This file lets you re-map URI requests to specific controller functions.
    |
    | Typically there is a one-to-one relationship between a URL string
    | and its corresponding controller class/method. The segments in a
    | URL normally follow this pattern:
    |
    |	example.com/class/method/id/
    |
    | In some instances, however, you may want to remap this relationship
    | so that a different class/function is called than the one
    | corresponding to the URL.
    |
    | Please see the user guide for complete details:
    |
    |	https://codeigniter.com/user_guide/general/routing.html
    |
    | -------------------------------------------------------------------------
    | RESERVED ROUTES
    | -------------------------------------------------------------------------
    |
    | There are three reserved routes:
    |
    |	$route['default_controller'] = 'welcome';
    |
    | This route indicates which controller class should be loaded if the
    | URI contains no data. In the above example, the "welcome" class
    | would be loaded.
    |
    |	$route['404_override'] = 'errors/page_missing';
    |
    | This route will tell the Router which controller/method to use if those
    | provided in the URL cannot be matched to a valid route.
    |
    |	$route['translate_uri_dashes'] = FALSE;
    |
    | This is not exactly a route, but allows you to automatically route
    | controller and method names that contain dashes. '-' isn't a valid
    | class or method name character, so it requires translation.
    | When you set this option to TRUE, it will replace ALL dashes in the
    | controller and method URI segments.
    |
    | Examples:	my-controller/index	-> my_controller/index
    |		my-controller/my-method	-> my_controller/my_method
    */
    
    $route['default_controller'] = 'Accueil/index';
    $route['404_override'] = '';
    $route['translate_uri_dashes'] = FALSE;


    //Route de Pays
      $route['pays'] = 'Pays/index'; // Route pour la fonction index
      $route['pays/ajouter'] = 'Pays/ajouter'; // Route pour la fonction ajouter
      $route['pays/update/(:num)'] = 'Pays/update/$1'; // Route pour la fonction modifier avec un paramètre
      $route['pays/delete/(:num)'] = 'Pays/delete/$1'; // Route pour la fonction supprimer avec un paramètre
      

    //Route de region
      $route['region'] = 'Region/index'; // Route pour la fonction index
      $route['region/ajouter'] = 'Region/ajouter'; // Route pour la fonction ajouter
      $route['region/modifier/(:num)'] = 'Region/modifier/$1'; // Route pour la fonction modifier avec un paramètre
      $route['region/delete/(:num)'] = 'Region/delete/$1'; // Route pour la fonction supprimer avec un paramètre

    //Route pour province
      $route['province'] = 'Province/index'; // Route pour la fonction index
      $route['province/ajouter'] = 'Province/ajouter'; // Route pour la fonction ajouter
      $route['province/update/(:num)'] = 'Province/update/$1'; // Route pour la fonction modifier avec un paramètre
      $route['province/delete/(:num)'] = 'Province/delete/$1'; // Route pour la fonction supprimer avec un paramètre 

    //Route pour  ville
      $route['ville'] = 'Ville/index'; // Route pour la fonction index
      $route['ville/ajouter'] = 'Ville/ajouter'; // Route pour la fonction ajouter
      $route['ville/modifier/(:num)'] = 'Ville/modifier/$1'; // Route pour la fonction modifier avec un paramètre
      $route['ville/delete/(:num)'] = 'Ville/delete/$1'; // Route pour la fonction supprimer avec un paramètre 


    //Route pour Quartier
    $route['quartier'] = 'Quartier/index'; // Route pour la fonction index
      $route['quartier/ajouter'] = 'Quartier/ajouter'; // Route pour la fonction ajouter
      $route['quartier/update/(:num)'] = 'Quartier/update/$1'; // Route pour la fonction modifier avec un paramètre
      $route['quartier/delete/(:num)'] = 'Quartier/delete/$1'; // Route pour la fonction supprimer avec un paramètre   


    //Route pour  Banque
      $route['banque'] = 'Banque/index'; // Route pour la fonction index
      $route['banque/ajouter'] = 'Banque/ajouter'; // Route pour la fonction ajouter
      $route['banque/update/(:num)'] = 'Banque/update/$1'; // Route pour la fonction modifier avec un paramètre
      $route['banque/delete/(:num)'] = 'Banque/delete/$1'; // Route pour la fonction supprimer avec un paramètre

    //Route pour  Compte
      $route['compte'] = 'Compte/index'; // Route pour la fonction index
      $route['compte/ajouter'] = 'Compte/ajouter'; // Route pour la fonction ajouter
      $route['compte/modifier/(:num)'] = 'Compte/modifier/$1'; // Route pour la fonction modifier avec un paramètre
      $route['compte/delete/(:num)'] = 'Compte/delete/$1'; // Route pour la fonction supprimer avec un paramètre


    // Route  pour  Entreprise
      $route['entreprise'] = 'Entreprise/index'; // Route pour la fonction index
      $route['entreprise/ajouter'] = 'Entreprise/ajouter'; // Route pour la fonction ajouter
      $route['entreprise/modifier/(:num)'] = 'Entreprise/modifier/$1'; // Route pour la fonction modifier avec un paramètre
      $route['entreprise/delete/(:num)'] = 'Entreprise/delete/$1'; // Route pour la fonction supprimer avec un paramètre 

    // Route pour Status
      $route['status'] = 'Status/index'; // Route pour la fonction index
      $route['status/ajouter'] = 'Status/ajouter'; // Route pour la fonction ajouter
      $route['status/modifier/(:num)'] = 'Status/modifier/$1'; // Route pour la fonction modifier avec un paramètre
      $route['status/delete/(:num)'] = 'Status/delete/$1'; // Route pour la fonction supprimer avec un paramètre 

    // Route pour Type
      $route['type'] = 'Type/index'; // Route pour la fonction index
      $route['type/ajouter'] = 'Type/ajouter'; // Route pour la fonction ajouter
      $route['type/modifier/(:num)'] = 'Type/modifier/$1'; // Route pour la fonction modifier avec un paramètre
      $route['type/delete/(:num)'] = 'Type/delete/$1'; // Route pour la fonction supprimer avec un paramètre          
   

//route pour le Collaborateur
      $route['Collaborateur'] = 'Collaborateur/index';
      $route['Collaborateur/ajouter'] = 'Collaborateur/ajouter';
      $route['Collaborateur/modifier/(:num)'] = 'Collaborateur/update/$1';
      $route['Collaborateur/delete/(:num)'] = 'Collaborateur/delete/$1';
      $route['Collaborateur/getRegionsByCountry/(:num)'] = 'Collaborateur/getRegionsByCountry/$1';
      
      
//Les routes pour  Bien
      $route['bien'] = 'Bien/index'; // Route pour la fonction index
      $route['bien/ajouter'] = 'Bien/ajouter'; // Route pour la fonction ajouter
      $route['bien/modifier/(:num)'] = 'Bien/modifier/$1'; // Route pour la fonction modifier avec un paramètre
      $route['bien/supprimer/(:num)'] = 'Bien/supprimer/$1'; // Route pour la fonction supprimer avec un paramètre
      $route['bien/autocomplete'] = 'Bien/autocomplete'; // Route pour la fonction autocomplete


  //Route pour Portion
      $route['portion'] = 'Portion/index'; // Route pour la fonction index
      $route['portion/ajouter'] = 'Portion/ajouter'; // Route pour la fonction ajouter
      $route['portion/modifier/(:num)'] = 'Portion/modifier/$1'; // Route pour la fonction modifier avec un paramètre
      $route['portion/delete/(:num)'] = 'Portion/delete/$1'; // Route pour la fonction supprimer avec un paramètre 


    //Route pour Position
      $route['position'] = 'Position/index'; // Route pour la fonction index
      $route['position/ajouter'] = 'Position/ajouter'; // Route pour la fonction ajouter
      $route['position/modifier/(:num)'] = 'Position/modifier/$1'; // Route pour la fonction modifier avec un paramètre
      $route['position/delete/(:num)'] = 'Position/delete/$1'; // Route pour la fonction supprimer avec un paramètre   



    