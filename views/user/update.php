<?php
  if ( $_SERVER["REQUEST_METHOD"] == "POST" )
  {
      if ( isset( $_POST['save'] ) )
      {
          $oldpassword=$_POST["oldpassword"];
          $newpassword=$_POST["newpassword"];
          $confpassword=$_POST["confpassword"];
          $user = $_SESSION['utilisateur'];
        
           
          
            if ( password_verify( $oldpassword, $user->password ) )
            {
               if ( $newpassword == $confpassword )
               {
                 
                 $newpassword = password_hash( $newpassword, PASSWORD_BCRYPT );
                 $this->model->updatepass( $user->username, $newpassword );
               }  
               else
                 echo "<script>alert(\"mot non egaux\")</script>";  
           }
           else
               echo "<script>alert(\"votre mot de passe est eroné \")</script>";
          
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
<style type="text/css">
        .btn{
                background-color: #2a2185;
                color: white;
        }                   
      </style>  
        
                    
        <form method="post" class="custom-centered" style="margin-top: 90px;">
        <div class="container">
                <div class="row g-1 align-items-center" >
                        <div class="col-5">
                        <label for="txtintitulé" id="lblintitulé" name="lblintitulé" class="form-label" > Ancien mot de passe:  </label>
                            <input class="form-control" type="password" name="oldpassword" placeholder="Ancien Mot de passe">
                            <label for="txtintitulé" id="lblintitulé" name="lblintitulé" class="form-label" > Nouveau Mot de passe : </label>
                          <input class="form-control" type="password" name="newpassword" placeholder="Nouveau Mot de passe">
                          </div>
                        <div class="col-2"> 
                        </div>
                        <div class="col-5"> 
                        <label for="txtintitulé" id="lblintitulé" name="lblintitulé" class="form-label" > Confirmer Mot de passe : </label>
                          <input class="form-control" type="password" name="confpassword" placeholder="Confirmer Mot de passe">
                        </div>
                        <div class="col-12">
                            <button class="btn" type="submit" name="save">Enregistrer</button>
                            </div>
                </div>  
        </div>          
                    </form>
                </div>
            </div>
        </div>
