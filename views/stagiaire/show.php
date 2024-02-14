<?php

    $nom="";
    $prenom="";
    $datenaissance="";
    $tele="";
    $email="";
    $photo="";
    if(isset($_GET['id']))
    {   
            $id=$_GET['id'];
            
            if (isset($_POST['modifier']))
            {
                $nom=$_POST['txtnom'];
                $prenom=$_POST['txtprenom'];
                $datenaissance=$_POST['TXTDATE'];
                $tele=$_POST['txttele'];
                $email=$_POST['TXTEMAIL'];
                $nomencadreur=$_POST['txtnomencadreur'];
                $nomsociete=$_POST['txtnomsociete'];
                $filiere=$_POST['TXTfiliere'];
                //$photo=$_POST['photo'];
                $values=[$nom,$prenom,$datenaissance,$tele,$email,$nomsociete,$nomencadreur,$filiere,$id];
                $m=new StagiaireModel();
                
                $m->UpdateStagiaire($values);
              
            }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Stagiaire</title>
    <style type="text/css">
    .custum-centred{
        margin:0 auto;
        width:1200px;
        margin-bottom:70px;
    }
    .btn{
        background-color: #2a2185;
        color: white;
                        }
        
   
    </style>
</head>
<body>
<?php
            if(isset($_SESSION['logged']) && $_SESSION['role']=='admin' || $_SESSION['role']=='direction')
            {
        ?>
<ul class="nav justify-content-center" style="margin-top:10px">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php?page=stagiaire/stage&id=<?=$stagiaire->id; ?>">Stage</a>
  </li>
</ul>
<?php
        }
    ?>

<div class="container"  style="margin-bottom:70px;">  
<div class="col-sm-12" >
<form method="POST" name="FRMSTAGIAIRE" role="form" class="custum-centred" style="margin-top:5px; margin-left:10px;">
    <img src='../../fst/views/stagiaire/image/<?=$stagiaire->photo_stagiaire?>' width="90px;">
<div class="row g-3">
    <div  class="col-4">
        <label for="txtnom" id="LBLNOM"  name="LBLNOM" class="form-label">Nom</label>
        <input type="text" id="txtnom"  placeholder="saisir votre nom" class="form-control" value="<?=$stagiaire->nom_stagiaire?>"name="txtnom">
      
    
        <label for="txtprenom" id="LBLPRENON"  name="LBLPRENOM" class="form-label">Prenom</label>
        <input type="text" id="txtprenom" name="txtprenom" placeholder="saisir votre prenom" class="form-control" value="<?=$stagiaire->prenom_stagiaire ?>">
      
    
        <label for="TXTDATE" id="LBLDATE"  name="LBLDATE" class="form-label"  >Date De Naissance</label>
        <input type="date" id="TXTDATE" name="TXTDATE" placeholder="saisir la date de naissance" class="form-control" value="<?=$stagiaire->datenaiss_stagiaire ?>">
    
        <label for="txttele" id="lbltel"  name="lbltel" class="form-label">Telephone</label>
        <input type="tel" id="txttele" name="txttele" placeholder="saisir votre numero de tele"  class="form-control" value="<?=$stagiaire->tele_stagiaire ?>">
    
</div>
   
    <div class="col-1">
</div>
    <div class="col-4">

       
        <label for="TXTEMAIL" class="form-label">Email</label>
        <input type="email" id="TXTEMAIL" name="TXTEMAIL"  placeholder="saisir votre email" class="form-control" value="<?=$stagiaire->email_stagiaire ?>">
        
        <label for="txtnomsociete" id="lblnomsociete"  name="lblnomsociete" class="form-label">nom societe</label>
        <input type="text" id="txtnomsociete" name="txtnomsociete" placeholder="saisir nom de societe"  class="form-control" value="<?=$stagiaire->nom_societe ?>">
    
        <label for="txtnomencadreur" class="form-label">nom encadreur</label>
        <input type="text" id="txtnomencadreur" name="txtnomencadreur"  placeholder="saisir  nom de encadreur" class="form-control" value="<?=$stagiaire->nom_encadreur ?>">

        <label for="TXTfiliere" class="form-label">filiere</label>
        <input type="text" id="TXTfiliere" name="TXTfiliere"  placeholder="saisir votre email" class="form-control" value="<?=$stagiaire->filiere_stagiaire ?>">
    </div>   
    <div class="col-1">
</div>
        
    </div> 
    <br>
    <div>
  
        <button type="submit" id="btnmodifier" name="modifier" class="btn " data-toggle="tooltip" data-placement="top" title="Modifier"><i class="material-icons">edit</i> </button> 
    
        <?php
            if(isset($_SESSION['logged']) && $_SESSION['role']=='admin' || $_SESSION['role']=='direction')
            {
        ?>
        <a type="submit" id="btnannuler" name="annuler" class="btn" href="index.php?page=stagiaire/index" data-toggle="tooltip" data-placement="top" title="Annuler"><i class="material-icons">reply</i> </a>      
        <?php
        }
    ?>
    </div>  
    
          
    </form>
    
    </div>
    </div>    
</body>
</html>
