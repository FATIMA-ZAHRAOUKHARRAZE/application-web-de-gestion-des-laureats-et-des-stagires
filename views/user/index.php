<?php
if(isset($_GET['id']))
{   
        $username=$_GET['id'];
        if(isset($_POST['valider'])){
                $m=new UserModel();
                $m->updatevalide($username);
                header('Location:index.php?page=user/index');
        }
        if(isset($_POST['invalide'])){
            $m=new UserModel();
            $m->updateinvalide($username);
            header('Location:index.php?page=user/index');
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
    <title>Tableau  User</title>
   
    <style>
        .btn{
        background-color: #2a2185;
        color: white;
                        }
        </style>
</head>
<body>
    <form  class="mb-4" method="post"style="margin-top: 20px;" >
    
        
        
    </form>
  
        <div class='matable' style="margin-top: 80px;">
            <caption>
                <h3 style="text-align:center; color:black">Liste Des users</h3>
            </caption>
            <div class="table-responsive">
                <table  class='table table-bordered'>
                    <thead >
                        <?php
                            if(count($liste)>0){
                                $liste_indice=array_keys((array)$liste[0]);
                                echo "<tr class='table-active'style='color:#2a2185;text-align:center'>";
                                foreach ($liste_indice as $key => $value ){
                                    if($value!='password'){
                                        echo"<th scope='col'>";
                                        echo $value;
                                        echo"</th>";
                                    } 
                                    
                                }
                                echo "<th class='text-center'style='width:160px;'> Validation</th>";
                                echo"</tr>";
                            }
                            ?>
                    </thead>
                    <tbody> 
                    <?php 
                            foreach( $liste as $user )
                            {
                                echo "<tr class='table-active'>";
                                    echo "<td style='text-align:center'>";
                                        echo $user->id;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $user->username;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $user->photo;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $user->role;
                                    echo "</td>";
                                    
                                    echo "<td style='text-align:center'>";
                                        echo $user->valide;
                                    echo "</td>";
                                    echo'<td style="text-align:center;width:160px;">
                                            <a class="btn" name="valider" data-toggle="tooltip" data-placement="top" title="valider" href="index.php?page=user/updatevalide&id='.$user->id.'" ><ion-icon name="checkbox-outline"></ion-icon></a>
                                            <a class="btn" name="invalide" data-toggle="tooltip" data-placement="top" title="invalide" href="index.php?page=user/updateinvalide&id='.$user->id.'" ><ion-icon name="close-circle-outline"></ion-icon></ion-icon></a>
                                            
                                        ';
                                echo "</tr>";
                            }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        
</body>
</html>