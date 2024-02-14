<?php
    $nombre = count($liste);

    if ( $nombre == 0 ){
    echo "<h3 style='color:#2a2185;text-align:center'>liste vide des stagiaires <h3>";
        ?>
        <a class="btn" style="background-color: #2a2185;color: white; margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/index"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
     <?php
    }
        
    else
    {
        if ( $nombre == 1 )
        {
            $stagiaire = $liste[0];
?>
<?php
    $nom="";
    $prenom="";
    $datenaissance="";
    $tele="";
    $email="";
    //$photo="";
    if(!empty($_POST))
    {      
        if(isset($_POST['modifier']))
        {
            $id=$stagiaire->id;
            $nom=$_POST['txtnom'];
            $prenom=$_POST['txtprenom'];
            $datenaissance=$_POST['TXTDATE'];
            $tele=$_POST['txttele'];
            $email=$_POST['TXTEMAIL'];
            //$photo=$_POST['photo'];
            $values=[$nom,$prenom,$datenaissance,$tele,$email,$id];
            $m=new StagiaireModel();
            
            $m->UpdateStagiaire($values);
            header('location: index.php?page=stagiaire/index');
        }
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Stage</title>
</head>
<style>
    .btn{
        background-color: #2a2185;
        color: white;
                        }
       
</style>
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
                <form method="POST" name="FRMSTAGIAIRE" role="form" class="custum-centred" style="margin-top:10px; margin-left:100px;">
                <img src='../../fst/views/stagiaire/image/<?=$stagiaire->photo_stagiaire?>' width="90px;">
                    <div class="row g-3">
                        <div  class="col-5">
                            <label for="txtnom" id="LBLNOM"  name="LBLNOM" class="form-label">Nom</label>
                            <input type="text" id="txtnom"  placeholder="saisir votre nom" class="form-control" value="<?=$stagiaire->nom_stagiaire?>"name="txtnom">
      
                            <label for="txtprenom" id="LBLPRENON"  name="LBLPRENOM" class="form-label">Prenom</label>
                            <input type="text" id="txtprenom" name="txtprenom" placeholder="saisir votre prenom" class="form-control" value="<?=$stagiaire->prenom_stagiaire ?>">
      
                            <label for="TXTDATE" id="LBLDATE"  name="LBLDATE" class="form-label"  >Date De Naissance</label>
                             <input type="date" id="TXTDATE" name="TXTDATE" placeholder="saisir la date de naissance" class="form-control" value="<?=$stagiaire->datenaiss_stagiaire ?>">
                             
                             <label for="TXTSOCIETE" class="form-label">Nom Societe</label>
                            <input type="text" id="TXTsociete" name="TXTsociete"  placeholder="saisir votre nom societe" class="form-control" value="<?=$stagiaire->nom_societe ?>">
                            
                            </div>
   
                        <div class="col-1"></div>
                        <div class="col-5">
                            <label for="txttele" id="lbltel"  name="lbltel" class="form-label">Telephone</label>
                            <input type="tel" id="txttele" name="txttele" placeholder="saisir votre numero de tele"  class="form-control" value="<?=$stagiaire->tele_stagiaire ?>">
    
                            <label for="TXTEMAIL" class="form-label">Email</label>
                            <input type="email" id="TXTEMAIL" name="TXTEMAIL"  placeholder="saisir votre email" class="form-control" value="<?=$stagiaire->email_stagiaire ?>">

                           
                            <label for="TXTencadreur" class="form-label">Nom Encadreur</label>
                            <input type="text" id="TXTencadreur" name="TXTencadreur"  placeholder="saisir votre nom encdreur" class="form-control" value="<?=$stagiaire->nom_encadreur ?>">

                            <label for="TXTfilliere" class="form-label">Filliere</label>
                            <input type="text" id="TXTfilliere" name="TXTfilliere"  placeholder="saisir votre filliere" class="form-control" value="<?=$stagiaire->filiere_stagiaire ?>">

                        </div>   
                        <div class="col-1"></div>
        
                    </div> 
                    <br>
                    <div>
                    <?php
            if(isset($_SESSION['logged']) && $_SESSION['role']=='admin' || $_SESSION['role']=='direction')
            {
        ?>
                            <button  class="btn" style="margin-left:350px;" type="submit" id="btnmodifier" name="modifier" class="btn btn"><i class="material-icons">edit</i> </button> 
                       
         <?php
        }
    ?>
          <?php
            if(isset($_SESSION['logged']) && $_SESSION['role']=='admin' || $_SESSION['role']=='direction')
            {
        ?>  
                            <a type="submit" id="btnannuler" name="annuler" class="btn btn" href="index.php?page=stagiaire/index"><i class="material-icons">reply</i></a> 
         <?php
        }
    ?>
                        </div>         
                </form>
             </div>
</div>    
</body>
</html>
<?php
    }
    else
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Tableau stagiaire</title>
    <style>
        .btn{
        background-color: #2a2185;
        color: white;
                        }
        </style>
</head>
<body>
    
  
        <div class='matable' style="margin-top: 80px;">
            <caption>
                <h3 style="text-align:center; color:black">Liste Des stagiaire</h3>
            </caption>
            <div class="table-responsive">
                <table  class='table table-bordered '>
                    <thead style="color:#2a2185">
                        <?php
                            if(count($liste)>0){
                                $liste_indice=array_keys((array)$liste[0]);
                                echo "<tr class='table-active';text-align:center'>";
                                foreach ($liste_indice as $key => $value ){
                                    if($value!='photo_stagiaire'){
                                        echo"<th scope='col'>";
                                        echo $value;
                                        echo"</th>"; 
                                    }
                                }
                                echo "<th class='text-center'style='width:160px;'> Operations</th>";
                                echo"</tr>";
                            }
                            ?>
                    </thead>
                    <tbody> 
                    <?php 
                            foreach( $liste as $stagiaire )
                            {
                                echo "<tr class='table-active'>";
                                    echo "<td style='text-align:center'>";
                                        echo $stagiaire->id;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $stagiaire->nom_stagiaire;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $stagiaire->prenom_stagiaire;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $stagiaire->datenaiss_stagiaire;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $stagiaire->tele_stagiaire;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $stagiaire->email_stagiaire;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $stagiaire->nom_societe;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $stagiaire->nom_encadreur	;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $stagiaire->filiere_stagiaire;
                                    echo "</td>";
                                    
                                    echo'<td style="text-align:center;width:160px;">
                                            <a class="btn" data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=stagiaire/show&id='.$stagiaire->id.'" ><i class="material-icons">visibility</i></a>
                                        ';
                                        echo'
                                            <a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=stagiaire/delete&id='.$stagiaire->id.'" ><i class="material-icons">delete_forever</i></a>
                                            ';
                                    echo' </td>';
                                echo "</tr>";
                            }
                    ?>
                     <a  class="btn" href="index.php?page=stagiaire/index" data-toggle="tooltip" data-placement="top" title="Annuler"  style="margin-bottom: 20px;" ><i class="material-icons">arrow_back</i></a>
                    </tbody>
                </table>
            </div>
        </div>
   
</body>
</html>
<?php
        }
    }
?>