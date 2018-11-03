<?php
require_once('conexao.php');

$idPagamento = $_GET["id_forma_pagamento"];

try{
    $pdo=Database::conexao();
    $stmt = $pdo->prepare('DELETE FROM tb_forma_pagamento WHERE id_forma_pagamento = :id_forma_pagamento');
    $stmt->bindParam(':id_forma_pagamento', $idPagamento);   
    $stmt->execute();

    $mensagem = 'Forma de pagamento excluida com sucesso!';
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