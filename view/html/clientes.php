<?php
   require_once __DIR__ . "/../../control/Security.php";
   require_once __DIR__ . "/../../control/ClienteCtrl.php";

   Security::checkLogin();
   Security::checkPage();

   $clienteCtrl = new ClienteCtrl();
?>

<h1>Clientes</h1>

<div class="card mb-3">
   <div class="card-header">
      <i class="fa fa-table"></i>
      Data Table Example
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
            <?php $rows = $clienteCtrl->listarCliente(); ?>
            <thead>
               <tr>
                  <th>Name</th>
                  <th>CPF/CNPJ</th>
                  <th>Cidade</th>
                  <th>Cep</th>
                  <th>Estado</th>
                  <th>Endereço</th>
                  <th>Némero</th>
                  <th>Bairro</th>
                  <th>Editar</th>
                  <th>Excluir</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <th>Name</th>
                  <th>CPF/CNPJ</th>
                  <th>Cidade</th>
                  <th>Cep</th>
                  <th>Estado</th>
                  <th>Endereço</th>
                  <th>Némero</th>
                  <th>Bairro</th>
                  <th>Editar</th>
                  <th>Excluir</th>
               </tr>
            </tfoot>
            <tbody>
               <?php while($inscricao = $rows->fetch(PDO::FETCH_OBJ)): ?>
               <tr>
                  <td><?php echo $inscricao->nomeCliente ?></td>
                  <td><?php echo $inscricao->dados ?></td>
                  <td><?php echo $inscricao->cidade ?></td>
                  <td><?php echo $inscricao->cep ?></td>
                  <td><?php echo $inscricao->estado ?></td>
                  <td><?php echo $inscricao->endereco ?></td>
                  <td><?php echo $inscricao->numero ?></td>
                  <td><?php echo $inscricao->bairro ?></td>
                  <td><a class="btn btn-outline-infobtn btn-outline-info" href="index.php?option=editar-cliente&id=<?php echo $inscricao->idCliente ?>" title="Editar">Editar</a></td>
                  <td><a class="btn btn-outline-danger nav-link excluir" href="view/php/novo-cliente.php" data-fucao="id=<?php echo $inscricao->idCliente ?>&function=excluirCliente" title="Excluir">Excluir</a></td>
               </tr>
               <?php endwhile; ?>
            </tbody>
         </table>
      </div>
   </div>
   <div class="card-footer small text-muted">
      Updated yesterday at 11:59 PM
   </div>
</div>
