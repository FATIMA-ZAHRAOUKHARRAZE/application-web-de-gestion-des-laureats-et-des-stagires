<?php
    require_once 'model.php';

    class StageModel extends Model
    {   
       
        public function __construct()
        {
            parent::__construct();
        }

        public function chercherstage($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE intitule_stage=? OR date_debut=? OR date_debut=?";
            $query = $this->requete( $sql, [$param,$param,$param]);
            return $this->getAll($query);
        }

        public function insertstage($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(intitule_stage,date_debut,date_fin,idstagiaire) values(?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        
        public function Updatestage($values)
        {
            $sql="UPDATE ".$this->table." SET intitule_stage=?,date_debut=?,date_fin=? WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }

    }
?>