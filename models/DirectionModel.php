<?php
    require_once 'model.php';

    class DirectionModel extends Model
    {     
        public function __construct()
        {
            parent::__construct();
        }

        

        public function insertuser($values)
        {
            $sql = "INSERT INTO users";
            $sql .='(username,password,role,photo) values(?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }

        

        public function insertdirection($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='( id,nom_direction, prenom_direction,tel_direction, email_direction, photo_direction,post_direction) values(?,?,?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        
       

    }
?>