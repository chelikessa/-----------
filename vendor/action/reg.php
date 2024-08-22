<?php
    session_start();
    include '../components/core.php';

        
    if(isset($_POST["reg"])){
        if(!empty($_POST['surname']) && $_POST['name'] && $_POST['email']
        && $_POST['login'] && $_POST['advantages']){
            $user = $link -> query("SELECT * FROM `users` WHERE `login` = '{$_POST['login']}' OR `email` = '{$_POST['email']}'");
            if($user -> num_rows > 0){
                $_SESSION['error']['login'] = "Пользователь с таким логином или почтой уже существует!";
                header("location:" .$_SERVER['HTTP_REFERER']);
            }elseif(isset($_POST['ch1'])&& $_POST['ch2']){
                    $link -> query ("INSERT INTO `users`(`isAdmin`,`surname`, `name`,
                    `email`, `login`, `advantages`, `password`, `status_user`) VALUES ('0', '{$_POST['surname']}', '{$_POST['name']}',
                    '{$_POST['email']}', '{$_POST['login']}', '{$_POST['advantages']}', '0', '0')");
                    

                    $surname = trim($_POST['surname']);
                    $name = trim($_POST['name']);
                    $email = trim($_POST['email']);
                    $login = trim($_POST['login']);
                    $advantages = trim($_POST['advantages']);


                    require_once('../../assets/script/PHPMailer-master/src/PHPMailer.php');
                    require_once('../../assets/script/PHPMailer-master/src/SMTP.php');
                    require_once('../../assets/script/PHPMailer-master/src/Exception.php');
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
                    $mail->Subject = 'Заявка на становление модератором'; 
                    $mail->Body = '
Новая заявка

Фамилия: '. $surname .'
Имя: '. $name .'
Почта: '. $email .'
Логин: '. $login .'
О себе: '. $advantages .'
                ';
                    $mail->CharSet = 'UTF-8';
                    $mail->isHTML(false); 
                    $mail->AddAddress("rnupogodi@mail.ru"); //тот кому придет письмо
                    $mail->SMTPDebug = 0; 
                    if($mail->send()){
                        $_SESSION['success']['reg'] = "Ваша заявка отправлена!";
                        header("location:" .$_SERVER['HTTP_REFERER']);
                    }

            }
            else{
                $_SESSION['error']['ch'] = "Вы не отметили обязательные поля!";
                header("location:" .$_SERVER['HTTP_REFERER']);
            }
        }
        else{
            $_SESSION['error']['reg'] = "Корректно заполните все поля!";
            header("Location:".$_SERVER['HTTP_REFERER']);
        }
    }
?>