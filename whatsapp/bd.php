<?php

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

$conexao->query("CREATE TABLE IF NOT EXISTS tb_users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

$conexao->query("CREATE TABLE IF NOT EXISTS tb_chat (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  mensagem TEXT NOT NULL,
  data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  likes INT NOT NULL DEFAULT 0,
  dislikes INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

function formatarData($data){
    return date('H:i:s', strtotime($data));

}


 ?>
