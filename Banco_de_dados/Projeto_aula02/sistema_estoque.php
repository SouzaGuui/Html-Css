<?php

$nome_projeto = "Sistema de Estoque"; 

$versao = 1.1;

$data_atual = "20/11/2025";

$autor = "Guilherme de Souza Leite";

?>

<?php

$cabecalho = "

<h2>Relatório de Versão</h2>

<p>Projeto: **{$nome_projeto}**</p>

<p>Versão: {$versao} | Status em: {$data_atual}</p>

<p>Desenvolvido por: {$autor}</p>

";

?>

<?php

echo "<h2>Atividade 10: Multi-Concatenação</h2>";

echo $cabecalho;

?>