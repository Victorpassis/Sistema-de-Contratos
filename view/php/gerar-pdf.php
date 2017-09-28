<?php
   require_once __DIR__ . "/../../control/Security.php";
   require_once __DIR__ . "/../../control/ContratoCtrl.php";
   require_once __DIR__ . "/../../dompdf/autoload.inc.php";

   use Dompdf\Dompdf;

   Security::checkLogin();
   //Security::checkPage();

   if (isset($_GET["id"])) $contrato = $_GET["id"];

   $contratoCtrl = new ContratoCtrl();
   $contrato = $contratoCtrl->listarContrato($contrato);
   $rows = $contrato->fetch(PDO::FETCH_OBJ);;

   $produtos = explode(",", $rows->produtos);
   $descricao = explode(",", $rows->descricao);
   $dompdf = new Dompdf();

ob_start();
?>
<div class="bdf-page">
   <div class="logo-pdf">
      <img src="assets/images/contrato-aaz.png" class="logo-contrato" alt="Contrato"/>
   </div>
   <h1>Contrato de Prestação de Serviços</h1>
   <p>
      Contrato de locação de serviços que entre si fazem <?php echo $rows->nomeCliente; ?>,
      situado a <?php echo $rows->endereco; ?>, <?php echo $rows->numero; ?>, <?php echo $rows->bairro; ?>,
      <?php echo $rows->cep; ?>, <?php echo $rows->cidade; ?>, <?php echo $rows->estado; ?>, sob CNPJ ou CPF <?php echo $rows->dados; ?>,
      representada no ato por <?php echo $rows->nomeCliente; ?>, doravante denominado Contratante  e  Comunica Marketing Ltda,
      CNPJ 19.285.262.0001/78 situada a Rua Benjamin Constant, 354 – Sala 03, Centro, Extrema (MG), representado neste ato por Maiara
      Domingues Pereira doravante denominado Contratada, considerando que a Contratada está disposta a prestar os serviços a seguir
      enumerados e definidos à Contratante, e que esta está disposta a remunerar tais serviços de acordo com as condições também a seguir
      estipuladas,
   </p>
   <h2>RESOLVEM</h2>
   <h3>Cláusula I - Do objeto</h3>
   <p>
      A Contratada concorda em publicar em seu site www.extremadeaaz.com publicidade da Contratante, em estrita observância do estabelecido nos serviços, que constituem o parágrafo único da Cláusula I desse Contrato.
   </p>
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
      §3 Os valores constantes nesta clausula são referentes ao serviço de locação publicitária no site www.extremadeaaz.com, não incluindo os serviços de confecção de banners, desenvolvimento de logotipos ou artes gráficas.
   </P>
   <p>
      § 4 A criação da primeira arte não haverá custo ao contratante. Caso haja necessidade de realizar alterações futuras, o contratante deve consultar o custo para realização dos serviços.
   </p>
   <h3>Cláusula V – Cancelamento</h3>
   <p>
      Na eventualidade de cancelamento deste, será cobrado o valor de 30% do contrato.
   </p>
   <h3>Cláusula VI - Das obrigações do Contratado</h3>
   <p>
      O Contratado publicará em seu site www.extremadeaaz.com publicidade da Contratante, em estrita observância do estabelecido nos serviços, que constituem o parágrafo único da Cláusula I desse Contrato.
   </p>
   <h3>Cláusula VII - Das obrigações da Contratante </h3>
   <p>
      A Contratante se compromete a colocar à disposição do Contratado informações necessárias para sua inclusão na categoria em que a empresa se enquadra. Compromete-se efetuar os pagamentos no dia do vencimento. Após 30(trinta) dias de vencimento do título o mesmo será protestado automaticamente e encaminhado ao cartório de protesto da comarca de Extrema. Após 45 (quarenta e cinco) dias de atraso de pagamento o anúncio será retirado do site e somente será colocado no ar após pagamento do título em atraso.
   </p>
   <h3>Cláusula VIII - Das alterações</h3>
   <p>
      Qualquer modificação que afete os termos, condições ou especificações do presente Contrato deverá ser objeto de alteração por escrito com anuência de ambas as partes.
   </p>
   <h3>Cláusula VIIII - Do foro</h3>
   <p>
      O foro deste contrato é o da Comarca da cidade de Extrema, Estado de Minas Gerais com preferência sobre qualquer outro.
   </p>
   <h3>Considerações Finais</h3>
   <p>
      A contratada se reserva no direito em não oferecer e ou disponibilizar exclusividade de veiculação para nenhum setor ou segmento comercial e empresarial.
   </p>
   <p>
      E, por estarem assim justas e contratadas, as partes assinam o presente instrumento em 2 (duas) vias de igual forma e teor, para um só efeito.
   </p>
   <p>Extrema, <?php echo strftime('%d de %B de %Y', strtotime($rows->dataAtual)); ?>.</p>
</div>
<?php

//file_put_contents('../customerpay.html', ob_get_contents());
//$filename = '../customerpay.html';

$html = ob_get_contents();

$html .= '<link rel="stylesheet" href="assets/css/style.css">';

$dompdf->loadHtml($html);
$dompdf->set_paper('A4', 'portrait');
$dompdf->render();

//$dompdf->stream();

$output = $dompdf->output();

file_put_contents('../../assets/pdfs/filename.pdf', $output);


//$dompdf->stream("codex",array("Attachment"=>1));
