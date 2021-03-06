<?php
   require_once __DIR__ . "/../../control/Security.php";

   Security::checkLogin();
   Security::checkPage();
?>
<h1>Novo Cliente</h1>
<form name="cadastro" class="cadastro form-reset" action="view/php/novo-cliente.php" method="post">
   <input type="hidden" name="function" value="cadastrarCliente">
   <div class="card mb-3">
      <div class="card-header">
         <i class="fa fa-address-card-o"></i>
         Dados do Cliente
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-md-4 mb-3">
               <label for="nome">Nome(Empresa ou Responsavel):</label>
               <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-4 mb-3">
               <label for="usuario">Nome de Usuário:</label>
               <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="col-md-4 mb-3">
               <label for="cpf-cnpf">CPF ou CNPJ:</label>
               <div class="input-group">
                  <div class="input-group-btn">
                     <button type="button" class="btn btn-secondary dropdown-toggle btn-dados" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        CPF
                     </button>
                     <div class="dropdown-menu">
                        <a class="dropdown-item cpf-cnpj" href="#">CPF</a>
                        <a class="dropdown-item cpf-cnpj" href="#">CNPJ</a>
                     </div>
                  </div>
                  <input type="text" id="cpf-cnpf" class="form-control cnpj-cpf cpf" name="cpf-cnpf" required>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-5 mb-3">
               <label for="cidade">Cidade:</label>
               <input type="text" class="form-control" id="cidade" name="cidade" required>
            </div>
            <div class="col-md-5 mb-3">
               <label for="cep">Cep:</label>
               <input type="text" class="form-control cep" id="cep" name="cep" required>
            </div>
            <div class="col-md-2 mb-3">
               <label for="estado">Estado:</label>
               <select class="form-control" id="estado" name="estado">
                  <option disabled selected value="">Selecione</option>
                  <option value="AC">Acre</option>
                  <option value="AL">Alagoas</option>
                  <option value="AP">Amapá</option>
                  <option value="AM">Amazonas</option>
                  <option value="BA">Bahia</option>
                  <option value="CE">Ceará</option>
                  <option value="DF">Distrito Federal</option>
                  <option value="ES">Espirito Santo</option>
                  <option value="GO">Goiás</option>
                  <option value="MA">Maranhão</option>
                  <option value="MS">Mato Grosso do Sul</option>
                  <option value="MT">Mato Grosso</option>
                  <option value="MG">Minas Gerais</option>
                  <option value="PA">Pará</option>
                  <option value="PB">Paraíba</option>
                  <option value="PR">Paraná</option>
                  <option value="PE">Pernambuco</option>
                  <option value="PI">Piauí</option>
                  <option value="RJ">Rio de Janeiro</option>
                  <option value="RN">Rio Grande do Norte</option>
                  <option value="RS">Rio Grande do Sul</option>
                  <option value="RO">Rondônia</option>
                  <option value="RR">Roraima</option>
                  <option value="SC">Santa Catarina</option>
                  <option value="SP">São Paulo</option>
                  <option value="SE">Sergipe</option>
                  <option value="TO">Tocantins</option>
               </select>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6 mb-3">
               <label for="endereco">Endereço:</label>
               <input type="text" class="form-control" name="endereco" id="endereco" required>
            </div>
            <div class="col-md-2 mb-3">
               <label for="numero">Número:</label>
               <input type="number" class="form-control" name="numero" id="numero" required>
            </div>
            <div class="col-md-4 mb-3">
               <label for="bairro">Bairro:</label>
               <input type="text" class="form-control" name="bairro" id="bairro" required>
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
      <button class="btn btn-primary btn-cadastro" type="submit">Cadastrar Cliente</button>
      <i class="fa fa-spinner fa-pulse fa-2x fa-fw icon-load"></i>
      <span class="sr-only">Loading...</span>
   </div>
</form>
