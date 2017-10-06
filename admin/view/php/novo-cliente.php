<?php
require_once __DIR__ . "/../../control/ClienteCtrl.php";

$_SERVER["REQUEST_METHOD"] == "POST";

//class NovoCliente {
   //function __construct() {
      $clienteCtrl = new ClienteCtrl();

      $nome = isset($_POST["nome"]) ? trim($_POST["nome"]) : "";
      $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
      $dado = isset($_POST["cpf-cnpf"]) ? trim($_POST["cpf-cnpf"]) : "";
      $cidade = isset($_POST["cidade"]) ? trim($_POST["cidade"]) : "";
      $cep = isset($_POST["cep"]) ? trim($_POST["cep"]) : "";
      $estado = isset($_POST["estado"]) ? trim($_POST["estado"]) : "";
      $endereco = isset($_POST["endereco"]) ? trim($_POST["endereco"]) : "";
      $numero = isset($_POST["numero"]) ? trim($_POST["numero"]) : "";
      $bairro = isset($_POST["bairro"]) ? trim($_POST["bairro"]) : "";

      switch ($_POST["function"]) {
         case 'cadastrarCliente':
            echo $clienteCtrl->cadastraCliente($nome, $usuario, $dado, $cidade, $cep, $estado, $endereco, $numero, $bairro);
            break;
         case 'editarCliente':
            echo $clienteCtrl->editarCliente($nome, $usuario, $dado, $cidade, $cep, $estado, $endereco, $numero, $bairro, $_POST["idCliente"]);
            break;
         case 'excluirCliente':
            echo $clienteCtrl->excluirCliente($_POST["id"]);
            break;
         case 'listarCliente':
            $cadastro = $clienteCtrl->listarCliente($_POST["id"]);
            echo json_encode($cadastro->fetch(PDO::FETCH_OBJ));
            break;
         default:
         break;
      }
      die();

   //}
//}
?>
