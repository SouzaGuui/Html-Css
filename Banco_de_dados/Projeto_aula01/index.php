<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>.::: Questionário de Química :::.</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="gravar.php" method="post" name="form1" id="form1">

            <!-- DADOS PESSOAIS EM LINHA -->
            <div class="header-info">
                <div class="field">
                    <label>Nome:</label>
                    <input type="text" name="nome" required>
                </div>
                <div class="field">
                    <label>Setor:</label>
                    <input type="text" name="setor" required>
                </div>
                <div class="field">
                    <label>Cargo:</label>
                    <input type="text" name="cargo" required>
                </div>
                <div class="field">
                    <label>CPF:</label>
                    <input type="text" name="cpf" required>
                </div>
            </div>

            <h2>Questionário de Química</h2>

            <!-- PERGUNTA 1 -->
            <div class="question">
                <strong>1. O átomo é formado por quais partículas fundamentais?</strong>
                <div class="options">
                    <label><input type="radio" name="conceito" value="op1" required /> Prótons, elétrons e moléculas</label><br>
                    <label><input type="radio" name="conceito" value="op2" /> Elétrons, nêutrons e íons</label><br>
                    <label><input type="radio" name="conceito" value="op3" /> Prótons, nêutrons e elétrons</label><br>
                    <label><input type="radio" name="conceito" value="op4" /> Núcleos, íons e elétrons</label>
                </div>
                <div class="comment">
                    <label>Comente:</label>
                    <textarea name="coment_um" rows="3"></textarea>
                </div>
            </div>

            <!-- PERGUNTA 2 -->
            <div class="question">
                <strong>2. Explique a diferença entre reação endotérmica e exotérmica.</strong>
                <textarea name="tecnologias" rows="5" required></textarea>
            </div>

            <!-- PERGUNTA 3 -->
            <div class="question">
                <strong>3. A água é considerada uma substância pura?</strong>
                <div class="options">
                    <label><input type="radio" name="funcionalidades" value="sim" required /> Sim</label>
                    <label><input type="radio" name="funcionalidades" value="nao" /> Não</label>
                </div>
                <div class="comment">
                    <label>Comente:</label>
                    <textarea name="coment_dois" rows="3"></textarea>
                </div>
            </div>

            <!-- PERGUNTA 4 -->
            <div class="question">
                <strong>4. Descreva o que ocorre com as partículas durante a mudança de estado físico da matéria.</strong>
                <textarea name="mascote" rows="5" required></textarea>
            </div>

            <!-- PERGUNTA 5 -->
            <div class="question">
                <strong>5. O que é ligação iônica e como ela se forma?</strong>
                <textarea name="caracteristicas" rows="5" required></textarea>
            </div>

            <!-- PERGUNTA 6 -->
            <div class="question">
                <strong>6. Qual das opções representa uma mudança química?</strong>
                <div class="options">
                    <label><input type="radio" name="pergunta6" value="fusao" required /> Fusão do gelo</label><br>
                    <label><input type="radio" name="pergunta6" value="ebulicao" /> Ebulição da água</label><br>
                    <label><input type="radio" name="pergunta6" value="queima" /> Queima de papel</label><br>
                    <label><input type="radio" name="pergunta6" value="dissolucao" /> Dissolução de sal na água</label>
                </div>
            </div>

            <!-- PERGUNTA 7 -->
            <div class="question">
                <strong>7. O que o número atômico indica em um elemento químico?</strong>
                <div class="options">
                    <label><input type="radio" name="pergunta7" value="massa" required /> Massa do átomo</label><br>
                    <label><input type="radio" name="pergunta7" value="protons" /> Número de prótons</label><br>
                    <label><input type="radio" name="pergunta7" value="neutrons" /> Número de nêutrons</label><br>
                    <label><input type="radio" name="pergunta7" value="eletrons" /> Número de elétrons</label>
                </div>
            </div>

            <!-- PERGUNTA 8 -->
            <div class="question">
                <strong>8. O que caracteriza uma substância pura?</strong>
                <div class="options">
                    <label><input type="radio" name="pergunta8" value="mistura" required /> É sempre uma mistura</label><br>
                    <label><input type="radio" name="pergunta8" value="composicao" /> Tem composição fixa e propriedades definidas</label><br>
                    <label><input type="radio" name="pergunta8" value="variedade" /> Pode ter várias composições</label><br>
                    <label><input type="radio" name="pergunta8" value="impureza" /> Contém impurezas</label>
                </div>
            </div>

            <!-- PERGUNTA 9 -->
            <div class="question">
                <strong>9. Qual a importância da tabela periódica no estudo da Química?</strong>
                <textarea name="pergunta9" rows="5" required></textarea>
            </div>

            <!-- PERGUNTA 10 -->
            <div class="question">
                <strong>10. Toda reação química libera calor?</strong>
                <div class="options">
                    <label><input type="radio" name="pergunta10" value="sim" required /> Sim</label>
                    <label><input type="radio" name="pergunta10" value="nao" /> Não</label>
                </div>
            </div>

            <!-- PERGUNTA 11 -->
            <div class="question">
                <strong>11. O oxigênio é essencial para a combustão?</strong>
                <div class="options">
                    <label><input type="radio" name="pergunta11" value="sim" required /> Sim</label>
                    <label><input type="radio" name="pergunta11" value="nao" /> Não</label>
                </div>
            </div>

            <!-- PERGUNTA 12 -->
            <div class="question">
                <strong>12. Os átomos podem ser criados ou destruídos em uma reação química?</strong>
                <div class="options">
                    <label><input type="radio" name="pergunta12" value="sim" required /> Sim</label>
                    <label><input type="radio" name="pergunta12" value="nao" /> Não</label>
                </div>
            </div>

            <!-- BOTÕES -->
            <div class="btn-group">
                <button type="submit" class="btn save">Gravar Respostas</button>
                <button type="reset" class="btn clear">Limpar Formulário</button>
            </div>

        </form>
    </div>
</body>
</html>