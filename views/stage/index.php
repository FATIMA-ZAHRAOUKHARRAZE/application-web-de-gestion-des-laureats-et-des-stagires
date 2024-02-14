<?php
    if( !empty($_POST))
    {
        if(isset($_POST['chercher']))
        {
            $value = $_POST['chercher_value'];
            header('Location:index.php?page=stage/chercher&param='.$value);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Stage</title>
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
        <form  class="mb-4" method="post"style="margin-top: 20px;">
    
            <input type="text"  name="chercher_value" style="float: left;margin-left:10px"> 
            <button style="float: left;margin-left:10px;height:30px" class="btn" data-toggle="tooltip" data-placement="top" title="Chercher"name="chercher" type="submit"><i class="material-icons">search</i>
            </button>
        </form>
    <div class='container'>
        <div class='matable' style="margin-top: 80px;">
            <caption>
                <h3 style="text-align:center; color:black">Liste Des Stages</h3>
            </caption>
            <div class="table-responsive">
                <table  class='table table-bordered'>
                        <thead >
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
                                   
                                    echo'<a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=stage/delete&id='.$stage->id.'"><i class="material-icons">delete_forever</i></a>
                                        ';
                                echo' </td>';
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>