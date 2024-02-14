<?php
    require_once 'model.php';

    class StagiaireModel extends Model
    {   
        
        public function chercher($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE nom_stagiaire=? OR prenom_stagiaire=? OR datenaiss_stagiaire =? OR tele_stagiaire=? OR email_stagiaire=? OR nom_societe=? OR nom_encadreur=? OR filiere_stagiaire=? ";
            $query = $this->requete( $sql, [$param,$param,$param,$param,$param,$param,$param,$param]);
            return $this->getAll($query);
        }
        public function chercherStage($id)
        {
            $sql = "SELECT * FROM stages WHERE idstagiaire=?";
            $query = $this->requete( $sql,[$id]);
            return $this->getAll($query);
        }
        public function filierelaureat($param)
        {
            $sql = "SELECT * FROM stagiaires where filiere_stagiaire=?";
            $query = $this->requete( $sql, [$param]);
            return $this->getAll($query);
        }
        
        public function InsertStagiaire($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(id,nom_stagiaire,prenom_stagiaire,datenaiss_stagiaire,tele_stagiaire,email_stagiaire,photo_stagiaire,nom_societe,nom_encadreur,filiere_stagiaire) values(?,?,?,?,?,?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        public function UpdateStagiaire($values)
        {
            $sql="UPDATE ".$this->table." SET nom_stagiaire=?,prenom_stagiaire=?,datenaiss_stagiaire=?,tele_stagiaire=?,email_stagiaire=?,nom_societe=?,nom_encadreur=?,filiere_stagiaire=? WHERE id = ? ";
            //var_dump($values);die;
            $query =$this->requete( $sql, $values);
        }
        public function Updatestage($values)
        {
            $sql="UPDATE stages SET intitule_stage=?,date_debut=?,date_fin=? WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }
        public function insertuser($values)
        {
            $sql = "INSERT INTO users";
            $sql .='(username,password,role,photo) values(?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
    
       
        
    }
?>