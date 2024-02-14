<?php
    require_once  "Controller.php";

    
    class DirectionController extends Controller
    {
        
        public function __construct( $view )
        {
            parent::__construct();
        }

        

        
        
        public function ajouter()
        {
           
            $liste = $this->model->findAll();
            //envoiler la fonction a le view pour afficher
            $this->render('ajouter',['liste'=>$liste]);
            
        }
        
    }
?>