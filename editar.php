<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $conexao = new PDO('mysql:host=localhost;port=3307;dbname=crudphp', 'root', '');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            die("Usuário não encontrado.");
        }
    } catch(PDOException $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form action="editar_processar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <table border="1">
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="<?php echo $usuario['email']; ?>" required></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>