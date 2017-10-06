<?php

session_start();
class logOutCtrl {
   public function sair() {
      unset($_SESSION['usuario']);
      unset($_SESSION['senha']);
      unset($_SESSION['id']);

      header('Location: index.php?&exit=1');
   }
}
