<?php
   session_start();

   // destroi a sessão e vai para a página principal
   if(session_destroy()) {
      header("Location: index.php");
   }
?>
