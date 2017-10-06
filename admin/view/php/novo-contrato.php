<?php
require_once __DIR__ . "/../../control/ContratoCtrl.php";

$_SERVER["REQUEST_METHOD"] == "POST";

//class NovoProduto {
   //function __construct() {
      $contratoCtrl = new ContratoCtrl();

      $listaProdutos = array();
      foreach ($_POST["produto"] as $produto) {
         array_push($listaProdutos, $produto);
      }
      $valor = isset($_POST["total"]) ? trim($_POST["total"]) : "";
      $valorExtenco = isset($_POST["descricaoTotal"]) ? trim($_POST["descricaoTotal"]) : "";
      $dataAtual = isset($_POST["dataAtual"]) ? trim($_POST["dataAtual"]) : "";
      $dataInicio = isset($_POST["dataInicio"]) ? trim($_POST["dataInicio"]) : "";
      $dataFinal = isset($_POST["dataFinal"]) ? trim($_POST["dataFinal"]) : "";
      $numParcelas = isset($_POST["numParcelas"]) ? trim($_POST["numParcelas"]) : "";
      $dataVencimento = isset($_POST["dataBoleto"]) ? trim($_POST["dataBoleto"]) : "";
      $cliente = isset($_POST["cliente"]) ? trim($_POST["cliente"]) : "";

      switch ($_POST["function"]) {
         case 'cadastrarContrato':
            echo $contratoCtrl->cadastraContrato($listaProdutos, $valor, $valorExtenco, $dataAtual, $dataInicio, $dataFinal, $numParcelas, $dataVencimento, $cliente);
            break;
         /*case 'editarContrato':
            echo $contratoCtrl->editarContrato($listaProdutos, $valor, $valorExtenco, $dataAtual, $dataInicio, $dataFinal, $numParcelas, $dataVencimento, $cliente, $_POST["idContrato"]);
            break;*/
         case 'excluirContrato':
            echo $contratoCtrl->excluirContrato($_POST["id"]);
            break;
         case 'listarContrato':
            $cadastro = $contratoCtrl->listarContrato($_POST["id"]);
            echo json_encode($cadastro->fetch(PDO::FETCH_OBJ));
            break;
         default:
         break;
      }
      die();

   //}
//}
?>
