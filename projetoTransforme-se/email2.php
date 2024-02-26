<?php

session_start();
include "assets/phpmailer/PHPMailerAutoload.php"; 

// Verifica se o formulário já foi enviado
//if (isset($_SESSION['form_submitted'])) {
    // Redireciona para evitar re-envio do formulário
   // header("Location: index.php?email_contato=Email já foi enviado.");
    //exit();
//}

// Cria uma nova instância do PHPMailer para o usuário
$mailUser = new PHPMailer();
$mailUser->IsSMTP();
$mailUser->Host = 'br.ego9080.com.br';
$mailUser->Port = 587;
$mailUser->Username = 'tonyventuraemail@palestrantedeinovacao.com.br';
$mailUser->Password = 'Marca9262*'; // Lembre-se de armazenar isso de maneira segura!
$mailUser->From = 'tonyventuraemail@palestrantedeinovacao.com.br';
$mailUser->AddAddress($_POST['email']); // O e-mail do usuário que preencheu o formulário
$mailUser->CharSet = 'UTF-8';
$mailUser->Subject = "Recebemos seu contato!";
$mailUser->FromName = "Palestrante de Inovação"; 
$mailUser->isHTML(true); // Definir o formato do e-mail para HTML

// Conteúdo HTML do e-mail do usuário
$htmlContentUser = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email de Confirmação</title>
</head>
<body>
    <div style="margin: auto; width: 100%; max-width: 500px">
        <img src="https://www.palestrantedeinovacao.com.br/assets/img/head-email.jpg" style="width: 100%" />
        <table style="padding: 15px; font-family: arial, sans-serif" cellspacing="5px">
            <tbody>
                <tr>
                    <td>
                        <p>Olá <b>' . $_POST['nome'] . '</b>, recebi seu e-mail e em breve estarei entrando em contato com você! Muito obrigado.</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <img src="https://www.palestrantedeinovacao.com.br/assets/img/footer-email.jpg" style="width: 100%" />
    </div>
</body>
</html>';

$mailUser->Body = $htmlContentUser;

// Envia o e-mail ao usuário
if (!$mailUser->Send()) {
    echo 'Erro ao enviar e-mail ao usuário: ' . $mailUser->ErrorInfo;
    exit();
}

// Cria uma nova instância do PHPMailer para o administrador
$mailAdmin = new PHPMailer();
$mailAdmin->IsSMTP();
$mailAdmin->Host = 'br.ego9080.com.br';
$mailAdmin->Port = 587;
$mailAdmin->Username = 'tonyventuraemail@palestrantedeinovacao.com.br';
$mailAdmin->Password = 'Marca9262*'; // Lembre-se de armazenar isso de maneira segura!
$mailAdmin->From = 'tonyventuraemail@palestrantedeinovacao.com.br';
$mailAdmin->AddAddress('guedesventura@gmail.com'); // O e-mail do administrador
$mailAdmin->CharSet = 'UTF-8';
$mailAdmin->isHTML(true); // Definir o formato do e-mail para HTML
$mailAdmin->Subject = "Nova mensagem de contato pelo site Palestrante de Inovação"; 
$mailAdmin->FromName = "Contato site Palestrante de Inovação"; 
// Conteúdo HTML do e-mail do administrador
$htmlContentAdmin = "
Recebemos uma nova mensagem do formulário de contato.<br><br>Nome: " . $_POST['nome'] . "<br>E-mail: " . $_POST['email'] . "<br>Telefone: " . $_POST['telefone'] . "<br>Mensagem: " . $_POST['mensagem'];

$mailAdmin->Body = $htmlContentAdmin;

// Envia o e-mail ao administrador
if (!$mailAdmin->Send()) {
    echo 'Erro ao enviar e-mail ao administrador: ' . $mailAdmin->ErrorInfo;
    exit();
}

// Marca o formulário como enviado na sessão
$_SESSION['form_submitted'] = true;

// Redireciona após o envio bem-sucedido
header("Location: index.php?email_contato=Obrigado por seu contato, em breve responderemos.");
exit();
?>