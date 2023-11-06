<?php
require_once 'conexao.php';
// Definir o BD (e a tabela)
// Conectar ao BD (com o PHP)

session_start();

if (!empty($_POST)) {
  // Está chegando dados por POST e então posso tentar inserir no banco
  // Obter as informações do formulário ($_POST)
  try {
    
      $sql = "SELECT login, senha FROM  usuario where login = :login AND senha = :senha;";

      $stmt = $conexao->prepare($sql);

      $dados = array(
        ':login' => $_POST['login'],
        ':senha' => $_POST['senha']
      );

      $stmt->execute($dados);

      $result = $stmt->fetchAll();
      
      if($stmt->rowCount() == 1){

        $result = $result[0];

        $_SESSION['login'] = $result['login'];
        $_SESSION['senha'] = $result['senha'];

        header('Location: sucesso.html?msgSucesso = Deu certo');

      }else{
        session_destroy();
        header('Location: index.html?msgErro = Deu errado');
      }

    }catch (PDOException $e) {
      die($e->getMessage());
  }
}else{
    header('Location: index.html?msgErro = Sem permisão');
}
die();

?>
