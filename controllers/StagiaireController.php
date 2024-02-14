<?php @session_start();
    require_once  "StageController.php";
    require_once  "FormationController.php";
    require_once  "ExperienceController.php";
    require_once  "DiplomeController.php";
    class StagiaireController extends Controller
    {
        public $menu;
        public function __construct()
        {
           parent::__construct("stagiaire");
           if(isset($_GET['id'])){
                //$stagiaire = $this->model->chercherStagiaire($_GET['id']);
          
           }
          
        }
        public function show()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $stagiaire = $this->model->find($id);
           
           // var_dump($this);die;
            $this->render('show',["stagiaire"=>$stagiaire]);

        }
        public function delete(){
            $id=(isset($_GET['id'])?$_GET['id']:1);
            $stagiaire=$this->model->find($id);
            if($stagiaire){
                //$this->render('delete',["stagiaire"=>$stagiaire]);
                $m=new StagiaireModel();
                $m->delete($id);
                header('location:index.php?page=stagiaire/index');
            }
            else
             echo"stagiaire introvable";
        }
        public function chercher()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            $liste = $this->model->chercher($param);

            $this->render('chercher',['liste'=>$liste]);

        }
        public function filiere()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            $liste = $this->model->filierelaureat($param);
            $this->render('filiere',['liste'=>$liste]);

        }
        public function stage()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $stagiaire = $this->model->find($id);
            $stages=$this->model->chercherStage($id);
           
            $this->render('stage',["stages"=>$stages,"stagiaire"=>$stagiaire]);    
        }
        
        public function ajouter()
            {
                $liste = $this->model->findAll();
                $this->render('ajouter',['liste'=>$liste]);

            }
        
    }
?>