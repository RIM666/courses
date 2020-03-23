<?php

function validate($str) {
    $length = strlen($str);
    $bracketStack = [];
    for ($i = 0; $i < $length; $i++)
         if ($str[$i] === '(' || $str[$i] === '<' || $str[$i] === '[') {
             $bracketStack[] = $str[$i];
             //echo array_pop($bracketStack);
         } elseif ($str[$i] === ')' || $str[$i] === '>' || $str[$i] === ']') {
             $lastElement = array_pop($bracketStack);
             if ($str[$i] === ')' && $lastElement !== '(') {
                 return false;
             } elseif ($str[$i] === ']' && $lastElement !== '[') {
                return false;
             } elseif ($str[$i] === '>' && $lastElement !== '<') {
                return false;
             }
         }
    return count($bracketStack) === 0;
}

echo (int)validate('5 + 3 - (4 + 12)') . PHP_EOL; // правильно
echo (int)validate("<test> [ foo ] ( bar )") . PHP_EOL; // правильно
echo (int)validate("[ ( foo) ] <bar>") . PHP_EOL; // правильно
echo (int)validate('[ ( test ] )') . PHP_EOL; // неправильно, потому что квадратная скобка закрылась раньше круглой
echo (int)validate('( hello ') . PHP_EOL;// неправильно, потому что нет закрывающей скобки