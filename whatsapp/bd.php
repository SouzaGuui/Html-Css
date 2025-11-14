<?php

// BANCO DE DADOS SERVIDOR LOCAL XAMPP
$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "whatsapp";  



if (function_exists('mysqli_report')) { mysqli_report(MYSQLI_REPORT_OFF); }
$conexao = new mysqli($servidor,$usuario,$password,$bd);
// Garantir suporte a emojis e caracteres multibyte
if (method_exists($conexao, 'set_charset')) {
    $conexao->set_charset('utf8mb4');
}

function formatarData($data){
    return date('H:i:s', strtotime($data));

}


 ?>