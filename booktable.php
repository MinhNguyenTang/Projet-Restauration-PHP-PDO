<?php

$date = $_POST['date'];
$time = $_POST['time'];
$nb_person = $_POST['nb_person'];

if(empty($_POST['date']) || empty($_POST['time']) || empty($_POST['nb_person']))
{
  echo '<body onLoad="alert(\'Veuillez remplir les champs du formulaire !\')">';
}
else
{
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=odp_site;charset=utf8', 'root', '');
  } catch(PDOException $e) {
    die('Echec lors de la connexion :' .$e->getMessage());
  }
  $req = $bdd->prepare('SELECT * FROM booktable INNER JOIN compte on booktable_id=id WHERE id=:id');
  $req->execute(array(
    'date' => $date,
    'time' => $time,
    'nb_person' => $nb_person
  ));
  $data = $req->fetch();

  if($data)
  {
    echo '<body onLoad="alert(\'Erreur ! Réservation déjà prise !\')">';
  }
  else
  {
    $req = $bdd->prepare('INSERT INTO booktable (booktable_date, booktable_time, nb_person) VALUES (:booktable_date, :booktable_time, :nb_person)');
    $req->execute(array(
      'date' => $date,
      'time' => $time,
      'nb_person' => $nb_person
    ));
    echo '<body onLoad="alert(\'Réservation réussie !\')">';
  }
}


 ?>
