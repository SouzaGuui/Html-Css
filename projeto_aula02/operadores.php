<?php

$contador = 10;

echo "Valor Inicial: " . $contador . "<br>";

$contador += 5; // $contador agora é 15

echo "Após += 5: " . $contador . "<br>";

// Subtrai 3 do valor atual

$contador -= 3; // $contador agora é 12

echo "Após -= 3: " . $contador . "<br>";


echo "Pós-incremento (12++): " . $contador++ . "<br>"; // Exibe 12, mas a variável é 13

echo "Valor Atual: " . $contador . "<br>"; // Exibe 13

// Pré-incremento (incrementa, DEPOIS exibe o novo valor)

echo "Pré-incremento (++13): " . ++$contador . "<br>"; // Exibe 14

echo "Valor Final: " . $contador . "<br>"; // Exibe 14
?>