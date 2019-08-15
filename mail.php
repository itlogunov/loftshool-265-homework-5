<?php

require_once 'init.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.yandex.ru', 465, 'ssl'))
    ->setUsername('loft-test-mail@yandex.ru')
    ->setPassword('loft-test-mail1')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Задание #5.1'))
    ->setFrom(['loft-test-mail@yandex.ru' => 'loft-test-mail@yandex.ru'])
    ->setTo(['loft-test-mail@yandex.ru'])
    ->setBody('Письмо с контентом для тестирования swiftmailer')
;

// Send the message
$result = $mailer->send($message);
if ($result) {
    echo 'Письмо успешно отправлено!';
}