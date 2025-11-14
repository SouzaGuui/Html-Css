<?php
// Gerencia sessão e autenticação básica
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function require_login() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
}

function current_username() {
    return isset($_SESSION['username']) ? $_SESSION['username'] : null;
}