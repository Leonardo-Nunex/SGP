<?php
require_once 'conexao.php';
// Definir o BD (e a tabela)
// Conectar ao BD (com o PHP)

session_start();

if (!empty($_POST)) {
  // Está chegando dados por POST e então posso tentar inserir no banco
  // Obter as informações do formulário ($_POST)
  try {
    
      $sql = "SELECT email, senha FROM  usuario where email = :email AND senha = :senha;";

      $stmt = $conexao->prepare($sql);

      $dados = array(
        ':email' => $_POST['email'],
        ':senha' => $_POST['senha']
      );

      $stmt->execute($dados);

      $result = $stmt->fetchAll();
      
      if($stmt->rowCount() == 1){

        $result = $result[0];

        $_SESSION['email'] = $result['email'];
        $_SESSION['senha'] = $result['senha'];

        header('Location: sucesso.html?msgSucesso = Deu certo');

      }else{
        session_destroy();
        header('Location: login.html?msgErro = Deu errado');
      }

    }catch (PDOException $e) {
      die($e->getMessage());
  }
}else{
    header('Location: login.html?msgErro = Sem permisão');
}
die();

?>
