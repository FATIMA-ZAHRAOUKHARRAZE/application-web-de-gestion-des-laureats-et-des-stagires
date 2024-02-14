<?php
$nom="";
$prenom="";
$datenaissance="";
$tele="";
$email="";
$photo="";
$idformation="";
if( !empty($_POST))
    {
        if(isset($_POST['ajouter']))
        {
                $filiere=$_POST['txtfiliere'];
                $societe=$_POST["societe"];
                $societe=$_POST['societe'];
              $num=$_POST["txtnum"];
                $nom=$_POST['txtnom'];
                $prenom=$_POST['txtprenom'];
                $datenaissance=$_POST['TXTDATE'];
                $tele=$_POST['txttele'];
                $email=$_POST['TXTEMAIL'];
                $photo=$_POST['photo'];
                $values=[$num,$nom,$prenom,$datenaissance,$tele,$email,$photo,$societe,$societe,$filiere];
               
                $sql="select * from users where username =?";
                $model=new StagiaireModel();
                $res=$model->requete( $sql,[$num]);
                $user=$model->getOne($res);
                if ($user)
                {
                    echo "<script>alert(\"se compte est deja pris\")</script>";
                }
                else{
                
                    $password =password_hash( $_POST['txtpassword'], PASSWORD_BCRYPT );
                    $username=$_POST['txtnum'];
                    $role=$_POST["txtrole"];
                    $photo=$_POST['photo'];
                    $value=[$username,$password, $role,$photo];
                    $m=new StagiaireModel();
                    $m->insertuser($value);  
                    $m=new StagiaireModel();
                    $m->InsertStagiaire($values);
                    echo "<script>alert(\"le stagiaire est ajouter avec sucsse\")</script>"; 
                }
        }
      
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Stagiaire</title>
    <style type="text/css">
        .btn{
            background-color: #2a2185;
            color: white;
        }                   
    </style>
</head>
<body>

<form method="post" class="custom-centered" style="margin-top:90px;">
    <div class="container">
        <div class="row g-1 align-items-center">
            <div class="col-5" style="margin-top:20px;">

                        <label for="txtNom" id="lblnum" name="lblnum"  class="col-form-label">num:</label>
                    <input type="text"   id="txtnum"  class="form-control" placeholder="saisir le nom" name="txtnum">

                            <label for="txtnom" id="LBLNOM"  name="LBLNOM" class="form-label">Nom Stagiaire  </label>
                            <input type="text" id="txtnom" name="txtnom"placeholder="saisir votre nom" class="form-control" >

                            <label for="txtprenom" id="LBLPRENON"  name="LBLPRENOM" class="form-label">Prenom Stagiaire  </label>
                            <input type="text" id="txtprenom" name="txtprenom" placeholder="saisir votre prenom" class="form-control">
    
                            <label for="TXTDATE" id="LBLDATE"  name="LBLDATE" class="form-label" > Date De Naissance </label>
                            <input type="date" id="TXTDATE" name="TXTDATE" placeholder="saisir la date de naissance" class="form-control">

                            <label for="txtfiliere" id="txtfiliere" name="txtfiliere">filiere</label>
                                <select  class="form-control" name="txtfiliere">
                                <option>MIP</option>
                                <option>BCG</option>
                               
                                </select>
                                <label for="txttele" id="lbltel"  name="lbltel" class="form-label">Telephone De Stagiaire  </label>
                            <input type="tel" id="txttele" name="txttele" placeholder="saisir votre numero de tele"  class="form-control" >
  
                          
                                </div>    
             
             <div class="col-2"> 
             </div>
             <div class="col-5"> 
                           
             <label for="TXTEMAIL" class="form-label"> Email Stagiaire </label>
                            <input type="email" id="TXTEMAIL" name="TXTEMAIL"  placeholder="saisir votre email" class="form-control">
  
                            <label for="photo" id="photo" name="photo" class="form-label">Photo</label>
                            <input type="file" id="photo" name="photo" placeholder="saisir un fichier" class="form-control" >
                            <label for="txtpassword" id="lblpassword" name="lblpassword" class="form-label">password:</label>
                    <input type="password" class="form-control" name="txtpassword"  placeholder="saisir le telephone">

                    <label for="txtrole" id="lblrole" name="lblrole"class="form-label">role:</label> 
                    <input type="text" class="form-control" name="txtrole" placeholder="saisir le role" value="stagaire" readonly>


                    <label for="encadreur" id="LBLencadreur"  name="LBLencadreur" class="form-label">Nom encadreur  </label>
                            <input type="text" id="encadreur" name="encadreur"placeholder="saisir le nom encadreur " class="form-control" >

                            <label for="societe" id="LBLsociete"  name="LBLsociete" class="form-label"> nom societe  </label>
                            <input type="text" id="societe" name="societe" placeholder="saisir  le nom societe " class="form-control">
                        </div>
                        </div>
            <div class="col-12">
                    <br> 
                        <button type="submit" id="bntajouter" name="ajouter" class="btn"><i class="material-icons">add</i> </button>
                        
                       
                </form>
            </div>
        </div>
    </div>
</div>   
</body>
</html>
