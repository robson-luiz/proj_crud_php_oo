<?php
// Inclui o controlador
require_once __DIR__ . '/../controller/UserController.php';
$controller = new UserController();

// Obtém o ID do usuário a ser editado
$id = $_GET['id'] ?? null;
if (!$id) {
    // Redireciona se não houver ID
    header('Location: ../index.php');
    exit;
}
$user = $controller->show($id);
if (!$user) {
    // Redireciona se usuário não encontrado
    header('Location: ../index.php');
    exit;
}

// Processa o formulário de edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    // Tenta atualizar o usuário
    if ($controller->update($id, $name, $email)) {
        session_start();
        $_SESSION['success'] = 'Usuário atualizado com sucesso!';
        header('Location: ../index.php');
        exit;
    } else {
        $error = 'Erro ao atualizar usuário.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="titulo-crud">
        <h1>Editar Usuário</h1>
    </div>
    <!-- Exibe mensagem de erro caso haja problema na edição -->
    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <!-- Botão para visualizar usuário -->
    <div class="actions-bar" style="margin-bottom: 10px; display: flex; justify-content: center;">
        <a href="view.php?id=<?= $user['id'] ?>" class="btn-view">Visualizar</a>
    </div>
    <!-- Formulário de edição -->
    <form method="post">
        <label>Nome: <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required></label><br>
        <label>E-mail: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required></label><br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
