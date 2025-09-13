<?php
// Inclui o controlador responsável pelas ações do usuário
require_once __DIR__ . '/../controller/UserController.php';
$controller = new UserController();

// Processa o formulário de cadastro quando enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    // Tenta cadastrar o usuário
    if ($controller->store($name, $email)) {
        session_start(); // Inicia sessão para mensagem de sucesso
        $_SESSION['success'] = 'Usuário cadastrado com sucesso!';
        header('Location: ../index.php'); // Redireciona para a listagem
        exit;
    } else {
        $error = 'Erro ao cadastrar usuário.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <!-- Título da página -->
    <div class="titulo-crud">
        <h1>Cadastrar Usuário</h1>
    </div>
    <!-- Exibe mensagem de erro caso haja problema no cadastro -->
    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <!-- Botão para voltar à listagem -->
    <div class="actions-bar" style="margin-bottom: 10px; display: flex; justify-content: center;">
        <a href="../index.php" class="btn-right">Voltar</a>
    </div>
    <!-- Formulário de cadastro do usuário -->
    <form method="post">
        <label>Nome: <input type="text" name="name" required></label><br>
        <label>E-mail: <input type="email" name="email" required></label><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
