<?php
   require_once __DIR__ . "/../../control/Security.php";
   require_once __DIR__ . "/../../control/ContratoCtrl.php";

   Security::checkLogin();
   Security::checkPage();

   $contratoCtrl = new ContratoCtrl();
?>

<h1>Contratos</h1>

<div class="card mb-3">
   <div class="card-header">
      <i class="fa fa-table"></i>
      Data Table Example
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
            <?php $rows = $contratoCtrl->listarContrato(); ?>
            <thead>
               <tr>
                  <th>Cliente</th>
                  <th>Produtos</th>
                  <th>Valor Total</th>
                  <th>Data Do Contrato</th>
                  <th>Data de Inicio</th>
                  <th>Data Termino</th>
                  <th>Número de Parcelas</th>
                  <th>Vencimento dos Boletos</th>
                  <th>Editar</th>
                  <th>Excluir</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <th>Cliente</th>
                  <th>Produtos</th>
                  <th>Valor Total</th>
                  <th>Data Do Contrato</th>
                  <th>Data de Inicio</th>
                  <th>Data Termino</th>
                  <th>Número de Parcelas</th>
                  <th>Vencimento dos Boletos</th>
                  <th>Editar</th>
                  <th>Excluir</th>
               </tr>
            </tfoot>
            <tbody>
               <?php while($inscricao = $rows->fetch(PDO::FETCH_OBJ)): //print_r($inscricao); ?>
                  <tr>
                     <td><?php echo $inscricao->idContrato ?> <?php echo $inscricao->nomeCliente ?></td>
                     <td>
                        <ul>
                           <li><?php echo $inscricao->nomeProduto ?></li>
                        </ul>
                     </td>
                     <td><?php echo $inscricao->valor ?></td>
                     <td><?php echo $inscricao->dataAtual ?></td>
                     <td><?php echo $inscricao->data_inicio ?></td>
                     <td><?php echo $inscricao->data_fim ?></td>
                     <td><?php echo $inscricao->num_parcelas ?></td>
                     <td><?php echo $inscricao->dataVencimento ?></td>
                     <td><a class="btn btn-outline-infobtn btn-outline-info" href="index.php?option=editar-cliente&id=<?php echo $inscricao->idContrato ?>" title="Editar">Editar</a></td>
                     <td><a class="btn btn-outline-danger nav-link excluir" href="view/php/novo-cliente.php" data-fucao="id=<?php echo $inscricao->idContrato ?>&function=excluirCliente" title="Excluir">Excluir</a></td>
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
