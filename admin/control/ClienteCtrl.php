<?php
require_once __DIR__ . "/DAO/ClienteDAO.php";
require_once __DIR__ . "/../model/Cliente.php";

class ClienteCtrl {
   function cadastraCliente($nome, $usuario, $dado, $cidade, $cep, $estado, $endereco, $numero, $bairro) {
      $clienteDao = new ClienteDAO();
      $cliente = new Cliente();

      $cliente->setNome($nome);
      $cliente->setUsuario($usuario);
      $cliente->setDado($dado);
      $cliente->setCidade($cidade);
      $cliente->setCep($cep);
      $cliente->setEstado($estado);
      $cliente->setEndereco($endereco);
      $cliente->setNumero($numero);
      $cliente->setBairro($bairro);

      return $clienteDao->cadastrar($cliente);
   }
   function editarCliente($nome, $usuario, $dado, $cidade, $cep, $estado, $endereco, $numero, $bairro, $idCliente) {
      $clienteDao = new ClienteDAO();
      $cliente = new Cliente();

      $cliente->setNome($nome);
      $cliente->setUsuario($usuario);
      $cliente->setDado($dado);
      $cliente->setCidade($cidade);
      $cliente->setCep($cep);
      $cliente->setEstado($estado);
      $cliente->setEndereco($endereco);
      $cliente->setNumero($numero);
      $cliente->setBairro($bairro);

      return $clienteDao->editar($cliente, $idCliente);

   }
   function excluirCliente($idCliente) {
      $clienteDao = new ClienteDAO();

      return $clienteDao->excluir($idCliente);
   }
   function listarCliente() {
      $idCliente = func_get_args();
      $clienteDao = new ClienteDAO();

      return $clienteDao->listar($idCliente);
   }
}
