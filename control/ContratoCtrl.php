<?php
require_once __DIR__ . "/DAO/ContratoDAO.php";
require_once __DIR__ . "/../model/Contrato.php";

class ContratoCtrl {
   function cadastraContrato($listaProdutos, $valorExtenco, $valor, $dataAtual, $dataInicio, $dataFinal, $numParcelas, $dataVencimento, $cliente) {
      $contratoDao = new ContratoDAO();
      $contrato = new Contrato();

      $contrato->setListaProdutos($listaProdutos);
      $contrato->setValorExtenco($valorExtenco);
      $contrato->setValor($valor);
      $contrato->setDataAtual($dataAtual);
      $contrato->setDataInicio($dataInicio);
      $contrato->setDataFinal($dataFinal);
      $contrato->setNumParcelas($numParcelas);
      $contrato->setDataVencimento($dataVencimento);
      $contrato->setCliente($cliente);

      return $contratoDao->cadastrar($contrato);
   }
   /*function editarContrato($listaProdutos, $valorExtenco, $valor, $dataAtual, $dataInicio, $dataFinal, $numParcelas, $dataVencimento, $cliente, $idContrato) {
      $contratoDao = new ContratoDAO();
      $contrato = new Contrato();

      $contrato->setListaProdutos($listaProdutos);
      $contrato->setValorExtenco($valorExtenco);
      $contrato->setValor($valor);
      $contrato->setDataAtual($dataAtual);
      $contrato->setDataInicio($dataInicio);
      $contrato->setDataFinal($dataFinal);
      $contrato->setNumParcelas($numParcelas);
      $contrato->setDataVencimento($dataVencimento);
      $contrato->setCliente($cliente);

      return $contratoDao->editar($contrato, $idContrato);

   }*/
   function excluirContrato($idContrato) {
      $contratoDao = new ContratoDAO();

      return $contratoDao->excluir($idContrato);
   }
   function listarContrato() {
      $idContrato = func_get_args();
      $contratoDao = new ContratoDAO();

      return $contratoDao->listar($idContrato);
   }
}
