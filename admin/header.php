<header class="site-header">
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="index.php" title="Sistema de Contratos"><img src="assets/images/Logo-1.gif" class="logo" width="50" alt="Sistema de Contratos"/></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
         <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <?php
               $itens = array(
                  array(
                     'nome' => 'Home',
                     'arquivo' => 'home',
                     'icon' => 'fa-home'
                  ),
                  array(
                     'nome' => 'Contratos',
                     'arquivo' => 'contratosSub',
                     'icon' => 'fa-file-text-o',
                     'subMenu' => array (
                        array(
                           'nome' => 'Todos os Contratos',
                           'arquivo' => 'contratos'
                        ),
                        array(
                           'nome' => 'Novo Contrato',
                           'arquivo' => 'novo-contrato'
                        )
                     )
                  ),
                  array(
                     'nome' => 'Produtos',
                     'arquivo' => 'produtosSub',
                     'icon' => 'fa-shopping-basket',
                     'subMenu' => array (
                        array(
                           'nome' => 'Todos os Produtos',
                           'arquivo' => 'produtos'
                        ),
                        array(
                           'nome' => 'Novo Produto',
                           'arquivo' => 'novo-produto'
                        )
                     )
                  ),
                  array(
                     'nome' => 'Clientes',
                     'arquivo' => 'clientesSub',
                     'icon' => 'fa-user-o',
                     'subMenu' => array (
                        array(
                           'nome' => 'Todos os Cliente',
                           'arquivo' => 'clientes'
                        ),
                        array(
                           'nome' => 'Novo Cliente',
                           'arquivo' => 'novo-cliente'
                        )
                     )
                  )
               );
               $menu = new Menu($itens);
            ?>
         </ul>
         <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
               <a class="nav-link text-center" id="sidenavToggler">
                  <i class="fa fa-fw fa-angle-left"></i>
               </a>
            </li>
         </ul>
         <ul class="navbar-nav ml-auto">
            <!--<li class="nav-item">
               <form class="form-inline my-2 my-lg-0 mr-lg-2">
                  <div class="input-group">
                     <input type="text" class="form-control" placeholder="Search for...">
                     <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                           <i class="fa fa-search"></i>
                        </button>
                     </span>
                  </div>
               </form>
            </li>-->
            <li class="nav-item">
               <a class="nav-link" data-toggle="modal" data-target="#exampleModal" title="Sair">
               <i class="fa fa-fw fa-sign-out"></i>Sair</a>
            </li>
         </ul>
      </div>
   </nav>
</header>
