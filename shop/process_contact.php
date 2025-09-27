<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // код для отправки email | сохранения в базу данных
    // Например:
    $to = "info@tehnodom.ru";
    $headers = "From: $email\r\n";
    $email_subject = "Сообщение с сайта: " . $subject;
    $email_body = "Имя: $name\nТелефон: $phone\nEmail: $email\n\nСообщение:\n$message";
    
    // mail($to, $email_subject, $email_body, $headers);
    
    // Возвращаем успешный ответ
    echo json_encode(['success' => true, 'message' => 'Сообщение отправлено!']);
}
?>