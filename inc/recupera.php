<?php
require_once("class.phpmailer.php");
require_once("../conexao.php");

$email = $_POST["email"];

$pdo=Database::conexao();;
$recupera = $pdo->prepare('SELECT * FROM tb_usuario WHERE email = :email');
$recupera->bindValue(":email", $_POST['email']);
$recupera->execute();

$rows = $recupera->rowCount();

if($rows>=1){
    while($ln = $recupera->fetch(PDO::FETCH_ASSOC))
    {
        $login = $ln['login'];
        $senha = $ln['senha'];
        $nome = $ln['nome'];
    }

    $mail = new PHPMailer(true);
    $mail->IsSMTP();

    try {
        $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
        $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
        $mail->Port       = 465; //  Usar 587 porta SMTP
        $mail->SMTPDebug = false;
        $mail->SMTPSecure       = 'ssl';
        $mail->Username = 'locarfac@gmail.com'; // Usuário do servidor SMTP (endereço de email)
        $mail->Password = '357159FAC'; // Senha do servidor SMTP (senha do email usado)
    
        //Define o remetente  
        $mail->SetFrom('no-reply@gmail.com','Locadora'); //Seu e-mail
        $mail->Subject = 'Recuperacao de senha';//Assunto do e-mail
    
        //Define os destinatário(s)
        $mail->AddAddress($email, $login);
        
        $msg='Ola, '.$nome.'<br /><br />Login: '.$login.'<br />Senha: '.$senha;

        //Define o corpo do email
        $mail->MsgHTML($msg); 
    
        $mail->Send();
        $mensagem = 'Mensagem enviada com sucesso!';
        $location = '../index.php';
    
        // criar e exibir o javascript
        echo '<script>';
            printf("alert('%s');\n", $mensagem);
            if (!empty($location)) {
                printf("window.location.href = '%s'\n", $location);
            }
        echo '</script>';
    
    }catch (phpmailerException $e) {
        echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
    }
} else {
    $mensagem = 'Não possui email cadastrado!';
    $location = '../index.php';

    // criar e exibir o javascript
    echo '<script>';
        printf("alert('%s');\n", $mensagem);
        if (!empty($location)) {
            printf("window.location.href = '%s'\n", $location);
        }
    echo '</script>';
}
?>