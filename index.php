<?php
// Inicia a sessão para mensagens de sucesso
session_start();
// Inclui o controlador e o modelo
require_once __DIR__ . '/controller/UserController.php';
require_once __DIR__ . '/model/User.php';
$controller = new UserController();

// Configurações de paginação
$limit = 6; // Usuários por página
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;
$users = $controller->index($limit, $offset); // Busca usuários paginados
$total = User::countAll(); // Total de usuários
$totalPages = ceil($total / $limit); // Total de páginas
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>CRUD Usuarios</title>
   <link rel="stylesheet" href="assets/style.css">
   <!-- Script para ocultar mensagem de sucesso após 3 segundos -->
   <script>
   window.addEventListener('DOMContentLoaded', function() {
	   var msg = document.getElementById('success-msg');
	   if (msg) {
		   setTimeout(function() {
			   msg.style.display = 'none';
		   }, 3000);
	   }
   });
   </script>
</head>
<body>
	<div class="titulo-crud">
		<h1>CRUD Usuarios</h1>
	</div>
	   <!-- Mensagem de sucesso após cadastro/edição -->
	   <?php if (!empty($_SESSION['success'])): ?>
		   <div id="success-msg" style="width:80%;margin:10px auto;padding:12px;background:#e8f5e9;color:#388e3c;border-radius:4px;text-align:center;font-weight:bold;">
			   <?= htmlspecialchars($_SESSION['success']) ?>
		   </div>
		   <?php unset($_SESSION['success']); ?>
	   <?php endif; ?>
	   <!-- Botão para cadastrar novo usuário -->
	   <div class="actions-bar">
		   <a href="views/create.php" class="btn-right">Cadastrar</a>
	   </div>
	   <!-- Tabela de usuários -->
	   <table border="1" cellpadding="8">
		   <tr>
			   <th>ID</th>
			   <th>Nome</th>
			   <th>E-mail</th>
			   <th>Ações</th>
		   </tr>
		   <?php foreach ($users as $user): ?>
		   <tr>
			   <td><?= htmlspecialchars($user['id']) ?></td>
			   <td><?= htmlspecialchars($user['name']) ?></td>
			   <td><?= htmlspecialchars($user['email']) ?></td>
			   <td>
				   <!-- Botões de ação para cada usuário -->
				   <a href="views/view.php?id=<?= $user['id'] ?>" class="btn-view">Visualizar</a>
				   <a href="views/edit.php?id=<?= $user['id'] ?>" class="btn-right">Editar</a>
				   <a href="views/delete.php?id=<?= $user['id'] ?>" class="btn-delete" onclick="return confirm('Tem certeza que deseja excluir esse registro?')">Delete</a>
			   </td>
		   </tr>
		   <?php endforeach; ?>
	   </table>
	   <!-- Paginação -->
	   <?php if ($totalPages > 1): ?>
	   <div class="pagination">
		   <?php for ($i = 1; $i <= $totalPages; $i++): ?>
			   <?php if ($i == $page): ?>
				   <span class="active"> <?= $i ?> </span>
			   <?php else: ?>
				   <a href="?page=<?= $i ?>"> <?= $i ?> </a>
			   <?php endif; ?>
		   <?php endfor; ?>
	   </div>
	   <?php endif; ?>
</body>
</html>
