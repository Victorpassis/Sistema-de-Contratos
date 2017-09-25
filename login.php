<main class="login">
   <div class="container">
      <img src="assets/images/Logo-2.gif" class="logo" width="200" alt="Sistema de Contratos"/>
      <div class="card card-login mx-auto">
         <div class="card-header">
            Login
         </div>
         <?php if(isset($_GET["error"])): ?>
            <div class="alert alert-danger" role="alert">
               Usuário ou senha inválidos. Faça o login novamente!
            </div>
         <?php endif; ?>
         <div class="card-body">
            <form  name="login" action="control/do_login.php" method="post">
               <div class="form-group">
                  <label for="usuario">Usuário:</label>
                  <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="emailHelp">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Senha:</label>
                  <input type="password" class="form-control" id="senha" name="senha">
               </div>
               <button type="submit" class="btn btn-primary btn-block btn-login">Entrar<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></button>
            </form>
         </div>
      </div>
   </div>
</main>
