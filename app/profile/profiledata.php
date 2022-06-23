<?php

	$_SESSION['email'] = $_POST['email']; 

	$donnees = $bdd->prepare('SELECT * FROM users WHERE NOT id_user=:user_id');
	$donnees->execute([':user_id' => $_SESSION['id_user']]);
	while($reponse = $donnees->fetch()){
		$profilenick[] = $reponse['nickname'];
		$profilemail[] = $reponse['email'];
	}

	if(in_array($_POST['pseudo'], $profilenick)){
		header('Location: '.$router->generate('profile').'');
		die;
	}
	if(in_array($_POST['email'], $profilemail)){
		header('Location: '.$router->generate('profile').'');
		die;
	}
	if(!empty($_FILES['image']['name'])){
		$avatar = upload_image_profile($_FILES['image'], 'assets/img/user_images/',['jpg', 'jpeg', 'png'], $_SESSION['id_user'], $bdd);
	}
	else{
		$avatar = 'avatar.png';
	}

	if(check($_SESSION['id_user'])){
		$rep = $bdd->prepare('UPDATE users SET lastname=:nom, firstname=:prenom, email=:mail, nickname=:nickname, avatar=:avatar WHERE id_user=:id_user');

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$nickname = $_POST['pseudo'];

		$rep->bindParam(':id_user', $_SESSION['id_user']);
		$rep->bindParam(':nom', $lastname);
		$rep->bindParam(':prenom', $firstname);
		$rep->bindParam(':mail', $email);
		$rep->bindParam(':nickname', $nickname);
		$rep->bindParam(':avatar', $avatar);
		$rep->execute(); 
	}


	header('Location: '.$router->generate('profile').'');
?>