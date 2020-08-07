<?php

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

if(empty($_POST['name']) or empty($_POST['email']) or empty($_POST['pass']))
{
  echo '<body onLoad="alert(\'Veuillez remplir les champs du formulaire !\')">';
  echo '<meta http-equiv="refresh" content="0;URL=login-ad_form.php">';
}
else
{
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=odp_site;charset=utf8', 'root', '');
  } catch(PDOException $e) {
    die('Echec lors de la connexion :' .$e->getMessage());
  }
  $req = $bdd->prepare('SELECT * FROM compte WHERE name=:name and email=:email');
  $req->execute(array(
    'name' => $name,
    'email' => $email
  ));
  $data = $req->fetch();

  $isPasswordCorrect = password_verify($_POST['pass'], $data['pass']);

  if(!$data)
  {
    echo '<body onLoad="alert(\'Mauvais identifiant ou mot de passe !\')">';
    echo '<meta http-equiv="refresh" content="0;URL=login-ad_form.php">';
  }
  else
  {
    if($isPasswordCorrect)
    {
      session_start();
      $_SESSION['id'] = $data['id'];
      $_SESSION['name'] = $data['name'];
      $_SESSION['email'] = $data['email'];
      echo '<body onLoad="alert(\'Connexion réussie ! Ravie de vous revoir !\')">';
      echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
    else
    {
      echo '<body onLoad="alert(\'Mauvais identifiant ou mot de passe !\')">';
      echo '<meta http-equiv="refresh" content="0;URL=login-ad_form.php">';
    }
  }
}
?>
