<?php
require_once 'conexao.php';

if (!empty($_POST)) {
  // Está chegando dados por POST e então posso tentar inserir no banco
  // Obter as informações do formulário ($_POST)
  try {
  
      $sql = "INSERT INTO usuario (
          matricula_usuario, nome_usuario, cpf, sexo, telefone, endereco, uf, cidade, data_nascimento, email, senha) 
            VALUES (:matricula_usuario, :nome_usuario, :cpf, :sexo, :telefone, :endereco, :uf, :cidade, :data_nascimento, :email, :senha)";

      $stmt = $conexao->prepare($sql);

      // Definir/organizar os dados p/ SQL
      $dados = array(
        ':matricula_usuario' => $_POST['matricula'],
        ':nome_usuario' => $_POST['nome'],
        ':cpf' => $_POST['cpf'],
        ':sexo' => $_POST['sexo'],
        ':telefone' => $_POST['telefone'],
        ':endereco' => $_POST['endereco'],
        ':uf' => $_POST['uf'],
        ':cidade' => $_POST['cidade'],
        ':data_nascimento' => $_POST['nascimento'],
        ':email' => $_POST['email'],
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
  header("Location: login.html?msgErro=Erro de acesso.");
}
die();
