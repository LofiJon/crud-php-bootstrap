<?php

    session_start();

   
    $mysqli = new mysqli('localhost','root','','nomeDoBanco') or die(mysqli_error($mysqli));
    $id = 0;
    $update = false;

    $nome = '';
    $endereco = '';
    $email = '';
    $senha = '';
    if(isset($_POST['cadastro'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $senha = $_POST['senha'];

        $mysqli-> query("INSERT INTO usuarios (nome,email,endereco,senha) VALUES( '$nome','$email','$endereco','$senha')") 
          or die($mysqli ->error);

          $_SESSION['msg'] = "Usuário cadastrado";
          $_SESSION['msg_type'] ="success";

          header('location: cadastro.php');
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM usuarios WHERE  id=$id") or die($mysqli->error());
        $_SESSION['msg'] = "Usuário deletado";
        $_SESSION['msg_type'] ="danger";

        header('location: cadastro.php'); 
    }


    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT *FROM usuarios WHERE id=$id") or die($mysqli->error());
        if($result->num_rows){
            $row = $result->fetch_array();
                 $nome = $row['nome'];
                 $email = $row['email'];
                 $endereco = $row['endereco'];
                 $senha = $row['senha'];
                
            }
    }
 if(isset($_POST['update'])){
     $id=$_POST['id'];
     $nome = $_POST['nome'];
     $email = $_POST['email'];
     $endereco = $_POST['endereco'];
     $senha = $_POST['senha'];

     $mysqli->query = "UPDATE usuarios SET nome='$nome', endereco='$endereco', email='$endereco', WHERE id=$id"; 
       or die($mysqli->error);

     $_SESSION['msg'] = "Atualizado ";
     $_SESSION['msg_type'] = "warning";


     header('location: cadastro.php');
 
 }
   
//fim do codigo, agr é só correr pro abraço
?>
