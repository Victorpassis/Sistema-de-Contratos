<?php
   header("Content-type: text/html; charset=utf-8");
   setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
   date_default_timezone_set('America/Sao_Paulo');

   session_start();
   define('access_permited', true);

   require_once "control/Security.php";

   Security::checkAccess();
?>
<!doctype html>
<html lang="pt_BR">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <title>Sistema de Contratos</title>
      <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png"/>

      <script src="https://use.fontawesome.com/6673ce07a1.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/pdf.css">

   </head>
   <body class="fixed-nav sticky-footer" id="page-top">

      <?php if (Security::checkLogin()) : ?>
         <header class="site-header">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
               <a class="navbar-brand" href="index.php" title="Sistema de Contratos"><img src="assets/images/Logo-1.gif" class="logo" width="50" alt="Sistema de Contratos"/></a>
               <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal" title="Sair">
                        <i class="fa fa-fw fa-sign-out"></i>Sair</a>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
         <div class="container">
            <?php require_once "inicial.php"; ?>
         </div>
      <?php else:
         require_once "login.php";
      endif; ?>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Sair do Sistema</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Tem certeza que deseja sair?
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
               <a class="btn btn-danger" href="logout.php">Sair</a>
            </div>
            </div>
         </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
      <script src="assets/js/main.js"></script>
      <script src="assets/js/form.js"></script>
   </body>
</html>
