<?php  
  require_once "controller/postController.php";
  require_once "controller/usuarioController.php";
  require_once "controller/categoriaController.php";
  
  $postController = new PostController();
  $userController = new UsuarioController();
  $catController  = new CategoriaController();

  if(isset($_POST['acao'])){

  if($_POST['acao'] == 'postar'){
    $_POST['acao'] == 'a';

    $destino = 'img/' . $_FILES['arquivo']['name'];
    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
    move_uploaded_file($arquivo_tmp, $destino);

    $postController->inserir($_POST['titulo'],$_FILES['arquivo']['name'], $_POST['categoria']);
    header("Location: index.php");
    exit;
  }
}
  if(isset($_POST['apagar']))
  {
      $postController->deletePostById($_POST['apagar']);
      header("Location: index.php");
  }


  if(isset($_GET['sair']) && $_GET['sair'] == 1)
  {
      $sair = $userController->deslogar();
      header("Location: index.php");
  }

  include_once "components/header.php";
	include_once "components/navbar.php";

?>
	<div class="header-bugfix"></div>

	<div style="display: block; margin-left: auto; margin-right: auto;height: 100%; width: 60rem;">


    <?php  if($_SESSION['username'] != NULL) {?>

    <div class="card-post">

        <h4 class="card-title ml-1 title">Novo post</h4>
        <div class="card-body" style="padding: 15px !important;">

        <form role="form" method="POST" enctype="multipart/form-data" action="index.php">
            <fieldset>
              <input type="hidden" name="acao" value="postar">         
              <div class="form-group">
                <input type="text" name="titulo" id="titulo" class="form-control input-lg" placeholder="Título">
              </div>
              <div class="form-group">
                <input style="color: #0DFF35" id="arquivo" name="arquivo" type="file" required/>
              </div>

              <?php  
                if($_SESSION['role'] == 'admin')
                {

              ?>
              <div class="form-group">
                <input type="text" name="categoria" id="categoria" class="form-control input-lg" placeholder="Categoria">
              </div>

              <?php
               }
               else{?>

              <div class="form-group">
                <label for="sel1" style="color: #0DFF35;">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria">
                  <?php  
                    $cats = $catController->listar();
                      foreach ($cats as $data){
                  ?>
                  <option> <?= $data['cat_slug'] ?></option>

                <?php  }?>
                </select>
              </div>

            <?php
            } 

            ?>
              <div>
                <input type="submit" class="btn btn-md btn-success" value="Postar">
              </div>
                 
            </fieldset>
        </form> 
      </div>
    </div>


<?php
} 
  if(isset($_GET['category']))
  {
    $posts = $postController->getPostsByCategory($_GET['category']);
  }
  else
  {
    $posts = $postController->listar();
  }
 	
  if(!empty($posts))
  {


 	foreach ($posts as $data){
?>
        <div class="card-post">

        <h4 class="card-title ml-1 title"><?php echo $data['post_title']; ?></h4>

        <img class="card-img-top ml-1 featured" <?php  echo 'src="img/'.$data['post_featured_img'].'"'?>>
        <?php if(isset($_SESSION['role']))
          {
              if($_SESSION['role'] == 'admin')
              {

          ?>
          <form role="form" action="index.php" method="post">
            <fieldset>
              <input type="hidden" name="apagar" value="<?= $data['post_id'] ?>">
              <div>
                <input type="submit" class="btn btn-lg btn-danger" style="width: 60rem" value="Apagar post">
              </div>
                 
            </fieldset>
        </form> 
          <?php

              } 
          } ?>

        <div class="card-body">

        <p class="card-text ml-1 card-footer">Categoria: <?php echo $data['cat_slug']; ?> <br>Postado em <?php echo $data['post_date']; ?></p><br>

      </div>
      </div>
  <?php
  }  
    }
  ?>
</div>


<?php  
include_once "components/footer.php";
?>