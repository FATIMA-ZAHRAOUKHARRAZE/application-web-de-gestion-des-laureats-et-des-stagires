<?php
if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
        $num=$_SESSION['username'];    
        $nom=$_POST["txtNom"];
        $dure=$_POST['txtduree'];
        $values=[$nom, $dure, $num];
        $m=new ExperienceModel();
        $m->insertexperience($values);
        echo "<script>alert(\"l'experience est ajouter\")</script>";
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
    <title> Ajouter Experience</title>
    <style type="text/css">
        .btn{
                background-color: #2a2185;
                color: white;
        }                   
   </style>
</head>
<body>
<form method="post" class="custom-centered" style="margin-top: 130px;">
   <div class="container">
        <div class="row g-1 align-items-center">
                <div class="col-5">
                
                        <label for="txtNom" id="lblnom" name="lblnom" class="form-label">nom:</label>
                        <input type="text"  class="form-control" name="txtNom" placeholder="saisir le nom">
                        </div>
                <div class="col-2"> 
                </div>
                <div class="col-5">   
                        <label for="txtduree" id="lblduree" name="lblduree"  class="form-label">duree:</label>
                        <input type="number" class="form-control"  name="txtduree" placeholder="saisir la duree">
                        </div>
                <div class="col-12">
                        <button id="btajouter"  data-toggle="tooltip" data-placement="top" title="Ajouter"class="btn" name="btajouter" type="submit"><i class="material-icons">add_box</i></button>
                        
                </div>  
        </div>   
    </div> 
</form>    
</body>
</html>