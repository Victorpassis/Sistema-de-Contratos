<?php
   require_once __DIR__ . "/../../control/logOutCtrl.php";
   require_once __DIR__ . "/../../control/Security.php";

   Security::checkLogin();
   Security::checkPage();

   $lgCtrl = new logOutCtrl();
   $lgCtrl->sair();
