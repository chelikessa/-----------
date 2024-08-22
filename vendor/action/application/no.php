<?php
    session_start();
    include '../../components/core.php';

    if(isset($_POST['no_btn'])){
        if(!empty($_POST['text_no'])){
            $user = $link -> query("SELECT * `users` WHERE `id` = '{$_POST['id']}'
            AND `email` = '{$_POST['email']}'");

            $email = trim($_POST['email']);
            $text_no = trim($_POST['text_no']);

            require_once('../../../assets/script/PHPMailer-master/src/PHPMailer.php');
            require_once('../../../assets/script/PHPMailer-master/src/SMTP.php');
            require_once('../../../assets/script/PHPMailer-master/src/Exception.php');
            $mail = new PHPMailer\PHPMailer\PHPMailer(); 
            $mail->isSMTP();
            $mail->Host = 'ssl://smtp.mail.ru'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'rnupogodi@mail.ru';
            $mail->Password = 'nNs8iNMvuH6ESpH1emY7';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = '465';
            $mail->SMTPOptions = [ 'ssl' => [ 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true, ] ];
            $mail->From = 'rnupogodi@mail.ru'; 
            $mail->FromName = 'ВикиПлагиат - Бесплатная энциклопедия'; 
            $mail->Subject = 'Ответ на заявку'; 
            $mail->Body = 'К сожалению Вы не приняты в команду модераторов ВикиПлагиат.
            
Причина: '. $text_no .'
            ';
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(false); 
            $mail->AddAddress($email);
            $mail->SMTPDebug = 0; 
            if($mail->send()){
                $_SESSION['success']['text_no'] = "Сообщение модератору отправлено";
                $link -> query("DELETE FROM `users` WHERE `email` = '$email'");
                header("location:" .$_SERVER['HTTP_REFERER']);
            }
        }
        else{
            $_SESSION['error']['text_no'] = "Вы не заполнили поле!";
            header("location:" .$_SERVER['HTTP_REFERER']);
        }
    }
?>