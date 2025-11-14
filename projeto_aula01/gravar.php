<?php

include('conecta.php');

?>

<?php

$nome = $_POST['nome'];
$setor = $_POST['setor'];
$cargo = $_POST['cargo'];
$cpf = $_POST['cpf'];
$conceito = $_POST['conceito'];
$coment_um = $_POST['coment_um'];
$tecnologias = $_POST['tecnologias'];
$funcionalidades = $_POST['funcionalidades'];
$coment_dois = $_POST['coment_dois'];
$mascote = $_POST['mascote'];
$caracteristicas = $_POST['caracteristicas'];

$query = "INSERT INTO $tabela VALUES ('NULL',
'$nome',
'$setor',
'$cargo',
'$cpf',
'$conceito',
'$coment_um',
'$tecnologias',
'$funcionalidades',  
'$coment_dois',
'$mascote',
'$caracteristicas')"
$pergunta6 = $_POST['pergunta6'] ?? '';
$pergunta7 = $_POST['pergunta7'] ?? '';
$pergunta8 = $_POST['pergunta8'] ?? '';
$pergunta9 = $_POST['pergunta9'] ?? '';
$pergunta10 = $_POST['pergunta10'] ?? '';
$pergunta11 = $_POST['pergunta11'] ?? '';
$pergunta12 = $_POST['pergunta12'] ?? '';

$mysqli = new mysqli($host, $login, $password, $bd);

if ($mysqli->connect_error) {
  die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

$resultado = $mysqli->query($query);

if ($resultado) {
  echo "Questionário Back-End foi respondido com sucesso.";
} else {
  echo "Erro na consulta: " . $mysqli->error;
}

$mysqli->close(); 
?>