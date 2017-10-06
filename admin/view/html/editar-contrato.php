<?php
   require_once __DIR__ . "/../../control/Security.php";
   require_once __DIR__ . "/../../control/ClienteCtrl.php";
   require_once __DIR__ . "/../../control/ProdutoCtrl.php";
   require_once __DIR__ . "/../../control/ContratoCtrl.php";

   Security::checkLogin();
   Security::checkPage();

   $clienteCtrl = new ClienteCtrl();
   $produtosCtrl = new ProdutoCtrl();

   $clientes = $clienteCtrl->listarCliente();
   $produtos = $produtosCtrl->listarProduto();

   if (isset($_GET["id"])) $contrato = $_GET["id"];

   $contratoCtrl = new ContratoCtrl();
   $contrato = $contratoCtrl->listarContrato($contrato);
   $rows = $contrato->fetch(PDO::FETCH_OBJ);

   print_r($rows);
?>
<h1>Novo Contrato</h1>
<form name="form-contrato" class="cadastro" action="view/php/novo-contrato.php" method="post">
   <input type="hidden" name="function" value="editarContrato">
   <input type="hidden" name="idContrato" value="<?php echo $rows->idContrato; ?>">
   <div class="card mb-3">
      <div class="card-header">
         <i class="fa fa-address-card-o"></i>
         Dados do Cliente
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-md-6 mb-3">
               <label for="cliente">Cliente:</label>
               <select class="form-control clienteContrato" id="cliente" name="cliente">
                  <?php while($inscricao = $clientes->fetch(PDO::FETCH_OBJ)):
                     if(($inscricao->idCliente) == ($rows->idCliente)): ?>
                     <option selected value="<?php echo $inscricao->idCliente ?>"><?php echo $inscricao->nomeCliente ?></option>
                  <?php else: ?>
                     <option value="<?php echo $inscricao->idCliente ?>"><?php echo $inscricao->nomeCliente ?></option>
                  <?php endif; endwhile; ?>
               </select>
            </div>
            <div class="col-md-6 mb-3">
               <label for="cpf-cnpf">CPF ou CNPJ:</label>
               <input type="text" class="form-control cpf-cnpf" id="cpf-cnpf" name="cpf-cnpf" value="<?php echo $rows->dados; ?>" disabled>
            </div>
         </div>
         <div class="row">
            <div class="col-md-5 mb-3">
               <label for="cidade">Cidade:</label>
               <input type="text" class="form-control cidade" id="cidade" name="cidade" value="<?php echo $rows->cidade; ?>" disabled>
            </div>
            <div class="col-md-5 mb-3">
               <label for="cep">Cep:</label>
               <input type="text" class="form-control cep" id="cep" name="cep" value="<?php echo $rows->cep; ?>" disabled>
            </div>
            <div class="col-md-2 mb-3">
               <label for="estado">Estado:</label>
               <input type="text" class="form-control estado" id="estado" name="estado" value="<?php echo $rows->estado; ?>" disabled>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6 mb-3">
               <label for="endereco">Endereço:</label>
               <input type="text" class="form-control endereco" name="endereco" id="endereco" value="<?php echo $rows->endereco; ?>" disabled>
            </div>
            <div class="col-md-2 mb-3">
               <label for="numero">Número:</label>
               <input type="number" class="form-control numero" name="numero" id="numero" value="<?php echo $rows->numero; ?>" disabled>
            </div>
            <div class="col-md-4 mb-3">
               <label for="bairro">Bairro:</label>
               <input type="text" class="form-control bairro" name="bairro" id="bairro" value="<?php echo $rows->bairro; ?>" disabled>
            </div>
         </div>
      </div>
   </div>
   <div class="card mb-3">
      <div class="card-header">
         <i class="fa fa-shopping-cart"></i>
         Dados do Produto
      </div>
      <div class="card-body">
         <div class="row dados-produtos">
            <div class="col-md-4 mb-6">
               <label for="produto">Produto:</label>
               <select multiple='multiple' class="form-control produtoContrato" id="listaproduto" name="produto[]">
                  <?php while($inscricao = $produtos->fetch(PDO::FETCH_OBJ)): ?>
                  <option data-valor="<?php echo $inscricao->valor; ?>" value="<?php echo $inscricao->idProduto ?>"><?php echo $inscricao->nomeProduto ?></option>
                  <?php endwhile; ?>
               </select>
            </div>
            <div class="col-md-8 mb-6">
               <label for="descricao">Descrição:</label>
               <textarea type="text" class="form-control descricao" id="descricao" rows="9" name="descricao" disabled></textarea>
            </div>
         </div>
      </div>
   </div>
   <div class="card mb-3">
      <div class="card-header">
         <i class="fa fa-money"></i>
         Dados dos Boletos
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-md-3 mb-3">
               <label for="total">Total:</label>
               <div class="input-group">
                  <span class="input-group-addon">R$</span>
                  <input type="text" class="form-control total money" id="total" value="0" name="total" value="<?php echo $rows->valor; ?>" required>
                  <span class="input-group-addon">.00</span>
               </div>
            </div>
            <div class="col-md-5 mb-3">
               <label for="descricao-total">Total Por Extenço:</label>
               <input type="text" class="form-control" id="descricao-total" name="descricaoTotal" value="<?php echo $rows->valorExtenco; ?>" required>
            </div>
            <div class="col-md-4 mb-3">
               <label for="data-atual">Data Atual:</label>
               <input type="date" class="form-control" id="data-atual" name="dataAtual" value="<?php echo $rows->dataAtual; ?>" required>
            </div>
            <div class="col-md-3 mb-3">
               <label for="data-inicio">Data Inicio:</label>
               <input type="date" class="form-control" id="data-inicio" name="dataInicio" value="<?php echo $rows->data_inicio; ?>" required>
            </div>
            <div class="col-md-3 mb-3">
               <label for="data-final">Data Final:</label>
               <input type="date" class="form-control" id="data-final" name="dataFinal" value="<?php echo $rows->data_fim; ?>" required>
            </div>
            <div class="col-md-3 mb-3">
               <label for="num-parcelas">Número de Parcelas:</label>
               <input type="number" class="form-control" id="num-parcelas" name="numParcelas" value="<?php echo $rows->num_parcelas; ?>" required>
            </div>
            <div class="col-md-3 mb-3">
               <label for="data-boleto">Vencimento dos Boletos:</label>
               <input type="date" class="form-control" id="data-boleto" name="dataBoleto" value="<?php echo $rows->dataVencimento; ?>" required>
            </div>
         </div>
      </div>
   </div>
   <div class="alerta-cadastro alert alert-dismissible fade show" data-dismiss="alert" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <div class="col-md-12">
      <button class="btn btn-primary btn-cadastro" type="submit">Salvar Edição</button>
      <i class="fa fa-spinner fa-pulse fa-2x fa-fw icon-load"></i>
      <span class="sr-only">Loading...</span>
   </div>
</form>
