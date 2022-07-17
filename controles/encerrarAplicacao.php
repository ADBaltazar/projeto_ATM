<?php
    
  session_start();
    
    
  require_once "../controles/connect.php";

 
  unset($_SESSION['usuario_validado']);
  unset($_SESSION['senha_validado']);
  unset($_SESSION['modoAdmin']);

  header("location:../index.php"); 

?>