<?php
require_once __DIR__ . "/ConnectionFactory.php";
require_once __DIR__ . "/../../model/Contrato.php";

class ContratoDAO {
   function cadastrar(Contrato $contrato) {
      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         $cadastro = $con->prepare("INSERT INTO contratos(valor,valorExtenco,dataAtual,data_inicio,data_fim,num_parcelas,dataVencimento,idCliente) VALUES(?,?,?,?,?,?,?,?)");

         $cadastro->bindValue(1,$contrato->getValor());
         $cadastro->bindValue(2,$contrato->getValorExtenco());
         $cadastro->bindValue(3,$contrato->getDataAtual());
         $cadastro->bindValue(4,$contrato->getDataInicio());
         $cadastro->bindValue(5,$contrato->getDataFinal());
         $cadastro->bindValue(6,$contrato->getNumParcelas());
         $cadastro->bindValue(7,$contrato->getDataVencimento());
         $cadastro->bindValue(8,$contrato->getCliente());

         $cadastro->execute();

         if($cadastro->rowCount() > 0) {
            $contratoId = $con->lastInsertId("idContrato");

            foreach (($contrato->getListaProdutos()) as $produto) {
               $cadastro = $con->prepare("INSERT INTO listaprodutos(idContrato,idProduto) VALUES(?,?)");

               $cadastro->bindValue(1,$contratoId);
               $cadastro->bindValue(2,$produto);

               $cadastro->execute();

               if($cadastro->rowCount() > 0) {

               } else {
                  $validade = array('alert' => 'alert-danger', 'msg' => $cadastro->errorInfo());
               }
            }

            $validade = array('alert' => 'alert-success', 'msg' => 'Contrato Cadastrado com Sucesso!');
         } else {
            $validade = array('alert' => 'alert-danger', 'msg' => $cadastro->errorInfo());
         }

         return json_encode($validade);
      } catch (Exception $ex) {
         die($ex->getMessage());
      }
   }
   function listar() {
      $idContrato = func_get_args();
      $id = implode("", $idContrato[0]);

      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         if(empty($id)) {
            $cadastro = $con->prepare(
               "SELECT co.*, cl.nomeCliente, (
                  SELECT GROUP_CONCAT(pr.nomeProduto SEPARATOR ',')
                  FROM produtos pr, listaprodutos lp
                  WHERE lp.idProduto = pr.idProduto AND
                  co.idContrato = lp.idContrato AND
                  co.idCliente = cl.idCliente
                  ) AS produtos FROM contratos AS co
               INNER JOIN clientes cl ON co.idCliente = cl.idCliente"
            );
         } else {
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
               WHERE co.idContrato = ?"
            );
            $cadastro->bindValue(1,$id);
         }
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
   /*function editar(Cliente $cliente, $idContrato) {
      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         $cadastro = $con->prepare("UPDATE contratos SET valor = ?,valorExtenco = ?,dataAtual = ?,data_inicio = ?,data_fim = ?,num_parcelas = ?,dataVencimento = ?,idCliente = ? WHERE idCliente = ".$idContrato);

         $cadastro->bindValue(1,$contrato->getValor());
         $cadastro->bindValue(2,$contrato->getValorExtenco());
         $cadastro->bindValue(3,$contrato->getDataAtual());
         $cadastro->bindValue(4,$contrato->getDataInicio());
         $cadastro->bindValue(5,$contrato->getDataFinal());
         $cadastro->bindValue(6,$contrato->getNumParcelas());
         $cadastro->bindValue(7,$contrato->getDataVencimento());
         $cadastro->bindValue(8,$contrato->getCliente());

         $cadastro->execute();

         if($cadastro->rowCount() > 0) {
            $contratoId = $con->lastInsertId("idContrato");

            foreach (($contrato->getListaProdutos()) as $produto) {
               $cadastro = $con->prepare("UPDATE listaprodutos SET (idContrato,idProduto) VALUES(?,?)");

               $cadastro->bindValue(1,$contratoId);
               $cadastro->bindValue(2,$produto);

               $cadastro->execute();

               if($cadastro->rowCount() > 0) {

               } else {
                  print_r($cadastro->errorInfo());
               }
            }
            $validade = array('alert' => 'alert-success', 'msg' => 'Cliente Alterado com Sucesso!');
         } else {
            $validade = array('alert' => 'alert-danger', 'msg' => 'Cliente não pode ser Alterado!');
         }

         return json_encode($validade);
      } catch (Exception $ex) {
         die($ex->getMessage());
      }
   }*/
   function excluir($idContrato) {
      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         $cadastro = $con->prepare("DELETE FROM contratos WHERE idContrato = ?");
         $cadastro->bindValue(1,$idContrato);

         $cadastro->execute();

         if($cadastro->rowCount() > 0) {
            $validade = array('alert' => 'alert-success', 'msg' => 'Cliente exclido com Sucesso!');
         } else {
            $validade = array('alert' => 'alert-danger', 'msg' => 'Cliente não pode ser Excluido!');
         }

         return json_encode($validade);
      } catch (Exception $ex) {
         die($ex->getMessage());
      }
   }
}
