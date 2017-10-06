<?php
   session_start();
   require_once  "DAO/ConnectionFactory.php";

   try {
      $connectionFactory = new connectionFactory();
      $conexao = $connectionFactory->newConnection();

      $cmdLogin = $conexao->prepare("Select * from usuarios where usuario = ? AND senha = MD5(?)");
      $cmdLogin->bindParam(1, $_POST["usuario"]);
      $cmdLogin->bindParam(2, $_POST["senha"]);

      $cmdLogin->execute();

      if ($cmdLogin->rowCount()) {
         $nivel = $conexao->lastInsertId("nivel");

         $_SESSION['usuario'] = $_POST["usuario"];
         $_SESSION['senha'] = md5($_POST["senha"]);
         $_SESSION['nivel'] = $nivel;

         header('Location: ../index.php');
      } else {
         header('Location: ../index.php?&error=1');
      };
   } catch (Exception $ex) {
      print "Error!: " . $ex->getMessage() . "<br/>";
      die();
   }
