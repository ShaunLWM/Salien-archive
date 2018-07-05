<?php
// for ($i = 1; $i <= 49; $i++) {
//     $ch = curl_init('https://steamcdn-a.akamaihd.net/steamcommunity/public/assets/saliengame/planets/Planet' . $i . '.png');
//     $fp = fopen('./assets/saliengame/planets/Planet' . $i . '.png', 'wb');
//     curl_setopt($ch, CURLOPT_FILE, $fp);
//     curl_setopt($ch, CURLOPT_HEADER, 0);
//     curl_exec($ch);
//     curl_close($ch);
//     fclose($fp);
// }

function downloadFile($url, $dest)
{
    $ch = curl_init($url);
    $fp = fopen($dest, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
}

// $str = file_get_contents("./css/shared_global.css");
// preg_match_all('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i', $str, $matches);
// foreach ($matches[0] as $m) {
//     echo $m . "\n";
//     $dir = str_replace("https://steamcommunity-a.akamaihd.net", ".", dirname($m)) . "/";
//     // echo dirname($m) . "\n";
//     @mkdir($dir, 0755, true);
//     downloadFile($m, $dir . basename($m));
// }

// for ($i = 1; $i <= 47; $i++) {
//     downloadFile('https://steamcdn-a.akamaihd.net/steamcommunity/public/assets/saliengame/maps/' . $i . '.png', __DIR__ . '/steamcommunity/public/assets/saliengame/maps/' . $i . '.png');
// }

// for ($i = 1; $i <= 47; $i++) {
//     downloadFile('https://steamcdn-a.akamaihd.net/steamcommunity/public/assets/saliengame/backgrounds/' . $i . '.png', __DIR__ . '/steamcommunity/public/assets/saliengame/backgrounds/' . $i . '.png');
// }


$str = file_get_contents("./customize_raw.txt");
preg_match_all('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i', $str, $matches);
foreach ($matches[0] as $m) {
    echo $m . "\n";
    $dir = str_replace("https://steamcdn-a.akamaihd.net", ".", dirname($m)) . "/";
    // echo dirname($m) . "\n";
    @mkdir($dir, 0755, true);
    downloadFile($m, $dir . basename($m));
}