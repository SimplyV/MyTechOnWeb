<?php 

	session_start();

	include 'template/parts/db.php';
	
	$donnees = $bdd->query('SELECT email FROM users');


	$verify= null;
	while ($reponse = $donnees->fetch()){
		if ($_POST['email'] == $reponse['email']){
			$donnees = $bdd->query('SELECT passworduser FROM users WHERE email= \''.$reponse["email"].'\'');
			while ($reponse = $donnees->fetch()){
				if ($_POST['password'] == $reponse['passworduser'] ){
				$verify = true;
				}
				else{
				$verify = false;
				}
			}
		}
		else{
			$verify = false;
		}
	}

	$donnees = $bdd->query('SELECT firstname FROM users WHERE email= \''.$_POST["email"].'\'');
	while($reponse = $donnees->fetch()){
		$_SESSION['firstname'] = $reponse['firstname'];
	}



  $_SESSION['verify'] = $verify;
	
	if($verify == true){
		$donnes = $bdd->query('SELECT * FROM users WHERE email =\''.$_POST["email"].'\' ');
		while($reponse = $donnes->fetch()){
			$_SESSION['id_user'] = $reponse['id_user'];
			$_SESSION['lastname'] = $reponse['lastname'];
			$_SESSION['pseudo'] = $reponse['pseudo'];
			$_SESSION['email'] = $reponse['email'];
			$_SESSION['street'] = $reponse['user_street'];
			$_SESSION['street_number'] = $reponse['user_street_number'];
			$_SESSION['city'] = $reponse['user_city'];
			$_SESSION['commune'] = $reponse['user_commune'];
			$_SESSION['zipcode'] = $reponse['user_zipcode'];
		}
		header('Location: accueil');
		
	}
  else{
    header('Location: login');
  }


