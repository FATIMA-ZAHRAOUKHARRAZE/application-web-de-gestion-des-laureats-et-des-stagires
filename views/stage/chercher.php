<?php
    $nombre = count($liste);

    if ( $nombre == 0 )
    {
    echo "<h3 style='color:#2a2185;text-align:center'>liste vide des stages<h3>";
    ?>
        <a class="btn" style="background-color: #337ab7;color: white; margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=stage/index"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
     <?php
    }
    else
    {
        if ( $nombre == 1 )
        {
            $stage = $liste[0];
?>
                <?php
                    $intitule="";
                    $datedebut="";
                    $datefin="";
                    $note="";
                    if(!empty($_POST)){      
                        if(isset($_POST['modifier'])){
                                    $id=$stage->id;
                                    $intitule=$_POST['intitule'];
                                    $datedebut=$_POST['datedebut'];
                                    $datefin=$_POST['datefin'];
                                   
                                    $values=[$intitule,$datedebut,$datefin,$id];
                                    $m=new StageModel();
                                    $m->Updatestage($values);   
                                    echo "<script>alert(\"le stage est modifier\")</script>";
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
                        <title>Afficher Stage</title>
                        <style type="text/css">
                            .custom-centered{
                                    margin:0 auto;
                                    margin-bottom: 150px;
                                    margin-top: 130px;
                                    }
                            .btn{
                                    background-color: #2a2185;
                                    color: white;
                                    }
                        </style>
                    <body>
                    <form method="post" class="custom-centered">
                            <div class="container">
                                    <div class="row g-1 align-items-center">
                                        <div class="col-5">
                                                <label for="txtintitulé" id="lblintitulé" name="lblintitulé" class="form-label">intitulé:</label>
                                                <input type="text"  class="form-control"  placeholder="saisir l'intitulé " value="<?=$stage->intitule_stage ?>" name="intitule">
                                                
                                                <label for="txtdatedebut" id="lbldatedebut" name="lbldatedebut" class="form-label">date debut:</label>
                                                <input type="date" class="form-control"  placeholder="saisir le date debut"value="<?=$stage->date_debut?>" name="datedebut">
                                        </div>  
                                        <div class="col-2"> 
                                        </div>
                                        <div class="col-5"> 
                                                <label for="txtdatefin" id="lbldatefin" name="lbldatefin"  class="form-label">date fin:</label>
                                                <input type="date" class="form-control"  placeholder="saisir le  date fin" value="<?=$stage->date_fin ?>" name="datefin">

                                               
                                        </div>
                                        <div class="col-12">
                                              
                                                        <button  id="btmodifier"  data-toggle="tooltip" data-placement="top" title="Modifier" class="btn" name="modifier" type="submit"><i class="material-icons">edit</i></button>
                                                     
                                                        <a class="btn"  data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=stage/index" class="text-light"><i class="material-icons">arrow_back</i></a>
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
                        <div class="table-responsive">
                            <table  class='table table-bordered '>
                                    <thead>
                                        <?php
                                            if(count($liste)>0){
                                                $liste_indice=array_keys((array)$liste[0]);
                                                echo "<tr class='table-active'style='color:#2a2185;text-align:center'>";
                                                foreach ($liste_indice as $key => $value ){
                                                    echo"<th scope='col'>";
                                                    echo $value;
                                                    echo"</th>";
                                                }
                                                echo "<th class='text-center'style='width:160px;'> Operations</th>";
                                                echo"</tr>";
                                            }
                                            ?>
                                </thead>
                                <tbody>
                                <?php
                                    foreach( $liste as $stage )
                                    {
                                        echo "<tr class='table-active'>";
                                            echo "<td style='text-align:center'>";
                                                echo $stage->id;
                                            echo "</td>";

                                            echo "<td style='text-align:center'>";
                                                echo $stage->intitule_stage;
                                            echo "</td>";

                                            echo "<td style='text-align:center'>";
                                                echo $stage->date_debut;
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                                echo $stage->date_fin;
                                            echo "</td>";
                                            
                                            echo "<td style='text-align:center'>";
                                                echo $stage->idstagiaire;
                                            echo "</td>";
                                            echo'<td style="text-align:center;width:160px;">
                                                    <a class="btn" data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=stage/show&id='.$stage->id.'"><i class="material-icons">visibility</i></a>
                                                ';
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                                echo'<a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=stage/delete&id='.$stage->id.'"><i class="material-icons">delete_forever</i></a>
                                                    ';
                                            echo' </td>';
                                        echo "</tr>";
                                    }
                                ?>
                                <a  class="btn" href="index.php?page=stage/index" data-toggle="tooltip" data-placement="top" title="Annuler"  style="margin-bottom: 20px;" ><i class="material-icons">arrow_back</i></a>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </body>
            </html>
        <?php
        }
    }
?>
