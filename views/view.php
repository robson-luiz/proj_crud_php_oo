<?php
require_once __DIR__ . '/../controller/UserController.php';
$controller = new UserController();
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: ../index.php');
    exit;
}
$user = $controller->show($id);
if (!$user) {
    echo '<p>Usuário não encontrado</p>';
    echo '<a href="../index.php">Voltar</a>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Usuário</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="titulo-crud">
// Inclui o controlador
require_once __DIR__ . '/../controller/UserController.php';
$controller = new UserController();

// Obtém o ID do usuário a ser visualizado
$id = $_GET['id'] ?? null;
if (!$id) {
    // Redireciona se não houver ID
    header('Location: ../index.php');
    exit;
}
$user = $controller->show($id);
if (!$user) {
    // Exibe mensagem se usuário não encontrado
    echo '<p>User not found.</p>';
    echo '<a href="../index.php">Back</a>';
    exit;
}

        <h1>Detalhes do Usuário</h1>
    </div>
    <div style="max-width: 400px; margin: 0 auto;">
        <div class="actions-bar" style="margin-bottom: 10px; justify-content: center;">
            <a href="../index.php" class="btn-right" style="margin-right:10px;">Voltar</a>
            <a href="edit.php?id=<?= $user['id'] ?>" class="btn-right" style="background:#1976d2;">Editar</a>
        </div>
        <div class="user-details">
            <p><strong>ID:</strong> <?= htmlspecialchars($user['id']) ?></p>
            <p><strong>Nome:</strong> <?= htmlspecialchars($user['name']) ?></p>
            <p><strong>E-mail:</strong> <?= htmlspecialchars($user['email']) ?></p>
        </div>
        <!-- Botão para editar usuário -->
        <div class="actions-bar" style="margin-bottom: 10px; justify-content: center;">
            <a href="../index.php" class="btn-right" style="margin-right:10px;">Voltar</a>
            <a href="edit.php?id=<?= $user['id'] ?>" class="btn-right" style="background:#1976d2;">Editar</a>
        </div>
        <!-- Container de detalhes do usuário -->
        <div class="user-details">
            <p><strong>ID:</strong> <?= htmlspecialchars($user['id']) ?></p>
            <p><strong>Nome:</strong> <?= htmlspecialchars($user['name']) ?></p>
            <p><strong>E-mail:</strong> <?= htmlspecialchars($user['email']) ?></p>
        </div>
