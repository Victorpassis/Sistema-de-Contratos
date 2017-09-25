<?php
require_once __DIR__ . "/DAO/ProdutoDAO.php";
require_once __DIR__ . "/../model/Produto.php";

class ProdutoCtrl {
   function cadastraProduto($nome, $valor, $descricao) {
      $produtoDao = new ProdutoDAO();
      $produto = new Produto();

      $produto->setNome($nome);
      $produto->setValor($valor);
      $produto->setDescricao($descricao);

      return $produtoDao->cadastrar($produto);
   }
   function editarProduto($nome, $valor, $descricao, $idProduto) {
      $produtoDao = new ProdutoDAO();
      $produto = new Produto();

      $produto->setNome($nome);
      $produto->setValor($valor);
      $produto->setDescricao($descricao);

      return $produtoDao->editar($produto, $idProduto);

   }
   function excluirProduto($idProduto) {
      $produtoDao = new ProdutoDAO();

      return $produtoDao->excluir($idProduto);
   }
   function listarProduto() {
      $idProduto = func_get_args();
      $produtoDao = new ProdutoDAO();

      return $produtoDao->listar($idProduto);
   }
}
