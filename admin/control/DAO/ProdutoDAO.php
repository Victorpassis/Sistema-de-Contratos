<?php
require_once __DIR__ . "/ConnectionFactory.php";
require_once __DIR__ . "/../../model/Produto.php";

class ProdutoDAO {
   function cadastrar(Produto $produto) {
      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         $cadastro = $con->prepare("INSERT INTO produtos(nomeProduto,descricao) VALUES(?,?)");

         $cadastro->bindValue(1,$produto->getNome());
         $cadastro->bindValue(2,$produto->getDescricao());
         //$cadastro->bindValue(3,$produto->getValor());

         $cadastro->execute();

         if($cadastro->rowCount() > 0) {
            $validade = array('alert' => 'alert-success', 'msg' => 'Produto Cadastrado com Sucesso!');
         } else {
            $validade = array('alert' => 'alert-danger', 'msg' => 'Produto não pode ser Cadastrado!');
         }

         return json_encode($validade);
      } catch (Exception $ex) {
         die($ex->getMessage());
      }
   }
   function listar() {
      $idProduto = func_get_args();
      $id = implode("", $idProduto[0]);

      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         if(empty($id)) {
            $cadastro = $con->prepare("SELECT * FROM produtos");
         } else {
            $cadastro = $con->prepare("SELECT * FROM produtos WHERE idProduto = ?");
            $cadastro->bindValue(1,$id);
         }
         $cadastro->execute();

         if($cadastro->rowCount() > 0) {
            return $cadastro;
         } else {
            $validade = array('alert' => 'alert-warning', 'msg' => 'Produto já cadastrado!');
         }
      } catch (Exception $ex) {
         die($ex->getMessage());
      }
   }
   function editar(Produto $produto, $idProduto) {
      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         $cadastro = $con->prepare("UPDATE produtos SET nomeProduto = ?,descricao = ? WHERE idProduto = ".$idProduto);

         $cadastro->bindValue(1,$produto->getNome());
         //$cadastro->bindValue(2,$produto->getValor());
         $cadastro->bindValue(2,$produto->getDescricao());

         $cadastro->execute();

         if($cadastro->rowCount() > 0) {
            $validade = array('alert' => 'alert-success', 'msg' => 'Produto Alterado com Sucesso!');
         } else {
            $validade = array('alert' => 'alert-danger', 'msg' => 'Produto não pode ser Alterado!');
         }

         return json_encode($validade);
      } catch (Exception $ex) {
         die($ex->getMessage());
      }
   }
   function excluir($idProduto) {
      try {
         $conexao = new ConnectionFactory();
         $con = $conexao->newConnection();

         $cadastro = $con->prepare("DELETE FROM produtos WHERE idProduto = ?");
         $cadastro->bindValue(1,$idProduto);

         $cadastro->execute();

         if($cadastro->rowCount() > 0) {
            $validade = array('alert' => 'alert-success', 'msg' => 'Produto exclido com Sucesso!');
         } else {
            $validade = array('alert' => 'alert-danger', 'msg' => 'Produto não pode ser Excluido!');
         }

         return json_encode($validade);
      } catch (Exception $ex) {
         die($ex->getMessage());
      }
   }
}
