<?php
require_once __DIR__ . "/ConnectionFactory.php";
require_once __DIR__ . "/../../model/Cliente.php";

class ClienteDAO {
   function cadastrar(Cliente $cliente) {
      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         $cadastro = $con->prepare("SELECT * FROM clientes WHERE dados = ?");
         $cadastro->bindValue(1,$cliente->getDado());

         $cadastro->execute();

         if($cadastro->rowCount() > 0) {
            $validade = array('alert' => 'alert-warning', 'msg' => 'Cliente já cadastrado!');
         } else {
            $cadastro = $con->prepare("INSERT INTO clientes(usuario,nomeCliente,dados,cidade,cep,estado,endereco,numero,bairro) VALUES(?,?,?,?,?,?,?,?,?)");

            $cadastro->bindValue(1,$cliente->getUsuario());
            $cadastro->bindValue(2,$cliente->getNome());
            $cadastro->bindValue(3,$cliente->getDado());
            $cadastro->bindValue(4,$cliente->getCidade());
            $cadastro->bindValue(5,$cliente->getCep());
            $cadastro->bindValue(6,$cliente->getEstado());
            $cadastro->bindValue(7,$cliente->getEndereco());
            $cadastro->bindValue(8,$cliente->getNumero());
            $cadastro->bindValue(9,$cliente->getBairro());

            $cadastro->execute();

            if($cadastro->rowCount() > 0) {
               $validade = array('alert' => 'alert-success', 'msg' => 'Cliente Cadastrado com Sucesso!');
            } else {
               $validade = array('alert' => 'alert-danger', 'msg' => 'Cliente não pode ser Cadastrado!');
            }
         }
         return json_encode($validade);
      } catch (Exception $ex) {
         die($ex->getMessage());
      }
   }
   function listar() {
      $idCliente = func_get_args();
      $id = implode("", $idCliente[0]);

      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         if(empty($id)) {
            $cadastro = $con->prepare("SELECT * FROM clientes");
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

         $cadastro = $con->prepare("UPDATE clientes SET usuario = ?,nomeCliente = ?,dados = ?,cidade = ?,cep = ?,estado = ?,endereco = ?,numero = ?,bairro = ? WHERE idCliente = ".$idCliente);

         $cadastro->bindValue(1,$cliente->getUsuario());
         $cadastro->bindValue(2,$cliente->getNome());
         $cadastro->bindValue(3,$cliente->getDado());
         $cadastro->bindValue(4,$cliente->getCidade());
         $cadastro->bindValue(5,$cliente->getCep());
         $cadastro->bindValue(6,$cliente->getEstado());
         $cadastro->bindValue(7,$cliente->getEndereco());
         $cadastro->bindValue(8,$cliente->getNumero());
         $cadastro->bindValue(9,$cliente->getBairro());

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
