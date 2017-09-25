<?php
require_once 'ConnectionFactory.php';
class GerarRelatorioDAO
{
    function gerarRelatorio() {
        $limite = 10;
        $pg = (isset($_GET['pg'])) ? (int)$_GET['pg'] : 1;
        $inicio = ($pg * $limite) - $limite;

        try {
            $conexao = new ConnectionFactory();
            $conexao = $conexao->newConnection();
            $cmdRelatorio = $conexao->prepare("SELECT * FROM inscricoes LIMIT " . $inicio . ", " . $limite);
            $cmdRelatorio->execute();

            if($cmdRelatorio->rowCount() > 0) {
                return $cmdRelatorio;
            }
            return false;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    function sortearGanhador() {
        try {
            $conexao = new ConnectionFactory();
            $conexao = $conexao->newConnection();
            $cmdRelatorio = $conexao->prepare("SELECT * FROM inscricoes ORDER BY RAND() LIMIT 1");
            $cmdRelatorio->execute();

            if($cmdRelatorio->rowCount() > 0) {
                return $cmdRelatorio;
            }
            return false;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    function paginacao() {
        $limite = 10;
        $pg = (isset($_GET['pg'])) ? (int)$_GET['pg'] : 1;
        $inicio = ($pg * $limite) - $limite;

        try {

            $conexao = new ConnectionFactory();
            $conexao = $conexao->newConnection();
            $cmdRelatorio = $conexao->prepare("SELECT * FROM inscricoes");
            $cmdRelatorio->execute();

            $query_result = $cmdRelatorio->fetchAll(PDO::FETCH_ASSOC);
            $query_count =  $cmdRelatorio->rowCount(PDO::FETCH_ASSOC);
            $qtdPag = ceil($query_count/$limite);
        } catch (PDOexception $error_Total) {

            echo 'Erro ao retornar os Dados. '.$error_Total->getMessage();
        }

        if ( $qtdPag > 1) {
            echo '<ul id="paginacao" class="paginacao">';
            echo '<li><a class="anterior" href="?option=cadastros&pg=1"><< Anterior</a></li>';

            if($qtdPag > 1 && $pg <= $qtdPag) {

                for($i = 1; $i <= $qtdPag; $i++){

                    if($i == $pg) {
                        echo "<li><a class='ativo'>".$i."</a></li>";
                    } else {
                        echo "<li><a href='?option=cadastros&pg=$i'>".$i."</a></li>";
                    }
                }
            }
            echo "<li><a class='proxima' href='?option=cadastros&pg=$qtdPag'>Próxima >></a></li>";
        }
    }
}
