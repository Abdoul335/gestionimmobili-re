<?php defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Home extends CI_Controller
    {
        protected $property = array(
            'title' => 'Accueil',
            'UPDATE_SUCCESS' => FALSE,
            'INSERT_SUCCESS' => FALSE,
        );
        protected $charger = array();
        
        public function __construct()
        {
            parent::__construct();
            setlocale(LC_TIME, 'fr_FR', 'fra');
            $this->property['pagetitle'] = mdate("%d/%m/%Y", now('UTC'));
        }
        
        /**
         * @param 
         *
         *         
         *
         * @author Mandiss
         */
        

        public function view()
        {
            $this->property['pagetitle'] = 'Accueil';
            $this->property['UPDATE_SUCCESS'] = 'FALSE';
            $this->property['INSERT_SUCCESS'] = 'FALSE';

            $this->layout->view('index', $property);
        }
       
    }
    
    /** End of file: Home.php **/
    /** File location: application/controllers/Home.php **/