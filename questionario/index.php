<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::: Questionário de Matemática :::.</title>
</head>

<body>
<form action="gravar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="775" border="0" align="center">
    <tr>
      <td colspan="3"><table width="100%" border="0">
          <tr>
            <td width="6%">Nome:</td>
            <td width="77%"><label>
              <input name="nome" type="text" id="nome" size="100" />
            </label></td>
            <td width="17%">&nbsp;</td>
          </tr>
          <tr>
            <td>Setor:</td>
            <td><input name="setor" type="text" id="setor" size="100" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Cargo:</td>
            <td><input name="cargo" type="text" id="cargo" size="100" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>CPF:</td>
            <td><input name="cpf" type="text" id="cpf" size="100" /></td>
            <td>&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="3"><hr></td>
    </tr>
    <tr>
      <td colspan="3"><b>Questionário de Matemática</b></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">1. Qual é o valor aproximado de π?</td>
    </tr>
    <tr>
      <td colspan="3"><label><input type="radio" name="alt1" value="A" /> 3,14</label><br />
      <label><input type="radio" name="alt1" value="B" /> 3,1415</label><br />
      <label><input type="radio" name="alt1" value="C" /> 3,4</label><br />
      <label><input type="radio" name="alt1" value="D" /> 3,131</label></td>
    </tr>
    <tr>
      <td colspan="3">2. A derivada de x^2 é:</td>
    </tr>
    <tr>
      <td colspan="3"><label><input type="radio" name="alt2" value="A" /> x</label><br />
      <label><input type="radio" name="alt2" value="B" /> 2x</label><br />
      <label><input type="radio" name="alt2" value="C" /> x^3</label><br />
      <label><input type="radio" name="alt2" value="D" /> 2</label></td>
    </tr>
    <tr>
      <td colspan="3">3. O seno de 30° é:</td>
    </tr>
    <tr>
      <td colspan="3"><label><input type="radio" name="alt3" value="A" /> 1/2</label><br />
      <label><input type="radio" name="alt3" value="B" /> √3/2</label><br />
      <label><input type="radio" name="alt3" value="C" /> 0</label><br />
      <label><input type="radio" name="alt3" value="D" /> 1</label></td>
    </tr>
    <tr>
      <td colspan="3">4. Resolva 2x + 3 = 7:</td>
    </tr>
    <tr>
      <td colspan="3"><label><input type="radio" name="alt4" value="A" /> x = 1</label><br />
      <label><input type="radio" name="alt4" value="B" /> x = 2</label><br />
      <label><input type="radio" name="alt4" value="C" /> x = 3</label><br />
      <label><input type="radio" name="alt4" value="D" /> x = 4</label></td>
    </tr>
    
    <tr>
      <td colspan="3">5. Explique a diferença entre função linear e quadrática.</td>
    </tr>
    <tr>
      <td colspan="3"><textarea name="disc1" id="disc1" cols="100" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="3">6. Descreva como calcular a média aritmética de um conjunto de dados.</td>
    </tr>
    <tr>
      <td colspan="3"><textarea name="disc2" id="disc2" cols="100" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="3">7. Demonstre que a soma dos ângulos internos de um triângulo é 180°.</td>
    </tr>
    <tr>
      <td colspan="3"><textarea name="disc3" id="disc3" cols="100" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="3">8. Escreva os passos para resolver uma equação do 2º grau.</td>
    </tr>
    <tr>
      <td colspan="3"><textarea name="disc4" id="disc4" cols="100" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="3">9. Todo número primo é ímpar.</td>
    </tr>
    <tr>
      <td colspan="3"><label><input type="radio" name="vf1" value="sim" /> Sim</label><br />
      <label><input type="radio" name="vf1" value="nao" /> Não</label></td>
    </tr>
    <tr>
      <td colspan="3">10. A soma dos ângulos internos de um quadrilátero é 360°.</td>
    </tr>
    <tr>
      <td colspan="3"><label><input type="radio" name="vf2" value="sim" /> Sim</label><br />
      <label><input type="radio" name="vf2" value="nao" /> Não</label></td>
    </tr>
    <tr>
      <td colspan="3">11. O logaritmo de 1 em qualquer base é 0.</td>
    </tr>
    <tr>
      <td colspan="3"><label><input type="radio" name="vf3" value="sim" /> Sim</label><br />
      <label><input type="radio" name="vf3" value="nao" /> Não</label></td>
    </tr>
    <tr>
      <td colspan="3">12. A matriz identidade é diagonal.</td>
    </tr>
    <tr>
      <td colspan="3"><label><input type="radio" name="vf4" value="sim" /> Sim</label><br />
      <label><input type="radio" name="vf4" value="nao" /> Não</label></td>
    </tr>
    <tr>
      <td colspan="3"><hr /></td>
    </tr>
    <tr>
      <td colspan="3"><label>
        <input type="submit" name="Submit" id="button" value=".::: Gravar Cadastro :::." />
        <input type="reset" name="button2" id="button2" value=".::: Limpar Formulário :::." />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>