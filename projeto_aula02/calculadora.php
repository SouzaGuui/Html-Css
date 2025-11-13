<?php

$valor_produto = 150;

$quantidade = 3;

$imposto_percentual = 0.10; // 10%


$subtotal = $valor_produto * $quantidade;

$valor_imposto = $subtotal * $imposto_percentual;

$total_final = $subtotal + $valor_imposto;

echo "<h2>Calculadora de Pedido</h2>";

echo "Subtotal (R$): " . $subtotal . "<br>"; // Resultado: 450

echo "Valor do Imposto (R$): " . $valor_imposto . "<br>"; // Resultado: 45

echo "Total a Pagar (R$): " . $total_final . "<br>"; // Resultado: 495
?>