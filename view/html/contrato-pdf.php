<?php
   require_once __DIR__ . "/../../control/Security.php";
   require_once __DIR__ . "/../../control/ContratoCtrl.php";
   require_once __DIR__ . "/../../dompdf/autoload.inc.php";

   use Dompdf\Dompdf;

   Security::checkLogin();
   Security::checkPage();

   if (isset($_GET["id"])) $contrato = $_GET["id"];

   $contratoCtrl = new ContratoCtrl();
   $contrato = $contratoCtrl->listarContrato($contrato);
   $rows = $contrato->fetch(PDO::FETCH_OBJ);;

   $produtos = explode(",", $rows->produtos);
   $descricao = explode(",", $rows->descricao);
   $dompdf = new Dompdf();
?>

<?php ob_start(); ?>
<div class="container pdf-page">
   <div class="cabecalho margim-pdf">
      <img src="assets/images/contrato-aaz.png" class="logo-contrato" alt="Contrato"/>
   </div>
   <div class="margim-pdf">
      <h1>Contrato de Prestação de Serviços</h1>
      <h2>RESOLVEM</h2>
      <h3>Cláusula I - Do objeto</h3>
      <p>
         § Único – PRODUTOS CONTRATADOS
      </p>
      <p>
         <?php foreach ($produtos as $index=>$produto): ?>
            <?php echo $produto; ?> - <?php echo $descricao[$index]; ?><br>
         <?php endforeach ?>
      </p>
      <h3>Cláusula II - Do prazo</h3>
      <p>
         Os serviços a que se refere à cláusula antecedente serão prestados pelo prazo de 12 mêses, com início em <?php echo strftime('%d de %B de %Y', strtotime($rows->data_inicio)); ?> A <?php echo strftime('%d de %B de %Y', strtotime($rows->data_fim)); ?>.
      </p>
      <h3>Cláusula III - Do pagamento</h3>
      <p>
         A Contratante pagará por tais serviços o valor bruto global de R$<?php echo $rows->valor; ?> (<?php echo $rows->valorExtenco; ?>).
      </P>
      <p>
         §1 O pagamento dos serviços será feito em <?php echo $rows->num_parcelas; ?> Boletos Bancários Bradesco conforme parágrafo 2.
      </P>
      <p>
         § 2 O vencimento do primeiro boleto será no dia <?php echo strftime('%d de %B de %Y', strtotime($rows->dataVencimento)); ?> e os respectivos serão nos dias:
         <?php for ($i=1; $i < $rows->num_parcelas; $i++) echo "<br>" . strftime('%d de %B de %Y', strtotime("+".$i." month",strtotime($rows->dataVencimento))); ?>
      </P>
      <p>
      <p class="data"><?php echo strftime('%d de %B de %Y', strtotime($rows->dataAtual)); ?>.</p>
   </div>
</div>
<?php $html = ob_get_contents();?>
<a class="btn btn-primary" href="assets/pdfs/contrato-aaz.pdf" target="_blank" role="button">Link</a>

<?php
   $html .= '<link rel="stylesheet" href="assets/css/pdf.css">';

   $dompdf->loadHtml($html);
   $dompdf->set_paper('A4', 'portrait');
   $dompdf->render();
   $output = $dompdf->output();

   file_put_contents('assets/pdfs/contrato-aaz.pdf', $output);
