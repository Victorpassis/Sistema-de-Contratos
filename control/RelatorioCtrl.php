<?php
require_once "DAO/GerarRelatorioDAO.php";

class RelatorioCtrl{
   function gerarRelatorio() {
      $bdRelatorio = new GerarRelatorioDAO();
      return  $bdRelatorio->gerarRelatorio();
   }
   function sortearGanhador() {
      $bdRelatorio = new GerarRelatorioDAO();
      return  $bdRelatorio->sortearGanhador();
   }
   function paginacao() {
      $bdRelatorio = new GerarRelatorioDAO();
      return  $bdRelatorio->paginacao();
   }
}
