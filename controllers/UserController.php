<?php
    require_once  "Controller.php";

    
    class UserController extends Controller
    {
        
        public function __construct( $view )
        {
            parent::__construct();
        }

        public function login()
        {
            $this->render('login',[]);
        }
        public function login1()
        {
            $this->render('login1',[]);
        }
        public function login2()
        {
            $this->render('login2',[]);
        }
        public function login3()
        {
            $this->render('login3',[]);
        }
        
        public function deconnecter()
        {
            
            $this->render('deconnecter',[]);
        }
        public function profil()
        {
            
            $this->render('profil',[]);
        }
        
        public function ajouter()
        {
           
                $liste = $this->model->findAll();
                //envoiler la fonction a le view pour afficher
                $this->render('ajouter',['liste'=>$liste]);
           
        }
        public function update()
        {
            
            $this->render('update',[]);
        }
        public function updatevalide()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $user = $this->model->find($id);
            if($user){
                //$this->render('delete',["diplome"=>$diplome]);
                $m=new UserModel();
                $m->updatevalide($id);
                header('location:index.php?page=user/index');
            }
            else
             echo" user introvable";

            
        }
        public function updateinvalide()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $user = $this->model->find($id);
            if($user){
                //$this->render('delete',["diplome"=>$diplome]);
                $m=new UserModel();
                $m->updateinvalide($id);
                header('location:index.php?page=user/index');
            }
            else
             echo" user introvable";

            
        }
       
    }
?>