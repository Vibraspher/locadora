<?php
require_once('conexao.php');

/*CADASTRAR USUARIO*/
$login = $_POST["login"];
$senha = $_POST["senha"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$perfil = $_POST["id_perfil_usuario"];
$cpf = $_POST["cpf"];
$logradouro = $_POST["logradouro"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];
$data = new DateTime();
$datetime = $data->format('Y-m-d H:i:s');
$status = "H";

$pdo=Database::conexao();

$verifica = $pdo->prepare('SELECT * FROM tb_usuario WHERE login = :login');
$verifica->bindValue(":login", $_POST['login']);
$verifica->execute();

$rows = $verifica->rowCount();
if($rows>=1){
    $mensagem = 'Já possui usuário com esse login, tente outro!';
    $location = '../usuarios.php';

    // criar e exibir o javascript
    echo '<script>';
        printf("alert('%s');\n", $mensagem);
        if (!empty($location)) {
            printf("window.location.href = '%s'\n", $location);
        }
    echo '</script>';
} else {
    try {
        $stmt = $pdo->prepare('INSERT INTO tb_usuario VALUES (null, :id_perfil_usuario, :cpf, :nome, :login, :email, :senha, :logradouro, :numero, :bairro, :cidade, :estado, :cep, :data, :status)');
        $stmt->execute(array(
            ':id_perfil_usuario' => $perfil,
            ':cpf' => $cpf,
            ':nome' => $nome,
            ':login' => $login,
            ':email' => $email,
            ':senha' => $senha,
            ':logradouro' => $logradouro,
            ':numero' => $numero,
            ':bairro' => $bairro,
            ':cidade' => $cidade,
            ':estado' => $estado,
            ':cep' => $cep,
            ':data' => $datetime,
            ':email' => $email,
            ':status' => $status
        ));

        $mensagem = 'Usuário cadastrado com sucesso!';
        $location = '../usuarios.php';

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