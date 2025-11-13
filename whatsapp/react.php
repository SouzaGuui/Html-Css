<?php
require_once 'bd.php';
require_once 'auth.php';
require_login();

header('Content-Type: application/json; charset=UTF-8');


$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$type = isset($_POST['type']) ? $_POST['type'] : '';
$delta = isset($_POST['delta']) ? intval($_POST['delta']) : 0;

if(!$id || !in_array($type, ['like','dislike'], true) || !in_array($delta, [-1,1], true)){
    http_response_code(400);
    echo json_encode(['ok'=>false,'error'=>'Parâmetros inválidos']);
    exit;
}

if($type === 'like'){
    $sql = "UPDATE tb_chat SET likes = CASE WHEN (likes + ?) < 0 THEN 0 ELSE (likes + ?) END WHERE id = ?";
} else {
    $sql = "UPDATE tb_chat SET dislikes = CASE WHEN (dislikes + ?) < 0 THEN 0 ELSE (dislikes + ?) END WHERE id = ?";
}

if($stmt = $conexao->prepare($sql)){
    $stmt->bind_param('iii', $delta, $delta, $id);
    $ok = $stmt->execute();
    $stmt->close();
} else {
    $ok = false;
}

if(!$ok){
    http_response_code(500);
    echo json_encode(['ok'=>false,'error'=>'Falha ao atualizar']);
    exit;
}

// Buscar contagens atualizadas
$likes = 0; $dislikes = 0;
if($stmt = $conexao->prepare("SELECT likes, dislikes FROM tb_chat WHERE id = ?")){
    $stmt->bind_param('i', $id);
    if($stmt->execute()){
        $stmt->bind_result($likes, $dislikes);
        $stmt->fetch();
    }
    $stmt->close();
}

echo json_encode(['ok'=>true,'id'=>$id,'likes'=>$likes,'dislikes'=>$dislikes]);
?>