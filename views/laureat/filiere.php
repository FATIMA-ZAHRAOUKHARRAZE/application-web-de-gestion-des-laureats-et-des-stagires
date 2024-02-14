<?php
    $nombre = count($liste);

    if ( $nombre == 0 ){
        echo "<h3 style='color:#2a2185;text-align:center'>liste vide des laureats <h3>";
    ?>
        <a class="btn" style="background-color: #2a2185;color: white; margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/index"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
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
                            <table  class='table table-bordered'>
                                <thead>
                                    <?php
                                        if(count($liste)>0){
                                            $liste_indice=array_keys((array)$liste[0]);
                                            echo "<tr class='table-active'style='color:#2a2185;text-align:center'>";
                                            foreach ($liste_indice as $key => $value ){
                                                if($value!='photo_laureat'){
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
                                    foreach( $liste as $laureat )
                                    {
                                        echo "<tr class='table-active'>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->id;
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->nom_laureat;
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->prenom_laureat;
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->datenaiss_laureat;
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->tel_laureat;
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->email_laureat;
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->filiere_laureat;
                                            echo "</td>";
                                            echo'<td style="text-align:center;width:160px;">
                                                    <a class="btn" data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=laureat/show&id='.$laureat->id.'" ><i class="material-icons">visibility</i></a>
                                                ';
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                                echo'
                                                    <a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=laureat/delete&id='.$laureat->id.'" ><i class="material-icons">delete_forever</i></a>
                                                    ';
                                            echo' </td>';
                                        echo "</tr>";
                                    }
                                ?>
                                    <a  class="btn" href="index.php?page=laureat/index" data-toggle="tooltip" data-placement="top" title="Annuler"  style="margin-bottom: 20px;" ><i class="material-icons">arrow_back</i></a>
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