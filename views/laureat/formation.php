<?php
    $nombre = count($formation);
    if ( $nombre == 0 )
        {
            echo "<h3 style='color:#2a2185;text-align:center'>liste vide des formations<h3>";
        ?>

        <a class="btn" style="background-color: #2a2185;color: white;margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/show&id=<?= $laureat->id ?>"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
     <?php
        }
    else
    {
        if ( $nombre == 1 )
        {
            $formation = $formation[0];
?>
<?php
                    $nom="";
                    $duree="";
                    $genre="";
                    if(!empty($_POST)){      
                        if(isset($_POST['modifier'])){
                            $id=$formation->id;
                                $nom=$_POST['nom'];
                                $duree=$_POST['duree'];
                                $genre=$_POST['genre'];
                                $values=[$nom,$duree,$genre,$id];
                                $m=new LaureatModel();
                                $m->Updateformationlaureat($values);   
                                echo "<script>alert(\"la formation est modifier\")</script>";
                                
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
                <title> Afficher Formation</title>
                    <style type="text/css">
                            .custom-centered{
                                    margin:0 auto;
                                    margin-bottom: 150px;
                                    margin-top: 60px;
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
                                    <div class="col-6">
                                            <label for="txtnom" id="lblnom" name="lblnom" class="form-label"> nom: </label>
                                            <input type="text"  class="form-control" placeholder="saisir le nom " value="<?=$formation->nom_formation ?>" name="nom">
                                    
                                            <label for="txtdurée" id="lbldurée" name="lbldurée" class="form-label"> durée:</label>
                                            <input type="number" class="form-control"  placeholder="saisir la durée" value="<?=$formation->duree_formation?>" name="duree">
                                    
                                            <label for="txtgenre" id="lblgenre" name="lblgenre" class="form-label">genre:</label> 
                                            <input type="text" class="form-control"   placeholder="saisir le genre" value="<?=$formation->genre_formation?>" name="genre">
                                    </div>
                                    <div class="col-12">
                                    <?php
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='laureat')
                                                {
                                                                    ?>
                                                    <button  id="btmodifier"   data-toggle="tooltip" data-placement="top" title="Modifier" class="btn" name="modifier" type="submit" ><i class="material-icons">edit</i></button>
                                                    <?php
                                    }
                                    ?>
                                    <?php
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='laureat')
                                                {
                                                    ?>
                                                    <a href="index.php?page=formation/ajouter"  data-toggle="tooltip" data-placement="top" title="Ajouter" name="ajouter" type="submit" class="btn"><i class="material-icons myhover" >add_circle_outline</i></a>
                                                    <?php
                                                }
                                                ?>
                                                    <?php
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='admin' || $_SESSION['role']=='direction')
                                                {
                                                                    ?>  
                                      <a class="btn" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/show&id=<?= $laureat->id ?>" ><i class="material-icons">arrow_back</i></a>
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

                    <style>
                        .btn{
                        background-color: #2a2185;
                        color: white;
                        }
                    </style>
                </head>
                <body>
                
                        <div class='container'>
                            <div class='matable' style="margin-top: 80px;">
                                <table  class='table table-bordered'>
                                    <thead>
                                        <?php
                                            if(count($formation)>0){
                                                $liste_indice=array_keys((array)$formation[0]);
                                                echo "<tr class='table-active'style='color:#2a2185;text-align:center'>";
                                                foreach ($liste_indice as $key => $value ){
                                                    if($value!='idlaureat'){
                                                        echo"<th scope='col'>";
                                                        echo $value;
                                                        echo"</th>"; 
                                                    }
                                                }
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='laureat' )
                                            {
                                                echo "<th class='text-center'style='width:160px;'> Operations</th>";
                                            }
                                                echo"</tr>";
                                            }
                                        ?>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach( $formation as $formation )
                                            {
                                                echo "<tr class='table-active'>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $formation->id;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $formation->nom_formation;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $formation->duree_formation;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $formation->genre_formation;
                                                    echo "</td>";
                                                    if(isset($_SESSION['logged']) && $_SESSION['role']=='laureat')
                                                    {
                                                    echo'<td style="text-align:center;width:160px;">
                                                            <a data-toggle="tooltip" data-placement="top" title="Afficher" class="btn" href="index.php?page=formation/show&id='.$formation->id.'"><i class="material-icons">visibility</i></a>
                                                        ';
                                                        
                                                        echo'<a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=formation/delete&id='.$formation->id.'"><i class="material-icons">delete_forever</i></a>
                                                            ';
                                                    echo' </td>';
                                                } 
                                                echo "</tr>";
                                            }
                                        ?>
                                        <?php
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='admin' || $_SESSION['role']=='direction')
                                                {
                                                                    ?>
                                       <a class="btn" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/show&id=<?= $laureat->id ?>"style="margin-bottom: 20px;" ><i class="material-icons">arrow_back</i></a>
                                       <?php
                                                }
                                            ?>
                                            <?php
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='laureat')
                                                {
                                                    ?>
                                                    <a href="index.php?page=formation/ajouter"  data-toggle="tooltip" data-placement="top" title="Ajouter" name="ajouter" type="submit" class="btn"><i class="material-icons myhover" >add_circle_outline</i></a>
                                                    <?php
                                                }
                                                ?>
                                                   
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