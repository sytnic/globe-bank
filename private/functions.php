<?php

// Функция создаёт url-путь от корня сайта для указываемого пути
function url_for($script_path) {
    // add the leading '/' if not present
    // добавит лидирующий слэш, если его не было
    if($script_path[0] != '/') {
      $script_path = "/" . $script_path;
    }

    return WWW_ROOT . $script_path;
}

?>
