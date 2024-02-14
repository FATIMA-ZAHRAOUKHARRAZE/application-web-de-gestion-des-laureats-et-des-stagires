<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
        $email=$_POST["txtusername"];
        $sql="select * from users where username =?";
		$model=new UserModel();
		$res=$model->requete( $sql,[$email]);
		$user=$model->getOne($res);
        if ($user )
        {
            echo "se compte est deja pris";
        }
        else{
           
            $password =password_hash( $_POST['txtpassword'], PASSWORD_BCRYPT );
            $username=$_POST['txtusername'];
            $role=$_POST["txtrole"];
            $values=[$username,$password, $role];
            $m=new UserModel();
            $m->insertuser($values);
            header('Location:index.php?page=user/profil');
        }
       
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Input Focus Effects</title>
    <style>
        * {
  box-sizing: border-box;
        }

body {
  margin: 0;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  
}

/* Global Styles */
.container {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  padding: 1rem;
  gap: 1.5rem;
}

.input-group {
  position: relative;
  margin: 1.5rem 0;
}

input {
  border: none;
  outline: none;
  padding: 0.75rem;
  font-size: 1.5rem;
  width: 100%;
}

.overflow-hidden {
  overflow: hidden;
}

/* effect 1 */
.effect-1 {
  border-bottom: 2px solid #ccc;
  padding-left: 0;
}

.effect-1 + .border {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0%;
  height: 1px;
  background-color: blue;
  transition: 0.5s;
}

.effect-1:focus + .border {
  width: 100%;
}

/* effect 2 */
.effect-2 {
  border-bottom: 2px solid #ccc;
  padding-left: 0;
}

.effect-2 + .border {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 0%;
  height: 2px;
  background-color: #4caf50;
  transition: 0.5s;
}

.effect-2:focus + .border {
  width: 100%;
}
/* effect 3 */
.effect-3 {
  border-bottom: 2px solid #ccc;
  padding-left: 0;
}

.effect-3 + .border {
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%) scale(0);
  width: 100%;
  height: 2px;
  background-color: #4caf50;
  transition: 0.5s;
}

.effect-3:focus + .border {
  transform: translateX(-50%) scale(1);
}

/* Effect 4 */
.effect-4 {
  border: 2px solid #ccc;
  border-radius: 0.25rem;
}

.effect-4 + label {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 0.75rem;
  color: #ccc;
  padding: 0 0.125rem;
  transition: 0.4s;
}

.effect-4:focus {
  border-color: #4caf50;
}

.effect-4:focus + label,
.effect-4:not(:placeholder-shown) + label {
  top: 0;
  transition: 0.3s;
  background-color: #fff;
  color: #4caf50;
}

/* Effect 5 */
.effect-5 {
  border-bottom: 2px solid #ccc;
  padding-left: 0;
}

.effect-5 + label {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  color: #ccc;
  transition: 0.4s;
}

.effect-5:focus {
  border-color: #4caf50;
}

.effect-5:focus + label,
.effect-5:not(:placeholder-shown) + label {
  top: 0;
  transition: 0.3s;
  background-color: #fff;
  color: #4caf50;
}

/* Effect 6 */
.effect-6 {
  border: 2px solid #ccc;
  border-radius: 0.25rem;
  background-color: transparent;
}

.effect-6 + .bg {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 0%;
  background-color: #efefef;
  z-index: -1;
  border-top-right-radius: 3rem;
  border-bottom-right-radius: 3rem;
  transition: 0.5s;
}

.effect-6:focus + .bg {
  width: 120%;
}

/* Effect 7 */
.effect-7 {
  border: 2px solid #ccc;
  border-radius: 0.25rem;
  background: url("./assets/search-icon.png") no-repeat 5px;
  background-size: 2.1875rem;
  padding-left: 45px;
}

.effect-7:focus {
  border-color: #4caf50;
  background-image: url("./assets/search-icon2.png");
}
    </style>
  </head>
  <body>
    <div class="container">
      <div class="input-group">
        <input
          type="text"
          name=""
          id=""
          class="effect-1"
          placeholder="Effect 1"
        />
        <span class="border"></span>
      </div>
      <div class="input-group">
        <input
          type="text"
          name=""
          id=""
          class="effect-2"
          placeholder="Effect 2"
        />
        <span class="border"></span>
      </div>
      <div class="input-group">
        <input
          type="text"
          name=""
          id=""
          class="effect-3"
          placeholder="Effect 3"
        />
        <span class="border"></span>
      </div>

      <div class="input-group">
        <input type="text" id="effect4" class="effect-4" placeholder=" " />
        <label for="effect4">Effect 4</label>
      </div>

      <div class="input-group">
        <input type="text" id="effect5" class="effect-5" placeholder=" " />
        <label for="effect5">Effect 5</label>
      </div>

      <div class="input-group overflow-hidden">
        <input type="text" name="" id="" class="effect-6" />
        <span class="bg"></span>
      </div>

      <div class="input-group">
        <input type="text" name="" id="" class="effect-7" />
      </div>
    </div>
  </body>
</html>