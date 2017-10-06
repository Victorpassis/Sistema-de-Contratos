<?php
   class Cliente {
      private $nome;
      private $usuario;
      private $dado;
      private $cidade;
      private $cep;
      private $estado;
      private $endereco;
      private $numero;
      private $bairro;

      function getNome() {
         return $this->nome;
      }
      function setNome($nome) {
         $this->nome = $nome;
      }
      function getUsuario() {
         return $this->usuario;
      }
      function setUsuario($usuario) {
         $this->usuario = $usuario;
      }
      function getDado() {
         return $this->dado;
      }
      function setDado($dado) {
         $this->dado = $dado;
      }
      function getCidade() {
         return $this->cidade;
      }
      function setCidade($cidade) {
         $this->cidade = $cidade;
      }
      function getCep() {
         return $this->cep;
      }
      function setCep($cep) {
         $this->cep = $cep;
      }
      function getEstado() {
         return $this->estado;
      }
      function setEstado($estado) {
         $this->estado = $estado;
      }
      function getEndereco() {
         return $this->endereco;
      }
      function setEndereco($endereco) {
         $this->endereco = $endereco;
      }
      function getNumero() {
         return $this->numero;
      }
      function setNumero($numero) {
         $this->numero = $numero;
      }
      function getBairro() {
         return $this->bairro;
      }
      function setBairro($bairro) {
         $this->bairro = $bairro;
      }
   }
?>
