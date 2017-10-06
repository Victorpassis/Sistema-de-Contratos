<?php
require_once __DIR__ . "/../../control/ProdutoCtrl.php";

$_SERVER["REQUEST_METHOD"] == "POST";

//class NovoProduto {
   //function __construct() {
      $produtoCtrl = new ProdutoCtrl();

      $nome = isset($_POST["nome"]) ? trim($_POST["nome"]) : "";
      //$valor = isset($_POST["valor"]) ? trim($_POST["valor"]) : "";
      $descricao = isset($_POST["descricao"]) ? trim($_POST["descricao"]) : "";

      switch ($_POST["function"]) {
         case 'cadastrarProduto':
            echo $produtoCtrl->cadastraProduto($nome, $descricao);
            break;
         case 'editarProduto':
            echo $produtoCtrl->editarProduto($nome, $descricao, $_POST["idProduto"]);
            break;
         case 'excluirProduto':
            echo $produtoCtrl->excluirProduto($_POST["id"]);
            break;
         case 'listarProduto':
            $cadastro = $produtoCtrl->listarProduto($_POST["id"]);
            echo json_encode($cadastro->fetch(PDO::FETCH_OBJ));
            break;
         default:
         break;
      }
      die();

   //}
//}
?>
