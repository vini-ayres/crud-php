# CRUD em PHP com MySQL

Este projeto é um sistema CRUD (Create, Read, Update, Delete) simples usando PHP e MySQL. Ele permite adicionar, visualizar, editar e deletar usuários em um banco de dados MySQL.

## Requisitos

- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Servidor Web (Apache recomendado)
- XAMPP (opcional, mas recomendado para um ambiente de desenvolvimento fácil de configurar)

## Configuração do Projeto

### Passo 1: Clonar o Repositório

Clone o repositório para o diretório raiz do seu servidor web (por exemplo, `htdocs` no XAMPP).

```bash
git clone https://github.com/seu-usuario/crud-php.git
```

### Passo 2: Configurar o Banco de Dados

1. Inicie o servidor MySQL através do XAMPP ou de outro servidor.
2. Crie um banco de dados chamado `crudphp`.
3. Importe o arquivo `database.sql` para criar a tabela `usuarios`.

```sql
CREATE DATABASE crudphp;
USE crudphp;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);
```

### Passo 3: Configurar o Projeto

Verifique se as configurações do banco de dados no arquivo `index.php` estão corretas:

```php
$conexao = new PDO('mysql:host=localhost;port=3307;dbname=crudphp', 'root', '');
```

Ajuste o `host`, `port`, `dbname`, `username`, e `password` conforme necessário.

## Estrutura do Projeto

- `index.php`: Página principal que exibe e gerencia os usuários.
- `editar.php`: Página para editar um usuário.
- `editar_processar.php`: Script para processar a edição de um usuário.
- `deletar.php`: Script para deletar um usuário.

## Funcionalidades

### Adicionar Usuário

Na página principal (`index.php`), preencha o formulário com o nome e e-mail do usuário e clique em "Adicionar".

### Visualizar Usuários

A tabela na página principal exibe todos os usuários no banco de dados.

### Editar Usuário

Na tabela de usuários, clique em "Editar" ao lado do usuário que você deseja editar. Você será redirecionado para a página de edição (`editar.php`), onde poderá atualizar as informações do usuário.

### Deletar Usuário

Na tabela de usuários, clique em "Deletar" ao lado do usuário que você deseja remover. O usuário será excluído do banco de dados.
