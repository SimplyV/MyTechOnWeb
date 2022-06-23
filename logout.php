<?php

<<<<<<< HEAD
  session_destroy();
  header('Location: '.$router->generate('home').'');
=======
  session_start();
  session_destroy();
  header('Location: accueil');
>>>>>>> b55c60ca3f618f598e4c38a12fa0493f433c238f
  
?>