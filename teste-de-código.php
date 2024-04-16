<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'config/phpmailer/src/Exception.php';
require 'config/phpmailer/src/PHPMailer.php';
require 'config/phpmailer/src/SMTP.php';
require 'form_request/user_register.php';
// Instância da classe
if (isset($_POST'registerBTn')) {
    $mail = new PHPMailer(true);
    try
    {
        // Configurações do servidor
        $mail->isSMTP();        //Devine o uso de SMTP no envio
        $mail->SMTPAuth = true; //Habilita a autenticação SMTP
        $mail->Username   = 'suporte.ed.pst@gmail.com';
        $mail->Password   = 'V$4ptpGqu%xqWawHr$pSy2$GVh*tgStT&wb9vmS@';
        // Criptografia do envio SSL também é aceito
        $mail->SMTPSecure = 'tls';
        // Informações específicadas pelo Google
        $mail->Host = 'smtp.email.com';
        $mail->Port = 587;
        // Define o remetente
        $mail->setFrom('suporte.ed.pst@gmail.com', 'Easy Delivery');
        // Define o destinatário
        $mail->addAddress(`$email`, `$username`);
        // Conteúdo da mensagem
        $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
        $mail->Subject = 'Código de validação de e-mail';
        $mail->Body    = 'O seu código de verificação é:<b>666666</b>';
        $mail->AltBody = 'Insira onde foi solicitado';
        // Enviar
        $mail->send();
        echo 'A mensagem foi enviada!';
    }
    catch (Exception $e)
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>