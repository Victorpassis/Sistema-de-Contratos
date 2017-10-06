<?php
require_once __DIR__ . "/DAO/ConnectionFactory.php";
require_once __DIR__ . "/Security.php";

   Security::checkLogin();
   session_start();

   $id = $_SESSION['id'];

   try {
      $conexao = new ConnectionFactory();
      $con = $conexao->newConnection();

      $cadastro = $con->prepare("UPDATE contratos SET validado = '1' WHERE idCliente = ".$id);

      $cadastro->execute();

      print_r($cadastro->errorInfo());

      if($cadastro->rowCount() > 0) {
         return $cadastro;
      } else {
         $validade = array('alert' => 'alert-warning', 'msg' => 'Cliente já cadastrado!');
      }
   } catch (Exception $ex) {
      die($ex->getMessage());
   }
