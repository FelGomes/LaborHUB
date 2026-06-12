<?php

namespace Utils;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__ . '/../vendor/autoload.php';


class Email
{

    public function solicitacaoServico($email, $profissional, $servico, $status)
    {
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'laborhubconection@gmail.com';  //EMAIL QUE VAMOS CRIAR PARA LABORHUB
            $mail->Password   = 'szym yjms iefo qlql';       
            $mail->SMTPSecure =  PHPMailer::ENCRYPTION_STARTTLS;        
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
            //Recipients
            $mail->setFrom('laborhubconection@gmail.com', 'LaborHUB ');         
            $mail->addAddress($email);   //EMAIL DO USUARIO 
            // $mail->addAddress('ellen@example.com');             
            $mail->addReplyTo('laborhubconection@gmail.com', 'LaborHUB'); 
            
            //Attachments
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Solicitação de serviço';
            
           
            
            $mail->Body =
            
            "<h2> Solicitação de serviço foi: <strong> $status </strong> </h2>
            
            <p> 
            
            Informamos que sua solicitação de: $servico, com o/a profissional/empresa:  $profissional, foi: <strong>  $status.  </strong> Entre no sistema para ver mais detalhes.
            
            </p>";
            
                                         

            return $mail->send();
        } catch (Exception $e) {

            echo $mail->ErrorInfo;
            return false;
        }
    }

     public function enviarSolicitacao($email)
    {
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'felipeferreiraag0@gmail.com';  //EMAIL QUE VAMOS CRIAR PARA LABORHUB
            $mail->Password   = 'yors vjly hcwe lnji';       
            $mail->SMTPSecure =  PHPMailer::ENCRYPTION_STARTTLS;        
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
            //Recipients
            $mail->setFrom('felipeferreiraag0@gmail.com', 'LaborHUB ');         
            $mail->addAddress($email);   //EMAIL DO USUARIO 
            // $mail->addAddress('ellen@example.com');             
            $mail->addReplyTo('felipeferreiraag0@gmail.com', 'LaborHUB'); 
            
            //Attachments
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Solicitação de serviço';
            
           
            
            $mail->Body =
            
            "<h2> Você tem uma solicitação de serviço Pendente </h2>
            
            <p> 
            
            Informamos que você tem uma solicitação de serviço Pendente, entre no sistema para ver mais detalhes.
            </p>";
            
                                         

            return $mail->send();
        } catch (Exception $e) {

            echo $mail->ErrorInfo;
            return false;
        }
    }

    public function alterarSenha($email, $token)
    {
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'felipeferreiraag0@gmail.com';  
            $mail->Password   = 'yors vjly hcwe lnji';       
            $mail->SMTPSecure =  PHPMailer::ENCRYPTION_STARTTLS;        
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
            //Recipients
            $mail->setFrom('felipeferreiraag0@gmail.com', 'LaborHUB ');         
            $mail->addAddress($email);    
            // $mail->addAddress('ellen@example.com');             
            $mail->addReplyTo('felipeferreiraag0@gmail.com', 'LaborHUB'); 
            
            //Attachments
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Recuperação de senha';
            
            $linkTela = base_url("login/alterarSenha?token=$token");
            
            $mail->Body    =
            
            "<h2> Recuperação de senha </h2>
            
            <p> 
            
            Clique no link a seguir para redifinir sua senha.
            
            </p>
            
                                         
            <a href='$linkTela'> Clique aqui para alterar sua senha </a>";

            return $mail->send();
        } catch (Exception $e) {

            echo $mail->ErrorInfo;
            return false;
        }
    }

}
