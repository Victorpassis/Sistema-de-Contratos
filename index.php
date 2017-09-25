<?php
   header("Content-type: text/html; charset=utf-8");

   session_start();
   define('access_permited', true);

   require_once "control/Security.php";
   require_once "model/Menu.php";
   Security::checkAccess();
   $pagina = "inicial.php";

   if (isset($_GET["option"])) $pagina = $_GET["option"]. ".php";
   if($pagina != "logout.php"):
?>
<!doctype html>
<html lang="pt_BR">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <title>Sistema de Contratos</title>
      <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png"/>

      <!-- bootstrap - fontawesome -->
      <script src="https://use.fontawesome.com/6673ce07a1.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

      <!-- Plugin CSS -->
      <link href="assets/css/plugins/dataTables.bootstrap4.css" rel="stylesheet">
      <link href="assets/css/plugins/multi-select.css" rel="stylesheet">

      <!-- CSS -->
      <link rel="stylesheet" href="assets/css/style.css">

   </head>
   <body class="fixed-nav sticky-footer" id="page-top">
      <?php
         if (Security::checkLogin()) require_once "header.php";
         endif;
         if (Security::checkLogin()) : ?>
            <div class="content-wrapper">
               <div class="container-fluid">
               <?php
                  if (file_exists('view/html/'.$pagina)) {
                     require_once 'view/html/'.$pagina;
                  } else {

                  }
               ?>
               </div>
            </div>
         <?php else:
            require_once "login.php";
         endif;
         ?>
      <a class="scroll-to-top rounded" href="#page-top">
         <i class="fa fa-angle-up"></i>
      </a>
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
               <a class="btn btn-danger" href="index.php?option=logout">Sair</a>
            </div>
            </div>
         </div>
      </div>
      <?php require_once "footer.php"; ?>

      <!-- Bootstrap - Jquery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

      <!-- Js -->
      <script src="assets/js/main.js"></script>
      <script src="assets/js/form.js"></script>

      <!-- Plugin JavaScript -->
      <script src="assets/js/plugins/jquery.dataTables.js"></script>
      <script src="assets/js/plugins/dataTables.bootstrap4.js"></script>
      <script src="assets/js/plugins/jquery.mask.min.js"></script>
      <script src="assets/js/plugins/jquery.multi-select.js"></script>
   </body>
</html>
