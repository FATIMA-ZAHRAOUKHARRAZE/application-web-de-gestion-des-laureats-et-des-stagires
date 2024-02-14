<?php
    $nombre = count($liste);

    if ( $nombre == 0 ){
        echo "<h3 style='color:#2a2185;text-align:center'>liste vide des stagaires <h3>";
    ?>
        <a class="btn" style="background-color: #2a2185;color: white; margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=stagiaire/index"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
     <?php
    }
        
    else
    {
        if ($nombre>=1 )
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