<?php
class logOutCtrl {
   public function sair() {
      unset($_SESSION['usuario']);
      unset($_SESSION['senha']);
      header('Location: index.php?&exit=1');
   }
}
