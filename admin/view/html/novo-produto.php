<?php
   require_once __DIR__ . "/../../control/Security.php";

   Security::checkLogin();
   Security::checkPage();
?>
<h1>Novo Produto</h1>
<form name="cadastro" class="cadastro form-reset" action="view/php/novo-produto.php" method="post">
   <input type="hidden" name="function" value="cadastrarProduto">
   <div class="card mb-3">
      <div class="card-header">
         <i class="fa fa-cart-plus"></i>
         Informações Produto
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-md-12 mb-3">
               <label for="nome">Nome:</label>
               <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <!--<div class="col-md-6 mb-3">
               <label for="valor">Valor:</label>
               <input type="text" class="form-control money" id="valor" name="valor" required>
            </div>-->
         </div>
         <div class="row">
            <div class="col-md-12">
               <label for="descricao">Descrição:</label>
               <textarea type="text" class="form-control" id="descricao" name="descricao" required></textarea>
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
      <button class="btn btn-primary btn-cadastro" type="submit">Salvar Produto</button>
      <i class="fa fa-spinner fa-pulse fa-2x fa-fw icon-load"></i>
      <span class="sr-only">Loading...</span>
   </div>
</form>
