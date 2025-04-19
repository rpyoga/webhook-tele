<?php
http_response_code(200);
$content = file_get_contents("php://input");
file_put_contents("log.txt", $content . "\n", FILE_APPEND);

$val = json_decode($content, true);
$chat_id = $val['message']['chat']['id'] ?? null;
$text = $val['message']['text'] ?? '';

if ($chat_id && $text === '/start') {
    $token = '7207826621:AAHyZAtY82jSDDusO-zSF-SqKklO7mNTfPI';
    $reply = "Halo dari Railway! Bot berhasil konek 😎";

    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($reply));
}
