<?php 
require_once('conexao.php');

$idUsuario = $_GET["id_usuario"];

try{
    $pdo=Database::conexao();
    $stmt = $pdo->prepare('UPDATE tb_usuario SET nome = :nome, cpf = :cpf, email = :email, logradouro = :logradouro, numero = :numero, bairro = :bairro,
                           cidade=:cidade, estado=:estado, cep=:cep WHERE id_usuario = :id_usuario');
    $stmt->bindParam(':id_usuario', $idUsuario);
    $stmt->bindParam(':nome', $_POST['nome']);   
    $stmt->bindParam(':cpf', $_POST['cpf']);
    $stmt->bindParam(':email', $_POST['email']);   
    $stmt->bindParam(':logradouro', $_POST['logradouro']); 
    $stmt->bindParam(':numero', $_POST['numero']);
    $stmt->bindParam(':bairro', $_POST['bairro']);
    $stmt->bindParam(':cidade', $_POST['cidade']);
    $stmt->bindParam(':estado', $_POST['estado']);
    $stmt->bindParam(':cep', $_POST['cep']);  
    $stmt->execute();

    $mensagem = 'Alteração realizada com sucesso!';
    $location = '../dashboard.php';

    // criar e exibir o javascript
    echo '<script>';
        printf("alert('%s');\n", $mensagem);
        if (!empty($location)) {
            printf("window.location.href = '%s'\n", $location);
        }
    echo '</script>';
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
