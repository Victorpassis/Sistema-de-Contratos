<?php
   require_once __DIR__ . "/../../control/Security.php";
   require_once __DIR__ . "/../../control/ProdutoCtrl.php";

   Security::checkLogin();
   Security::checkPage();

   $produtosCtrl = new ProdutoCtrl();
?>

<h1>Produtos</h1>

<div class="card mb-3">
   <div class="card-header">
      <i class="fa fa-shopping-basket"></i>
      Lista de Produtos
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table" width="100%" id="dataTable" cellspacing="0">
            <?php $rows = $produtosCtrl->listarProduto(); ?>
            <thead class="thead-inverse">
               <tr>
                  <th>Name</th>
                  <!--<th>Valor</th>-->
                  <th>Descrição</th>
                  <th>Editar</th>
                  <th>Excluir</th>
               </tr>
            </thead>
            <tbody class="table-bordered">
               <?php while($inscricao = $rows->fetch(PDO::FETCH_OBJ)): ?>
               <tr>
                  <td><?php echo $inscricao->nomeProduto ?></td>
                  <!--<td><?php //echo $inscricao->valor ?></td>-->
                  <td><?php echo $inscricao->descricao ?></td>
                  <td><a class="btn btn-outline-infobtn btn-outline-info" href="index.php?option=editar-produto&id=<?php echo $inscricao->idProduto ?>" title="Editar">Editar</a></td>
                  <td><a class="btn btn-outline-danger nav-link excluir" href="view/php/novo-produto.php" data-fucao="id=<?php echo $inscricao->idProduto ?>&function=excluirProduto" title="Excluir">Excluir</a></td>
               </tr>
               <?php endwhile; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
