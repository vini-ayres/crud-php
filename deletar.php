<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $conexao = new PDO('mysql:host=localhost;port=3307;dbname=crudphp', 'root', '');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: index.php");
        exit;
    } catch(PDOException $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit;
}
?>