<?php
try {
    $conexao = new PDO('mysql:host=localhost;port=3307;dbname=crudphp', 'root', '');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// CREATE
function criarUsuario($conexao, $nome, $email) {
    $query = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    return $stmt->execute();
}

// READ
function buscarUsuarios($conexao) {
    $query = "SELECT * FROM usuarios";
    $stmt = $conexao->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD em PHP</title>
</head>
<body>
    <h2>Adicionar Novo Usuário</h2>
    <form action="index.php" method="post">
        <table border="1">
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" required><br></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required><br></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Adicionar">
    </form>
    <br>
    <hr></hr>
    <h2>Tabela de Usuários</h2>
    <table border="1" style="width:500px; text-align: center">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Processar adição de novo usuário
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                criarUsuario($conexao, $nome, $email);
            }

            // Exibir lista de usuários
            $usuarios = buscarUsuarios($conexao);
            foreach ($usuarios as $usuario) {
                echo "<tr>";
                echo "<td>{$usuario['nome']}</td>";
                echo "<td>{$usuario['email']}</td>";
                echo "<td><a href='editar.php?id={$usuario['id']}'>Editar</a></td>";
                echo "<td><a href='deletar.php?id={$usuario['id']}'>Deletar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
