<?php
if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
        
        $num=$_POST["txtnum"];
        $nom=$_POST["txtNom"];
        $prenom=$_POST["txtprenom"];
      
        $tel=$_POST['txttel'];
        $email=$_POST["txtemail"];
        $photo=$_POST['txtphoto'];
        $post=$_POST['txtpost'];
        $values=[$num,$nom, $prenom,$tel,$email,$photo,$post];
        
        $sql="select * from users where username =?";
		$model=new DirectionModel();
		$res=$model->requete( $sql,[$num]);
		$user=$model->getOne($res);
        if ($user)
        {
            echo "<script>alert(\"se compte est deja pris\")</script>";
        }
        else{
           
            $password =password_hash( $_POST['txtpassword'], PASSWORD_BCRYPT );
            $username=$_POST['txtnum'];
            $role=$_POST["txtrole"];
            $photo=$_POST['txtphoto'];
            $value=[$username,$password,$role,$photo];
            $m=new DirectionModel();
            $m->insertuser($value); 
            $m=new DirectionModel();
        $m->insertdirection($values);
            
        }
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
    <title>Ajouter Laureat</title>
    <style type="text/css">
        .btn{
            background-color: #2a2185;
            color: white;
        }                   
    </style>
</head>
<body>
<form method="post" class="custom-centered" style="margin-top:90px;">
    <div class="container">
        <div class="row g-1 align-items-center">
            <div class="col-5" style="margin-top:20px;">
            <label for="txtNom" id="lblnum" name="lblnum"  class="col-form-label">num:</label>
                    <input type="text"   id="txtnum"  class="form-control" placeholder="saisir le nom" name="txtnum">

                    <label for="txtNom" id="lblnom" name="lblnom"  class="col-form-label">nom:</label>
                    <input type="text"   id="txtNom"  class="form-control" placeholder="saisir le nom" name="txtNom">

                    <label for="txtprenom" id="lblprenom" name="lblprenom"class="col-form-label">prenom:</label>
                    <input type="text" class="form-control" name="txtprenom"  placeholder="saisir le Prenom">


                    <label for="txttel" id="lblteltel" name="lbl" class="form-label">telephone:</label>
                    <input type="tel" class="form-control" name="txttel"  placeholder="saisir le telephone">
                    
                              
            </div>    
             
            <div class="col-2"> 
            </div>
            <div class="col-5"> 
                

            <label for="txtemail" id="lblemail" name="lblemail"class="form-label">email:</label> 
                    <input type="email" class="form-control" name="txtemail" placeholder="saisir l'email">

                    
                    <label for="txtphoto" id="lblphoto" name="lblphoto"class="form-label">photo:</label> 
                    <input type="file" id="photo" class="form-control" name="txtphoto" placeholder="saisir l'image">
                    <label for="txtpassword" id="lblpassword" name="lblpassword" class="form-label">password:</label>
                    <input type="password" class="form-control" name="txtpassword"  placeholder="saisir le telephone">

                    

                    <label for="txtpost" id="lblpost" name="lblpost"class="form-label">post:</label> 
                    <input type="text" class="form-control" name="txtpost" placeholder="saisir le post"  >
                    <label for="txtrole" id="lblrole" name="lblrole"class="form-label">role:</label> 
                    <input type="text" class="form-control" name="txtrole" placeholder="saisir le role" value="direction" readonly >
            </div>
            <div class="col-12">
                    <button id="btajouter" data-toggle="tooltip" data-placement="top" title="Ajouter" name="btajouter" type="submit" class="btn"><i class="material-icons">add_box</i></button>
                  
            </div> 
        </div>  
    </div>  
</form>
</body>
</html>