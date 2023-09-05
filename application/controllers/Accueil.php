<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

    protected $property = array(
        'title' => 'Accueil',
        'UPDATE_SUCCESS' => FALSE,
        'INSERT_SUCCESS' => FALSE,
    );

    public function __construct() 
    {
        parent:: __construct();
        setlocale(LC_TIME, 'fr_FR', 'fra');
        $this->property['pagetitle'] = utf8_encode(strftime("%d %b %G", now()));
    }

     public function index()
    {
        $this->property['pagetitle'] = 'Accueil';
        $this->property['UPDATE_SUCCESS'] = 'FALSE';
        $this->property['INSERT_SUCCESS'] = 'FALSE';

        $this->layout->view('_accueil/accueil_view', $this->property);
    }
}