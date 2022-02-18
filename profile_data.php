<?php

  session_start();

  try{
      $bdd = new PDO('mysql:host=localhost;dbname=MyTechOnWeb;charset=utf8', 'root', 'root');
    }
	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}

	$_SESSION['email'] = $_POST['email']; 

	$rep = $bdd->prepare('UPDATE users SET lastname = :nom, firstname= :prenom, email = :mail, user_street = :user_street, user_street_number = :user_streetnumber, user_zipcode = :user_zipcode, user_city = :user_city, user_commune = :user_commune  WHERE id_user = :id_user');
	$rep->execute(array('id_user'=>$_SESSION['id_user'], 'nom' => $_POST['lastname'], 'prenom' => $_POST['firstname'], 'mail' => $_POST['email'], 'user_street' => $_POST['street'], 'user_streetnumber' => $_POST['streetnumber'], 'user_zipcode' => $_POST['zipcode'], 'user_city' => $_POST['city'], 'user_commune' => $_POST['commune'] ));

	header('Location: profile.php');
?>