<?php
class logOutCtrl {
   public function sair() {
      unset($_SESSION['usuario']);
      unset($_SESSION['senha']);
      unset($_SESSION['nivel']);

      header('Location: index.php?&exit=1');
   }
}
