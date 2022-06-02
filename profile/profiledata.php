<?php

	$_SESSION['email'] = $_POST['email']; 

	$donnees = $bdd->prepare('SELECT * FROM users WHERE NOT id_user=:user_id');
	$donnees->prepare([':user_id' => $_SESSION['id_user']]);
	while($reponse = $donnees->fetch()){
		$profilenick[] = $reponse['nickname'];
		$profilemail[] = $reponse['email'];
	}


	if(in_array($_POST['pseudo'], $profilenick)){
		header('Location: profile');
		die;
	}
	if(in_array($_POST['email'], $profilemail)){
		header('Location: profile');
		die;
	}


	if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0){  
		if ($_FILES['image']['size'] <= 1000000000000000){
			$infosfichier = pathinfo($_FILES['image']['name']);
			$extension_upload = $infosfichier['extension'];
			$extensions_autorisees = array('jpg', 'jpeg', 'png');
			if (in_array($extension_upload, $extensions_autorisees)){
					move_uploaded_file($_FILES['image']['tmp_name'], 'assets/img/user_images/'.$_SESSION['id_user'].'/' . basename($_FILES['image']['name'])); 
					$avatar = $_FILES['image']['name'];
			}
		}
	}	else{
		if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])){
			$donnees = $bdd->query('SELECT avatar FROM users WHERE id_user='.$_SESSION['id_user'].'');
			while($reponse = $donnees->fetch()){
			$avatar = $reponse['avatar'];
			}
		}
	}

	if(check($_SESSION['id_user'])){
		$rep = $bdd->prepare('UPDATE users SET lastname=:nom, firstname=:prenom, email=:mail, street=:street, street_number=:streetnumber, zipcode=:zipcode, city=:city, commune=:commune, nickname=:nickname, avatar=:avatar WHERE id_user=:id_user');

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$street = $_POST['street'];
		$streetnumber = $_POST['streetnumber'];
		$zipcode = $_POST['zipcode'];
		$city = $_POST['city'];
		$commune = $_POST['commune'];
		$nickname = $_POST['pseudo'];

		$rep->bindParam(':id_user', $_SESSION['id_user']);
		$rep->bindParam(':nom', $lastname);
		$rep->bindParam(':prenom', $firstname);
		$rep->bindParam(':mail', $email);
		$rep->bindParam(':street', $street);
		$rep->bindParam(':streetnumber', $streetnumber);
		$rep->bindParam(':zipcode', $zipcode);
		$rep->bindParam(':city', $city);
		$rep->bindParam(':commune', $commune);
		$rep->bindParam(':nickname', $nickname);
		$rep->bindParam(':avatar', $avatar);
		$rep->execute(); 
	}
	


	header('Location: profile');
?>