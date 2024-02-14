<?php
    require_once  "Controller.php";
    
    class LaureatController extends Controller
    {
       
        
        public function __construct( $view )
        {
           parent::__construct();
           $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
           
        }
        
        public function show()
        {

            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $laureat = $this->model->find($id);
            
            $this->render('show',["laureat"=>$laureat]);
        }
        
        
        public function statue()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $laureat = $this->model->find($id);
            $statues=$this->model->chercherStatuelaureat($id);
            
            $this->render('statue',["statues"=>$statues,"laureat"=>$laureat]);
        }

        

        public function experience()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $laureat = $this->model->find($id);
            $experiences=$this->model->chercherExperience($id);
            $this->render('experience',["experiences"=>$experiences,"laureat"=>$laureat]);
        }

        public function diplome()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $laureat = $this->model->find($id);
            $diplomes=$this->model->chercherdiplome($id);
            
            $this->render('diplome',["diplomes"=>$diplomes,"laureat"=>$laureat]);
        }

        public function formation()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $laureat = $this->model->find($id);
            $formation=$this->model->chercherformation($id);
            
            $this->render('formation',["formation"=>$formation,"laureat"=>$laureat]);
        }
       
        public function chercher()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            
            $liste = $this->model->chercherlaureat($param);
            
            $this->render('chercher',['liste'=>$liste]);
        }
        public function filiere()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            $liste = $this->model->filierelaureat($param);
            $this->render('filiere',['liste'=>$liste]);

        }

        public function delete()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $laureat = $this->model->find($id);
            if($laureat){
                //$this->render('delete',["diplome"=>$diplome]);
                $m=new LaureatModel();
                $m->delete($id);
                header('location:index.php?page=laureat/index');
            }
            else
             echo" laureat introvable";
        }

        public function ajouter()
        {
            
                $liste = $this->model->findAll();
                //envoiler la fonction a le view pour afficher
                $this->render('ajouter',['liste'=>$liste]);
           
        }
       
    }
?>