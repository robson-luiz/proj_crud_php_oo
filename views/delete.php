<?php
// Inclui o controlador
require_once __DIR__ . '/../controller/UserController.php';
$controller = new UserController();

// Obtém o ID do usuário a ser excluído
$id = $_GET['id'] ?? null;
if ($id) {
    // Exclui o usuário
    $controller->destroy($id);
}
// Redireciona para a listagem após exclusão
header('Location: ../index.php');
exit;
