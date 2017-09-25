<?php
   require_once __DIR__ . "/../../control/Security.php";
   require_once __DIR__ . "/../../control/ProdutoCtrl.php";

   Security::checkLogin();
   Security::checkPage();

   if (isset($_GET["id"])) $produto = $_GET["id"];

   $produtosCtrl = new ProdutoCtrl();
   $produto = $produtosCtrl->listarProduto($produto);
   $rows = $produto->fetch(PDO::FETCH_OBJ);
?>
<h1>Cliente - <?php echo $rows->nomeProduto; ?></h1>
<form name="cadastro" class="cadastro" action="view/php/novo-produto.php" method="post">
   <input type="hidden" name="function" value="editarProduto">
   <input type="hidden" name="idProduto" value="<?php echo $rows->idProduto; ?>">
   <div class="card mb-3">
      <div class="card-header">
         <i class="fa fa-cart-arrow-down"></i>
         Dados do Produto
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-md-6 mb-3">
               <label for="nome">Nome:</label>
               <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $rows->nomeProduto; ?>" required>
            </div><div class="col-md-6 mb-3">
               <label for="valor">Valor:</label>
               <input type="text" class="form-control money" id="valor" name="valor" value="<?php echo $rows->valor; ?>" required>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <label for="descricao">Descrição:</label>
               <textarea type="text" class="form-control" id="descricao" name="descricao" rows="6" required><?php echo $rows->descricao; ?></textarea>
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
