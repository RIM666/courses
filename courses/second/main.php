<?php

function validate($str) {
    $length = strlen($str); // Длина строки на входе функции
    $bracketStack = []; // Стек для хранение скобок
    for ($i = 0; $i < $length; $i++)
         if ($str[$i] === '(' || $str[$i] === '<' || $str[$i] === '[') {
             $bracketStack[] = $str[$i];
         } elseif ($str[$i] === ')' || $str[$i] === '>' || $str[$i] === ']') {
             $lastElement = array_pop($bracketStack); // Удаление последнего элемента стека и его присваивание $lastElement
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
