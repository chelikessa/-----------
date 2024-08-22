<?php
    session_start();
    include '../../components/core.php';

    if(isset($_POST['yes_btn'])){
        $user = $link -> query("SELECT * `users` WHERE `id` = '{$_POST['id']}'
        AND `email` = '{$_POST['email']}'");

            $_SESSION['new__password'] = rand(100000, 999999);

            $email = trim($_POST['email']);
            $new_password = trim($_POST['new_password']);

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
            $mail->Body = 'Вы приняты в команду модераторов!
            
Ваш пароль от личного кабинета - ' . $_SESSION['new__password'].
'
Можете изменить его в любой момент в своем личном кабинете.';  
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(false); 
            $mail->AddAddress($email);
            $mail->SMTPDebug = 0; 
            if($mail->send()){
                $rnd_password = $_SESSION['new__password'];
                $link -> query("UPDATE `users` SET `password` = '$rnd_password', `status_user` = '1'
                WHERE `id` = '{$_POST['id']}' AND `email` = '{$_POST['email']}'");
                $_SESSION['success']['new__pass'] = "Пароль модератору отправлен";
                header("location:" .$_SERVER['HTTP_REFERER']);
            }
        
    }
?>