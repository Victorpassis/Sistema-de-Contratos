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
   function editarContrato($nome, $dado, $cidade, $cep, $estado, $endereco, $numero, $bairro, $idCliente) {
      $contratoDao = new ContratoDAO();
      $cliente = new Contrato();

      $cliente->setNome($nome);
      $cliente->setDado($dado);
      $cliente->setCidade($cidade);
      $cliente->setCep($cep);
      $cliente->setEstado($estado);
      $cliente->setEndereco($endereco);
      $cliente->setNumero($numero);
      $cliente->setBairro($bairro);

      return $clienteDao->editar($cliente, $idCliente);

   }
   function excluirContrato($idCliente) {
      $contratoDao = new ContratoDAO();

      return $clienteDao->excluir($idCliente);
   }
   function listarContrato() {
      $idContrato = func_get_args();
      $contratoDao = new ContratoDAO();

      return $contratoDao->listar($idContrato);
   }
}
