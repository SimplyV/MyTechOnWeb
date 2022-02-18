<?php
	
	session_start();

	if($_POST['password'] != $_POST['passwordconf']){
		header('Location: register.php');
		$_SESSION['passwordconferror'] = true;
	}
	else{
		$_SESSION['lastname'] = $_POST['lastname'];
		$_SESSION['firstname'] = $_POST['firstname'];
		$_SESSION['mail'] = $_POST['email'];

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=MyTechOnWeb;charset=utf8', 'root', 'root');
	}

	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}

	$bdd->exec('INSERT into users(firstname, lastname, email, password)VALUES(\''.$_SESSION['firstname'].'\',\''. $_SESSION['lastname'].'\', \''.$_SESSION['mail'].'\', \''.$_POST['password'].'\')');
	
	$_SESSION['passwordconferror'] = false;
	header('Location: index.php');
	
	}

	
?>