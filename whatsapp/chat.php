<?php
require_once 'bd.php';

// garante que a tabela possui colunas de reações
function ensure_reaction_columns($conexao){
    $needLikes = true; $needDislikes = true;
    if($res = $conexao->query("SHOW COLUMNS FROM tb_chat LIKE 'likes'")){
        $needLikes = ($res->num_rows === 0);
        $res->close();
    }
    if($res = $conexao->query("SHOW COLUMNS FROM tb_chat LIKE 'dislikes'")){
        $needDislikes = ($res->num_rows === 0);
        $res->close();
    }
    if($needLikes){ $conexao->query("ALTER TABLE tb_chat ADD COLUMN likes INT NOT NULL DEFAULT 0"); }
    if($needDislikes){ $conexao->query("ALTER TABLE tb_chat ADD COLUMN dislikes INT NOT NULL DEFAULT 0"); }
}
ensure_reaction_columns($conexao);

$consulta = "SELECT id, nome, mensagem, data, likes, dislikes FROM tb_chat ORDER BY id DESC";
$executar = $conexao->query($consulta);
if ($executar) {
    while($linha = $executar->fetch_array()){
        $mensagem = $linha['mensagem'];
        $isImage = preg_match('/^data:image\//', $mensagem) === 1;
        ?>
        <article class="dados-chat" data-id="<?php echo (int)$linha['id']; ?>" data-likes="<?php echo (int)$linha['likes']; ?>" data-dislikes="<?php echo (int)$linha['dislikes']; ?>">
            <header>
                <strong style="color: #1C62C4;"><?php echo htmlspecialchars($linha['nome'], ENT_QUOTES, 'UTF-8'); ?></strong>
            </header>
            <?php if ($isImage): ?>
                <figure style="display:block;margin-top:6px;">
                    <img src="<?php echo htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8'); ?>" alt="imagem" style="max-width:100%;border-radius:10px;">
                </figure>
            <?php else: ?>
                <p style="color: #848484; margin-top:4px;"><?php echo htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
            <time datetime="<?php echo date('Y-m-d H:i:s', strtotime($linha['data'])); ?>" style="float: right;"><?php echo formatarData($linha['data']); ?></time>
        </article>
        <?php
    }
}
?>