<?php

  session_destroy();
  header('Location: '.$router->generate('home').'');
  
?>