<?php

if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
       
        $intitulé=$_POST["txtintitulé"];
        $datedebut=$_POST["txtdatedebut"];
        $datefin=$_POST["txtdatefin"];
        $num=$_SESSION['username'];  
        $values=[$intitulé, $datedebut, $datefin,$num];
        $m=new StageModel();
        $m->insertstage($values);
        echo "<script>alert(\"le stage est ajouter\")</script>";
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
    <title>Ajouter Stage</title>
    <style type="text/css">
        .btn{
                background-color: #2a2185;
                color: white;
        }                   
      </style>
</head>
<body>
<form method="post" class="custom-centered" style="margin-top: 90px;">
        <div class="container">
                <div class="row g-1 align-items-center" >
                        <div class="col-5">
                                

                                <label for="txtintitulé" id="lblintitulé" name="lblintitulé" class="form-label" > intitulé : </label>
                                <input type="text"  class="form-control" name="txtintitulé" placeholder="saisir le intitulé">

                                <label for="txtdatedebut" id="lbldatedebut" name="lbldatedebut" class="form-label"> date debut:</label>
                                <input type="date" class="form-control" name="txtdatedebut" placeholder="saisir le date debut">    

                                <label for="txtdatefin" id="lbldatefin" name="lbldatefin"  class="form-label"> date fin: </label>
                                <input type="date" class="form-control" name="txtdatefin" placeholder="saisir le  date fin">
                        </div>
                        <div class="col-2"> 
                        </div>
                        <div class="col-5"> 

                               
                                
                        </div>
                        <div class="col-12">
                                <button id="btajouter" class="btn" data-toggle="tooltip" data-placement="top" title="Ajouter" name="btajouter" type="submit"><i class="material-icons">add_box</i></button>
                             
                        </div>
                </div>  
        </div>          
</form> 
</body>
</html>