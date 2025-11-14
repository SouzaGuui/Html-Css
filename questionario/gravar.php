<?php

include('conecta.php');

?>

<?php

$nome = $_POST['nome'];
$setor = $_POST['setor'];
$cargo = $_POST['cargo'];
$cpf = $_POST['cpf'];
$alt1 = $_POST['alt1'];
$alt2 = $_POST['alt2'];
$alt3 = $_POST['alt3'];
$alt4 = $_POST['alt4'];
$disc1 = $_POST['disc1'];
$disc2 = $_POST['disc2'];
$disc3 = $_POST['disc3'];
$disc4 = $_POST['disc4'];
$vf1 = $_POST['vf1'];
$vf2 = $_POST['vf2'];
$vf3 = $_POST['vf3'];
$vf4 = $_POST['vf4'];

$query = "INSERT INTO $tabela VALUES ('NULL',
'$nome',
'$setor',
'$cargo',
'$cpf',
'$alt1',
'$alt2',
'$alt3',
'$alt4',
'$disc1',
'$disc2',
'$disc3',
'$disc4',
'$vf1',
'$vf2',
'$vf3',
'$vf4')";

$mysqli = new mysqli($host, $login, $password, $bd);

if ($mysqli->connect_error) {
  die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

$resultado = $mysqli->query($query);

if ($resultado) {
  echo "Questionário de Matemática foi respondido com sucesso.";
} else {
  echo "Erro na consulta: " . $mysqli->error;
}

$mysqli->close(); 
?>





