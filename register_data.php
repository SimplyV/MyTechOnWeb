<?php
	
	session_start();

	include 'functions.php';$
	include 'template/parts/db.php';

	if($_POST['password'] == $_POST['passwordconf']){
		$_SESSION['pseudo'] = $_POST['pseudo'];
		$_SESSION['lastname'] = $_POST['lastname'];
		$_SESSION['firstname'] = $_POST['firstname'];
		$_SESSION['mail'] = $_POST['email'];
		$allowregister = true;
	} 
	else{
		$allowregister = false;
		$_SESSION['passwordconferror'] = true;
		header('Location: register');		
	}		
	if($allowregister){
		$req = $bdd->prepare('INSERT INTO users(firstname, lastname, pseudo, email, passworduser) VALUES(:firstname, :lastname, :pseudo, :email, :passworduser)');
		$req->execute(array(
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'pseudo' => $_POST['pseudo'],
			'email' => $_POST['email'],
			'passworduser' => $_POST['password']
		)); 

		$_SESSION['passwordconferror'] = false;
		header('Location: login');
	}
?>