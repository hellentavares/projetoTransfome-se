<?php

session_start();
include("conexao.php");
include "assets/phpmailer/PHPMailerAutoload.php"; 


  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $mensagem = $_POST['mensagem'];

  $sql = "INSERT INTO cadastro (nome, email, telefone, mensagem) VALUES ('$nome', '$email', '$telefone', '$mensagem')";

  if (mysqli_query($mysqli, $sql)) {
      echo "Usuário cadastrado com sucesso";
  } else {
      echo "Erro: " . mysqli_error($conexao);
  }

  mysqli_close($mysqli);


