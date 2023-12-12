<?php
$url = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $url);
$file = $break[count($break) - 1];
$cachefile = 'cached-'.substr_replace($file ,"",-4).'.html';
// Обслуживается из файла кеша, если время запроса меньше DEFAULT_CACHE_TIME_SECONDS
if (file_exists($cachefile) && time() - DEFAULT_CACHE_TIME_SECONDS < filemtime($cachefile)) {
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    include($cachefile);
    exit;
}
?>