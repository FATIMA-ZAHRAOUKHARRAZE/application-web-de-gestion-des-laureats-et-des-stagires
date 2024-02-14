<?php
    if( !empty($_POST))
    {
        if(isset($_POST['chercher']))
        {
            $value = $_POST['chercher_value'];
            header('Location:index.php?page=formation/chercher&param='.$value);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title> Tableau Formation</title>
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
            <button style="float: left;margin-left:10px ;height:30px" data-toggle="tooltip" data-placement="top" title="Chercher" class="btn" name="chercher" type="submit"><i class="material-icons">search</i>
            </button>
        </form>
        <div class='container'>
            <div class='matable' style="margin-top: 80px;">
                <caption>
                    <h3 style="text-align:center; color:BLACK">Liste Des Formations</h3>
                </caption>
                <div class="table-responsive">
                    <table  class='table table-bordered'>
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
                                foreach( $liste as $formation )
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
                                        echo "<td style='text-align:center'>";
                                            echo $formation->idlaureat;
                                        echo "</td>";
                                        echo'<td style="text-align:center;width:160px;">
                                                <a data-toggle="tooltip" data-placement="top" title="Afficher" class="btn" href="index.php?page=formation/show&id='.$formation->id.'"><i class="material-icons">visibility</i></a>
                                            ';
                                        
                                            echo'<a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=formation/delete&id='.$formation->id.'"><i class="material-icons">delete_forever</i></a>
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