<?php
$nom="";
$email="";
$prenom="";
$datenaissance="";
$tel="";
if(isset($_GET['id'])){   
        $id=$_GET['id'];
        if(isset($_POST['modifier'])){
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $email=$_POST['email'];
                $datenaissance=$_POST['datenaissance'];
                $filiere=$_POST['filiere'];
                $tel=$_POST['tel'];
                $values=[$nom,$prenom,$datenaissance,$tel,$email,$filiere,$id];
                $m=new LaureatModel();
                $m->Updatelaureat($values);
                echo "<script>alert(\"la laureat est modifier\")</script>";
               
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
    <title>Afficher Lauréat</title>
    <style type="text/css">
        .custom-centered{
                margin:0 auto;
                margin-bottom: 100px;
                margin-top: 40px;
        }
        .btn{
                background-color: #2a2185;
                color: white;
        }
      </style>
</head>
<body>
        <?php
if(isset($_SESSION['logged']) && $_SESSION['role']=='admin'||$_SESSION['role']=='direction')
            {
        ?>
            <nav class="navbar navbar-expand-lg navbar-mainbg" >
            <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item " >
                            <a class="nav-link" style=color:#2a2185; href="index.php?page=laureat/statue&id=<?=$laureat->id; ?>">Statue</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link"  style=color:#2a2185; href="index.php?page=laureat/formation&id=<?=$laureat->id; ?>">Formation</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link"  style=color:#2a2185; href="index.php?page=laureat/diplome&id=<?=$laureat->id; ?>">Diplome</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link"  style=color:#2a2185; href="index.php?page=laureat/experience&id=<?=$laureat->id; ?>">Experience</a>
                            </li>
                    </ul>
            </div>
    </nav>
    <?php
        }
    ?>
<form method="post" class="custom-centered">
<img src='../../fst/views/image/laureat/<?= $laureat->photo_laureat?>' style=margin-left:50px width=7%>

   <div class="container">
        <div class="row g-1 align-items-center">
                <div class="col-5">
                                <label for="txtNom" id="lblnom" name="lblnom">nom:</label>
                                <input type="text" id="txtNom" class="form-control" placeholder="saisir le nom" value="<?=$laureat->nom_laureat?>" name="nom">

                                <label for="txtprenom" id="lblprenom" name="lblprenom">prenom:</label>
                                <input type="text" class="form-control"   placeholder="saisir le Prenom" value="<?= $laureat->prenom_laureat?>" name="prenom">
                        
                                <label for="txtdate" id="lbldate" name="lbldate">date de naissance:</label>
                                <input type="date" class="form-control"  placeholder="saisir la date de Naissance" value="<?=$laureat->datenaiss_laureat ?>" name="datenaissance">
                                </div>     
                <div class="col-2"> 
                </div>
                <div class="col-5"> 
                                
                                <label for="txttel" id="lblteltel" name="lbl" class="form-label">telephone:</label>
                                <input type="tel" class="form-control"   placeholder="saisir le telephone" value="<?=$laureat->tel_laureat?>" name="tel">
                                
                                <label for="txtemail" id="lblemail" name="lblemail"class="form-label">email:</label> 
                                <input type="email" class="form-control"  placeholder="saisir  l'email" value="<?=$laureat->email_laureat ?>" name="email">

                                <label for="txtfiliere" id="lblfiliere" name="lblfiliere"class="form-label">filiere:</label> 
                                <select  class="form-control" name="filiere" value="<?=$laureat->filiere_laureat ?>">
                                <option>MIP</option>
                                <option>PCG</option>
                                
                                </select>
                </div>
                <div class="col-12">
                       
                                        <button  id="btmodifier"  class="btn" data-toggle="tooltip" data-placement="top" title="Modifier" name="modifier" type="submit" ><i class="material-icons">edit</i></button>
                                        <?php
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='admin' || $_SESSION['role']=='direction')
                                                {
                                                                    ?>  
                                <a class="btn"  data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/index" class="text-light" ><i class="material-icons">arrow_back</i></a>
                                <?php
                                                }
                                            ?>
                </div>
        </div>
        <div class="col-sm-1">
        </div>
   </div>
</form>
</body>
</html>



