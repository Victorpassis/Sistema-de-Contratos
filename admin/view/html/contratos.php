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
      Todos os Contratos
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table" width="100%" id="dataTable" cellspacing="0">
            <?php $rows = $contratoCtrl->listarContrato(); ?>
            <thead class="thead-inverse">
               <tr>
                  <th>Cliente</th>
                  <th>Produtos</th>
                  <th>Valor Total</th>
                  <th>Data Do Contrato</th>
                  <th>Data de Inicio</th>
                  <th>Data Termino</th>
                  <th>Número de Parcelas</th>
                  <th>Vencimento dos Boletos</th>
                  <th>Situação</th>
                  <th>Contrato</th>
                  <th>Excluir</th>
               </tr>
            </thead>
            <tbody class="table-bordered">
               <?php while($inscricao = $rows->fetch(PDO::FETCH_OBJ)): $produtos = explode(",", $inscricao->produtos); ?>
                  <tr>
                     <td><?php echo $inscricao->nomeCliente ?></td>
                     <td>
                        <ul>
                           <?php foreach ( $produtos as $produto ): ?>
         							<li><?php echo $produto ?></li>
         						<?php endforeach ?>
                        </ul>
                     </td>
                     <td><?php echo $inscricao->valor ?></td>
                     <td><?php echo $inscricao->dataAtual ?></td>
                     <td><?php echo $inscricao->data_inicio ?></td>
                     <td><?php echo $inscricao->data_fim ?></td>
                     <td><?php echo $inscricao->num_parcelas ?></td>
                     <td><?php echo $inscricao->dataVencimento ?></td>
                     <td>
                        <?php if($inscricao->validado == 0): ?>
                           Aguardando
                        <?php else: ?>
                           Aprovado
                        <?php endif; ?>
                     </td>
                     <td><a class="btn btn-outline-infobtn btn-outline-warning" href="index.php?option=contrato-pdf&id=<?php echo $inscricao->idContrato ?>" title="Contrato">Contrato</a></td>
                     <td><a class="btn btn-outline-danger nav-link excluir" href="view/php/novo-contrato.php" data-fucao="id=<?php echo $inscricao->idContrato ?>&function=excluirContrato" title="Excluir">Excluir</a></td>
                  </tr>
               <?php endwhile; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
