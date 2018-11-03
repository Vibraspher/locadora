<?php
require_once('conexao.php');

/*CADASTRAR VEICULO*/
$placa = $_POST["placa"];
$modelo = $_POST["modelo"];
$chassi = $_POST["chassi"];
$cor = $_POST["cor"];
$status = $_POST["status"];
$categoria = $_POST["categoria"];
$data = new DateTime();
$datetime = $data->format('Y-m-d H:i:s');

$pdo=Database::conexao();

$verifica = $pdo->prepare('SELECT * FROM tb_veiculo WHERE placa = :placa');
$verifica->bindValue(":placa", $_POST['placa']);
$verifica->execute();

$rows = $verifica->rowCount();
if($rows>=1){
    $mensagem = 'Veiculo já cadastrado, tente outro!';
    $location = '../veiculos.php';

    // criar e exibir o javascript
    echo '<script>';
        printf("alert('%s');\n", $mensagem);
        if (!empty($location)) {
            printf("window.location.href = '%s'\n", $location);
        }
    echo '</script>';
} else {
    try {
        $stmt = $pdo->prepare('INSERT INTO tb_veiculo VALUES (null, :categoria, :placa, :modelo, :chassi, :cor, :status, :data)');
        $stmt->execute(array(
            ':categoria' => $categoria,
            ':placa' => $placa,
            ':modelo' => $modelo,
            ':chassi' => $chassi,
            ':cor' => $cor,
            ':status' => $status,
            ':data' => $datetime
        ));

        $mensagem = 'Veiculo cadastrado com sucesso!';
        $location = '../veiculos.php';

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