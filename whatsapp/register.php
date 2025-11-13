<?php
require_once 'bd.php';
require_once 'auth.php';

$error = '';
$ok = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password2 = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '';
    if ($username === '' || $password === '') {
        $error = 'Informe usuário e senha.';
    } elseif ($password !== $password2) {
        $error = 'As senhas não coincidem.';
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if ($stmt = $conexao->prepare('INSERT INTO tb_users (username, password_hash) VALUES (?, ?)')) {
            $stmt->bind_param('ss', $username, $hash);
            try {
                if ($stmt->execute()) {
                    $ok = 'Cadastro realizado. Faça login.';
                }
            } catch (\mysqli_sql_exception $e) {
                if ((int)$e->getCode() === 1062) {
                    $error = 'Usuário já existe.';
                } else {
                    $error = 'Erro ao cadastrar.';
                }
            } finally {
                $stmt->close();
            }
        } else {
            $error = 'Erro ao preparar cadastro.';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<main id="conteudo" class="auth">
    <h2>Cadastre-se</h2>
    <?php if ($error): ?><p style="color:red;"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
    <?php if ($ok): ?><p style="color:green;"><?php echo htmlspecialchars($ok); ?></p><?php endif; ?>
    <section>
    <form method="POST" action="register.php">
        <input type="text" name="username" placeholder="Usuário" required>
        <input type="password" name="password" placeholder="Senha" required>
        <input type="password" name="password_confirm" placeholder="Confirmar senha" required>
        <input type="submit" value="Cadastrar">
    </form>
    </section>
    <p>Já tem conta? <a href="login.php">Entrar</a></p>
</main>
</body>
</html>
