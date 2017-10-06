<?php
Security::checkAccess();
class Menu {
   function __construct($itens) {
      foreach($itens as $item) {
         $class = "";
         if (isset($_GET["option"])) {
            $link = 'index.php?option='.$item["arquivo"];

            if($item["arquivo"] == $_GET["option"]) $class = "active" ;

         } elseif ($item["arquivo"] == 'home') {
            $link = 'index.php';
            $class = "active";
         }

         echo'<li class="nav-item '. $class .'" data-toggle="tooltip" data-placement="right" title="'. $item["nome"] .'">';

         if(!isset($item["subMenu"])) {
            echo '<a class="nav-link" href="'.$link.'" title="'. $item["nome"] .'">
            <i class="fa fa-fw '. $item["icon"] .'"></i>
            <span class="nav-link-text">'.$item["nome"].'</span></a>';
         } else {
            echo '<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapse'. $item["nome"] .'" data-parent="#exampleAccordion">
               <i class="fa fa-fw '. $item["icon"] .'"></i>
               <span class="nav-link-text">'.$item["nome"].'</span>
               </a><ul class="sidenav-second-level collapse" id="collapse'. $item["nome"] .'">';

            foreach($item['subMenu'] as $subMenu) {
               if(isset($_GET["option"]) && $subMenu["arquivo"] == $_GET["option"]) {
                  $class = "active" ;
               } else {
                  $class = "" ;
               }
               echo '<li class="'. $class .'"><a href="index.php?option='.$subMenu["arquivo"].'">'.$subMenu['nome'].'</a></li>';
            }
            echo '</ul>';
         }
         echo '</li>';
      }
   }
}
