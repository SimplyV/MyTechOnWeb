<?php 

	$donnees = $bdd->query('SELECT email FROM users');


	$verify= null;
	while ($reponse = $donnees->fetch()){
		if ($_POST['email'] == $reponse['email']){
			$donnees = $bdd->query('SELECT password FROM users WHERE email= \''.$reponse["email"].'\'');
			while ($reponse = $donnees->fetch()){
				if ($_POST['password'] == $reponse['password'] ){
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
			$_SESSION['street'] = $reponse['street'];
			$_SESSION['street_number'] = $reponse['street_number'];
			$_SESSION['city'] = $reponse['city'];
			$_SESSION['commune'] = $reponse['commune'];
			$_SESSION['zipcode'] = $reponse['zipcode'];
		}
		header('Location: accueil');
		
	}
  else{
    header('Location: login');
  }


