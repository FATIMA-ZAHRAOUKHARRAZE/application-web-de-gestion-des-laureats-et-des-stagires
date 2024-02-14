<?php
$intitule="";
$dateaubtenssion="";
$nometablissement="";
if(isset($_GET['id'])){   
        $id=$_GET['id'];
        if(isset($_POST['modifier'])){
                $intitule=$_POST['intitule'];
                $dateaubtenssion=$_POST['dateaubtenssion'];
                $nometablissement=$_POST['nometablissement'];
                $values=[$intitule,$dateaubtenssion,$nometablissement,$id];
                $m=new DiplomeModel();
                $m->modifierdiplome($values);   
                echo "<script>alert(\"le diplome est modifier\")</script>";
        }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title> Afficher Diplome</title>
    <style type="text/css">
        .custom-centered{
                margin:0 auto;
                margin-bottom: 150px;
                margin-top:120px;
        }
        .btn{
                background-color: #2a2185;
                color: white;
        }
    </style>
</head>
<body>
<form method="post" class="custom-centered">
    <div class="container">
        <div class="row g-1 align-items-center">
                <div class="col-5">
                        <label for="txtintitulé" id="lblintitulé" name="lblintitulé" class="form-label">intitulé:</label>
                        <input type="text"  class="form-control"  placeholder="saisir l'intitulé " value="<?=$diplome->intitule_diplome?>" name="intitule">
                
                        <label for="txtdateaubtenssion" id="lbldateaubtenssion" name="lbldatedebut" class="form-label">date aubtenssion:</label>
                        <input type="date" class="form-control" placeholder="saisir le date aubtenssion" value="<?=$diplome->date_aubtenssion ?>" name="dateaubtenssion">
        
                        <label for="nometablissement" id="lblnometablissement" name="lblencadretab" class="form-label">nom etablisement:</label> 
                        <input type="text" class="form-control"  placeholder="saisir le nom etablisement" value="<?=$diplome->nom_etablissement?>" name="nometablissement">
                </div>
                <div class="col-12">
                       
                                <button  id="btmodifier" data-toggle="tooltip" data-placement="top" title="Modifier" class="btn" name="modifier" type="submit" ><i class="material-icons">edit</i></button>
                              
                                
                </div>
        </div>
        <div class="col-sm-1">
        </div>
    </div>
</form>
</body>
</html>