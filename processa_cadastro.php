<?php
require_once 'conexao.php';

if (!empty($_POST)) {
  // Está chegando dados por POST e então posso tentar inserir no banco
  // Obter as informações do formulário ($_POST)
  try {
  
      $sql = "INSERT INTO usuario (
          matricula_usuario, nome_usuario, sobre_nome_usuario, cpf, genero, login, senha) 
            VALUES (:matricula_usuario, :nome_usuario, :sobre_nome_usuario, :cpf, :genero, :login, :senha)";

      $stmt = $conexao->prepare($sql);

      // Definir/organizar os dados p/ SQL
      $dados = array(
        ':matricula_usuario' => $_POST['matricula'],
        ':nome_usuario' => $_POST['nome'],
        ':sobre_nome_usuario' => $_POST['sobrenome'],
        ':cpf' => $_POST['cpf'],
        ':genero' => $_POST['genero'],
        ':login' => $_POST['email'],
        ':senha' => $_POST['senha']
      );

      if ($stmt->execute($dados)) {
        header("Location: sucesso.html?msgSucesso=Cadastro realizado com sucesso!");
      }
    }catch (PDOException $e) {
      die($e->getMessage());
      header("Location: cadastro.html?msgErro=Falha ao cadastrar...");
     }
}else {
  header("Location: index.html?msgErro=Erro de acesso.");
}
die();
