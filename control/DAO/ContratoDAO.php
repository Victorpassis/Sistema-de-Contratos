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
                  print_r($cadastro->errorInfo());
               }
            }

            $validade = array('alert' => 'alert-success', 'msg' => 'Cliente Cadastrado com Sucesso!');
         } else {
            $validade = array('alert' => 'alert-danger', 'msg' => 'Cliente não pode ser Cadastrado!');
            //print_r($cadastro->errorInfo());
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
               "SELECT co.*, cl.nomeCliente, pr.nomeProduto FROM contratos co
               INNER JOIN clientes cl ON co.idCliente = cl.idCliente
               INNER JOIN listaprodutos lp ON lp.idContrato = co.idContrato
               INNER JOIN produtos pr ON pr.idProduto = lp.idProduto"
            );
         } else {
            $cadastro = $con->prepare("SELECT * FROM clientes WHERE idCliente = ?");
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
   function editar(Cliente $cliente, $idCliente) {
      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         $cadastro = $con->prepare("UPDATE clientes SET nome = ?,dados = ?,cidade = ?,cep = ?,estado = ?,endereco = ?,numero = ?,bairro = ? WHERE idCliente = ".$idCliente);

         $cadastro->bindValue(1,$cliente->getNome());
         $cadastro->bindValue(2,$cliente->getDado());
         $cadastro->bindValue(3,$cliente->getCidade());
         $cadastro->bindValue(4,$cliente->getCep());
         $cadastro->bindValue(5,$cliente->getEstado());
         $cadastro->bindValue(6,$cliente->getEndereco());
         $cadastro->bindValue(7,$cliente->getNumero());
         $cadastro->bindValue(8,$cliente->getBairro());

         $cadastro->execute();

         if($cadastro->rowCount() > 0) {
            $validade = array('alert' => 'alert-success', 'msg' => 'Cliente Alterado com Sucesso!');
         } else {
            $validade = array('alert' => 'alert-danger', 'msg' => 'Cliente não pode ser Alterado!');
         }

         return json_encode($validade);
      } catch (Exception $ex) {
         die($ex->getMessage());
      }
   }
   function excluir($idCliente) {
      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         $cadastro = $con->prepare("DELETE FROM clientes WHERE idCliente = ?");
         $cadastro->bindValue(1,$idCliente);

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
