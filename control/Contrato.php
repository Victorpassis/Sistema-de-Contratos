<?php
require_once __DIR__ . "/DAO/ConnectionFactory.php";

class Contrato {
   function mostrarContrato() {
      $id = $_SESSION['id'];

      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         $cadastro = $con->prepare(
            "SELECT co.*, cl.*, (
               SELECT GROUP_CONCAT(pr.nomeProduto SEPARATOR ',')
               FROM produtos pr, listaprodutos lp
               WHERE lp.idProduto = pr.idProduto AND
               co.idContrato = lp.idContrato AND
               co.idCliente = cl.idCliente
            ) AS produtos, (
               SELECT GROUP_CONCAT(pr.descricao SEPARATOR ',')
               FROM produtos pr, listaprodutos lp
               WHERE lp.idProduto = pr.idProduto AND
               co.idContrato = lp.idContrato AND
               co.idCliente = cl.idCliente
            ) AS descricao FROM contratos AS co
            INNER JOIN clientes cl ON co.idCliente = cl.idCliente
            WHERE co.idCliente = ?"
         );
         $cadastro->bindValue(1,$id);

         $cadastro->execute();

         if($cadastro->rowCount() > 0) {
            return $cadastro;
         } else {
            $validade = array('alert' => 'alert-warning', 'msg' => 'Cliente já cadastrado!');
         }
      } catch (Exception $ex) {
         die($ex->getMessage());
      }
   }
}
