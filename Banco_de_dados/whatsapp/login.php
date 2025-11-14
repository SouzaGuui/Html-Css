<?php
require_once 'bd.php';
require_once 'auth.php';

// Cria tabela de usuários se não existir
$conexao->query("CREATE TABLE IF NOT EXISTS tb_users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    if ($username === '' || $password === '') {
        $error = 'Informe usuário e senha.';
    } else {
        if ($stmt = $conexao->prepare('SELECT id, username, password_hash FROM tb_users WHERE username = ? LIMIT 1')) {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->bind_result($id, $uname, $hash);
            if ($stmt->fetch() && password_verify($password, $hash)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $uname;
                $stmt->close();
                header('Location: index.php');
                exit;
            } else {
                $error = 'Credenciais inválidas.';
            }
            $stmt->close();
        } else {
            $error = 'Erro no login.';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<main id="conteudo" class="auth">
    <h2>Entrar</h2>
    <?php if ($error): ?><p style="color:red;"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
    <section>
    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Usuário" required>
        <input type="password" name="password" placeholder="Senha" required>
        <input type="submit" value="Entrar">
    </form>
    </section>
    <p>Não tem conta? <a href="register.php">Cadastre-se</a></p>
</main>
</body>
</html>