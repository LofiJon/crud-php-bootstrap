<html>
<head>
<title> Cadastro </title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    

</head>

</style>
<body>
<!--desenho do navbar-->
 
 <div style="width: 100%;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="#">XXXXXX</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="home.php">Página Inicial</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="cadastro.php" >Cadastro<span class="sr-only">(current)</span></a>
            </li>
            <!---contatos-->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Contatos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" target="_blank">whatsapp</a>
                <a class="dropdown-item" href="#" target="_blank">Instagram</a>
                
            </li>

          </form>
        </div>
      </nav>
   
 </div>
<br>
<?php require_once 'conecta.php' ?> <!--conecta ao banco--> 
  <input type="hidden" name="nome" value="<?php echo $id ?>">
<?php 
    if(isset($_SESSION['msg'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php 
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
?>
</div>
<?php endif ?>

 <div class="container">

 

  <?php
    $mysqli = new mysqli('localhost','root','','emporio_dados') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT *FROM usuarios") or die($mysqli->error);
   ?>
  <div class="row justify-content-center">
       <table class="table">
          <thead>
             <tr>
                <th>Nome</th>
                <th>email</th>
                <th>endereço</th>
                <th>senha</th>
                <th colspan="4">Action</th>
             </tr>
          </thead>
        <?php while($row = $result->fetch_assoc()):?>
          <tr>
       <td><?php echo $row['nome']; ?></td>
       <td><?php echo $row['email'];?></td>
       <td><?php echo $row['endereco'];?></td>
       <td><?php echo $row['senha'];?></td>
       <td>
       <a href="cadastro.php?edit=<?php echo $row['id'];?>"
          class="btn btn-info"> Editar </a>
          <a href="conecta.php?delete=<?php echo $row['id'];?>"
          class="btn btn-danger"> Deletar </a>
         </td>
        </tr>
        <?php endwhile; ?>
      </table>

  
          

<?php
    function pre_r( $array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
      }
 ?>

 <!--Aqui começa o formulário de cadastro-->
    <form method="POST" action="">
        <div class="form-group">
          <label>Nome</label>
          <input type="text" name="nome" value="<?php echo $nome;?>" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Seu nome completo">
        </div>
        <div class="form-group">
          <label>email</label>
          <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" id="login" aria-describedby="emailHelp" placeholder="Seu email">
        </div>
        
        <div class="form-group">
          <label>Endereço</label>
          <input type="text" class="form-control" name="endereco" value="<?php echo $endereco; ?>" placeholder="Digite seu endereço">
          <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu endereço, com ninguém.</small> 
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="senha" value="<?php echo $senha; ?>" class="form-control" id="senha" placeholder="Digite sua senha">
        </div>
        <div class="form-group">
          <?php   
                 if($update == true):
           ?>
            <button type="submit" class="btn btn-info" name="update">atualizar</button>
             <?php else: ?>

                  <button type="submit" class="btn btn-primary" name="cadastro">cadastrar</button>
                <?php endif; ?>
            
        </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>