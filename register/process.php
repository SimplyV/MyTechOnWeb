<?php	

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
		header('Location: '.$router->generate('register').'');		
	}		
	if($allowregister){

		$donnees = $bdd->query('SELECT * FROM users');
		while($reponse = $donnees->fetch()){
			$profilenick[] = $reponse['nickname'];
			$profilemail[] = $reponse['email'];
		}
	
		if(in_array($_POST['pseudo'], $profilenick) || in_array($_POST['email'], $profilemail)){
			header('Location: '.$router->generate('register').'');
			die;
		}

		$req = $bdd->prepare('INSERT INTO users (firstname, lastname, email, password, nickname, avatar) 
		VALUES (:firstname, :lastname, :email, :password, :nickname, :avatar)');

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password =  $_POST['password'];
		$nickname = $_POST['pseudo'];
		$avatar = 'avatar.png';

		$req->bindParam(':firstname', $firstname);
		$req->bindParam(':lastname', $lastname);
		$req->bindParam(':email', $email);
		$req->bindParam(':password', $password);
		$req->bindParam(':nickname', $nickname);
		$req->bindParam(':avatar', $avatar);
		$req->execute(); 

		$lastId = $bdd->lastInsertId();

		mkdir('assets/img/user_images/'.$lastId.'');

		$_SESSION['passwordconferror'] = false;
		header('Location: '.$router->generate('login').'');
	}
	else{
		header('Location: '.$router->generate('register').'');
	}
?>