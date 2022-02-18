<?php 
    session_start();

  try{
    $bdd = new PDO('mysql:host=localhost;dbname=MyTechOnWeb;charset=utf8', 'root', 'root');
  }

  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }
  $title = "Acceuil";
  // require 'routes.php';
?>

<?php include('template/parts/header.php'); ?>
<?php include('template/parts/navbar.php');?>



<?php include('template/parts/footer.php'); ?>