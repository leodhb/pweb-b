<?php  


	require_once "controller/usuarioController.php";

	$userController = new UsuarioController();

  if(isset($_POST['acao'])){

  if($_POST['acao'] == 'registrar'){
    $userController->inserir($_POST['username'], $_POST['password'], $_POST['email']);
    header("Location: index.php");
  }
}

if(isset($_SESSION['username']))
  {
    if($_SESSION['username'] != NULL)
    {
      header("Location: index.php");
    }
  }
  include_once "components/header.php";
  include_once "components/navbar.php";

?>
	<div class="header-bugfix" style="height: 200px !important"></div>

	<div style="display: block; margin-left: auto; margin-right: auto;height: 100%; width: 60rem;">

        <div class="card-post" style="text-align: center;">

        <h4 class="card-title ml-1 title" style="float: middle !important">Registrar-se</h4>
        <div class="card-body">
            <div class="col-md-12" style="margin-bottom: 2em !important">
            <form role="form" method="post" action="register.php">
            <fieldset>              
              <p class="text-uppercase pull-center" style="color: white;">CRIAR UMA CONTA AND BE FREE, BB!</p> 
              <div class="form-group">
                <input type="text" name="username" id="username" class="form-control input-lg" placeholder="username" required="">
              </div>
              <input type="hidden" name="acao" value="registrar">    
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="email" required="">
              </div>
              <div class="form-group">
                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="password" required="">
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" >
                  <span style="color: white" >Eu aceito os </span><a href="termos.php">Termos de uso do site</a>
                </label>
                </div>
              <div>
                    <input type="submit" class="btn btn-md btn-success"   value="Register">
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      </div>

</div>

<?php  
include_once "components/footer.php";
?>