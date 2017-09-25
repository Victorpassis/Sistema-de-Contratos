<?php
abstract class Security {
   static function checkAccess() {
      if(!defined('access_permited')) {
         die('Direct access not permitted');
      }
   }
   static function checkLogin() {
      if( isset( $_SESSION['usuario']) &&  isset($_SESSION['senha'])) {
         return true;
      }  else {
         return false;
      }
   }
   static function checkPage() {
      if (!isset($_GET["option"])) {
         header('Location: ../index.php');
         exit;
      }
   }
}
