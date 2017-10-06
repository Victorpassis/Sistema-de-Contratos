<?php
abstract class Security {
   static function checkAccess() {
      if(!defined('access_permited')) {
         die('Direct access not permitted');
      }
   }
   static function checkLogin() {
      if( isset( $_SESSION['usuario']) &&  isset($_SESSION['senha']) &&  isset($_SESSION['id'])) {
         return true;
      }  else {
         return false;
      }
   }
}
