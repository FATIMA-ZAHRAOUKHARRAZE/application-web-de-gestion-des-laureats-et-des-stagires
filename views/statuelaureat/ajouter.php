<?php

if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
        $num=$_SESSION['username'];
       
        $nom=$_POST['txtnom'];
        $date=$_POST['txtdate'];
        $idlaureat=$_POST['txtidla'];
        $values=[$nom,$date,$num];
        $m=new StatuelaureatModel();
        $m->insertstatuelaureat($values);
        echo "<script>alert(\"la statue est ajouter\")</script>";
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
    <title> Ajouter Statue Lauréat</title>
    <style type="text/css">
        .btn{
                background-color: #2a2185;
                color: white;
            }
    </style>
</head>
<body>
<form method="post" class="custom-centered"  style="margin-top: 120px;">
    <div class="container">
        <div class="row g-1 align-items-center">
            <div class="col-5"> 
                    <label for="txtid" id="lblid" name="lblid">id:</label>
                    <input type="text" class="form-control"  name="txtid"  placeholder="saisir le id">

                    <label for="txtnom" id="lblnom" name="lblnom"> nom:</label>
                    <input type="text"  class="form-control" name="txtnom" placeholder="saisir le nom">
            </div>  
            <div class="col-2"> 
            </div>
            <div class="col-5"> 

                    <label for="txtdate" id="lblnom" name="lblnom">date:</label>
                    <input type="date"  class="form-control" name="txtdate" placeholder="saisir la date ">
                    
                            </div>
            <div class="col-12">
                        <button id="btajouter" data-toggle="tooltip" data-placement="top" title="Ajouter" class="btn" name="btajouter" type="submit"><i class="material-icons">add_box</i></button>
                      
            </div>  
        </div>  
    </div>          
</form> 
</body>
</html>