<?php
if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
        $num=$_SESSION['username'];  
        $nom=$_POST["txtnom"];
       
        $duree=$_POST['txtduree'];
        $genre=$_POST['txtgenre'];
        $values=[ $nom, $duree, $genre,$num];
        $m=new FormationModel();
        $m->insertformation($values);
        echo "<script>alert(\"la formation est ajouter\")</script>";
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
    <title> Ajouter Formation</title>
    <style type="text/css">
        .btn{
            background-color: #2a2185;
            color: white;
        }                  
    </style>
</head>
<body>
<form method="post" class="custom-centered" style="margin-top: 120px;">
    <div class="container">
        <div class="row g-1 align-items-center">
            <div class="col-5">
               

                <label for="txtnom" id="lblnom" name="lblnom" class="form-label">nom:</label>
                <input type="text"  class="form-control" name="txtnom" placeholder="saisir le nom">
            
                <label for="txtdurée" id="lbldurée" name="lbldurée" class="form-label">durée:</label>
                <input type="number" class="form-control" name="txtduree" placeholder="saisir la durée">
            </div>
            <div class="col-2"> 
            </div>
            <div class="col-5">       
                <label for="txtgenre" id="lblgenre" name="lblgenre" class="form-label">genre:</label> 
                <input type="text" class="form-control"  name="txtgenre" placeholder="saisir le genre">
        
               
                
            </div>
            <div class="col-12">
                    <button id="btajouter" class="btn" data-toggle="tooltip" data-placement="top" title="Ajouter" name="btajouter" type="submit"><i class="material-icons">add_box</i></button>
                   
            </div>  
        </div>   
    </div> 
</form>    
</body>
</html>