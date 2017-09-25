<?php
   class Produto {
      private $nome;
      private $descricao;
      private $valor;

      function getNome() {
         return $this->nome;
      }
      function setNome($nome) {
         $this->nome = $nome;
      }
      function getDescricao() {
         return $this->descricao;
      }
      function setDescricao($descricao) {
         $this->descricao = $descricao;
      }
      function getValor() {
         return $this->valor;
      }
      function setValor($valor) {
         $this->valor = $valor;
      }
   }
?>
