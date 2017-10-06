<?php
   session_start();
   require_once  "DAO/ConnectionFactory.php";

   try {
      $connectionFactory = new connectionFactory();
      $conexao = $connectionFactory->newConnection();

      $cmdLogin = $conexao->prepare("Select * from clientes where usuario = ? AND dados = ?");
      $cmdLogin->bindParam(1, $_POST["usuario"]);
      $cmdLogin->bindParam(2, $_POST["senha"]);

      $cmdLogin->execute();

      if ($cmdLogin->rowCount()) {
         $cadastro = $cmdLogin->fetch(PDO::FETCH_OBJ);

         $_SESSION['usuario'] = $_POST["usuario"];
         $_SESSION['senha'] = $_POST["senha"];
         $_SESSION['id'] = $cadastro->idCliente;

         header('Location: ../index.php');
      } else {
         header('Location: ../index.php?&error=1');
      };
   } catch (Exception $ex) {
      print "Error!: " . $ex->getMessage() . "<br/>";
      die();
   }
