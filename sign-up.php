<?php

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$checkpass = $_POST['checkpass'];

$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);


if($_POST['pass'] != $_POST['checkpass'])
{
  echo '<body onLoad="alert(\'Veuillez saisir le même mot de passe !\')">';
  echo '<meta http-equiv="refresh" content="0;URL=sign-up_form.php">';
}

if(empty($_POST['name']) or empty($_POST['lastname']) or empty($_POST['email']) or empty($_POST['pass']) or empty($_POST['checkpass']))
{
  echo '<body onLoad="alert(\'Veuillez remplir les champs du formulaire !\')">';
  echo '<meta http-equiv="refresh" content="0;URL=sign-up_form.php">';
}
else
{
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=odp_site;charset=utf8', 'root', '');
  } catch (PDOException $e) {
    die('Echec lors de la connexion :' .$e->getMessage());
  }
  $req = $bdd->prepare('SELECT * FROM compte WHERE email=:email');
  $req->execute(array(
    'email' => $email,
  ));
  $data = $req->fetch();

  if($data)
  {
    echo '<body onLoad="alert(\'Utilisateur existant ! Veuillez réessayer !\')">';
    echo '<meta http-equiv="refresh" content="0;URL=sign-up.php">';
  }

  else
  {
    $req = $bdd->prepare('INSERT INTO compte (name, lastname, email, pass, signup_date) VALUES (:name, :lastname, :email, :pass, CURDATE())');
    $req->execute(array(
      'name' => $name,
      'lastname' => $lastname,
      'email' => $email,
      'pass' => $pass_hache,
    ));
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['email'] = $email;

    echo '<body onLoad="alert(\'Votre inscription a bien été envoyée !\')">';
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
  }
}



 ?>
