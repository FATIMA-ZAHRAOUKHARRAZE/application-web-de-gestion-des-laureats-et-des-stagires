<?php
if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
        $num=$_SESSION['username'];  
   
        $intitule=$_POST["txtintitulé"];
        $dateaubtenssion=$_POST['txtdateaubtenssion'];
        $nometablissement=$_POST['txtnometablissement'];
        $values=[$intitule, $dateaubtenssion, $nometablissement, $num];
        $m=new DiplomeModel();
        $m->insertdiplome($values);
        echo "<script>alert(\"le diplome est ajouter\")</script>";
}   }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title> Ajouter Diplome</title>
    <style type="text/css">
        .btn{
                background-color: #2a2185;
                color: white;
        }                   
    </style>
</head>
<body>
<form method="post" class="custom-centered" style="margin-top:120px;">
    <div class="container">
        <div class="row g-1 align-items-center">
                <div class="col-5">
                     

                        <label for="txtintitulé" id="lblintitulé" name="lblintitulé" class="form-label" >intitulé:</label>
                        <input type="text"  class="form-control" name="txtintitulé" placeholder="saisir l'intitulé">
                
                        <label for="txtdateaubtenssion" id="lbldateaubtenssion" name="lbldatedebut" class="form-label">date aubtenssion:</label>
                        <input type="date" class="form-control" name="txtdateaubtenssion" placeholder="saisir le date aubtenssion">
                </div>
                <div class="col-2"> 
                </div>
                <div class="col-5">      
                        <label for="txtnometablissement" id="lblnometablissement" name="lblencadretab" class="form-label">nom etablisement:</label> 
                        <input type="text" class="form-control" name="txtnometablissement" placeholder="saisir le nom etablisement">
                
                
                </div>
                <div class="col-12">
                        <button id="btajouter" data-toggle="tooltip" data-placement="top" title="Ajouter" class="btn" name="btajouter" type="submit"><i class="material-icons">add_box</i></button>
                        
                </div> 
        </div>
    </div>   
</form>   
</body>
</html>