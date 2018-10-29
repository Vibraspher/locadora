<?php
require_once("class.phpmailer.php");

$mail = new PHPMailer(true);

$mail->IsSMTP(); // Define que a mensagem será SMTP
 
try {
    $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
    $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
    $mail->Port       = 587; //  Usar 587 porta SMTP
    $mail->Username = 'edulima2412@gmail.com'; // Usuário do servidor SMTP (endereço de email)
    $mail->Password = 'carlos18'; // Senha do servidor SMTP (senha do email usado)

    //Define o remetente  
    $mail->SetFrom('edulima2412@gmail.com', 'Nome'); //Seu e-mail
    //$mail->AddReplyTo('seu@e-mail.com.br', 'Nome'); //Seu e-mail
    $mail->Subject = 'Assunto';//Assunto do e-mail


    //Define os destinatário(s)
    $mail->AddAddress('edulima2412@gmail.com', 'Teste Locaweb');

    //Define o corpo do email
    $mail->MsgHTML('teste'); 

    $mail->Send();
    echo "Mensagem enviada com sucesso</p>\n";

}catch (phpmailerException $e) {
    echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}
?>