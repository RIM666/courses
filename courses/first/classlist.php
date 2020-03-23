<?php

//file: Classlist.php

require_once "classes.php";

function classlist($list)
{
    $className = '';
   current($list);
    $className .= current($list);
    next ($list);
    while ($keyValue = current($list)) {
        if ($keyValue === true) {
            $className .= ' ' . key($list);
            }
        next($list);
    }
    return $className;
}