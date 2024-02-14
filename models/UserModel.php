<?php

use function PHPSTORM_META\sql_injection_subst;

    require_once 'model.php';
    class UserModel extends Model
    {   
        
        
        public function __construct()
        {
            parent::__construct();
        }
        
        public function insertuser($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(username,password,role,photo) values(?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        public function updatepass($username,$password)
        {
            $sql = "update users SET password=? Where username=?";
            $this->requete($sql,[$password,$username]);
           
        }
        public function updatevalide($id)
        {
            $sql = "update users SET valide=1 Where id=?";
            $this->requete($sql,[$id]);
           
        }
        public function updateinvalide($id)
        {
            $sql = "update users SET valide=0 Where id=?";
            $this->requete($sql,[$id]);
           
        }
    }
?>