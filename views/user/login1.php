<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_POST['email']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="select * from users where username =?";
        $model=new UserModel();
        $res=$model->requete( $sql,[$email]);
        $user=$model->getOne($res);
		
        if ($user )
        {
			if($user->valide==1)
			{
				if ($user && password_verify($password, $user->password))
				{
					
					$_SESSION['logged']=true;
					$_SESSION['photo']=$user->photo;
					$_SESSION['utilisateur']=$user;
					$_SESSION['username']=$user->username;
					$_SESSION['password']=$user->password;
					$_SESSION['role']=$user->role;
					
					header('Location: index.php?page=user/profil');
					
				}
				else
				{
					echo  "<script>alert(\"Impossible de se connecter\")</script>";
				}
			}
			else{
				echo "<script>alert(\"votre compte n'est pas active\")</script>";
			}
            
        }
        else
        {
            echo "<script>alert(\"Impossible de se connecter\")</script>";
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
    <title>Document</title>
    
<style>
  .login {
  min-height: 100vh;
}

.bg-image {
  background-image: url("views/user/img/page.jpg");
  background-size: cover;
  background-position: center;
}

.login-heading {
  font-weight: 300;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}

</style>
  </head>
<body>
  <form method="post">
<div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">BienVenue </h3>

              <!-- Sign In Form -->
              <form>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="email">
                  <label for="floatingInput">username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                  <label for="floatingPassword">Password</label>
                </div>

                

                <div class="d-grid">
                  <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Se Connecter</button>
                  <div class="text-center">
                    <a class="small" href="index.php?page=laureat/ajouter">Creer un compte </a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

</html>