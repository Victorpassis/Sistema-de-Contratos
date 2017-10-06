<?php
   require_once __DIR__ . "/Cliente.php";

   class Contrato {
      private $listaProdutos;
      private $valor;
      private $valorExtenco;
      private $dataAtual;
      private $dataInicio;
      private $dataFinal;
      private $numParcelas;
      private $dataVencimento;
      private $cliente;

      function getListaProdutos() {
         return $this->listaProdutos;
      }
      function setListaProdutos($listaProdutos) {
         $this->listaProdutos = $listaProdutos;
      }
      function getValor() {
         return $this->valor;
      }
      function setValor($valor) {
         $this->valor = $valor;
      }
      function getValorExtenco() {
         return $this->valorExtenco;
      }
      function setValorExtenco($valorExtenco) {
         $this->valorExtenco = $valorExtenco;
      }
      function getDataAtual() {
         return $this->dataAtual;
      }
      function setDataAtual($dataAtual) {
         $this->dataAtual = $dataAtual;
      }
      function getDataInicio() {
         return $this->dataInicio;
      }
      function setDataInicio($dataInicio) {
         $this->dataInicio = $dataInicio;
      }
      function getDataFinal() {
         return $this->dataFinal;
      }
      function setDataFinal($dataFinal) {
         $this->dataFinal = $dataFinal;
      }
      function getNumParcelas() {
         return $this->numParcelas;
      }
      function setNumParcelas($numParcelas) {
         $this->numParcelas = $numParcelas;
      }
      function getdataVencimento() {
         return $this->dataVencimento;
      }
      function setdataVencimento($dataVencimento) {
         $this->dataVencimento = $dataVencimento;
      }
      function getCliente() {
         return $this->cliente;
      }
      function setCliente($cliente) {
         $this->cliente = $cliente;
      }
   }
?>
