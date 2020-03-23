<?php

//file: classlist.php

require_once "classes.php";

function classlist($list)
{
    $className = ''; // Инициализация переменной
    $className .= current($list); // Добавление первого элемента "b--user" к строке
    next ($list); 
    while ($keyValue = current($list)) {
        if ($keyValue === true) {
            $className .= ' ' . key($list);
            }
        next($list);
    }
    return $className;
}
