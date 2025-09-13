
# CRUD Usuários - PHP Orientado a Objetos

Este projeto é um CRUD (Create, Read, Update, Delete) simples para gerenciamento de usuários, desenvolvido em PHP orientado a objetos, utilizando MySQL, HTML, CSS e JavaScript. O objetivo é servir como base para estudos e prática de conceitos fundamentais de desenvolvimento web.

![Exemplo de tela do CRUD](images/imagem_crud.png)

## Tecnologias Utilizadas
- PHP (POO)
- MySQL
- HTML5
- CSS3
- JavaScript

## Estrutura do Projeto
```
proj_crud_php_oo/
├── assets/           # Arquivos estáticos (CSS, imagens)
├── conection/        # Classe de conexão com o banco de dados
│   └── Connection.php
├── controller/       # Controlador das ações do usuário
│   └── UserController.php
├── model/            # Modelo de dados do usuário
│   └── User.php
├── views/            # Páginas do CRUD
│   ├── create.php
│   ├── edit.php
│   ├── view.php
│   └── delete.php
├── index.php         # Página principal (listagem e paginação)
└── README.md         # Documentação do projeto
```

## Instalação e Execução
1. Clone este repositório:
   ```bash
   git clone https://github.com/robson-luiz/proj_crud_php_oo.git
   ```
2. Importe o script SQL abaixo no seu MySQL para criar o banco e a tabela:
   ```sql
   CREATE DATABASE IF NOT EXISTS practice_crud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   USE practice_crud;
   CREATE TABLE IF NOT EXISTS users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
   ```
3. Configure o acesso ao banco em `conection/Connection.php` (usuário, senha, host).
4. Execute o projeto em um servidor local (XAMPP, LAMP, WAMP, etc.) e acesse `index.php` pelo navegador.

## Como Usar
- **Cadastrar:** Clique em "Cadastrar" para adicionar um novo usuário.
- **Visualizar:** Clique em "Visualizar" para ver os detalhes de um usuário.
- **Editar:** Clique em "Editar" para modificar os dados de um usuário.
- **Excluir:** Clique em "Delete" para remover um usuário.
- **Paginação:** Se houver mais de 6 usuários, utilize a navegação de páginas.

## Contribuição
Sinta-se à vontade para abrir issues, enviar pull requests ou sugerir melhorias!

## Licença
Este projeto é livre para uso e modificação. Escolha a licença que preferir (MIT, GPL, etc.).

---
Projeto criado para fins de estudo e prática de desenvolvimento web com PHP, MySQL, HTML, CSS e JavaScript.