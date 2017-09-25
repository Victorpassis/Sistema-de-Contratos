<?php
   require_once "/../control/logOutCtrl.php";
   require_once "/../control/Security.php";

   Security::checkLogin();
   Security::checkPage();

   $lgCtrl = new logOutCtrl();
   $lgCtrl->sair();
