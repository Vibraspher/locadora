<?php
require_once('conexao.php');

/* FORMA DE PAGAMENTO */
$idPagamento = $_GET["id_forma_pagamento"];

try{
    $pdo=Database::conexao();
    $stmt = $pdo->prepare('UPDATE tb_forma_pagamento SET descricao = :descricao, status = :status WHERE id_forma_pagamento = :id_forma_pagamento');
    $stmt->bindParam(':id_forma_pagamento', $idPagamento);   
    $stmt->bindParam(':descricao', $_POST['descricao']);   
    $stmt->bindParam(':status', $_POST['status']);   
    $stmt->execute();

    $mensagem = 'Alteração realizada com sucesso!';
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

?>