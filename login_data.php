<?php 

	session_start();

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=MyTechOnWeb;charset=utf8', 'root', 'root');
	}

	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
	
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

  $_SESSION['verify'] = $verify;
	
	if($verify == true){
		$donnees = $bdd->query('SELECT id_user FROM users WHERE email= \''.$_POST["email"].'\'');
		while ($reponse = $donnees->fetch()){
			$_SESSION['id_user'] = $reponse['id_user'];
		}
		header('Location: index.php');
		
	}
  else{
    header('Location: login.php');
  }


