<?php
// Получаем текущий полный URL
$url = parse_url("http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']);

// Распетрушиваем путь на «папки»
$dirs = explode('/', $url['path']);

// Парсим переменные GET в глобальный массив $_GET
isset($url['query']) && parse_str($url['query'], $_GET);

// Декодируем в UTF-8 все символы, отличные от латиницы
for ($i=1; $i<(count($dirs)-1); $i++) {
    $dirs[$i]=urldecode($dirs[$i]);
}
for ($i=1; $i<(count($dirs)-1); $i++) {
    echo '$dirs['.$i.']='.$dirs[$i].'<'.'br />';
}
print_r($_GET);