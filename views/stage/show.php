<?php
$intitule="";
$datedebut="";
$datefin="";
$note="";
if(isset($_GET['id'])){   
        $id=$_GET['id'];
        if(isset($_POST['modifier'])){
                $intitule=$_POST['intitule'];
                $datedebut=$_POST['datedebut'];
                $datefin=$_POST['datefin'];
              
                $values=[$intitule,$datedebut,$datefin,$id];
                $m=new StageModel();
                $m->Updatestage($values);   
                echo "<script>alert(\"le stage est modifier\")</script>";
        }
}
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Afficher Stage</title>
    <style type="text/css">
        .custom-centered{
                margin:0 auto;
                margin-bottom: 150px;
                margin-top: 130px;
                }
        .btn{
                background-color: #2a2185;
                color: white;
                }
      </style>
<body>
<form method="post" class="custom-centered">
        <div class="container">
                <div class="row g-1 align-items-center">
                <div class="col-5">
                        <label for="txtintitulé" id="lblintitulé" name="lblintitulé" class="form-label">intitulé:</label>
                        <input type="text"  class="form-control"  placeholder="saisir l'intitulé " value="<?=$stage->intitule_stage ?>" name="intitule">
                        
                        <label for="txtdatedebut" id="lbldatedebut" name="lbldatedebut" class="form-label">date debut:</label>
                        <input type="date" class="form-control"  placeholder="saisir le date debut"value="<?=$stage->date_debut?>" name="datedebut">
                </div>  
                <div class="col-2"> 
                </div>
                <div class="col-5"> 
                        <label for="txtdatefin" id="lbldatefin" name="lbldatefin"  class="form-label">date fin:</label>
                        <input type="date" class="form-control"  placeholder="saisir le  date fin" value="<?=$stage->date_fin ?>" name="datefin">

                      
                </div>
                <div class="col-12">
                       
                                <button  id="btmodifier"  data-toggle="tooltip" data-placement="top" title="Modifier" class="btn" name="modifier" type="submit"><i class="material-icons">edit</i></button>
                            
                               
                </div>
        <div class="col-sm-1">
        </div>
        </div>
</form>
</body>
</html>