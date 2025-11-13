<?php

define("PI", 3.14159);

$raio = 5; // Raio do círculo em cm

?>

<?php

// O valor da constante PI é acessado diretamente pelo nome

$area = PI * ($raio ** 2);

?>

<?php

echo "<h2>Atividade 7: Área do Círculo</h2>";

echo "Raio: {$raio} cm <br>";

echo "Área: " . round($area, 2) . " cm²"; // Arredondado para 2 casas

?>