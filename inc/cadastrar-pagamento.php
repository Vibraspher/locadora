<?php
require_once('conexao.php');

/*CADASTRAR PAGAMENTO*/
$descricao = $_POST["descricao"];
$status = $_POST["status"];

$pdo=Database::conexao();

$verifica = $pdo->prepare('SELECT * FROM tb_forma_pagamento WHERE descricao = :descricao');
$verifica->bindValue(":descricao", $_POST['descricao']);
$verifica->execute();

$rows = $verifica->rowCount();
if($rows>=1){
    $mensagem = 'Forma de pagamento já cadastrada, tente outra!';
    $location = '../forma-pagamento.php';

    // criar e exibir o javascript
    echo '<script>';
        printf("alert('%s');\n", $mensagem);
        if (!empty($location)) {
            printf("window.location.href = '%s'\n", $location);
        }
    echo '</script>';
} else {
    try {
        $stmt = $pdo->prepare('INSERT INTO tb_forma_pagamento VALUES (null, :descricao, :status)');
        $stmt->execute(array(
            ':descricao' => $descricao,
            ':status' => $status
        ));

        $mensagem = 'Forma de pagamento cadastrada com sucesso!';
        $location = '../forma-pagamento.php';

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
}
?>